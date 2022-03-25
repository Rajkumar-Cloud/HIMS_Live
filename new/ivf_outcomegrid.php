<?php
namespace PHPMaker2020\HIMS;

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
<?php if (!$ivf_outcome_grid->isExport()) { ?>
<script>
var fivf_outcomegrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fivf_outcomegrid = new ew.Form("fivf_outcomegrid", "grid");
	fivf_outcomegrid.formKeyCountName = '<?php echo $ivf_outcome_grid->FormKeyCountName ?>';

	// Validate form
	fivf_outcomegrid.validate = function() {
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
			var checkrow = (gridinsert) ? !this.emptyRow(infix) : true;
			if (checkrow) {
				addcnt++;
			<?php if ($ivf_outcome_grid->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->id->caption(), $ivf_outcome_grid->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_grid->RIDNO->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->RIDNO->caption(), $ivf_outcome_grid->RIDNO->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RIDNO");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_outcome_grid->RIDNO->errorMessage()) ?>");
			<?php if ($ivf_outcome_grid->Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->Name->caption(), $ivf_outcome_grid->Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_grid->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->Age->caption(), $ivf_outcome_grid->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_grid->treatment_status->Required) { ?>
				elm = this.getElements("x" + infix + "_treatment_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->treatment_status->caption(), $ivf_outcome_grid->treatment_status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_grid->ARTCYCLE->Required) { ?>
				elm = this.getElements("x" + infix + "_ARTCYCLE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->ARTCYCLE->caption(), $ivf_outcome_grid->ARTCYCLE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_grid->RESULT->Required) { ?>
				elm = this.getElements("x" + infix + "_RESULT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->RESULT->caption(), $ivf_outcome_grid->RESULT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_grid->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->status->caption(), $ivf_outcome_grid->status->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_outcome_grid->status->errorMessage()) ?>");
			<?php if ($ivf_outcome_grid->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->createdby->caption(), $ivf_outcome_grid->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_outcome_grid->createdby->errorMessage()) ?>");
			<?php if ($ivf_outcome_grid->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->createddatetime->caption(), $ivf_outcome_grid->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_outcome_grid->createddatetime->errorMessage()) ?>");
			<?php if ($ivf_outcome_grid->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->modifiedby->caption(), $ivf_outcome_grid->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_outcome_grid->modifiedby->errorMessage()) ?>");
			<?php if ($ivf_outcome_grid->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->modifieddatetime->caption(), $ivf_outcome_grid->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_outcome_grid->modifieddatetime->errorMessage()) ?>");
			<?php if ($ivf_outcome_grid->outcomeDate->Required) { ?>
				elm = this.getElements("x" + infix + "_outcomeDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->outcomeDate->caption(), $ivf_outcome_grid->outcomeDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_outcomeDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_outcome_grid->outcomeDate->errorMessage()) ?>");
			<?php if ($ivf_outcome_grid->outcomeDay->Required) { ?>
				elm = this.getElements("x" + infix + "_outcomeDay");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->outcomeDay->caption(), $ivf_outcome_grid->outcomeDay->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_outcomeDay");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_outcome_grid->outcomeDay->errorMessage()) ?>");
			<?php if ($ivf_outcome_grid->OPResult->Required) { ?>
				elm = this.getElements("x" + infix + "_OPResult");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->OPResult->caption(), $ivf_outcome_grid->OPResult->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_grid->Gestation->Required) { ?>
				elm = this.getElements("x" + infix + "_Gestation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->Gestation->caption(), $ivf_outcome_grid->Gestation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_grid->TransferdEmbryos->Required) { ?>
				elm = this.getElements("x" + infix + "_TransferdEmbryos");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->TransferdEmbryos->caption(), $ivf_outcome_grid->TransferdEmbryos->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_grid->InitalOfSacs->Required) { ?>
				elm = this.getElements("x" + infix + "_InitalOfSacs");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->InitalOfSacs->caption(), $ivf_outcome_grid->InitalOfSacs->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_grid->ImplimentationRate->Required) { ?>
				elm = this.getElements("x" + infix + "_ImplimentationRate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->ImplimentationRate->caption(), $ivf_outcome_grid->ImplimentationRate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_grid->EmbryoNo->Required) { ?>
				elm = this.getElements("x" + infix + "_EmbryoNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->EmbryoNo->caption(), $ivf_outcome_grid->EmbryoNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_grid->ExtrauterineSac->Required) { ?>
				elm = this.getElements("x" + infix + "_ExtrauterineSac");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->ExtrauterineSac->caption(), $ivf_outcome_grid->ExtrauterineSac->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_grid->PregnancyMonozygotic->Required) { ?>
				elm = this.getElements("x" + infix + "_PregnancyMonozygotic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->PregnancyMonozygotic->caption(), $ivf_outcome_grid->PregnancyMonozygotic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_grid->TypeGestation->Required) { ?>
				elm = this.getElements("x" + infix + "_TypeGestation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->TypeGestation->caption(), $ivf_outcome_grid->TypeGestation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_grid->Urine->Required) { ?>
				elm = this.getElements("x" + infix + "_Urine");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->Urine->caption(), $ivf_outcome_grid->Urine->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_grid->PTdate->Required) { ?>
				elm = this.getElements("x" + infix + "_PTdate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->PTdate->caption(), $ivf_outcome_grid->PTdate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_grid->Reduced->Required) { ?>
				elm = this.getElements("x" + infix + "_Reduced");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->Reduced->caption(), $ivf_outcome_grid->Reduced->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_grid->INduced->Required) { ?>
				elm = this.getElements("x" + infix + "_INduced");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->INduced->caption(), $ivf_outcome_grid->INduced->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_grid->INducedDate->Required) { ?>
				elm = this.getElements("x" + infix + "_INducedDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->INducedDate->caption(), $ivf_outcome_grid->INducedDate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_grid->Miscarriage->Required) { ?>
				elm = this.getElements("x" + infix + "_Miscarriage");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->Miscarriage->caption(), $ivf_outcome_grid->Miscarriage->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_grid->Induced1->Required) { ?>
				elm = this.getElements("x" + infix + "_Induced1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->Induced1->caption(), $ivf_outcome_grid->Induced1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_grid->Type->Required) { ?>
				elm = this.getElements("x" + infix + "_Type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->Type->caption(), $ivf_outcome_grid->Type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_grid->IfClinical->Required) { ?>
				elm = this.getElements("x" + infix + "_IfClinical");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->IfClinical->caption(), $ivf_outcome_grid->IfClinical->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_grid->GADate->Required) { ?>
				elm = this.getElements("x" + infix + "_GADate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->GADate->caption(), $ivf_outcome_grid->GADate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_grid->GA->Required) { ?>
				elm = this.getElements("x" + infix + "_GA");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->GA->caption(), $ivf_outcome_grid->GA->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_grid->FoetalDeath->Required) { ?>
				elm = this.getElements("x" + infix + "_FoetalDeath");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->FoetalDeath->caption(), $ivf_outcome_grid->FoetalDeath->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_grid->FerinatalDeath->Required) { ?>
				elm = this.getElements("x" + infix + "_FerinatalDeath");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->FerinatalDeath->caption(), $ivf_outcome_grid->FerinatalDeath->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_grid->TidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->TidNo->caption(), $ivf_outcome_grid->TidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_outcome_grid->TidNo->errorMessage()) ?>");
			<?php if ($ivf_outcome_grid->Ectopic->Required) { ?>
				elm = this.getElements("x" + infix + "_Ectopic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->Ectopic->caption(), $ivf_outcome_grid->Ectopic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_grid->Extra->Required) { ?>
				elm = this.getElements("x" + infix + "_Extra");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_grid->Extra->caption(), $ivf_outcome_grid->Extra->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
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
		return true;
	}

	// Form_CustomValidate
	fivf_outcomegrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivf_outcomegrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fivf_outcomegrid.lists["x_Gestation"] = <?php echo $ivf_outcome_grid->Gestation->Lookup->toClientList($ivf_outcome_grid) ?>;
	fivf_outcomegrid.lists["x_Gestation"].options = <?php echo JsonEncode($ivf_outcome_grid->Gestation->options(FALSE, TRUE)) ?>;
	fivf_outcomegrid.lists["x_Urine"] = <?php echo $ivf_outcome_grid->Urine->Lookup->toClientList($ivf_outcome_grid) ?>;
	fivf_outcomegrid.lists["x_Urine"].options = <?php echo JsonEncode($ivf_outcome_grid->Urine->options(FALSE, TRUE)) ?>;
	fivf_outcomegrid.lists["x_Miscarriage"] = <?php echo $ivf_outcome_grid->Miscarriage->Lookup->toClientList($ivf_outcome_grid) ?>;
	fivf_outcomegrid.lists["x_Miscarriage"].options = <?php echo JsonEncode($ivf_outcome_grid->Miscarriage->options(FALSE, TRUE)) ?>;
	fivf_outcomegrid.lists["x_Induced1"] = <?php echo $ivf_outcome_grid->Induced1->Lookup->toClientList($ivf_outcome_grid) ?>;
	fivf_outcomegrid.lists["x_Induced1"].options = <?php echo JsonEncode($ivf_outcome_grid->Induced1->options(FALSE, TRUE)) ?>;
	fivf_outcomegrid.lists["x_Type"] = <?php echo $ivf_outcome_grid->Type->Lookup->toClientList($ivf_outcome_grid) ?>;
	fivf_outcomegrid.lists["x_Type"].options = <?php echo JsonEncode($ivf_outcome_grid->Type->options(FALSE, TRUE)) ?>;
	fivf_outcomegrid.lists["x_FoetalDeath"] = <?php echo $ivf_outcome_grid->FoetalDeath->Lookup->toClientList($ivf_outcome_grid) ?>;
	fivf_outcomegrid.lists["x_FoetalDeath"].options = <?php echo JsonEncode($ivf_outcome_grid->FoetalDeath->options(FALSE, TRUE)) ?>;
	fivf_outcomegrid.lists["x_FerinatalDeath"] = <?php echo $ivf_outcome_grid->FerinatalDeath->Lookup->toClientList($ivf_outcome_grid) ?>;
	fivf_outcomegrid.lists["x_FerinatalDeath"].options = <?php echo JsonEncode($ivf_outcome_grid->FerinatalDeath->options(FALSE, TRUE)) ?>;
	fivf_outcomegrid.lists["x_Ectopic"] = <?php echo $ivf_outcome_grid->Ectopic->Lookup->toClientList($ivf_outcome_grid) ?>;
	fivf_outcomegrid.lists["x_Ectopic"].options = <?php echo JsonEncode($ivf_outcome_grid->Ectopic->options(FALSE, TRUE)) ?>;
	fivf_outcomegrid.lists["x_Extra"] = <?php echo $ivf_outcome_grid->Extra->Lookup->toClientList($ivf_outcome_grid) ?>;
	fivf_outcomegrid.lists["x_Extra"].options = <?php echo JsonEncode($ivf_outcome_grid->Extra->options(FALSE, TRUE)) ?>;
	loadjs.done("fivf_outcomegrid");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<?php } ?>
<?php
$ivf_outcome_grid->renderOtherOptions();
?>
<?php if ($ivf_outcome_grid->TotalRecords > 0 || $ivf_outcome->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_outcome_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_outcome">
<?php if ($ivf_outcome_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $ivf_outcome_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fivf_outcomegrid" class="ew-form ew-list-form form-inline">
<div id="gmp_ivf_outcome" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_ivf_outcomegrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_outcome->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_outcome_grid->renderListOptions();

// Render list options (header, left)
$ivf_outcome_grid->ListOptions->render("header", "left");
?>
<?php if ($ivf_outcome_grid->id->Visible) { // id ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_outcome_grid->id->headerCellClass() ?>"><div id="elh_ivf_outcome_id" class="ivf_outcome_id"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_outcome_grid->id->headerCellClass() ?>"><div><div id="elh_ivf_outcome_id" class="ivf_outcome_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->RIDNO->Visible) { // RIDNO ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $ivf_outcome_grid->RIDNO->headerCellClass() ?>"><div id="elh_ivf_outcome_RIDNO" class="ivf_outcome_RIDNO"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $ivf_outcome_grid->RIDNO->headerCellClass() ?>"><div><div id="elh_ivf_outcome_RIDNO" class="ivf_outcome_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->RIDNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->RIDNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->Name->Visible) { // Name ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $ivf_outcome_grid->Name->headerCellClass() ?>"><div id="elh_ivf_outcome_Name" class="ivf_outcome_Name"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $ivf_outcome_grid->Name->headerCellClass() ?>"><div><div id="elh_ivf_outcome_Name" class="ivf_outcome_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->Name->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->Name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->Name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->Age->Visible) { // Age ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $ivf_outcome_grid->Age->headerCellClass() ?>"><div id="elh_ivf_outcome_Age" class="ivf_outcome_Age"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $ivf_outcome_grid->Age->headerCellClass() ?>"><div><div id="elh_ivf_outcome_Age" class="ivf_outcome_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->treatment_status->Visible) { // treatment_status ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->treatment_status) == "") { ?>
		<th data-name="treatment_status" class="<?php echo $ivf_outcome_grid->treatment_status->headerCellClass() ?>"><div id="elh_ivf_outcome_treatment_status" class="ivf_outcome_treatment_status"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->treatment_status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="treatment_status" class="<?php echo $ivf_outcome_grid->treatment_status->headerCellClass() ?>"><div><div id="elh_ivf_outcome_treatment_status" class="ivf_outcome_treatment_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->treatment_status->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->treatment_status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->treatment_status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->ARTCYCLE) == "") { ?>
		<th data-name="ARTCYCLE" class="<?php echo $ivf_outcome_grid->ARTCYCLE->headerCellClass() ?>"><div id="elh_ivf_outcome_ARTCYCLE" class="ivf_outcome_ARTCYCLE"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->ARTCYCLE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ARTCYCLE" class="<?php echo $ivf_outcome_grid->ARTCYCLE->headerCellClass() ?>"><div><div id="elh_ivf_outcome_ARTCYCLE" class="ivf_outcome_ARTCYCLE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->ARTCYCLE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->ARTCYCLE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->ARTCYCLE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->RESULT->Visible) { // RESULT ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->RESULT) == "") { ?>
		<th data-name="RESULT" class="<?php echo $ivf_outcome_grid->RESULT->headerCellClass() ?>"><div id="elh_ivf_outcome_RESULT" class="ivf_outcome_RESULT"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->RESULT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RESULT" class="<?php echo $ivf_outcome_grid->RESULT->headerCellClass() ?>"><div><div id="elh_ivf_outcome_RESULT" class="ivf_outcome_RESULT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->RESULT->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->RESULT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->RESULT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->status->Visible) { // status ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->status) == "") { ?>
		<th data-name="status" class="<?php echo $ivf_outcome_grid->status->headerCellClass() ?>"><div id="elh_ivf_outcome_status" class="ivf_outcome_status"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $ivf_outcome_grid->status->headerCellClass() ?>"><div><div id="elh_ivf_outcome_status" class="ivf_outcome_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->createdby->Visible) { // createdby ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $ivf_outcome_grid->createdby->headerCellClass() ?>"><div id="elh_ivf_outcome_createdby" class="ivf_outcome_createdby"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $ivf_outcome_grid->createdby->headerCellClass() ?>"><div><div id="elh_ivf_outcome_createdby" class="ivf_outcome_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->createddatetime->Visible) { // createddatetime ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $ivf_outcome_grid->createddatetime->headerCellClass() ?>"><div id="elh_ivf_outcome_createddatetime" class="ivf_outcome_createddatetime"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $ivf_outcome_grid->createddatetime->headerCellClass() ?>"><div><div id="elh_ivf_outcome_createddatetime" class="ivf_outcome_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->modifiedby->Visible) { // modifiedby ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $ivf_outcome_grid->modifiedby->headerCellClass() ?>"><div id="elh_ivf_outcome_modifiedby" class="ivf_outcome_modifiedby"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $ivf_outcome_grid->modifiedby->headerCellClass() ?>"><div><div id="elh_ivf_outcome_modifiedby" class="ivf_outcome_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $ivf_outcome_grid->modifieddatetime->headerCellClass() ?>"><div id="elh_ivf_outcome_modifieddatetime" class="ivf_outcome_modifieddatetime"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $ivf_outcome_grid->modifieddatetime->headerCellClass() ?>"><div><div id="elh_ivf_outcome_modifieddatetime" class="ivf_outcome_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->outcomeDate->Visible) { // outcomeDate ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->outcomeDate) == "") { ?>
		<th data-name="outcomeDate" class="<?php echo $ivf_outcome_grid->outcomeDate->headerCellClass() ?>"><div id="elh_ivf_outcome_outcomeDate" class="ivf_outcome_outcomeDate"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->outcomeDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="outcomeDate" class="<?php echo $ivf_outcome_grid->outcomeDate->headerCellClass() ?>"><div><div id="elh_ivf_outcome_outcomeDate" class="ivf_outcome_outcomeDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->outcomeDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->outcomeDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->outcomeDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->outcomeDay->Visible) { // outcomeDay ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->outcomeDay) == "") { ?>
		<th data-name="outcomeDay" class="<?php echo $ivf_outcome_grid->outcomeDay->headerCellClass() ?>"><div id="elh_ivf_outcome_outcomeDay" class="ivf_outcome_outcomeDay"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->outcomeDay->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="outcomeDay" class="<?php echo $ivf_outcome_grid->outcomeDay->headerCellClass() ?>"><div><div id="elh_ivf_outcome_outcomeDay" class="ivf_outcome_outcomeDay">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->outcomeDay->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->outcomeDay->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->outcomeDay->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->OPResult->Visible) { // OPResult ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->OPResult) == "") { ?>
		<th data-name="OPResult" class="<?php echo $ivf_outcome_grid->OPResult->headerCellClass() ?>"><div id="elh_ivf_outcome_OPResult" class="ivf_outcome_OPResult"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->OPResult->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OPResult" class="<?php echo $ivf_outcome_grid->OPResult->headerCellClass() ?>"><div><div id="elh_ivf_outcome_OPResult" class="ivf_outcome_OPResult">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->OPResult->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->OPResult->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->OPResult->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->Gestation->Visible) { // Gestation ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->Gestation) == "") { ?>
		<th data-name="Gestation" class="<?php echo $ivf_outcome_grid->Gestation->headerCellClass() ?>"><div id="elh_ivf_outcome_Gestation" class="ivf_outcome_Gestation"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->Gestation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gestation" class="<?php echo $ivf_outcome_grid->Gestation->headerCellClass() ?>"><div><div id="elh_ivf_outcome_Gestation" class="ivf_outcome_Gestation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->Gestation->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->Gestation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->Gestation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->TransferdEmbryos->Visible) { // TransferdEmbryos ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->TransferdEmbryos) == "") { ?>
		<th data-name="TransferdEmbryos" class="<?php echo $ivf_outcome_grid->TransferdEmbryos->headerCellClass() ?>"><div id="elh_ivf_outcome_TransferdEmbryos" class="ivf_outcome_TransferdEmbryos"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->TransferdEmbryos->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TransferdEmbryos" class="<?php echo $ivf_outcome_grid->TransferdEmbryos->headerCellClass() ?>"><div><div id="elh_ivf_outcome_TransferdEmbryos" class="ivf_outcome_TransferdEmbryos">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->TransferdEmbryos->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->TransferdEmbryos->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->TransferdEmbryos->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->InitalOfSacs->Visible) { // InitalOfSacs ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->InitalOfSacs) == "") { ?>
		<th data-name="InitalOfSacs" class="<?php echo $ivf_outcome_grid->InitalOfSacs->headerCellClass() ?>"><div id="elh_ivf_outcome_InitalOfSacs" class="ivf_outcome_InitalOfSacs"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->InitalOfSacs->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="InitalOfSacs" class="<?php echo $ivf_outcome_grid->InitalOfSacs->headerCellClass() ?>"><div><div id="elh_ivf_outcome_InitalOfSacs" class="ivf_outcome_InitalOfSacs">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->InitalOfSacs->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->InitalOfSacs->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->InitalOfSacs->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->ImplimentationRate->Visible) { // ImplimentationRate ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->ImplimentationRate) == "") { ?>
		<th data-name="ImplimentationRate" class="<?php echo $ivf_outcome_grid->ImplimentationRate->headerCellClass() ?>"><div id="elh_ivf_outcome_ImplimentationRate" class="ivf_outcome_ImplimentationRate"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->ImplimentationRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ImplimentationRate" class="<?php echo $ivf_outcome_grid->ImplimentationRate->headerCellClass() ?>"><div><div id="elh_ivf_outcome_ImplimentationRate" class="ivf_outcome_ImplimentationRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->ImplimentationRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->ImplimentationRate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->ImplimentationRate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->EmbryoNo->Visible) { // EmbryoNo ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->EmbryoNo) == "") { ?>
		<th data-name="EmbryoNo" class="<?php echo $ivf_outcome_grid->EmbryoNo->headerCellClass() ?>"><div id="elh_ivf_outcome_EmbryoNo" class="ivf_outcome_EmbryoNo"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->EmbryoNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmbryoNo" class="<?php echo $ivf_outcome_grid->EmbryoNo->headerCellClass() ?>"><div><div id="elh_ivf_outcome_EmbryoNo" class="ivf_outcome_EmbryoNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->EmbryoNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->EmbryoNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->EmbryoNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->ExtrauterineSac->Visible) { // ExtrauterineSac ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->ExtrauterineSac) == "") { ?>
		<th data-name="ExtrauterineSac" class="<?php echo $ivf_outcome_grid->ExtrauterineSac->headerCellClass() ?>"><div id="elh_ivf_outcome_ExtrauterineSac" class="ivf_outcome_ExtrauterineSac"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->ExtrauterineSac->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ExtrauterineSac" class="<?php echo $ivf_outcome_grid->ExtrauterineSac->headerCellClass() ?>"><div><div id="elh_ivf_outcome_ExtrauterineSac" class="ivf_outcome_ExtrauterineSac">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->ExtrauterineSac->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->ExtrauterineSac->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->ExtrauterineSac->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->PregnancyMonozygotic->Visible) { // PregnancyMonozygotic ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->PregnancyMonozygotic) == "") { ?>
		<th data-name="PregnancyMonozygotic" class="<?php echo $ivf_outcome_grid->PregnancyMonozygotic->headerCellClass() ?>"><div id="elh_ivf_outcome_PregnancyMonozygotic" class="ivf_outcome_PregnancyMonozygotic"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->PregnancyMonozygotic->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PregnancyMonozygotic" class="<?php echo $ivf_outcome_grid->PregnancyMonozygotic->headerCellClass() ?>"><div><div id="elh_ivf_outcome_PregnancyMonozygotic" class="ivf_outcome_PregnancyMonozygotic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->PregnancyMonozygotic->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->PregnancyMonozygotic->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->PregnancyMonozygotic->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->TypeGestation->Visible) { // TypeGestation ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->TypeGestation) == "") { ?>
		<th data-name="TypeGestation" class="<?php echo $ivf_outcome_grid->TypeGestation->headerCellClass() ?>"><div id="elh_ivf_outcome_TypeGestation" class="ivf_outcome_TypeGestation"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->TypeGestation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TypeGestation" class="<?php echo $ivf_outcome_grid->TypeGestation->headerCellClass() ?>"><div><div id="elh_ivf_outcome_TypeGestation" class="ivf_outcome_TypeGestation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->TypeGestation->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->TypeGestation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->TypeGestation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->Urine->Visible) { // Urine ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->Urine) == "") { ?>
		<th data-name="Urine" class="<?php echo $ivf_outcome_grid->Urine->headerCellClass() ?>"><div id="elh_ivf_outcome_Urine" class="ivf_outcome_Urine"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->Urine->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Urine" class="<?php echo $ivf_outcome_grid->Urine->headerCellClass() ?>"><div><div id="elh_ivf_outcome_Urine" class="ivf_outcome_Urine">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->Urine->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->Urine->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->Urine->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->PTdate->Visible) { // PTdate ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->PTdate) == "") { ?>
		<th data-name="PTdate" class="<?php echo $ivf_outcome_grid->PTdate->headerCellClass() ?>"><div id="elh_ivf_outcome_PTdate" class="ivf_outcome_PTdate"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->PTdate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PTdate" class="<?php echo $ivf_outcome_grid->PTdate->headerCellClass() ?>"><div><div id="elh_ivf_outcome_PTdate" class="ivf_outcome_PTdate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->PTdate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->PTdate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->PTdate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->Reduced->Visible) { // Reduced ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->Reduced) == "") { ?>
		<th data-name="Reduced" class="<?php echo $ivf_outcome_grid->Reduced->headerCellClass() ?>"><div id="elh_ivf_outcome_Reduced" class="ivf_outcome_Reduced"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->Reduced->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reduced" class="<?php echo $ivf_outcome_grid->Reduced->headerCellClass() ?>"><div><div id="elh_ivf_outcome_Reduced" class="ivf_outcome_Reduced">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->Reduced->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->Reduced->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->Reduced->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->INduced->Visible) { // INduced ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->INduced) == "") { ?>
		<th data-name="INduced" class="<?php echo $ivf_outcome_grid->INduced->headerCellClass() ?>"><div id="elh_ivf_outcome_INduced" class="ivf_outcome_INduced"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->INduced->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="INduced" class="<?php echo $ivf_outcome_grid->INduced->headerCellClass() ?>"><div><div id="elh_ivf_outcome_INduced" class="ivf_outcome_INduced">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->INduced->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->INduced->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->INduced->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->INducedDate->Visible) { // INducedDate ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->INducedDate) == "") { ?>
		<th data-name="INducedDate" class="<?php echo $ivf_outcome_grid->INducedDate->headerCellClass() ?>"><div id="elh_ivf_outcome_INducedDate" class="ivf_outcome_INducedDate"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->INducedDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="INducedDate" class="<?php echo $ivf_outcome_grid->INducedDate->headerCellClass() ?>"><div><div id="elh_ivf_outcome_INducedDate" class="ivf_outcome_INducedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->INducedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->INducedDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->INducedDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->Miscarriage->Visible) { // Miscarriage ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->Miscarriage) == "") { ?>
		<th data-name="Miscarriage" class="<?php echo $ivf_outcome_grid->Miscarriage->headerCellClass() ?>"><div id="elh_ivf_outcome_Miscarriage" class="ivf_outcome_Miscarriage"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->Miscarriage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Miscarriage" class="<?php echo $ivf_outcome_grid->Miscarriage->headerCellClass() ?>"><div><div id="elh_ivf_outcome_Miscarriage" class="ivf_outcome_Miscarriage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->Miscarriage->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->Miscarriage->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->Miscarriage->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->Induced1->Visible) { // Induced1 ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->Induced1) == "") { ?>
		<th data-name="Induced1" class="<?php echo $ivf_outcome_grid->Induced1->headerCellClass() ?>"><div id="elh_ivf_outcome_Induced1" class="ivf_outcome_Induced1"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->Induced1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Induced1" class="<?php echo $ivf_outcome_grid->Induced1->headerCellClass() ?>"><div><div id="elh_ivf_outcome_Induced1" class="ivf_outcome_Induced1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->Induced1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->Induced1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->Induced1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->Type->Visible) { // Type ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->Type) == "") { ?>
		<th data-name="Type" class="<?php echo $ivf_outcome_grid->Type->headerCellClass() ?>"><div id="elh_ivf_outcome_Type" class="ivf_outcome_Type"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->Type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Type" class="<?php echo $ivf_outcome_grid->Type->headerCellClass() ?>"><div><div id="elh_ivf_outcome_Type" class="ivf_outcome_Type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->Type->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->Type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->Type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->IfClinical->Visible) { // IfClinical ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->IfClinical) == "") { ?>
		<th data-name="IfClinical" class="<?php echo $ivf_outcome_grid->IfClinical->headerCellClass() ?>"><div id="elh_ivf_outcome_IfClinical" class="ivf_outcome_IfClinical"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->IfClinical->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IfClinical" class="<?php echo $ivf_outcome_grid->IfClinical->headerCellClass() ?>"><div><div id="elh_ivf_outcome_IfClinical" class="ivf_outcome_IfClinical">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->IfClinical->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->IfClinical->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->IfClinical->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->GADate->Visible) { // GADate ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->GADate) == "") { ?>
		<th data-name="GADate" class="<?php echo $ivf_outcome_grid->GADate->headerCellClass() ?>"><div id="elh_ivf_outcome_GADate" class="ivf_outcome_GADate"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->GADate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GADate" class="<?php echo $ivf_outcome_grid->GADate->headerCellClass() ?>"><div><div id="elh_ivf_outcome_GADate" class="ivf_outcome_GADate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->GADate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->GADate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->GADate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->GA->Visible) { // GA ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->GA) == "") { ?>
		<th data-name="GA" class="<?php echo $ivf_outcome_grid->GA->headerCellClass() ?>"><div id="elh_ivf_outcome_GA" class="ivf_outcome_GA"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->GA->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GA" class="<?php echo $ivf_outcome_grid->GA->headerCellClass() ?>"><div><div id="elh_ivf_outcome_GA" class="ivf_outcome_GA">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->GA->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->GA->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->GA->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->FoetalDeath->Visible) { // FoetalDeath ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->FoetalDeath) == "") { ?>
		<th data-name="FoetalDeath" class="<?php echo $ivf_outcome_grid->FoetalDeath->headerCellClass() ?>"><div id="elh_ivf_outcome_FoetalDeath" class="ivf_outcome_FoetalDeath"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->FoetalDeath->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FoetalDeath" class="<?php echo $ivf_outcome_grid->FoetalDeath->headerCellClass() ?>"><div><div id="elh_ivf_outcome_FoetalDeath" class="ivf_outcome_FoetalDeath">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->FoetalDeath->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->FoetalDeath->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->FoetalDeath->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->FerinatalDeath->Visible) { // FerinatalDeath ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->FerinatalDeath) == "") { ?>
		<th data-name="FerinatalDeath" class="<?php echo $ivf_outcome_grid->FerinatalDeath->headerCellClass() ?>"><div id="elh_ivf_outcome_FerinatalDeath" class="ivf_outcome_FerinatalDeath"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->FerinatalDeath->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FerinatalDeath" class="<?php echo $ivf_outcome_grid->FerinatalDeath->headerCellClass() ?>"><div><div id="elh_ivf_outcome_FerinatalDeath" class="ivf_outcome_FerinatalDeath">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->FerinatalDeath->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->FerinatalDeath->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->FerinatalDeath->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $ivf_outcome_grid->TidNo->headerCellClass() ?>"><div id="elh_ivf_outcome_TidNo" class="ivf_outcome_TidNo"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $ivf_outcome_grid->TidNo->headerCellClass() ?>"><div><div id="elh_ivf_outcome_TidNo" class="ivf_outcome_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->TidNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->TidNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->Ectopic->Visible) { // Ectopic ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->Ectopic) == "") { ?>
		<th data-name="Ectopic" class="<?php echo $ivf_outcome_grid->Ectopic->headerCellClass() ?>"><div id="elh_ivf_outcome_Ectopic" class="ivf_outcome_Ectopic"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->Ectopic->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Ectopic" class="<?php echo $ivf_outcome_grid->Ectopic->headerCellClass() ?>"><div><div id="elh_ivf_outcome_Ectopic" class="ivf_outcome_Ectopic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->Ectopic->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->Ectopic->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->Ectopic->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_grid->Extra->Visible) { // Extra ?>
	<?php if ($ivf_outcome_grid->SortUrl($ivf_outcome_grid->Extra) == "") { ?>
		<th data-name="Extra" class="<?php echo $ivf_outcome_grid->Extra->headerCellClass() ?>"><div id="elh_ivf_outcome_Extra" class="ivf_outcome_Extra"><div class="ew-table-header-caption"><?php echo $ivf_outcome_grid->Extra->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Extra" class="<?php echo $ivf_outcome_grid->Extra->headerCellClass() ?>"><div><div id="elh_ivf_outcome_Extra" class="ivf_outcome_Extra">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_grid->Extra->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_grid->Extra->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_grid->Extra->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
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
$ivf_outcome_grid->StartRecord = 1;
$ivf_outcome_grid->StopRecord = $ivf_outcome_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($ivf_outcome->isConfirm() || $ivf_outcome_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($ivf_outcome_grid->FormKeyCountName) && ($ivf_outcome_grid->isGridAdd() || $ivf_outcome_grid->isGridEdit() || $ivf_outcome->isConfirm())) {
		$ivf_outcome_grid->KeyCount = $CurrentForm->getValue($ivf_outcome_grid->FormKeyCountName);
		$ivf_outcome_grid->StopRecord = $ivf_outcome_grid->StartRecord + $ivf_outcome_grid->KeyCount - 1;
	}
}
$ivf_outcome_grid->RecordCount = $ivf_outcome_grid->StartRecord - 1;
if ($ivf_outcome_grid->Recordset && !$ivf_outcome_grid->Recordset->EOF) {
	$ivf_outcome_grid->Recordset->moveFirst();
	$selectLimit = $ivf_outcome_grid->UseSelectLimit;
	if (!$selectLimit && $ivf_outcome_grid->StartRecord > 1)
		$ivf_outcome_grid->Recordset->move($ivf_outcome_grid->StartRecord - 1);
} elseif (!$ivf_outcome->AllowAddDeleteRow && $ivf_outcome_grid->StopRecord == 0) {
	$ivf_outcome_grid->StopRecord = $ivf_outcome->GridAddRowCount;
}

// Initialize aggregate
$ivf_outcome->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_outcome->resetAttributes();
$ivf_outcome_grid->renderRow();
if ($ivf_outcome_grid->isGridAdd())
	$ivf_outcome_grid->RowIndex = 0;
if ($ivf_outcome_grid->isGridEdit())
	$ivf_outcome_grid->RowIndex = 0;
while ($ivf_outcome_grid->RecordCount < $ivf_outcome_grid->StopRecord) {
	$ivf_outcome_grid->RecordCount++;
	if ($ivf_outcome_grid->RecordCount >= $ivf_outcome_grid->StartRecord) {
		$ivf_outcome_grid->RowCount++;
		if ($ivf_outcome_grid->isGridAdd() || $ivf_outcome_grid->isGridEdit() || $ivf_outcome->isConfirm()) {
			$ivf_outcome_grid->RowIndex++;
			$CurrentForm->Index = $ivf_outcome_grid->RowIndex;
			if ($CurrentForm->hasValue($ivf_outcome_grid->FormActionName) && ($ivf_outcome->isConfirm() || $ivf_outcome_grid->EventCancelled))
				$ivf_outcome_grid->RowAction = strval($CurrentForm->getValue($ivf_outcome_grid->FormActionName));
			elseif ($ivf_outcome_grid->isGridAdd())
				$ivf_outcome_grid->RowAction = "insert";
			else
				$ivf_outcome_grid->RowAction = "";
		}

		// Set up key count
		$ivf_outcome_grid->KeyCount = $ivf_outcome_grid->RowIndex;

		// Init row class and style
		$ivf_outcome->resetAttributes();
		$ivf_outcome->CssClass = "";
		if ($ivf_outcome_grid->isGridAdd()) {
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
		if ($ivf_outcome_grid->isGridAdd()) // Grid add
			$ivf_outcome->RowType = ROWTYPE_ADD; // Render add
		if ($ivf_outcome_grid->isGridAdd() && $ivf_outcome->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$ivf_outcome_grid->restoreCurrentRowFormValues($ivf_outcome_grid->RowIndex); // Restore form values
		if ($ivf_outcome_grid->isGridEdit()) { // Grid edit
			if ($ivf_outcome->EventCancelled)
				$ivf_outcome_grid->restoreCurrentRowFormValues($ivf_outcome_grid->RowIndex); // Restore form values
			if ($ivf_outcome_grid->RowAction == "insert")
				$ivf_outcome->RowType = ROWTYPE_ADD; // Render add
			else
				$ivf_outcome->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($ivf_outcome_grid->isGridEdit() && ($ivf_outcome->RowType == ROWTYPE_EDIT || $ivf_outcome->RowType == ROWTYPE_ADD) && $ivf_outcome->EventCancelled) // Update failed
			$ivf_outcome_grid->restoreCurrentRowFormValues($ivf_outcome_grid->RowIndex); // Restore form values
		if ($ivf_outcome->RowType == ROWTYPE_EDIT) // Edit row
			$ivf_outcome_grid->EditRowCount++;
		if ($ivf_outcome->isConfirm()) // Confirm row
			$ivf_outcome_grid->restoreCurrentRowFormValues($ivf_outcome_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$ivf_outcome->RowAttrs->merge(["data-rowindex" => $ivf_outcome_grid->RowCount, "id" => "r" . $ivf_outcome_grid->RowCount . "_ivf_outcome", "data-rowtype" => $ivf_outcome->RowType]);

		// Render row
		$ivf_outcome_grid->renderRow();

		// Render list options
		$ivf_outcome_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($ivf_outcome_grid->RowAction != "delete" && $ivf_outcome_grid->RowAction != "insertdelete" && !($ivf_outcome_grid->RowAction == "insert" && $ivf_outcome->isConfirm() && $ivf_outcome_grid->emptyRow())) {
?>
	<tr <?php echo $ivf_outcome->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_outcome_grid->ListOptions->render("body", "left", $ivf_outcome_grid->RowCount);
?>
	<?php if ($ivf_outcome_grid->id->Visible) { // id ?>
		<td data-name="id" <?php echo $ivf_outcome_grid->id->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_id" class="form-group"></span>
<input type="hidden" data-table="ivf_outcome" data-field="x_id" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_id" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_outcome_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_id" class="form-group">
<span<?php echo $ivf_outcome_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_id" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_id" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_outcome_grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_id">
<span<?php echo $ivf_outcome_grid->id->viewAttributes() ?>><?php echo $ivf_outcome_grid->id->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_id" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_id" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_outcome_grid->id->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_id" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_id" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_outcome_grid->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_id" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_id" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_outcome_grid->id->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_id" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_id" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_outcome_grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO" <?php echo $ivf_outcome_grid->RIDNO->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_outcome_grid->RIDNO->getSessionValue() != "") { ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_RIDNO" class="form-group">
<span<?php echo $ivf_outcome_grid->RIDNO->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->RIDNO->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_outcome_grid->RIDNO->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_RIDNO" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_RIDNO" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->RIDNO->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->RIDNO->EditValue ?>"<?php echo $ivf_outcome_grid->RIDNO->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_RIDNO" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_outcome_grid->RIDNO->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($ivf_outcome_grid->RIDNO->getSessionValue() != "") { ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_RIDNO" class="form-group">
<span<?php echo $ivf_outcome_grid->RIDNO->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->RIDNO->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_outcome_grid->RIDNO->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_RIDNO" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_RIDNO" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->RIDNO->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->RIDNO->EditValue ?>"<?php echo $ivf_outcome_grid->RIDNO->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_RIDNO">
<span<?php echo $ivf_outcome_grid->RIDNO->viewAttributes() ?>><?php echo $ivf_outcome_grid->RIDNO->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_RIDNO" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_outcome_grid->RIDNO->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_RIDNO" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_outcome_grid->RIDNO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_RIDNO" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_outcome_grid->RIDNO->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_RIDNO" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_outcome_grid->RIDNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->Name->Visible) { // Name ?>
		<td data-name="Name" <?php echo $ivf_outcome_grid->Name->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_outcome_grid->Name->getSessionValue() != "") { ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_Name" class="form-group">
<span<?php echo $ivf_outcome_grid->Name->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->Name->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Name" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_outcome_grid->Name->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_Name" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_Name" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Name" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->Name->EditValue ?>"<?php echo $ivf_outcome_grid->Name->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Name" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Name" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_outcome_grid->Name->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($ivf_outcome_grid->Name->getSessionValue() != "") { ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_Name" class="form-group">
<span<?php echo $ivf_outcome_grid->Name->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->Name->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Name" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_outcome_grid->Name->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_Name" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_Name" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Name" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->Name->EditValue ?>"<?php echo $ivf_outcome_grid->Name->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_Name">
<span<?php echo $ivf_outcome_grid->Name->viewAttributes() ?>><?php echo $ivf_outcome_grid->Name->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Name" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Name" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_outcome_grid->Name->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Name" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Name" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_outcome_grid->Name->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Name" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Name" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_outcome_grid->Name->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Name" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Name" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_outcome_grid->Name->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->Age->Visible) { // Age ?>
		<td data-name="Age" <?php echo $ivf_outcome_grid->Age->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_Age" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_Age" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Age" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->Age->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->Age->EditValue ?>"<?php echo $ivf_outcome_grid->Age->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Age" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Age" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($ivf_outcome_grid->Age->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_Age" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_Age" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Age" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->Age->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->Age->EditValue ?>"<?php echo $ivf_outcome_grid->Age->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_Age">
<span<?php echo $ivf_outcome_grid->Age->viewAttributes() ?>><?php echo $ivf_outcome_grid->Age->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Age" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Age" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($ivf_outcome_grid->Age->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Age" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Age" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($ivf_outcome_grid->Age->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Age" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Age" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($ivf_outcome_grid->Age->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Age" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Age" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($ivf_outcome_grid->Age->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->treatment_status->Visible) { // treatment_status ?>
		<td data-name="treatment_status" <?php echo $ivf_outcome_grid->treatment_status->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_treatment_status" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_treatment_status" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->treatment_status->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->treatment_status->EditValue ?>"<?php echo $ivf_outcome_grid->treatment_status->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_treatment_status" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" value="<?php echo HtmlEncode($ivf_outcome_grid->treatment_status->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_treatment_status" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_treatment_status" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->treatment_status->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->treatment_status->EditValue ?>"<?php echo $ivf_outcome_grid->treatment_status->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_treatment_status">
<span<?php echo $ivf_outcome_grid->treatment_status->viewAttributes() ?>><?php echo $ivf_outcome_grid->treatment_status->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_treatment_status" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" value="<?php echo HtmlEncode($ivf_outcome_grid->treatment_status->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_treatment_status" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" value="<?php echo HtmlEncode($ivf_outcome_grid->treatment_status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_treatment_status" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" value="<?php echo HtmlEncode($ivf_outcome_grid->treatment_status->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_treatment_status" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" value="<?php echo HtmlEncode($ivf_outcome_grid->treatment_status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<td data-name="ARTCYCLE" <?php echo $ivf_outcome_grid->ARTCYCLE->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_ARTCYCLE" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_ARTCYCLE" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->ARTCYCLE->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->ARTCYCLE->EditValue ?>"<?php echo $ivf_outcome_grid->ARTCYCLE->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_ARTCYCLE" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" value="<?php echo HtmlEncode($ivf_outcome_grid->ARTCYCLE->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_ARTCYCLE" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_ARTCYCLE" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->ARTCYCLE->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->ARTCYCLE->EditValue ?>"<?php echo $ivf_outcome_grid->ARTCYCLE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_ARTCYCLE">
<span<?php echo $ivf_outcome_grid->ARTCYCLE->viewAttributes() ?>><?php echo $ivf_outcome_grid->ARTCYCLE->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_ARTCYCLE" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" value="<?php echo HtmlEncode($ivf_outcome_grid->ARTCYCLE->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_ARTCYCLE" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" value="<?php echo HtmlEncode($ivf_outcome_grid->ARTCYCLE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_ARTCYCLE" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" value="<?php echo HtmlEncode($ivf_outcome_grid->ARTCYCLE->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_ARTCYCLE" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" value="<?php echo HtmlEncode($ivf_outcome_grid->ARTCYCLE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->RESULT->Visible) { // RESULT ?>
		<td data-name="RESULT" <?php echo $ivf_outcome_grid->RESULT->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_RESULT" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_RESULT" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->RESULT->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->RESULT->EditValue ?>"<?php echo $ivf_outcome_grid->RESULT->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_RESULT" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" value="<?php echo HtmlEncode($ivf_outcome_grid->RESULT->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_RESULT" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_RESULT" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->RESULT->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->RESULT->EditValue ?>"<?php echo $ivf_outcome_grid->RESULT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_RESULT">
<span<?php echo $ivf_outcome_grid->RESULT->viewAttributes() ?>><?php echo $ivf_outcome_grid->RESULT->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_RESULT" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" value="<?php echo HtmlEncode($ivf_outcome_grid->RESULT->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_RESULT" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" value="<?php echo HtmlEncode($ivf_outcome_grid->RESULT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_RESULT" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" value="<?php echo HtmlEncode($ivf_outcome_grid->RESULT->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_RESULT" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" value="<?php echo HtmlEncode($ivf_outcome_grid->RESULT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->status->Visible) { // status ?>
		<td data-name="status" <?php echo $ivf_outcome_grid->status->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_status" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_status" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_status" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->status->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->status->EditValue ?>"<?php echo $ivf_outcome_grid->status->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_status" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_status" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($ivf_outcome_grid->status->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_status" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_status" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_status" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->status->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->status->EditValue ?>"<?php echo $ivf_outcome_grid->status->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_status">
<span<?php echo $ivf_outcome_grid->status->viewAttributes() ?>><?php echo $ivf_outcome_grid->status->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_status" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_status" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($ivf_outcome_grid->status->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_status" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_status" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($ivf_outcome_grid->status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_status" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_status" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($ivf_outcome_grid->status->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_status" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_status" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($ivf_outcome_grid->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $ivf_outcome_grid->createdby->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_createdby" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_createdby" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->createdby->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->createdby->EditValue ?>"<?php echo $ivf_outcome_grid->createdby->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_createdby" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($ivf_outcome_grid->createdby->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_createdby" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_createdby" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->createdby->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->createdby->EditValue ?>"<?php echo $ivf_outcome_grid->createdby->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_createdby">
<span<?php echo $ivf_outcome_grid->createdby->viewAttributes() ?>><?php echo $ivf_outcome_grid->createdby->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_createdby" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($ivf_outcome_grid->createdby->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_createdby" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($ivf_outcome_grid->createdby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_createdby" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($ivf_outcome_grid->createdby->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_createdby" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($ivf_outcome_grid->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $ivf_outcome_grid->createddatetime->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_createddatetime" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_createddatetime" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->createddatetime->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->createddatetime->EditValue ?>"<?php echo $ivf_outcome_grid->createddatetime->editAttributes() ?>>
<?php if (!$ivf_outcome_grid->createddatetime->ReadOnly && !$ivf_outcome_grid->createddatetime->Disabled && !isset($ivf_outcome_grid->createddatetime->EditAttrs["readonly"]) && !isset($ivf_outcome_grid->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_outcomegrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_outcomegrid", "x<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_createddatetime" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($ivf_outcome_grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_createddatetime" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_createddatetime" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->createddatetime->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->createddatetime->EditValue ?>"<?php echo $ivf_outcome_grid->createddatetime->editAttributes() ?>>
<?php if (!$ivf_outcome_grid->createddatetime->ReadOnly && !$ivf_outcome_grid->createddatetime->Disabled && !isset($ivf_outcome_grid->createddatetime->EditAttrs["readonly"]) && !isset($ivf_outcome_grid->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_outcomegrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_outcomegrid", "x<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_createddatetime">
<span<?php echo $ivf_outcome_grid->createddatetime->viewAttributes() ?>><?php echo $ivf_outcome_grid->createddatetime->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_createddatetime" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($ivf_outcome_grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_createddatetime" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($ivf_outcome_grid->createddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_createddatetime" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($ivf_outcome_grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_createddatetime" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($ivf_outcome_grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $ivf_outcome_grid->modifiedby->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_modifiedby" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_modifiedby" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->modifiedby->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->modifiedby->EditValue ?>"<?php echo $ivf_outcome_grid->modifiedby->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_modifiedby" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($ivf_outcome_grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_modifiedby" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_modifiedby" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->modifiedby->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->modifiedby->EditValue ?>"<?php echo $ivf_outcome_grid->modifiedby->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_modifiedby">
<span<?php echo $ivf_outcome_grid->modifiedby->viewAttributes() ?>><?php echo $ivf_outcome_grid->modifiedby->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_modifiedby" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($ivf_outcome_grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_modifiedby" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($ivf_outcome_grid->modifiedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_modifiedby" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($ivf_outcome_grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_modifiedby" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($ivf_outcome_grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $ivf_outcome_grid->modifieddatetime->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_modifieddatetime" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_modifieddatetime" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->modifieddatetime->EditValue ?>"<?php echo $ivf_outcome_grid->modifieddatetime->editAttributes() ?>>
<?php if (!$ivf_outcome_grid->modifieddatetime->ReadOnly && !$ivf_outcome_grid->modifieddatetime->Disabled && !isset($ivf_outcome_grid->modifieddatetime->EditAttrs["readonly"]) && !isset($ivf_outcome_grid->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_outcomegrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_outcomegrid", "x<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_modifieddatetime" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($ivf_outcome_grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_modifieddatetime" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_modifieddatetime" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->modifieddatetime->EditValue ?>"<?php echo $ivf_outcome_grid->modifieddatetime->editAttributes() ?>>
<?php if (!$ivf_outcome_grid->modifieddatetime->ReadOnly && !$ivf_outcome_grid->modifieddatetime->Disabled && !isset($ivf_outcome_grid->modifieddatetime->EditAttrs["readonly"]) && !isset($ivf_outcome_grid->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_outcomegrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_outcomegrid", "x<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_modifieddatetime">
<span<?php echo $ivf_outcome_grid->modifieddatetime->viewAttributes() ?>><?php echo $ivf_outcome_grid->modifieddatetime->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_modifieddatetime" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($ivf_outcome_grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_modifieddatetime" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($ivf_outcome_grid->modifieddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_modifieddatetime" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($ivf_outcome_grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_modifieddatetime" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($ivf_outcome_grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->outcomeDate->Visible) { // outcomeDate ?>
		<td data-name="outcomeDate" <?php echo $ivf_outcome_grid->outcomeDate->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_outcomeDate" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_outcomeDate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->outcomeDate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->outcomeDate->EditValue ?>"<?php echo $ivf_outcome_grid->outcomeDate->editAttributes() ?>>
<?php if (!$ivf_outcome_grid->outcomeDate->ReadOnly && !$ivf_outcome_grid->outcomeDate->Disabled && !isset($ivf_outcome_grid->outcomeDate->EditAttrs["readonly"]) && !isset($ivf_outcome_grid->outcomeDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_outcomegrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_outcomegrid", "x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDate" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" value="<?php echo HtmlEncode($ivf_outcome_grid->outcomeDate->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_outcomeDate" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_outcomeDate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->outcomeDate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->outcomeDate->EditValue ?>"<?php echo $ivf_outcome_grid->outcomeDate->editAttributes() ?>>
<?php if (!$ivf_outcome_grid->outcomeDate->ReadOnly && !$ivf_outcome_grid->outcomeDate->Disabled && !isset($ivf_outcome_grid->outcomeDate->EditAttrs["readonly"]) && !isset($ivf_outcome_grid->outcomeDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_outcomegrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_outcomegrid", "x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_outcomeDate">
<span<?php echo $ivf_outcome_grid->outcomeDate->viewAttributes() ?>><?php echo $ivf_outcome_grid->outcomeDate->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" value="<?php echo HtmlEncode($ivf_outcome_grid->outcomeDate->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDate" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" value="<?php echo HtmlEncode($ivf_outcome_grid->outcomeDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDate" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" value="<?php echo HtmlEncode($ivf_outcome_grid->outcomeDate->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDate" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" value="<?php echo HtmlEncode($ivf_outcome_grid->outcomeDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->outcomeDay->Visible) { // outcomeDay ?>
		<td data-name="outcomeDay" <?php echo $ivf_outcome_grid->outcomeDay->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_outcomeDay" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_outcomeDay" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->outcomeDay->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->outcomeDay->EditValue ?>"<?php echo $ivf_outcome_grid->outcomeDay->editAttributes() ?>>
<?php if (!$ivf_outcome_grid->outcomeDay->ReadOnly && !$ivf_outcome_grid->outcomeDay->Disabled && !isset($ivf_outcome_grid->outcomeDay->EditAttrs["readonly"]) && !isset($ivf_outcome_grid->outcomeDay->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_outcomegrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_outcomegrid", "x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDay" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" value="<?php echo HtmlEncode($ivf_outcome_grid->outcomeDay->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_outcomeDay" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_outcomeDay" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->outcomeDay->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->outcomeDay->EditValue ?>"<?php echo $ivf_outcome_grid->outcomeDay->editAttributes() ?>>
<?php if (!$ivf_outcome_grid->outcomeDay->ReadOnly && !$ivf_outcome_grid->outcomeDay->Disabled && !isset($ivf_outcome_grid->outcomeDay->EditAttrs["readonly"]) && !isset($ivf_outcome_grid->outcomeDay->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_outcomegrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_outcomegrid", "x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_outcomeDay">
<span<?php echo $ivf_outcome_grid->outcomeDay->viewAttributes() ?>><?php echo $ivf_outcome_grid->outcomeDay->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDay" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" value="<?php echo HtmlEncode($ivf_outcome_grid->outcomeDay->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDay" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" value="<?php echo HtmlEncode($ivf_outcome_grid->outcomeDay->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDay" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" value="<?php echo HtmlEncode($ivf_outcome_grid->outcomeDay->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDay" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" value="<?php echo HtmlEncode($ivf_outcome_grid->outcomeDay->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->OPResult->Visible) { // OPResult ?>
		<td data-name="OPResult" <?php echo $ivf_outcome_grid->OPResult->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_OPResult" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_OPResult" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->OPResult->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->OPResult->EditValue ?>"<?php echo $ivf_outcome_grid->OPResult->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_OPResult" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" value="<?php echo HtmlEncode($ivf_outcome_grid->OPResult->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_OPResult" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_OPResult" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->OPResult->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->OPResult->EditValue ?>"<?php echo $ivf_outcome_grid->OPResult->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_OPResult">
<span<?php echo $ivf_outcome_grid->OPResult->viewAttributes() ?>><?php echo $ivf_outcome_grid->OPResult->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_OPResult" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" value="<?php echo HtmlEncode($ivf_outcome_grid->OPResult->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_OPResult" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" value="<?php echo HtmlEncode($ivf_outcome_grid->OPResult->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_OPResult" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" value="<?php echo HtmlEncode($ivf_outcome_grid->OPResult->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_OPResult" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" value="<?php echo HtmlEncode($ivf_outcome_grid->OPResult->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->Gestation->Visible) { // Gestation ?>
		<td data-name="Gestation" <?php echo $ivf_outcome_grid->Gestation->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_Gestation" class="form-group">
<div id="tp_x<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Gestation" data-value-separator="<?php echo $ivf_outcome_grid->Gestation->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" value="{value}"<?php echo $ivf_outcome_grid->Gestation->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome_grid->Gestation->radioButtonListHtml(FALSE, "x{$ivf_outcome_grid->RowIndex}_Gestation") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Gestation" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" value="<?php echo HtmlEncode($ivf_outcome_grid->Gestation->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_Gestation" class="form-group">
<div id="tp_x<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Gestation" data-value-separator="<?php echo $ivf_outcome_grid->Gestation->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" value="{value}"<?php echo $ivf_outcome_grid->Gestation->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome_grid->Gestation->radioButtonListHtml(FALSE, "x{$ivf_outcome_grid->RowIndex}_Gestation") ?>
</div></div>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_Gestation">
<span<?php echo $ivf_outcome_grid->Gestation->viewAttributes() ?>><?php echo $ivf_outcome_grid->Gestation->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Gestation" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" value="<?php echo HtmlEncode($ivf_outcome_grid->Gestation->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Gestation" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" value="<?php echo HtmlEncode($ivf_outcome_grid->Gestation->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Gestation" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" value="<?php echo HtmlEncode($ivf_outcome_grid->Gestation->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Gestation" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" value="<?php echo HtmlEncode($ivf_outcome_grid->Gestation->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->TransferdEmbryos->Visible) { // TransferdEmbryos ?>
		<td data-name="TransferdEmbryos" <?php echo $ivf_outcome_grid->TransferdEmbryos->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_TransferdEmbryos" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_TransferdEmbryos" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->TransferdEmbryos->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->TransferdEmbryos->EditValue ?>"<?php echo $ivf_outcome_grid->TransferdEmbryos->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_TransferdEmbryos" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" value="<?php echo HtmlEncode($ivf_outcome_grid->TransferdEmbryos->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_TransferdEmbryos" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_TransferdEmbryos" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->TransferdEmbryos->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->TransferdEmbryos->EditValue ?>"<?php echo $ivf_outcome_grid->TransferdEmbryos->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_TransferdEmbryos">
<span<?php echo $ivf_outcome_grid->TransferdEmbryos->viewAttributes() ?>><?php echo $ivf_outcome_grid->TransferdEmbryos->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_TransferdEmbryos" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" value="<?php echo HtmlEncode($ivf_outcome_grid->TransferdEmbryos->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_TransferdEmbryos" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" value="<?php echo HtmlEncode($ivf_outcome_grid->TransferdEmbryos->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_TransferdEmbryos" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" value="<?php echo HtmlEncode($ivf_outcome_grid->TransferdEmbryos->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_TransferdEmbryos" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" value="<?php echo HtmlEncode($ivf_outcome_grid->TransferdEmbryos->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->InitalOfSacs->Visible) { // InitalOfSacs ?>
		<td data-name="InitalOfSacs" <?php echo $ivf_outcome_grid->InitalOfSacs->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_InitalOfSacs" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_InitalOfSacs" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->InitalOfSacs->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->InitalOfSacs->EditValue ?>"<?php echo $ivf_outcome_grid->InitalOfSacs->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_InitalOfSacs" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" value="<?php echo HtmlEncode($ivf_outcome_grid->InitalOfSacs->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_InitalOfSacs" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_InitalOfSacs" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->InitalOfSacs->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->InitalOfSacs->EditValue ?>"<?php echo $ivf_outcome_grid->InitalOfSacs->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_InitalOfSacs">
<span<?php echo $ivf_outcome_grid->InitalOfSacs->viewAttributes() ?>><?php echo $ivf_outcome_grid->InitalOfSacs->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_InitalOfSacs" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" value="<?php echo HtmlEncode($ivf_outcome_grid->InitalOfSacs->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_InitalOfSacs" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" value="<?php echo HtmlEncode($ivf_outcome_grid->InitalOfSacs->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_InitalOfSacs" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" value="<?php echo HtmlEncode($ivf_outcome_grid->InitalOfSacs->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_InitalOfSacs" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" value="<?php echo HtmlEncode($ivf_outcome_grid->InitalOfSacs->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->ImplimentationRate->Visible) { // ImplimentationRate ?>
		<td data-name="ImplimentationRate" <?php echo $ivf_outcome_grid->ImplimentationRate->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_ImplimentationRate" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_ImplimentationRate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->ImplimentationRate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->ImplimentationRate->EditValue ?>"<?php echo $ivf_outcome_grid->ImplimentationRate->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_ImplimentationRate" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" value="<?php echo HtmlEncode($ivf_outcome_grid->ImplimentationRate->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_ImplimentationRate" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_ImplimentationRate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->ImplimentationRate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->ImplimentationRate->EditValue ?>"<?php echo $ivf_outcome_grid->ImplimentationRate->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_ImplimentationRate">
<span<?php echo $ivf_outcome_grid->ImplimentationRate->viewAttributes() ?>><?php echo $ivf_outcome_grid->ImplimentationRate->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_ImplimentationRate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" value="<?php echo HtmlEncode($ivf_outcome_grid->ImplimentationRate->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_ImplimentationRate" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" value="<?php echo HtmlEncode($ivf_outcome_grid->ImplimentationRate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_ImplimentationRate" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" value="<?php echo HtmlEncode($ivf_outcome_grid->ImplimentationRate->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_ImplimentationRate" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" value="<?php echo HtmlEncode($ivf_outcome_grid->ImplimentationRate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->EmbryoNo->Visible) { // EmbryoNo ?>
		<td data-name="EmbryoNo" <?php echo $ivf_outcome_grid->EmbryoNo->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_EmbryoNo" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_EmbryoNo" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->EmbryoNo->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->EmbryoNo->EditValue ?>"<?php echo $ivf_outcome_grid->EmbryoNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_EmbryoNo" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" value="<?php echo HtmlEncode($ivf_outcome_grid->EmbryoNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_EmbryoNo" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_EmbryoNo" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->EmbryoNo->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->EmbryoNo->EditValue ?>"<?php echo $ivf_outcome_grid->EmbryoNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_EmbryoNo">
<span<?php echo $ivf_outcome_grid->EmbryoNo->viewAttributes() ?>><?php echo $ivf_outcome_grid->EmbryoNo->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_EmbryoNo" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" value="<?php echo HtmlEncode($ivf_outcome_grid->EmbryoNo->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_EmbryoNo" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" value="<?php echo HtmlEncode($ivf_outcome_grid->EmbryoNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_EmbryoNo" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" value="<?php echo HtmlEncode($ivf_outcome_grid->EmbryoNo->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_EmbryoNo" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" value="<?php echo HtmlEncode($ivf_outcome_grid->EmbryoNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->ExtrauterineSac->Visible) { // ExtrauterineSac ?>
		<td data-name="ExtrauterineSac" <?php echo $ivf_outcome_grid->ExtrauterineSac->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_ExtrauterineSac" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_ExtrauterineSac" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->ExtrauterineSac->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->ExtrauterineSac->EditValue ?>"<?php echo $ivf_outcome_grid->ExtrauterineSac->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_ExtrauterineSac" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" value="<?php echo HtmlEncode($ivf_outcome_grid->ExtrauterineSac->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_ExtrauterineSac" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_ExtrauterineSac" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->ExtrauterineSac->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->ExtrauterineSac->EditValue ?>"<?php echo $ivf_outcome_grid->ExtrauterineSac->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_ExtrauterineSac">
<span<?php echo $ivf_outcome_grid->ExtrauterineSac->viewAttributes() ?>><?php echo $ivf_outcome_grid->ExtrauterineSac->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_ExtrauterineSac" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" value="<?php echo HtmlEncode($ivf_outcome_grid->ExtrauterineSac->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_ExtrauterineSac" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" value="<?php echo HtmlEncode($ivf_outcome_grid->ExtrauterineSac->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_ExtrauterineSac" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" value="<?php echo HtmlEncode($ivf_outcome_grid->ExtrauterineSac->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_ExtrauterineSac" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" value="<?php echo HtmlEncode($ivf_outcome_grid->ExtrauterineSac->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->PregnancyMonozygotic->Visible) { // PregnancyMonozygotic ?>
		<td data-name="PregnancyMonozygotic" <?php echo $ivf_outcome_grid->PregnancyMonozygotic->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_PregnancyMonozygotic" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_PregnancyMonozygotic" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->PregnancyMonozygotic->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->PregnancyMonozygotic->EditValue ?>"<?php echo $ivf_outcome_grid->PregnancyMonozygotic->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_PregnancyMonozygotic" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" value="<?php echo HtmlEncode($ivf_outcome_grid->PregnancyMonozygotic->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_PregnancyMonozygotic" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_PregnancyMonozygotic" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->PregnancyMonozygotic->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->PregnancyMonozygotic->EditValue ?>"<?php echo $ivf_outcome_grid->PregnancyMonozygotic->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_PregnancyMonozygotic">
<span<?php echo $ivf_outcome_grid->PregnancyMonozygotic->viewAttributes() ?>><?php echo $ivf_outcome_grid->PregnancyMonozygotic->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_PregnancyMonozygotic" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" value="<?php echo HtmlEncode($ivf_outcome_grid->PregnancyMonozygotic->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_PregnancyMonozygotic" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" value="<?php echo HtmlEncode($ivf_outcome_grid->PregnancyMonozygotic->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_PregnancyMonozygotic" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" value="<?php echo HtmlEncode($ivf_outcome_grid->PregnancyMonozygotic->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_PregnancyMonozygotic" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" value="<?php echo HtmlEncode($ivf_outcome_grid->PregnancyMonozygotic->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->TypeGestation->Visible) { // TypeGestation ?>
		<td data-name="TypeGestation" <?php echo $ivf_outcome_grid->TypeGestation->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_TypeGestation" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_TypeGestation" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->TypeGestation->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->TypeGestation->EditValue ?>"<?php echo $ivf_outcome_grid->TypeGestation->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_TypeGestation" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" value="<?php echo HtmlEncode($ivf_outcome_grid->TypeGestation->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_TypeGestation" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_TypeGestation" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->TypeGestation->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->TypeGestation->EditValue ?>"<?php echo $ivf_outcome_grid->TypeGestation->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_TypeGestation">
<span<?php echo $ivf_outcome_grid->TypeGestation->viewAttributes() ?>><?php echo $ivf_outcome_grid->TypeGestation->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_TypeGestation" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" value="<?php echo HtmlEncode($ivf_outcome_grid->TypeGestation->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_TypeGestation" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" value="<?php echo HtmlEncode($ivf_outcome_grid->TypeGestation->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_TypeGestation" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" value="<?php echo HtmlEncode($ivf_outcome_grid->TypeGestation->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_TypeGestation" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" value="<?php echo HtmlEncode($ivf_outcome_grid->TypeGestation->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->Urine->Visible) { // Urine ?>
		<td data-name="Urine" <?php echo $ivf_outcome_grid->Urine->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_Urine" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_outcome" data-field="x_Urine" data-value-separator="<?php echo $ivf_outcome_grid->Urine->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Urine" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Urine"<?php echo $ivf_outcome_grid->Urine->editAttributes() ?>>
			<?php echo $ivf_outcome_grid->Urine->selectOptionListHtml("x{$ivf_outcome_grid->RowIndex}_Urine") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Urine" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Urine" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Urine" value="<?php echo HtmlEncode($ivf_outcome_grid->Urine->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_Urine" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_outcome" data-field="x_Urine" data-value-separator="<?php echo $ivf_outcome_grid->Urine->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Urine" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Urine"<?php echo $ivf_outcome_grid->Urine->editAttributes() ?>>
			<?php echo $ivf_outcome_grid->Urine->selectOptionListHtml("x{$ivf_outcome_grid->RowIndex}_Urine") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_Urine">
<span<?php echo $ivf_outcome_grid->Urine->viewAttributes() ?>><?php echo $ivf_outcome_grid->Urine->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Urine" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Urine" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Urine" value="<?php echo HtmlEncode($ivf_outcome_grid->Urine->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Urine" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Urine" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Urine" value="<?php echo HtmlEncode($ivf_outcome_grid->Urine->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Urine" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Urine" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Urine" value="<?php echo HtmlEncode($ivf_outcome_grid->Urine->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Urine" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Urine" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Urine" value="<?php echo HtmlEncode($ivf_outcome_grid->Urine->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->PTdate->Visible) { // PTdate ?>
		<td data-name="PTdate" <?php echo $ivf_outcome_grid->PTdate->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_PTdate" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_PTdate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->PTdate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->PTdate->EditValue ?>"<?php echo $ivf_outcome_grid->PTdate->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_PTdate" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" value="<?php echo HtmlEncode($ivf_outcome_grid->PTdate->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_PTdate" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_PTdate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->PTdate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->PTdate->EditValue ?>"<?php echo $ivf_outcome_grid->PTdate->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_PTdate">
<span<?php echo $ivf_outcome_grid->PTdate->viewAttributes() ?>><?php echo $ivf_outcome_grid->PTdate->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_PTdate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" value="<?php echo HtmlEncode($ivf_outcome_grid->PTdate->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_PTdate" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" value="<?php echo HtmlEncode($ivf_outcome_grid->PTdate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_PTdate" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" value="<?php echo HtmlEncode($ivf_outcome_grid->PTdate->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_PTdate" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" value="<?php echo HtmlEncode($ivf_outcome_grid->PTdate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->Reduced->Visible) { // Reduced ?>
		<td data-name="Reduced" <?php echo $ivf_outcome_grid->Reduced->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_Reduced" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_Reduced" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->Reduced->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->Reduced->EditValue ?>"<?php echo $ivf_outcome_grid->Reduced->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Reduced" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" value="<?php echo HtmlEncode($ivf_outcome_grid->Reduced->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_Reduced" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_Reduced" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->Reduced->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->Reduced->EditValue ?>"<?php echo $ivf_outcome_grid->Reduced->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_Reduced">
<span<?php echo $ivf_outcome_grid->Reduced->viewAttributes() ?>><?php echo $ivf_outcome_grid->Reduced->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Reduced" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" value="<?php echo HtmlEncode($ivf_outcome_grid->Reduced->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Reduced" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" value="<?php echo HtmlEncode($ivf_outcome_grid->Reduced->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Reduced" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" value="<?php echo HtmlEncode($ivf_outcome_grid->Reduced->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Reduced" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" value="<?php echo HtmlEncode($ivf_outcome_grid->Reduced->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->INduced->Visible) { // INduced ?>
		<td data-name="INduced" <?php echo $ivf_outcome_grid->INduced->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_INduced" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_INduced" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->INduced->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->INduced->EditValue ?>"<?php echo $ivf_outcome_grid->INduced->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_INduced" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" value="<?php echo HtmlEncode($ivf_outcome_grid->INduced->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_INduced" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_INduced" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->INduced->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->INduced->EditValue ?>"<?php echo $ivf_outcome_grid->INduced->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_INduced">
<span<?php echo $ivf_outcome_grid->INduced->viewAttributes() ?>><?php echo $ivf_outcome_grid->INduced->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_INduced" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" value="<?php echo HtmlEncode($ivf_outcome_grid->INduced->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_INduced" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" value="<?php echo HtmlEncode($ivf_outcome_grid->INduced->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_INduced" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" value="<?php echo HtmlEncode($ivf_outcome_grid->INduced->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_INduced" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" value="<?php echo HtmlEncode($ivf_outcome_grid->INduced->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->INducedDate->Visible) { // INducedDate ?>
		<td data-name="INducedDate" <?php echo $ivf_outcome_grid->INducedDate->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_INducedDate" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_INducedDate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->INducedDate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->INducedDate->EditValue ?>"<?php echo $ivf_outcome_grid->INducedDate->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_INducedDate" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" value="<?php echo HtmlEncode($ivf_outcome_grid->INducedDate->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_INducedDate" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_INducedDate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->INducedDate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->INducedDate->EditValue ?>"<?php echo $ivf_outcome_grid->INducedDate->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_INducedDate">
<span<?php echo $ivf_outcome_grid->INducedDate->viewAttributes() ?>><?php echo $ivf_outcome_grid->INducedDate->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_INducedDate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" value="<?php echo HtmlEncode($ivf_outcome_grid->INducedDate->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_INducedDate" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" value="<?php echo HtmlEncode($ivf_outcome_grid->INducedDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_INducedDate" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" value="<?php echo HtmlEncode($ivf_outcome_grid->INducedDate->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_INducedDate" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" value="<?php echo HtmlEncode($ivf_outcome_grid->INducedDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->Miscarriage->Visible) { // Miscarriage ?>
		<td data-name="Miscarriage" <?php echo $ivf_outcome_grid->Miscarriage->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_Miscarriage" class="form-group">
<div id="tp_x<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Miscarriage" data-value-separator="<?php echo $ivf_outcome_grid->Miscarriage->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" value="{value}"<?php echo $ivf_outcome_grid->Miscarriage->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome_grid->Miscarriage->radioButtonListHtml(FALSE, "x{$ivf_outcome_grid->RowIndex}_Miscarriage") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Miscarriage" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" value="<?php echo HtmlEncode($ivf_outcome_grid->Miscarriage->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_Miscarriage" class="form-group">
<div id="tp_x<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Miscarriage" data-value-separator="<?php echo $ivf_outcome_grid->Miscarriage->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" value="{value}"<?php echo $ivf_outcome_grid->Miscarriage->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome_grid->Miscarriage->radioButtonListHtml(FALSE, "x{$ivf_outcome_grid->RowIndex}_Miscarriage") ?>
</div></div>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_Miscarriage">
<span<?php echo $ivf_outcome_grid->Miscarriage->viewAttributes() ?>><?php echo $ivf_outcome_grid->Miscarriage->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Miscarriage" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" value="<?php echo HtmlEncode($ivf_outcome_grid->Miscarriage->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Miscarriage" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" value="<?php echo HtmlEncode($ivf_outcome_grid->Miscarriage->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Miscarriage" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" value="<?php echo HtmlEncode($ivf_outcome_grid->Miscarriage->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Miscarriage" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" value="<?php echo HtmlEncode($ivf_outcome_grid->Miscarriage->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->Induced1->Visible) { // Induced1 ?>
		<td data-name="Induced1" <?php echo $ivf_outcome_grid->Induced1->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_Induced1" class="form-group">
<div id="tp_x<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Induced1" data-value-separator="<?php echo $ivf_outcome_grid->Induced1->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" value="{value}"<?php echo $ivf_outcome_grid->Induced1->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome_grid->Induced1->radioButtonListHtml(FALSE, "x{$ivf_outcome_grid->RowIndex}_Induced1") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Induced1" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" value="<?php echo HtmlEncode($ivf_outcome_grid->Induced1->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_Induced1" class="form-group">
<div id="tp_x<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Induced1" data-value-separator="<?php echo $ivf_outcome_grid->Induced1->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" value="{value}"<?php echo $ivf_outcome_grid->Induced1->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome_grid->Induced1->radioButtonListHtml(FALSE, "x{$ivf_outcome_grid->RowIndex}_Induced1") ?>
</div></div>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_Induced1">
<span<?php echo $ivf_outcome_grid->Induced1->viewAttributes() ?>><?php echo $ivf_outcome_grid->Induced1->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Induced1" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" value="<?php echo HtmlEncode($ivf_outcome_grid->Induced1->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Induced1" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" value="<?php echo HtmlEncode($ivf_outcome_grid->Induced1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Induced1" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" value="<?php echo HtmlEncode($ivf_outcome_grid->Induced1->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Induced1" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" value="<?php echo HtmlEncode($ivf_outcome_grid->Induced1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->Type->Visible) { // Type ?>
		<td data-name="Type" <?php echo $ivf_outcome_grid->Type->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_Type" class="form-group">
<div id="tp_x<?php echo $ivf_outcome_grid->RowIndex ?>_Type" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Type" data-value-separator="<?php echo $ivf_outcome_grid->Type->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Type" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Type" value="{value}"<?php echo $ivf_outcome_grid->Type->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_outcome_grid->RowIndex ?>_Type" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome_grid->Type->radioButtonListHtml(FALSE, "x{$ivf_outcome_grid->RowIndex}_Type") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Type" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Type" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Type" value="<?php echo HtmlEncode($ivf_outcome_grid->Type->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_Type" class="form-group">
<div id="tp_x<?php echo $ivf_outcome_grid->RowIndex ?>_Type" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Type" data-value-separator="<?php echo $ivf_outcome_grid->Type->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Type" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Type" value="{value}"<?php echo $ivf_outcome_grid->Type->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_outcome_grid->RowIndex ?>_Type" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome_grid->Type->radioButtonListHtml(FALSE, "x{$ivf_outcome_grid->RowIndex}_Type") ?>
</div></div>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_Type">
<span<?php echo $ivf_outcome_grid->Type->viewAttributes() ?>><?php echo $ivf_outcome_grid->Type->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Type" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Type" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Type" value="<?php echo HtmlEncode($ivf_outcome_grid->Type->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Type" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Type" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Type" value="<?php echo HtmlEncode($ivf_outcome_grid->Type->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Type" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Type" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Type" value="<?php echo HtmlEncode($ivf_outcome_grid->Type->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Type" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Type" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Type" value="<?php echo HtmlEncode($ivf_outcome_grid->Type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->IfClinical->Visible) { // IfClinical ?>
		<td data-name="IfClinical" <?php echo $ivf_outcome_grid->IfClinical->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_IfClinical" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_IfClinical" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->IfClinical->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->IfClinical->EditValue ?>"<?php echo $ivf_outcome_grid->IfClinical->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_IfClinical" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" value="<?php echo HtmlEncode($ivf_outcome_grid->IfClinical->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_IfClinical" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_IfClinical" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->IfClinical->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->IfClinical->EditValue ?>"<?php echo $ivf_outcome_grid->IfClinical->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_IfClinical">
<span<?php echo $ivf_outcome_grid->IfClinical->viewAttributes() ?>><?php echo $ivf_outcome_grid->IfClinical->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_IfClinical" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" value="<?php echo HtmlEncode($ivf_outcome_grid->IfClinical->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_IfClinical" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" value="<?php echo HtmlEncode($ivf_outcome_grid->IfClinical->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_IfClinical" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" value="<?php echo HtmlEncode($ivf_outcome_grid->IfClinical->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_IfClinical" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" value="<?php echo HtmlEncode($ivf_outcome_grid->IfClinical->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->GADate->Visible) { // GADate ?>
		<td data-name="GADate" <?php echo $ivf_outcome_grid->GADate->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_GADate" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_GADate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->GADate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->GADate->EditValue ?>"<?php echo $ivf_outcome_grid->GADate->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_GADate" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" value="<?php echo HtmlEncode($ivf_outcome_grid->GADate->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_GADate" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_GADate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->GADate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->GADate->EditValue ?>"<?php echo $ivf_outcome_grid->GADate->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_GADate">
<span<?php echo $ivf_outcome_grid->GADate->viewAttributes() ?>><?php echo $ivf_outcome_grid->GADate->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_GADate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" value="<?php echo HtmlEncode($ivf_outcome_grid->GADate->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_GADate" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" value="<?php echo HtmlEncode($ivf_outcome_grid->GADate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_GADate" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" value="<?php echo HtmlEncode($ivf_outcome_grid->GADate->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_GADate" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" value="<?php echo HtmlEncode($ivf_outcome_grid->GADate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->GA->Visible) { // GA ?>
		<td data-name="GA" <?php echo $ivf_outcome_grid->GA->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_GA" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_GA" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_GA" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_GA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->GA->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->GA->EditValue ?>"<?php echo $ivf_outcome_grid->GA->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_GA" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_GA" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_GA" value="<?php echo HtmlEncode($ivf_outcome_grid->GA->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_GA" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_GA" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_GA" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_GA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->GA->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->GA->EditValue ?>"<?php echo $ivf_outcome_grid->GA->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_GA">
<span<?php echo $ivf_outcome_grid->GA->viewAttributes() ?>><?php echo $ivf_outcome_grid->GA->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_GA" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_GA" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_GA" value="<?php echo HtmlEncode($ivf_outcome_grid->GA->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_GA" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_GA" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_GA" value="<?php echo HtmlEncode($ivf_outcome_grid->GA->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_GA" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_GA" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_GA" value="<?php echo HtmlEncode($ivf_outcome_grid->GA->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_GA" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_GA" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_GA" value="<?php echo HtmlEncode($ivf_outcome_grid->GA->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->FoetalDeath->Visible) { // FoetalDeath ?>
		<td data-name="FoetalDeath" <?php echo $ivf_outcome_grid->FoetalDeath->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_FoetalDeath" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_outcome" data-field="x_FoetalDeath" data-value-separator="<?php echo $ivf_outcome_grid->FoetalDeath->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath"<?php echo $ivf_outcome_grid->FoetalDeath->editAttributes() ?>>
			<?php echo $ivf_outcome_grid->FoetalDeath->selectOptionListHtml("x{$ivf_outcome_grid->RowIndex}_FoetalDeath") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_FoetalDeath" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath" value="<?php echo HtmlEncode($ivf_outcome_grid->FoetalDeath->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_FoetalDeath" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_outcome" data-field="x_FoetalDeath" data-value-separator="<?php echo $ivf_outcome_grid->FoetalDeath->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath"<?php echo $ivf_outcome_grid->FoetalDeath->editAttributes() ?>>
			<?php echo $ivf_outcome_grid->FoetalDeath->selectOptionListHtml("x{$ivf_outcome_grid->RowIndex}_FoetalDeath") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_FoetalDeath">
<span<?php echo $ivf_outcome_grid->FoetalDeath->viewAttributes() ?>><?php echo $ivf_outcome_grid->FoetalDeath->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_FoetalDeath" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath" value="<?php echo HtmlEncode($ivf_outcome_grid->FoetalDeath->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_FoetalDeath" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath" value="<?php echo HtmlEncode($ivf_outcome_grid->FoetalDeath->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_FoetalDeath" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath" value="<?php echo HtmlEncode($ivf_outcome_grid->FoetalDeath->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_FoetalDeath" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath" value="<?php echo HtmlEncode($ivf_outcome_grid->FoetalDeath->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->FerinatalDeath->Visible) { // FerinatalDeath ?>
		<td data-name="FerinatalDeath" <?php echo $ivf_outcome_grid->FerinatalDeath->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_FerinatalDeath" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_outcome" data-field="x_FerinatalDeath" data-value-separator="<?php echo $ivf_outcome_grid->FerinatalDeath->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath"<?php echo $ivf_outcome_grid->FerinatalDeath->editAttributes() ?>>
			<?php echo $ivf_outcome_grid->FerinatalDeath->selectOptionListHtml("x{$ivf_outcome_grid->RowIndex}_FerinatalDeath") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_FerinatalDeath" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath" value="<?php echo HtmlEncode($ivf_outcome_grid->FerinatalDeath->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_FerinatalDeath" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_outcome" data-field="x_FerinatalDeath" data-value-separator="<?php echo $ivf_outcome_grid->FerinatalDeath->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath"<?php echo $ivf_outcome_grid->FerinatalDeath->editAttributes() ?>>
			<?php echo $ivf_outcome_grid->FerinatalDeath->selectOptionListHtml("x{$ivf_outcome_grid->RowIndex}_FerinatalDeath") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_FerinatalDeath">
<span<?php echo $ivf_outcome_grid->FerinatalDeath->viewAttributes() ?>><?php echo $ivf_outcome_grid->FerinatalDeath->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_FerinatalDeath" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath" value="<?php echo HtmlEncode($ivf_outcome_grid->FerinatalDeath->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_FerinatalDeath" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath" value="<?php echo HtmlEncode($ivf_outcome_grid->FerinatalDeath->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_FerinatalDeath" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath" value="<?php echo HtmlEncode($ivf_outcome_grid->FerinatalDeath->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_FerinatalDeath" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath" value="<?php echo HtmlEncode($ivf_outcome_grid->FerinatalDeath->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo" <?php echo $ivf_outcome_grid->TidNo->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_outcome_grid->TidNo->getSessionValue() != "") { ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_TidNo" class="form-group">
<span<?php echo $ivf_outcome_grid->TidNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->TidNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_outcome_grid->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_TidNo" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_TidNo" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->TidNo->EditValue ?>"<?php echo $ivf_outcome_grid->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_TidNo" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_outcome_grid->TidNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($ivf_outcome_grid->TidNo->getSessionValue() != "") { ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_TidNo" class="form-group">
<span<?php echo $ivf_outcome_grid->TidNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->TidNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_outcome_grid->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_TidNo" class="form-group">
<input type="text" data-table="ivf_outcome" data-field="x_TidNo" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->TidNo->EditValue ?>"<?php echo $ivf_outcome_grid->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_TidNo">
<span<?php echo $ivf_outcome_grid->TidNo->viewAttributes() ?>><?php echo $ivf_outcome_grid->TidNo->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_TidNo" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_outcome_grid->TidNo->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_TidNo" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_outcome_grid->TidNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_TidNo" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_outcome_grid->TidNo->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_TidNo" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_outcome_grid->TidNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->Ectopic->Visible) { // Ectopic ?>
		<td data-name="Ectopic" <?php echo $ivf_outcome_grid->Ectopic->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_Ectopic" class="form-group">
<div id="tp_x<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Ectopic" data-value-separator="<?php echo $ivf_outcome_grid->Ectopic->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" value="{value}"<?php echo $ivf_outcome_grid->Ectopic->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome_grid->Ectopic->radioButtonListHtml(FALSE, "x{$ivf_outcome_grid->RowIndex}_Ectopic") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Ectopic" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" value="<?php echo HtmlEncode($ivf_outcome_grid->Ectopic->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_Ectopic" class="form-group">
<div id="tp_x<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Ectopic" data-value-separator="<?php echo $ivf_outcome_grid->Ectopic->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" value="{value}"<?php echo $ivf_outcome_grid->Ectopic->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome_grid->Ectopic->radioButtonListHtml(FALSE, "x{$ivf_outcome_grid->RowIndex}_Ectopic") ?>
</div></div>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_Ectopic">
<span<?php echo $ivf_outcome_grid->Ectopic->viewAttributes() ?>><?php echo $ivf_outcome_grid->Ectopic->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Ectopic" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" value="<?php echo HtmlEncode($ivf_outcome_grid->Ectopic->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Ectopic" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" value="<?php echo HtmlEncode($ivf_outcome_grid->Ectopic->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Ectopic" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" value="<?php echo HtmlEncode($ivf_outcome_grid->Ectopic->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Ectopic" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" value="<?php echo HtmlEncode($ivf_outcome_grid->Ectopic->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->Extra->Visible) { // Extra ?>
		<td data-name="Extra" <?php echo $ivf_outcome_grid->Extra->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_Extra" class="form-group">
<div id="tp_x<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Extra" data-value-separator="<?php echo $ivf_outcome_grid->Extra->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" value="{value}"<?php echo $ivf_outcome_grid->Extra->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome_grid->Extra->radioButtonListHtml(FALSE, "x{$ivf_outcome_grid->RowIndex}_Extra") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Extra" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" value="<?php echo HtmlEncode($ivf_outcome_grid->Extra->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_Extra" class="form-group">
<div id="tp_x<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Extra" data-value-separator="<?php echo $ivf_outcome_grid->Extra->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" value="{value}"<?php echo $ivf_outcome_grid->Extra->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome_grid->Extra->radioButtonListHtml(FALSE, "x{$ivf_outcome_grid->RowIndex}_Extra") ?>
</div></div>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCount ?>_ivf_outcome_Extra">
<span<?php echo $ivf_outcome_grid->Extra->viewAttributes() ?>><?php echo $ivf_outcome_grid->Extra->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Extra" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" value="<?php echo HtmlEncode($ivf_outcome_grid->Extra->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Extra" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" value="<?php echo HtmlEncode($ivf_outcome_grid->Extra->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Extra" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" value="<?php echo HtmlEncode($ivf_outcome_grid->Extra->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Extra" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" value="<?php echo HtmlEncode($ivf_outcome_grid->Extra->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_outcome_grid->ListOptions->render("body", "right", $ivf_outcome_grid->RowCount);
?>
	</tr>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD || $ivf_outcome->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fivf_outcomegrid", "load"], function() {
	fivf_outcomegrid.updateLists(<?php echo $ivf_outcome_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$ivf_outcome_grid->isGridAdd() || $ivf_outcome->CurrentMode == "copy")
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
		$ivf_outcome->RowAttrs->merge(["data-rowindex" => $ivf_outcome_grid->RowIndex, "id" => "r0_ivf_outcome", "data-rowtype" => ROWTYPE_ADD]);
		$ivf_outcome->RowAttrs->appendClass("ew-template");
		$ivf_outcome->RowType = ROWTYPE_ADD;

		// Render row
		$ivf_outcome_grid->renderRow();

		// Render list options
		$ivf_outcome_grid->renderListOptions();
		$ivf_outcome_grid->StartRowCount = 0;
?>
	<tr <?php echo $ivf_outcome->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_outcome_grid->ListOptions->render("body", "left", $ivf_outcome_grid->RowIndex);
?>
	<?php if ($ivf_outcome_grid->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_id" class="form-group ivf_outcome_id"></span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_id" class="form-group ivf_outcome_id">
<span<?php echo $ivf_outcome_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_id" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_id" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_outcome_grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_id" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_id" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_outcome_grid->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<?php if ($ivf_outcome_grid->RIDNO->getSessionValue() != "") { ?>
<span id="el$rowindex$_ivf_outcome_RIDNO" class="form-group ivf_outcome_RIDNO">
<span<?php echo $ivf_outcome_grid->RIDNO->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->RIDNO->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_outcome_grid->RIDNO->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_RIDNO" class="form-group ivf_outcome_RIDNO">
<input type="text" data-table="ivf_outcome" data-field="x_RIDNO" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->RIDNO->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->RIDNO->EditValue ?>"<?php echo $ivf_outcome_grid->RIDNO->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_RIDNO" class="form-group ivf_outcome_RIDNO">
<span<?php echo $ivf_outcome_grid->RIDNO->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->RIDNO->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_RIDNO" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_outcome_grid->RIDNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_RIDNO" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_outcome_grid->RIDNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->Name->Visible) { // Name ?>
		<td data-name="Name">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<?php if ($ivf_outcome_grid->Name->getSessionValue() != "") { ?>
<span id="el$rowindex$_ivf_outcome_Name" class="form-group ivf_outcome_Name">
<span<?php echo $ivf_outcome_grid->Name->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->Name->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Name" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_outcome_grid->Name->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_Name" class="form-group ivf_outcome_Name">
<input type="text" data-table="ivf_outcome" data-field="x_Name" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Name" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->Name->EditValue ?>"<?php echo $ivf_outcome_grid->Name->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_Name" class="form-group ivf_outcome_Name">
<span<?php echo $ivf_outcome_grid->Name->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->Name->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Name" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Name" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_outcome_grid->Name->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Name" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Name" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_outcome_grid->Name->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->Age->Visible) { // Age ?>
		<td data-name="Age">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_Age" class="form-group ivf_outcome_Age">
<input type="text" data-table="ivf_outcome" data-field="x_Age" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Age" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->Age->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->Age->EditValue ?>"<?php echo $ivf_outcome_grid->Age->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_Age" class="form-group ivf_outcome_Age">
<span<?php echo $ivf_outcome_grid->Age->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->Age->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Age" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Age" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($ivf_outcome_grid->Age->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Age" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Age" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($ivf_outcome_grid->Age->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->treatment_status->Visible) { // treatment_status ?>
		<td data-name="treatment_status">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_treatment_status" class="form-group ivf_outcome_treatment_status">
<input type="text" data-table="ivf_outcome" data-field="x_treatment_status" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->treatment_status->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->treatment_status->EditValue ?>"<?php echo $ivf_outcome_grid->treatment_status->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_treatment_status" class="form-group ivf_outcome_treatment_status">
<span<?php echo $ivf_outcome_grid->treatment_status->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->treatment_status->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_treatment_status" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" value="<?php echo HtmlEncode($ivf_outcome_grid->treatment_status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_treatment_status" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" value="<?php echo HtmlEncode($ivf_outcome_grid->treatment_status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<td data-name="ARTCYCLE">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_ARTCYCLE" class="form-group ivf_outcome_ARTCYCLE">
<input type="text" data-table="ivf_outcome" data-field="x_ARTCYCLE" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->ARTCYCLE->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->ARTCYCLE->EditValue ?>"<?php echo $ivf_outcome_grid->ARTCYCLE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_ARTCYCLE" class="form-group ivf_outcome_ARTCYCLE">
<span<?php echo $ivf_outcome_grid->ARTCYCLE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->ARTCYCLE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_ARTCYCLE" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" value="<?php echo HtmlEncode($ivf_outcome_grid->ARTCYCLE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_ARTCYCLE" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" value="<?php echo HtmlEncode($ivf_outcome_grid->ARTCYCLE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->RESULT->Visible) { // RESULT ?>
		<td data-name="RESULT">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_RESULT" class="form-group ivf_outcome_RESULT">
<input type="text" data-table="ivf_outcome" data-field="x_RESULT" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->RESULT->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->RESULT->EditValue ?>"<?php echo $ivf_outcome_grid->RESULT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_RESULT" class="form-group ivf_outcome_RESULT">
<span<?php echo $ivf_outcome_grid->RESULT->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->RESULT->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_RESULT" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" value="<?php echo HtmlEncode($ivf_outcome_grid->RESULT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_RESULT" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" value="<?php echo HtmlEncode($ivf_outcome_grid->RESULT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->status->Visible) { // status ?>
		<td data-name="status">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_status" class="form-group ivf_outcome_status">
<input type="text" data-table="ivf_outcome" data-field="x_status" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_status" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->status->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->status->EditValue ?>"<?php echo $ivf_outcome_grid->status->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_status" class="form-group ivf_outcome_status">
<span<?php echo $ivf_outcome_grid->status->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->status->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_status" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_status" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($ivf_outcome_grid->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_status" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_status" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($ivf_outcome_grid->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_createdby" class="form-group ivf_outcome_createdby">
<input type="text" data-table="ivf_outcome" data-field="x_createdby" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->createdby->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->createdby->EditValue ?>"<?php echo $ivf_outcome_grid->createdby->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_createdby" class="form-group ivf_outcome_createdby">
<span<?php echo $ivf_outcome_grid->createdby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->createdby->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_createdby" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($ivf_outcome_grid->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_createdby" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($ivf_outcome_grid->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_createddatetime" class="form-group ivf_outcome_createddatetime">
<input type="text" data-table="ivf_outcome" data-field="x_createddatetime" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->createddatetime->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->createddatetime->EditValue ?>"<?php echo $ivf_outcome_grid->createddatetime->editAttributes() ?>>
<?php if (!$ivf_outcome_grid->createddatetime->ReadOnly && !$ivf_outcome_grid->createddatetime->Disabled && !isset($ivf_outcome_grid->createddatetime->EditAttrs["readonly"]) && !isset($ivf_outcome_grid->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_outcomegrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_outcomegrid", "x<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_createddatetime" class="form-group ivf_outcome_createddatetime">
<span<?php echo $ivf_outcome_grid->createddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->createddatetime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_createddatetime" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($ivf_outcome_grid->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_createddatetime" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($ivf_outcome_grid->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_modifiedby" class="form-group ivf_outcome_modifiedby">
<input type="text" data-table="ivf_outcome" data-field="x_modifiedby" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->modifiedby->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->modifiedby->EditValue ?>"<?php echo $ivf_outcome_grid->modifiedby->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_modifiedby" class="form-group ivf_outcome_modifiedby">
<span<?php echo $ivf_outcome_grid->modifiedby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->modifiedby->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_modifiedby" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($ivf_outcome_grid->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_modifiedby" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($ivf_outcome_grid->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_modifieddatetime" class="form-group ivf_outcome_modifieddatetime">
<input type="text" data-table="ivf_outcome" data-field="x_modifieddatetime" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->modifieddatetime->EditValue ?>"<?php echo $ivf_outcome_grid->modifieddatetime->editAttributes() ?>>
<?php if (!$ivf_outcome_grid->modifieddatetime->ReadOnly && !$ivf_outcome_grid->modifieddatetime->Disabled && !isset($ivf_outcome_grid->modifieddatetime->EditAttrs["readonly"]) && !isset($ivf_outcome_grid->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_outcomegrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_outcomegrid", "x<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_modifieddatetime" class="form-group ivf_outcome_modifieddatetime">
<span<?php echo $ivf_outcome_grid->modifieddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->modifieddatetime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_modifieddatetime" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($ivf_outcome_grid->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_modifieddatetime" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($ivf_outcome_grid->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->outcomeDate->Visible) { // outcomeDate ?>
		<td data-name="outcomeDate">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_outcomeDate" class="form-group ivf_outcome_outcomeDate">
<input type="text" data-table="ivf_outcome" data-field="x_outcomeDate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->outcomeDate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->outcomeDate->EditValue ?>"<?php echo $ivf_outcome_grid->outcomeDate->editAttributes() ?>>
<?php if (!$ivf_outcome_grid->outcomeDate->ReadOnly && !$ivf_outcome_grid->outcomeDate->Disabled && !isset($ivf_outcome_grid->outcomeDate->EditAttrs["readonly"]) && !isset($ivf_outcome_grid->outcomeDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_outcomegrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_outcomegrid", "x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_outcomeDate" class="form-group ivf_outcome_outcomeDate">
<span<?php echo $ivf_outcome_grid->outcomeDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->outcomeDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" value="<?php echo HtmlEncode($ivf_outcome_grid->outcomeDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDate" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" value="<?php echo HtmlEncode($ivf_outcome_grid->outcomeDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->outcomeDay->Visible) { // outcomeDay ?>
		<td data-name="outcomeDay">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_outcomeDay" class="form-group ivf_outcome_outcomeDay">
<input type="text" data-table="ivf_outcome" data-field="x_outcomeDay" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->outcomeDay->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->outcomeDay->EditValue ?>"<?php echo $ivf_outcome_grid->outcomeDay->editAttributes() ?>>
<?php if (!$ivf_outcome_grid->outcomeDay->ReadOnly && !$ivf_outcome_grid->outcomeDay->Disabled && !isset($ivf_outcome_grid->outcomeDay->EditAttrs["readonly"]) && !isset($ivf_outcome_grid->outcomeDay->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_outcomegrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_outcomegrid", "x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_outcomeDay" class="form-group ivf_outcome_outcomeDay">
<span<?php echo $ivf_outcome_grid->outcomeDay->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->outcomeDay->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDay" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" value="<?php echo HtmlEncode($ivf_outcome_grid->outcomeDay->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDay" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" value="<?php echo HtmlEncode($ivf_outcome_grid->outcomeDay->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->OPResult->Visible) { // OPResult ?>
		<td data-name="OPResult">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_OPResult" class="form-group ivf_outcome_OPResult">
<input type="text" data-table="ivf_outcome" data-field="x_OPResult" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->OPResult->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->OPResult->EditValue ?>"<?php echo $ivf_outcome_grid->OPResult->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_OPResult" class="form-group ivf_outcome_OPResult">
<span<?php echo $ivf_outcome_grid->OPResult->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->OPResult->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_OPResult" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" value="<?php echo HtmlEncode($ivf_outcome_grid->OPResult->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_OPResult" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" value="<?php echo HtmlEncode($ivf_outcome_grid->OPResult->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->Gestation->Visible) { // Gestation ?>
		<td data-name="Gestation">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_Gestation" class="form-group ivf_outcome_Gestation">
<div id="tp_x<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Gestation" data-value-separator="<?php echo $ivf_outcome_grid->Gestation->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" value="{value}"<?php echo $ivf_outcome_grid->Gestation->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome_grid->Gestation->radioButtonListHtml(FALSE, "x{$ivf_outcome_grid->RowIndex}_Gestation") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_Gestation" class="form-group ivf_outcome_Gestation">
<span<?php echo $ivf_outcome_grid->Gestation->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->Gestation->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Gestation" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" value="<?php echo HtmlEncode($ivf_outcome_grid->Gestation->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Gestation" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" value="<?php echo HtmlEncode($ivf_outcome_grid->Gestation->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->TransferdEmbryos->Visible) { // TransferdEmbryos ?>
		<td data-name="TransferdEmbryos">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_TransferdEmbryos" class="form-group ivf_outcome_TransferdEmbryos">
<input type="text" data-table="ivf_outcome" data-field="x_TransferdEmbryos" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->TransferdEmbryos->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->TransferdEmbryos->EditValue ?>"<?php echo $ivf_outcome_grid->TransferdEmbryos->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_TransferdEmbryos" class="form-group ivf_outcome_TransferdEmbryos">
<span<?php echo $ivf_outcome_grid->TransferdEmbryos->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->TransferdEmbryos->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_TransferdEmbryos" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" value="<?php echo HtmlEncode($ivf_outcome_grid->TransferdEmbryos->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_TransferdEmbryos" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" value="<?php echo HtmlEncode($ivf_outcome_grid->TransferdEmbryos->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->InitalOfSacs->Visible) { // InitalOfSacs ?>
		<td data-name="InitalOfSacs">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_InitalOfSacs" class="form-group ivf_outcome_InitalOfSacs">
<input type="text" data-table="ivf_outcome" data-field="x_InitalOfSacs" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->InitalOfSacs->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->InitalOfSacs->EditValue ?>"<?php echo $ivf_outcome_grid->InitalOfSacs->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_InitalOfSacs" class="form-group ivf_outcome_InitalOfSacs">
<span<?php echo $ivf_outcome_grid->InitalOfSacs->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->InitalOfSacs->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_InitalOfSacs" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" value="<?php echo HtmlEncode($ivf_outcome_grid->InitalOfSacs->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_InitalOfSacs" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" value="<?php echo HtmlEncode($ivf_outcome_grid->InitalOfSacs->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->ImplimentationRate->Visible) { // ImplimentationRate ?>
		<td data-name="ImplimentationRate">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_ImplimentationRate" class="form-group ivf_outcome_ImplimentationRate">
<input type="text" data-table="ivf_outcome" data-field="x_ImplimentationRate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->ImplimentationRate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->ImplimentationRate->EditValue ?>"<?php echo $ivf_outcome_grid->ImplimentationRate->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_ImplimentationRate" class="form-group ivf_outcome_ImplimentationRate">
<span<?php echo $ivf_outcome_grid->ImplimentationRate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->ImplimentationRate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_ImplimentationRate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" value="<?php echo HtmlEncode($ivf_outcome_grid->ImplimentationRate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_ImplimentationRate" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" value="<?php echo HtmlEncode($ivf_outcome_grid->ImplimentationRate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->EmbryoNo->Visible) { // EmbryoNo ?>
		<td data-name="EmbryoNo">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_EmbryoNo" class="form-group ivf_outcome_EmbryoNo">
<input type="text" data-table="ivf_outcome" data-field="x_EmbryoNo" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->EmbryoNo->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->EmbryoNo->EditValue ?>"<?php echo $ivf_outcome_grid->EmbryoNo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_EmbryoNo" class="form-group ivf_outcome_EmbryoNo">
<span<?php echo $ivf_outcome_grid->EmbryoNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->EmbryoNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_EmbryoNo" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" value="<?php echo HtmlEncode($ivf_outcome_grid->EmbryoNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_EmbryoNo" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" value="<?php echo HtmlEncode($ivf_outcome_grid->EmbryoNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->ExtrauterineSac->Visible) { // ExtrauterineSac ?>
		<td data-name="ExtrauterineSac">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_ExtrauterineSac" class="form-group ivf_outcome_ExtrauterineSac">
<input type="text" data-table="ivf_outcome" data-field="x_ExtrauterineSac" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->ExtrauterineSac->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->ExtrauterineSac->EditValue ?>"<?php echo $ivf_outcome_grid->ExtrauterineSac->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_ExtrauterineSac" class="form-group ivf_outcome_ExtrauterineSac">
<span<?php echo $ivf_outcome_grid->ExtrauterineSac->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->ExtrauterineSac->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_ExtrauterineSac" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" value="<?php echo HtmlEncode($ivf_outcome_grid->ExtrauterineSac->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_ExtrauterineSac" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" value="<?php echo HtmlEncode($ivf_outcome_grid->ExtrauterineSac->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->PregnancyMonozygotic->Visible) { // PregnancyMonozygotic ?>
		<td data-name="PregnancyMonozygotic">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_PregnancyMonozygotic" class="form-group ivf_outcome_PregnancyMonozygotic">
<input type="text" data-table="ivf_outcome" data-field="x_PregnancyMonozygotic" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->PregnancyMonozygotic->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->PregnancyMonozygotic->EditValue ?>"<?php echo $ivf_outcome_grid->PregnancyMonozygotic->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_PregnancyMonozygotic" class="form-group ivf_outcome_PregnancyMonozygotic">
<span<?php echo $ivf_outcome_grid->PregnancyMonozygotic->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->PregnancyMonozygotic->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_PregnancyMonozygotic" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" value="<?php echo HtmlEncode($ivf_outcome_grid->PregnancyMonozygotic->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_PregnancyMonozygotic" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" value="<?php echo HtmlEncode($ivf_outcome_grid->PregnancyMonozygotic->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->TypeGestation->Visible) { // TypeGestation ?>
		<td data-name="TypeGestation">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_TypeGestation" class="form-group ivf_outcome_TypeGestation">
<input type="text" data-table="ivf_outcome" data-field="x_TypeGestation" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->TypeGestation->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->TypeGestation->EditValue ?>"<?php echo $ivf_outcome_grid->TypeGestation->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_TypeGestation" class="form-group ivf_outcome_TypeGestation">
<span<?php echo $ivf_outcome_grid->TypeGestation->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->TypeGestation->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_TypeGestation" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" value="<?php echo HtmlEncode($ivf_outcome_grid->TypeGestation->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_TypeGestation" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" value="<?php echo HtmlEncode($ivf_outcome_grid->TypeGestation->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->Urine->Visible) { // Urine ?>
		<td data-name="Urine">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_Urine" class="form-group ivf_outcome_Urine">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_outcome" data-field="x_Urine" data-value-separator="<?php echo $ivf_outcome_grid->Urine->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Urine" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Urine"<?php echo $ivf_outcome_grid->Urine->editAttributes() ?>>
			<?php echo $ivf_outcome_grid->Urine->selectOptionListHtml("x{$ivf_outcome_grid->RowIndex}_Urine") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_Urine" class="form-group ivf_outcome_Urine">
<span<?php echo $ivf_outcome_grid->Urine->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->Urine->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Urine" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Urine" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Urine" value="<?php echo HtmlEncode($ivf_outcome_grid->Urine->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Urine" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Urine" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Urine" value="<?php echo HtmlEncode($ivf_outcome_grid->Urine->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->PTdate->Visible) { // PTdate ?>
		<td data-name="PTdate">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_PTdate" class="form-group ivf_outcome_PTdate">
<input type="text" data-table="ivf_outcome" data-field="x_PTdate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->PTdate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->PTdate->EditValue ?>"<?php echo $ivf_outcome_grid->PTdate->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_PTdate" class="form-group ivf_outcome_PTdate">
<span<?php echo $ivf_outcome_grid->PTdate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->PTdate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_PTdate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" value="<?php echo HtmlEncode($ivf_outcome_grid->PTdate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_PTdate" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" value="<?php echo HtmlEncode($ivf_outcome_grid->PTdate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->Reduced->Visible) { // Reduced ?>
		<td data-name="Reduced">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_Reduced" class="form-group ivf_outcome_Reduced">
<input type="text" data-table="ivf_outcome" data-field="x_Reduced" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->Reduced->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->Reduced->EditValue ?>"<?php echo $ivf_outcome_grid->Reduced->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_Reduced" class="form-group ivf_outcome_Reduced">
<span<?php echo $ivf_outcome_grid->Reduced->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->Reduced->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Reduced" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" value="<?php echo HtmlEncode($ivf_outcome_grid->Reduced->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Reduced" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" value="<?php echo HtmlEncode($ivf_outcome_grid->Reduced->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->INduced->Visible) { // INduced ?>
		<td data-name="INduced">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_INduced" class="form-group ivf_outcome_INduced">
<input type="text" data-table="ivf_outcome" data-field="x_INduced" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->INduced->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->INduced->EditValue ?>"<?php echo $ivf_outcome_grid->INduced->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_INduced" class="form-group ivf_outcome_INduced">
<span<?php echo $ivf_outcome_grid->INduced->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->INduced->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_INduced" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" value="<?php echo HtmlEncode($ivf_outcome_grid->INduced->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_INduced" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" value="<?php echo HtmlEncode($ivf_outcome_grid->INduced->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->INducedDate->Visible) { // INducedDate ?>
		<td data-name="INducedDate">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_INducedDate" class="form-group ivf_outcome_INducedDate">
<input type="text" data-table="ivf_outcome" data-field="x_INducedDate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->INducedDate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->INducedDate->EditValue ?>"<?php echo $ivf_outcome_grid->INducedDate->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_INducedDate" class="form-group ivf_outcome_INducedDate">
<span<?php echo $ivf_outcome_grid->INducedDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->INducedDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_INducedDate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" value="<?php echo HtmlEncode($ivf_outcome_grid->INducedDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_INducedDate" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" value="<?php echo HtmlEncode($ivf_outcome_grid->INducedDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->Miscarriage->Visible) { // Miscarriage ?>
		<td data-name="Miscarriage">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_Miscarriage" class="form-group ivf_outcome_Miscarriage">
<div id="tp_x<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Miscarriage" data-value-separator="<?php echo $ivf_outcome_grid->Miscarriage->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" value="{value}"<?php echo $ivf_outcome_grid->Miscarriage->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome_grid->Miscarriage->radioButtonListHtml(FALSE, "x{$ivf_outcome_grid->RowIndex}_Miscarriage") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_Miscarriage" class="form-group ivf_outcome_Miscarriage">
<span<?php echo $ivf_outcome_grid->Miscarriage->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->Miscarriage->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Miscarriage" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" value="<?php echo HtmlEncode($ivf_outcome_grid->Miscarriage->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Miscarriage" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" value="<?php echo HtmlEncode($ivf_outcome_grid->Miscarriage->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->Induced1->Visible) { // Induced1 ?>
		<td data-name="Induced1">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_Induced1" class="form-group ivf_outcome_Induced1">
<div id="tp_x<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Induced1" data-value-separator="<?php echo $ivf_outcome_grid->Induced1->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" value="{value}"<?php echo $ivf_outcome_grid->Induced1->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome_grid->Induced1->radioButtonListHtml(FALSE, "x{$ivf_outcome_grid->RowIndex}_Induced1") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_Induced1" class="form-group ivf_outcome_Induced1">
<span<?php echo $ivf_outcome_grid->Induced1->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->Induced1->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Induced1" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" value="<?php echo HtmlEncode($ivf_outcome_grid->Induced1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Induced1" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" value="<?php echo HtmlEncode($ivf_outcome_grid->Induced1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->Type->Visible) { // Type ?>
		<td data-name="Type">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_Type" class="form-group ivf_outcome_Type">
<div id="tp_x<?php echo $ivf_outcome_grid->RowIndex ?>_Type" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Type" data-value-separator="<?php echo $ivf_outcome_grid->Type->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Type" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Type" value="{value}"<?php echo $ivf_outcome_grid->Type->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_outcome_grid->RowIndex ?>_Type" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome_grid->Type->radioButtonListHtml(FALSE, "x{$ivf_outcome_grid->RowIndex}_Type") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_Type" class="form-group ivf_outcome_Type">
<span<?php echo $ivf_outcome_grid->Type->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->Type->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Type" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Type" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Type" value="<?php echo HtmlEncode($ivf_outcome_grid->Type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Type" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Type" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Type" value="<?php echo HtmlEncode($ivf_outcome_grid->Type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->IfClinical->Visible) { // IfClinical ?>
		<td data-name="IfClinical">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_IfClinical" class="form-group ivf_outcome_IfClinical">
<input type="text" data-table="ivf_outcome" data-field="x_IfClinical" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->IfClinical->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->IfClinical->EditValue ?>"<?php echo $ivf_outcome_grid->IfClinical->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_IfClinical" class="form-group ivf_outcome_IfClinical">
<span<?php echo $ivf_outcome_grid->IfClinical->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->IfClinical->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_IfClinical" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" value="<?php echo HtmlEncode($ivf_outcome_grid->IfClinical->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_IfClinical" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" value="<?php echo HtmlEncode($ivf_outcome_grid->IfClinical->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->GADate->Visible) { // GADate ?>
		<td data-name="GADate">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_GADate" class="form-group ivf_outcome_GADate">
<input type="text" data-table="ivf_outcome" data-field="x_GADate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->GADate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->GADate->EditValue ?>"<?php echo $ivf_outcome_grid->GADate->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_GADate" class="form-group ivf_outcome_GADate">
<span<?php echo $ivf_outcome_grid->GADate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->GADate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_GADate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" value="<?php echo HtmlEncode($ivf_outcome_grid->GADate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_GADate" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" value="<?php echo HtmlEncode($ivf_outcome_grid->GADate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->GA->Visible) { // GA ?>
		<td data-name="GA">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_GA" class="form-group ivf_outcome_GA">
<input type="text" data-table="ivf_outcome" data-field="x_GA" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_GA" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_GA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->GA->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->GA->EditValue ?>"<?php echo $ivf_outcome_grid->GA->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_GA" class="form-group ivf_outcome_GA">
<span<?php echo $ivf_outcome_grid->GA->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->GA->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_GA" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_GA" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_GA" value="<?php echo HtmlEncode($ivf_outcome_grid->GA->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_GA" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_GA" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_GA" value="<?php echo HtmlEncode($ivf_outcome_grid->GA->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->FoetalDeath->Visible) { // FoetalDeath ?>
		<td data-name="FoetalDeath">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_FoetalDeath" class="form-group ivf_outcome_FoetalDeath">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_outcome" data-field="x_FoetalDeath" data-value-separator="<?php echo $ivf_outcome_grid->FoetalDeath->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath"<?php echo $ivf_outcome_grid->FoetalDeath->editAttributes() ?>>
			<?php echo $ivf_outcome_grid->FoetalDeath->selectOptionListHtml("x{$ivf_outcome_grid->RowIndex}_FoetalDeath") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_FoetalDeath" class="form-group ivf_outcome_FoetalDeath">
<span<?php echo $ivf_outcome_grid->FoetalDeath->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->FoetalDeath->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_FoetalDeath" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath" value="<?php echo HtmlEncode($ivf_outcome_grid->FoetalDeath->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_FoetalDeath" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath" value="<?php echo HtmlEncode($ivf_outcome_grid->FoetalDeath->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->FerinatalDeath->Visible) { // FerinatalDeath ?>
		<td data-name="FerinatalDeath">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_FerinatalDeath" class="form-group ivf_outcome_FerinatalDeath">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_outcome" data-field="x_FerinatalDeath" data-value-separator="<?php echo $ivf_outcome_grid->FerinatalDeath->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath"<?php echo $ivf_outcome_grid->FerinatalDeath->editAttributes() ?>>
			<?php echo $ivf_outcome_grid->FerinatalDeath->selectOptionListHtml("x{$ivf_outcome_grid->RowIndex}_FerinatalDeath") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_FerinatalDeath" class="form-group ivf_outcome_FerinatalDeath">
<span<?php echo $ivf_outcome_grid->FerinatalDeath->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->FerinatalDeath->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_FerinatalDeath" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath" value="<?php echo HtmlEncode($ivf_outcome_grid->FerinatalDeath->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_FerinatalDeath" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath" value="<?php echo HtmlEncode($ivf_outcome_grid->FerinatalDeath->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<?php if ($ivf_outcome_grid->TidNo->getSessionValue() != "") { ?>
<span id="el$rowindex$_ivf_outcome_TidNo" class="form-group ivf_outcome_TidNo">
<span<?php echo $ivf_outcome_grid->TidNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->TidNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_outcome_grid->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_TidNo" class="form-group ivf_outcome_TidNo">
<input type="text" data-table="ivf_outcome" data-field="x_TidNo" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome_grid->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_grid->TidNo->EditValue ?>"<?php echo $ivf_outcome_grid->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_TidNo" class="form-group ivf_outcome_TidNo">
<span<?php echo $ivf_outcome_grid->TidNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->TidNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_TidNo" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_outcome_grid->TidNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_TidNo" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_outcome_grid->TidNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->Ectopic->Visible) { // Ectopic ?>
		<td data-name="Ectopic">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_Ectopic" class="form-group ivf_outcome_Ectopic">
<div id="tp_x<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Ectopic" data-value-separator="<?php echo $ivf_outcome_grid->Ectopic->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" value="{value}"<?php echo $ivf_outcome_grid->Ectopic->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome_grid->Ectopic->radioButtonListHtml(FALSE, "x{$ivf_outcome_grid->RowIndex}_Ectopic") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_Ectopic" class="form-group ivf_outcome_Ectopic">
<span<?php echo $ivf_outcome_grid->Ectopic->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->Ectopic->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Ectopic" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" value="<?php echo HtmlEncode($ivf_outcome_grid->Ectopic->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Ectopic" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" value="<?php echo HtmlEncode($ivf_outcome_grid->Ectopic->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome_grid->Extra->Visible) { // Extra ?>
		<td data-name="Extra">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_Extra" class="form-group ivf_outcome_Extra">
<div id="tp_x<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Extra" data-value-separator="<?php echo $ivf_outcome_grid->Extra->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" value="{value}"<?php echo $ivf_outcome_grid->Extra->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome_grid->Extra->radioButtonListHtml(FALSE, "x{$ivf_outcome_grid->RowIndex}_Extra") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_Extra" class="form-group ivf_outcome_Extra">
<span<?php echo $ivf_outcome_grid->Extra->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_grid->Extra->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Extra" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" value="<?php echo HtmlEncode($ivf_outcome_grid->Extra->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Extra" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" value="<?php echo HtmlEncode($ivf_outcome_grid->Extra->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_outcome_grid->ListOptions->render("body", "right", $ivf_outcome_grid->RowIndex);
?>
<script>
loadjs.ready(["fivf_outcomegrid", "load"], function() {
	fivf_outcomegrid.updateLists(<?php echo $ivf_outcome_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
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
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_outcome_grid->Recordset)
	$ivf_outcome_grid->Recordset->Close();
?>
<?php if ($ivf_outcome_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $ivf_outcome_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_outcome_grid->TotalRecords == 0 && !$ivf_outcome->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_outcome_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$ivf_outcome_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$ivf_outcome->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_ivf_outcome",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php
$ivf_outcome_grid->terminate();
?>