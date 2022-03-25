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
<?php include_once "header.php"; ?>
<script>
var fivf_outcomeedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fivf_outcomeedit = currentForm = new ew.Form("fivf_outcomeedit", "edit");

	// Validate form
	fivf_outcomeedit.validate = function() {
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
			<?php if ($ivf_outcome_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->id->caption(), $ivf_outcome_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_edit->RIDNO->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->RIDNO->caption(), $ivf_outcome_edit->RIDNO->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RIDNO");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_outcome_edit->RIDNO->errorMessage()) ?>");
			<?php if ($ivf_outcome_edit->Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->Name->caption(), $ivf_outcome_edit->Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_edit->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->Age->caption(), $ivf_outcome_edit->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_edit->treatment_status->Required) { ?>
				elm = this.getElements("x" + infix + "_treatment_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->treatment_status->caption(), $ivf_outcome_edit->treatment_status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_edit->ARTCYCLE->Required) { ?>
				elm = this.getElements("x" + infix + "_ARTCYCLE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->ARTCYCLE->caption(), $ivf_outcome_edit->ARTCYCLE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_edit->RESULT->Required) { ?>
				elm = this.getElements("x" + infix + "_RESULT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->RESULT->caption(), $ivf_outcome_edit->RESULT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_edit->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->status->caption(), $ivf_outcome_edit->status->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_outcome_edit->status->errorMessage()) ?>");
			<?php if ($ivf_outcome_edit->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->createdby->caption(), $ivf_outcome_edit->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_outcome_edit->createdby->errorMessage()) ?>");
			<?php if ($ivf_outcome_edit->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->createddatetime->caption(), $ivf_outcome_edit->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_outcome_edit->createddatetime->errorMessage()) ?>");
			<?php if ($ivf_outcome_edit->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->modifiedby->caption(), $ivf_outcome_edit->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_outcome_edit->modifiedby->errorMessage()) ?>");
			<?php if ($ivf_outcome_edit->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->modifieddatetime->caption(), $ivf_outcome_edit->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_outcome_edit->modifieddatetime->errorMessage()) ?>");
			<?php if ($ivf_outcome_edit->outcomeDate->Required) { ?>
				elm = this.getElements("x" + infix + "_outcomeDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->outcomeDate->caption(), $ivf_outcome_edit->outcomeDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_outcomeDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_outcome_edit->outcomeDate->errorMessage()) ?>");
			<?php if ($ivf_outcome_edit->outcomeDay->Required) { ?>
				elm = this.getElements("x" + infix + "_outcomeDay");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->outcomeDay->caption(), $ivf_outcome_edit->outcomeDay->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_outcomeDay");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_outcome_edit->outcomeDay->errorMessage()) ?>");
			<?php if ($ivf_outcome_edit->OPResult->Required) { ?>
				elm = this.getElements("x" + infix + "_OPResult");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->OPResult->caption(), $ivf_outcome_edit->OPResult->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_edit->Gestation->Required) { ?>
				elm = this.getElements("x" + infix + "_Gestation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->Gestation->caption(), $ivf_outcome_edit->Gestation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_edit->TransferdEmbryos->Required) { ?>
				elm = this.getElements("x" + infix + "_TransferdEmbryos");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->TransferdEmbryos->caption(), $ivf_outcome_edit->TransferdEmbryos->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_edit->InitalOfSacs->Required) { ?>
				elm = this.getElements("x" + infix + "_InitalOfSacs");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->InitalOfSacs->caption(), $ivf_outcome_edit->InitalOfSacs->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_edit->ImplimentationRate->Required) { ?>
				elm = this.getElements("x" + infix + "_ImplimentationRate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->ImplimentationRate->caption(), $ivf_outcome_edit->ImplimentationRate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_edit->EmbryoNo->Required) { ?>
				elm = this.getElements("x" + infix + "_EmbryoNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->EmbryoNo->caption(), $ivf_outcome_edit->EmbryoNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_edit->ExtrauterineSac->Required) { ?>
				elm = this.getElements("x" + infix + "_ExtrauterineSac");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->ExtrauterineSac->caption(), $ivf_outcome_edit->ExtrauterineSac->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_edit->PregnancyMonozygotic->Required) { ?>
				elm = this.getElements("x" + infix + "_PregnancyMonozygotic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->PregnancyMonozygotic->caption(), $ivf_outcome_edit->PregnancyMonozygotic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_edit->TypeGestation->Required) { ?>
				elm = this.getElements("x" + infix + "_TypeGestation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->TypeGestation->caption(), $ivf_outcome_edit->TypeGestation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_edit->Urine->Required) { ?>
				elm = this.getElements("x" + infix + "_Urine");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->Urine->caption(), $ivf_outcome_edit->Urine->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_edit->PTdate->Required) { ?>
				elm = this.getElements("x" + infix + "_PTdate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->PTdate->caption(), $ivf_outcome_edit->PTdate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_edit->Reduced->Required) { ?>
				elm = this.getElements("x" + infix + "_Reduced");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->Reduced->caption(), $ivf_outcome_edit->Reduced->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_edit->INduced->Required) { ?>
				elm = this.getElements("x" + infix + "_INduced");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->INduced->caption(), $ivf_outcome_edit->INduced->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_edit->INducedDate->Required) { ?>
				elm = this.getElements("x" + infix + "_INducedDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->INducedDate->caption(), $ivf_outcome_edit->INducedDate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_edit->Miscarriage->Required) { ?>
				elm = this.getElements("x" + infix + "_Miscarriage");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->Miscarriage->caption(), $ivf_outcome_edit->Miscarriage->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_edit->Induced1->Required) { ?>
				elm = this.getElements("x" + infix + "_Induced1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->Induced1->caption(), $ivf_outcome_edit->Induced1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_edit->Type->Required) { ?>
				elm = this.getElements("x" + infix + "_Type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->Type->caption(), $ivf_outcome_edit->Type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_edit->IfClinical->Required) { ?>
				elm = this.getElements("x" + infix + "_IfClinical");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->IfClinical->caption(), $ivf_outcome_edit->IfClinical->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_edit->GADate->Required) { ?>
				elm = this.getElements("x" + infix + "_GADate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->GADate->caption(), $ivf_outcome_edit->GADate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_edit->GA->Required) { ?>
				elm = this.getElements("x" + infix + "_GA");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->GA->caption(), $ivf_outcome_edit->GA->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_edit->FoetalDeath->Required) { ?>
				elm = this.getElements("x" + infix + "_FoetalDeath");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->FoetalDeath->caption(), $ivf_outcome_edit->FoetalDeath->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_edit->FerinatalDeath->Required) { ?>
				elm = this.getElements("x" + infix + "_FerinatalDeath");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->FerinatalDeath->caption(), $ivf_outcome_edit->FerinatalDeath->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_edit->TidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->TidNo->caption(), $ivf_outcome_edit->TidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_outcome_edit->TidNo->errorMessage()) ?>");
			<?php if ($ivf_outcome_edit->Ectopic->Required) { ?>
				elm = this.getElements("x" + infix + "_Ectopic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->Ectopic->caption(), $ivf_outcome_edit->Ectopic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_edit->Extra->Required) { ?>
				elm = this.getElements("x" + infix + "_Extra");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_edit->Extra->caption(), $ivf_outcome_edit->Extra->RequiredErrorMessage)) ?>");
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
	fivf_outcomeedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivf_outcomeedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fivf_outcomeedit.lists["x_Gestation"] = <?php echo $ivf_outcome_edit->Gestation->Lookup->toClientList($ivf_outcome_edit) ?>;
	fivf_outcomeedit.lists["x_Gestation"].options = <?php echo JsonEncode($ivf_outcome_edit->Gestation->options(FALSE, TRUE)) ?>;
	fivf_outcomeedit.lists["x_Urine"] = <?php echo $ivf_outcome_edit->Urine->Lookup->toClientList($ivf_outcome_edit) ?>;
	fivf_outcomeedit.lists["x_Urine"].options = <?php echo JsonEncode($ivf_outcome_edit->Urine->options(FALSE, TRUE)) ?>;
	fivf_outcomeedit.lists["x_Miscarriage"] = <?php echo $ivf_outcome_edit->Miscarriage->Lookup->toClientList($ivf_outcome_edit) ?>;
	fivf_outcomeedit.lists["x_Miscarriage"].options = <?php echo JsonEncode($ivf_outcome_edit->Miscarriage->options(FALSE, TRUE)) ?>;
	fivf_outcomeedit.lists["x_Induced1"] = <?php echo $ivf_outcome_edit->Induced1->Lookup->toClientList($ivf_outcome_edit) ?>;
	fivf_outcomeedit.lists["x_Induced1"].options = <?php echo JsonEncode($ivf_outcome_edit->Induced1->options(FALSE, TRUE)) ?>;
	fivf_outcomeedit.lists["x_Type"] = <?php echo $ivf_outcome_edit->Type->Lookup->toClientList($ivf_outcome_edit) ?>;
	fivf_outcomeedit.lists["x_Type"].options = <?php echo JsonEncode($ivf_outcome_edit->Type->options(FALSE, TRUE)) ?>;
	fivf_outcomeedit.lists["x_FoetalDeath"] = <?php echo $ivf_outcome_edit->FoetalDeath->Lookup->toClientList($ivf_outcome_edit) ?>;
	fivf_outcomeedit.lists["x_FoetalDeath"].options = <?php echo JsonEncode($ivf_outcome_edit->FoetalDeath->options(FALSE, TRUE)) ?>;
	fivf_outcomeedit.lists["x_FerinatalDeath"] = <?php echo $ivf_outcome_edit->FerinatalDeath->Lookup->toClientList($ivf_outcome_edit) ?>;
	fivf_outcomeedit.lists["x_FerinatalDeath"].options = <?php echo JsonEncode($ivf_outcome_edit->FerinatalDeath->options(FALSE, TRUE)) ?>;
	fivf_outcomeedit.lists["x_Ectopic"] = <?php echo $ivf_outcome_edit->Ectopic->Lookup->toClientList($ivf_outcome_edit) ?>;
	fivf_outcomeedit.lists["x_Ectopic"].options = <?php echo JsonEncode($ivf_outcome_edit->Ectopic->options(FALSE, TRUE)) ?>;
	fivf_outcomeedit.lists["x_Extra"] = <?php echo $ivf_outcome_edit->Extra->Lookup->toClientList($ivf_outcome_edit) ?>;
	fivf_outcomeedit.lists["x_Extra"].options = <?php echo JsonEncode($ivf_outcome_edit->Extra->options(FALSE, TRUE)) ?>;
	loadjs.done("fivf_outcomeedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_outcome_edit->showPageHeader(); ?>
<?php
$ivf_outcome_edit->showMessage();
?>
<form name="fivf_outcomeedit" id="fivf_outcomeedit" class="<?php echo $ivf_outcome_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_outcome">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_outcome_edit->IsModal ?>">
<?php if ($ivf_outcome->getCurrentMasterTable() == "ivf_treatment_plan") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ivf_treatment_plan">
<input type="hidden" name="fk_RIDNO" value="<?php echo HtmlEncode($ivf_outcome_edit->RIDNO->getSessionValue()) ?>">
<input type="hidden" name="fk_Name" value="<?php echo HtmlEncode($ivf_outcome_edit->Name->getSessionValue()) ?>">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($ivf_outcome_edit->TidNo->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($ivf_outcome_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_ivf_outcome_id" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_id" type="text/html"><?php echo $ivf_outcome_edit->id->caption() ?><?php echo $ivf_outcome_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->id->cellAttributes() ?>>
<script id="tpx_ivf_outcome_id" type="text/html"><span id="el_ivf_outcome_id">
<span<?php echo $ivf_outcome_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_edit->id->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="ivf_outcome" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($ivf_outcome_edit->id->CurrentValue) ?>">
<?php echo $ivf_outcome_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label id="elh_ivf_outcome_RIDNO" for="x_RIDNO" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_RIDNO" type="text/html"><?php echo $ivf_outcome_edit->RIDNO->caption() ?><?php echo $ivf_outcome_edit->RIDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->RIDNO->cellAttributes() ?>>
<?php if ($ivf_outcome_edit->RIDNO->getSessionValue() != "") { ?>
<script id="tpx_ivf_outcome_RIDNO" type="text/html"><span id="el_ivf_outcome_RIDNO">
<span<?php echo $ivf_outcome_edit->RIDNO->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_edit->RIDNO->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_RIDNO" name="x_RIDNO" value="<?php echo HtmlEncode($ivf_outcome_edit->RIDNO->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_ivf_outcome_RIDNO" type="text/html"><span id="el_ivf_outcome_RIDNO">
<input type="text" data-table="ivf_outcome" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome_edit->RIDNO->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_edit->RIDNO->EditValue ?>"<?php echo $ivf_outcome_edit->RIDNO->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $ivf_outcome_edit->RIDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_ivf_outcome_Name" for="x_Name" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_Name" type="text/html"><?php echo $ivf_outcome_edit->Name->caption() ?><?php echo $ivf_outcome_edit->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->Name->cellAttributes() ?>>
<?php if ($ivf_outcome_edit->Name->getSessionValue() != "") { ?>
<script id="tpx_ivf_outcome_Name" type="text/html"><span id="el_ivf_outcome_Name">
<span<?php echo $ivf_outcome_edit->Name->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_edit->Name->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_Name" name="x_Name" value="<?php echo HtmlEncode($ivf_outcome_edit->Name->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_ivf_outcome_Name" type="text/html"><span id="el_ivf_outcome_Name">
<input type="text" data-table="ivf_outcome" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_edit->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_edit->Name->EditValue ?>"<?php echo $ivf_outcome_edit->Name->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $ivf_outcome_edit->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_ivf_outcome_Age" for="x_Age" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_Age" type="text/html"><?php echo $ivf_outcome_edit->Age->caption() ?><?php echo $ivf_outcome_edit->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->Age->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Age" type="text/html"><span id="el_ivf_outcome_Age">
<input type="text" data-table="ivf_outcome" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_edit->Age->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_edit->Age->EditValue ?>"<?php echo $ivf_outcome_edit->Age->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_edit->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->treatment_status->Visible) { // treatment_status ?>
	<div id="r_treatment_status" class="form-group row">
		<label id="elh_ivf_outcome_treatment_status" for="x_treatment_status" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_treatment_status" type="text/html"><?php echo $ivf_outcome_edit->treatment_status->caption() ?><?php echo $ivf_outcome_edit->treatment_status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->treatment_status->cellAttributes() ?>>
<script id="tpx_ivf_outcome_treatment_status" type="text/html"><span id="el_ivf_outcome_treatment_status">
<input type="text" data-table="ivf_outcome" data-field="x_treatment_status" name="x_treatment_status" id="x_treatment_status" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_edit->treatment_status->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_edit->treatment_status->EditValue ?>"<?php echo $ivf_outcome_edit->treatment_status->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_edit->treatment_status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<div id="r_ARTCYCLE" class="form-group row">
		<label id="elh_ivf_outcome_ARTCYCLE" for="x_ARTCYCLE" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_ARTCYCLE" type="text/html"><?php echo $ivf_outcome_edit->ARTCYCLE->caption() ?><?php echo $ivf_outcome_edit->ARTCYCLE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->ARTCYCLE->cellAttributes() ?>>
<script id="tpx_ivf_outcome_ARTCYCLE" type="text/html"><span id="el_ivf_outcome_ARTCYCLE">
<input type="text" data-table="ivf_outcome" data-field="x_ARTCYCLE" name="x_ARTCYCLE" id="x_ARTCYCLE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_edit->ARTCYCLE->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_edit->ARTCYCLE->EditValue ?>"<?php echo $ivf_outcome_edit->ARTCYCLE->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_edit->ARTCYCLE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->RESULT->Visible) { // RESULT ?>
	<div id="r_RESULT" class="form-group row">
		<label id="elh_ivf_outcome_RESULT" for="x_RESULT" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_RESULT" type="text/html"><?php echo $ivf_outcome_edit->RESULT->caption() ?><?php echo $ivf_outcome_edit->RESULT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->RESULT->cellAttributes() ?>>
<script id="tpx_ivf_outcome_RESULT" type="text/html"><span id="el_ivf_outcome_RESULT">
<input type="text" data-table="ivf_outcome" data-field="x_RESULT" name="x_RESULT" id="x_RESULT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_edit->RESULT->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_edit->RESULT->EditValue ?>"<?php echo $ivf_outcome_edit->RESULT->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_edit->RESULT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_ivf_outcome_status" for="x_status" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_status" type="text/html"><?php echo $ivf_outcome_edit->status->caption() ?><?php echo $ivf_outcome_edit->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->status->cellAttributes() ?>>
<script id="tpx_ivf_outcome_status" type="text/html"><span id="el_ivf_outcome_status">
<input type="text" data-table="ivf_outcome" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome_edit->status->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_edit->status->EditValue ?>"<?php echo $ivf_outcome_edit->status->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_edit->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label id="elh_ivf_outcome_createdby" for="x_createdby" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_createdby" type="text/html"><?php echo $ivf_outcome_edit->createdby->caption() ?><?php echo $ivf_outcome_edit->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->createdby->cellAttributes() ?>>
<script id="tpx_ivf_outcome_createdby" type="text/html"><span id="el_ivf_outcome_createdby">
<input type="text" data-table="ivf_outcome" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome_edit->createdby->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_edit->createdby->EditValue ?>"<?php echo $ivf_outcome_edit->createdby->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_edit->createdby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label id="elh_ivf_outcome_createddatetime" for="x_createddatetime" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_createddatetime" type="text/html"><?php echo $ivf_outcome_edit->createddatetime->caption() ?><?php echo $ivf_outcome_edit->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->createddatetime->cellAttributes() ?>>
<script id="tpx_ivf_outcome_createddatetime" type="text/html"><span id="el_ivf_outcome_createddatetime">
<input type="text" data-table="ivf_outcome" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($ivf_outcome_edit->createddatetime->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_edit->createddatetime->EditValue ?>"<?php echo $ivf_outcome_edit->createddatetime->editAttributes() ?>>
<?php if (!$ivf_outcome_edit->createddatetime->ReadOnly && !$ivf_outcome_edit->createddatetime->Disabled && !isset($ivf_outcome_edit->createddatetime->EditAttrs["readonly"]) && !isset($ivf_outcome_edit->createddatetime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_outcomeedit_js">
loadjs.ready(["fivf_outcomeedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_outcomeedit", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $ivf_outcome_edit->createddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label id="elh_ivf_outcome_modifiedby" for="x_modifiedby" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_modifiedby" type="text/html"><?php echo $ivf_outcome_edit->modifiedby->caption() ?><?php echo $ivf_outcome_edit->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->modifiedby->cellAttributes() ?>>
<script id="tpx_ivf_outcome_modifiedby" type="text/html"><span id="el_ivf_outcome_modifiedby">
<input type="text" data-table="ivf_outcome" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome_edit->modifiedby->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_edit->modifiedby->EditValue ?>"<?php echo $ivf_outcome_edit->modifiedby->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_edit->modifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label id="elh_ivf_outcome_modifieddatetime" for="x_modifieddatetime" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_modifieddatetime" type="text/html"><?php echo $ivf_outcome_edit->modifieddatetime->caption() ?><?php echo $ivf_outcome_edit->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->modifieddatetime->cellAttributes() ?>>
<script id="tpx_ivf_outcome_modifieddatetime" type="text/html"><span id="el_ivf_outcome_modifieddatetime">
<input type="text" data-table="ivf_outcome" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($ivf_outcome_edit->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_edit->modifieddatetime->EditValue ?>"<?php echo $ivf_outcome_edit->modifieddatetime->editAttributes() ?>>
<?php if (!$ivf_outcome_edit->modifieddatetime->ReadOnly && !$ivf_outcome_edit->modifieddatetime->Disabled && !isset($ivf_outcome_edit->modifieddatetime->EditAttrs["readonly"]) && !isset($ivf_outcome_edit->modifieddatetime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_outcomeedit_js">
loadjs.ready(["fivf_outcomeedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_outcomeedit", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $ivf_outcome_edit->modifieddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->outcomeDate->Visible) { // outcomeDate ?>
	<div id="r_outcomeDate" class="form-group row">
		<label id="elh_ivf_outcome_outcomeDate" for="x_outcomeDate" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_outcomeDate" type="text/html"><?php echo $ivf_outcome_edit->outcomeDate->caption() ?><?php echo $ivf_outcome_edit->outcomeDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->outcomeDate->cellAttributes() ?>>
<script id="tpx_ivf_outcome_outcomeDate" type="text/html"><span id="el_ivf_outcome_outcomeDate">
<input type="text" data-table="ivf_outcome" data-field="x_outcomeDate" name="x_outcomeDate" id="x_outcomeDate" placeholder="<?php echo HtmlEncode($ivf_outcome_edit->outcomeDate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_edit->outcomeDate->EditValue ?>"<?php echo $ivf_outcome_edit->outcomeDate->editAttributes() ?>>
<?php if (!$ivf_outcome_edit->outcomeDate->ReadOnly && !$ivf_outcome_edit->outcomeDate->Disabled && !isset($ivf_outcome_edit->outcomeDate->EditAttrs["readonly"]) && !isset($ivf_outcome_edit->outcomeDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_outcomeedit_js">
loadjs.ready(["fivf_outcomeedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_outcomeedit", "x_outcomeDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $ivf_outcome_edit->outcomeDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->outcomeDay->Visible) { // outcomeDay ?>
	<div id="r_outcomeDay" class="form-group row">
		<label id="elh_ivf_outcome_outcomeDay" for="x_outcomeDay" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_outcomeDay" type="text/html"><?php echo $ivf_outcome_edit->outcomeDay->caption() ?><?php echo $ivf_outcome_edit->outcomeDay->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->outcomeDay->cellAttributes() ?>>
<script id="tpx_ivf_outcome_outcomeDay" type="text/html"><span id="el_ivf_outcome_outcomeDay">
<input type="text" data-table="ivf_outcome" data-field="x_outcomeDay" name="x_outcomeDay" id="x_outcomeDay" placeholder="<?php echo HtmlEncode($ivf_outcome_edit->outcomeDay->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_edit->outcomeDay->EditValue ?>"<?php echo $ivf_outcome_edit->outcomeDay->editAttributes() ?>>
<?php if (!$ivf_outcome_edit->outcomeDay->ReadOnly && !$ivf_outcome_edit->outcomeDay->Disabled && !isset($ivf_outcome_edit->outcomeDay->EditAttrs["readonly"]) && !isset($ivf_outcome_edit->outcomeDay->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_outcomeedit_js">
loadjs.ready(["fivf_outcomeedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_outcomeedit", "x_outcomeDay", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $ivf_outcome_edit->outcomeDay->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->OPResult->Visible) { // OPResult ?>
	<div id="r_OPResult" class="form-group row">
		<label id="elh_ivf_outcome_OPResult" for="x_OPResult" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_OPResult" type="text/html"><?php echo $ivf_outcome_edit->OPResult->caption() ?><?php echo $ivf_outcome_edit->OPResult->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->OPResult->cellAttributes() ?>>
<script id="tpx_ivf_outcome_OPResult" type="text/html"><span id="el_ivf_outcome_OPResult">
<input type="text" data-table="ivf_outcome" data-field="x_OPResult" name="x_OPResult" id="x_OPResult" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_edit->OPResult->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_edit->OPResult->EditValue ?>"<?php echo $ivf_outcome_edit->OPResult->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_edit->OPResult->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->Gestation->Visible) { // Gestation ?>
	<div id="r_Gestation" class="form-group row">
		<label id="elh_ivf_outcome_Gestation" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_Gestation" type="text/html"><?php echo $ivf_outcome_edit->Gestation->caption() ?><?php echo $ivf_outcome_edit->Gestation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->Gestation->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Gestation" type="text/html"><span id="el_ivf_outcome_Gestation">
<div id="tp_x_Gestation" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Gestation" data-value-separator="<?php echo $ivf_outcome_edit->Gestation->displayValueSeparatorAttribute() ?>" name="x_Gestation" id="x_Gestation" value="{value}"<?php echo $ivf_outcome_edit->Gestation->editAttributes() ?>></div>
<div id="dsl_x_Gestation" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome_edit->Gestation->radioButtonListHtml(FALSE, "x_Gestation") ?>
</div></div>
</span></script>
<?php echo $ivf_outcome_edit->Gestation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->TransferdEmbryos->Visible) { // TransferdEmbryos ?>
	<div id="r_TransferdEmbryos" class="form-group row">
		<label id="elh_ivf_outcome_TransferdEmbryos" for="x_TransferdEmbryos" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_TransferdEmbryos" type="text/html"><?php echo $ivf_outcome_edit->TransferdEmbryos->caption() ?><?php echo $ivf_outcome_edit->TransferdEmbryos->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->TransferdEmbryos->cellAttributes() ?>>
<script id="tpx_ivf_outcome_TransferdEmbryos" type="text/html"><span id="el_ivf_outcome_TransferdEmbryos">
<input type="text" data-table="ivf_outcome" data-field="x_TransferdEmbryos" name="x_TransferdEmbryos" id="x_TransferdEmbryos" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_edit->TransferdEmbryos->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_edit->TransferdEmbryos->EditValue ?>"<?php echo $ivf_outcome_edit->TransferdEmbryos->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_edit->TransferdEmbryos->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->InitalOfSacs->Visible) { // InitalOfSacs ?>
	<div id="r_InitalOfSacs" class="form-group row">
		<label id="elh_ivf_outcome_InitalOfSacs" for="x_InitalOfSacs" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_InitalOfSacs" type="text/html"><?php echo $ivf_outcome_edit->InitalOfSacs->caption() ?><?php echo $ivf_outcome_edit->InitalOfSacs->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->InitalOfSacs->cellAttributes() ?>>
<script id="tpx_ivf_outcome_InitalOfSacs" type="text/html"><span id="el_ivf_outcome_InitalOfSacs">
<input type="text" data-table="ivf_outcome" data-field="x_InitalOfSacs" name="x_InitalOfSacs" id="x_InitalOfSacs" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_edit->InitalOfSacs->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_edit->InitalOfSacs->EditValue ?>"<?php echo $ivf_outcome_edit->InitalOfSacs->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_edit->InitalOfSacs->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->ImplimentationRate->Visible) { // ImplimentationRate ?>
	<div id="r_ImplimentationRate" class="form-group row">
		<label id="elh_ivf_outcome_ImplimentationRate" for="x_ImplimentationRate" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_ImplimentationRate" type="text/html"><?php echo $ivf_outcome_edit->ImplimentationRate->caption() ?><?php echo $ivf_outcome_edit->ImplimentationRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->ImplimentationRate->cellAttributes() ?>>
<script id="tpx_ivf_outcome_ImplimentationRate" type="text/html"><span id="el_ivf_outcome_ImplimentationRate">
<input type="text" data-table="ivf_outcome" data-field="x_ImplimentationRate" name="x_ImplimentationRate" id="x_ImplimentationRate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_edit->ImplimentationRate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_edit->ImplimentationRate->EditValue ?>"<?php echo $ivf_outcome_edit->ImplimentationRate->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_edit->ImplimentationRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->EmbryoNo->Visible) { // EmbryoNo ?>
	<div id="r_EmbryoNo" class="form-group row">
		<label id="elh_ivf_outcome_EmbryoNo" for="x_EmbryoNo" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_EmbryoNo" type="text/html"><?php echo $ivf_outcome_edit->EmbryoNo->caption() ?><?php echo $ivf_outcome_edit->EmbryoNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->EmbryoNo->cellAttributes() ?>>
<script id="tpx_ivf_outcome_EmbryoNo" type="text/html"><span id="el_ivf_outcome_EmbryoNo">
<input type="text" data-table="ivf_outcome" data-field="x_EmbryoNo" name="x_EmbryoNo" id="x_EmbryoNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_edit->EmbryoNo->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_edit->EmbryoNo->EditValue ?>"<?php echo $ivf_outcome_edit->EmbryoNo->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_edit->EmbryoNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->ExtrauterineSac->Visible) { // ExtrauterineSac ?>
	<div id="r_ExtrauterineSac" class="form-group row">
		<label id="elh_ivf_outcome_ExtrauterineSac" for="x_ExtrauterineSac" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_ExtrauterineSac" type="text/html"><?php echo $ivf_outcome_edit->ExtrauterineSac->caption() ?><?php echo $ivf_outcome_edit->ExtrauterineSac->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->ExtrauterineSac->cellAttributes() ?>>
<script id="tpx_ivf_outcome_ExtrauterineSac" type="text/html"><span id="el_ivf_outcome_ExtrauterineSac">
<input type="text" data-table="ivf_outcome" data-field="x_ExtrauterineSac" name="x_ExtrauterineSac" id="x_ExtrauterineSac" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_edit->ExtrauterineSac->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_edit->ExtrauterineSac->EditValue ?>"<?php echo $ivf_outcome_edit->ExtrauterineSac->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_edit->ExtrauterineSac->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->PregnancyMonozygotic->Visible) { // PregnancyMonozygotic ?>
	<div id="r_PregnancyMonozygotic" class="form-group row">
		<label id="elh_ivf_outcome_PregnancyMonozygotic" for="x_PregnancyMonozygotic" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_PregnancyMonozygotic" type="text/html"><?php echo $ivf_outcome_edit->PregnancyMonozygotic->caption() ?><?php echo $ivf_outcome_edit->PregnancyMonozygotic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->PregnancyMonozygotic->cellAttributes() ?>>
<script id="tpx_ivf_outcome_PregnancyMonozygotic" type="text/html"><span id="el_ivf_outcome_PregnancyMonozygotic">
<input type="text" data-table="ivf_outcome" data-field="x_PregnancyMonozygotic" name="x_PregnancyMonozygotic" id="x_PregnancyMonozygotic" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_edit->PregnancyMonozygotic->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_edit->PregnancyMonozygotic->EditValue ?>"<?php echo $ivf_outcome_edit->PregnancyMonozygotic->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_edit->PregnancyMonozygotic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->TypeGestation->Visible) { // TypeGestation ?>
	<div id="r_TypeGestation" class="form-group row">
		<label id="elh_ivf_outcome_TypeGestation" for="x_TypeGestation" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_TypeGestation" type="text/html"><?php echo $ivf_outcome_edit->TypeGestation->caption() ?><?php echo $ivf_outcome_edit->TypeGestation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->TypeGestation->cellAttributes() ?>>
<script id="tpx_ivf_outcome_TypeGestation" type="text/html"><span id="el_ivf_outcome_TypeGestation">
<input type="text" data-table="ivf_outcome" data-field="x_TypeGestation" name="x_TypeGestation" id="x_TypeGestation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_edit->TypeGestation->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_edit->TypeGestation->EditValue ?>"<?php echo $ivf_outcome_edit->TypeGestation->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_edit->TypeGestation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->Urine->Visible) { // Urine ?>
	<div id="r_Urine" class="form-group row">
		<label id="elh_ivf_outcome_Urine" for="x_Urine" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_Urine" type="text/html"><?php echo $ivf_outcome_edit->Urine->caption() ?><?php echo $ivf_outcome_edit->Urine->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->Urine->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Urine" type="text/html"><span id="el_ivf_outcome_Urine">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_outcome" data-field="x_Urine" data-value-separator="<?php echo $ivf_outcome_edit->Urine->displayValueSeparatorAttribute() ?>" id="x_Urine" name="x_Urine"<?php echo $ivf_outcome_edit->Urine->editAttributes() ?>>
			<?php echo $ivf_outcome_edit->Urine->selectOptionListHtml("x_Urine") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_outcome_edit->Urine->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->PTdate->Visible) { // PTdate ?>
	<div id="r_PTdate" class="form-group row">
		<label id="elh_ivf_outcome_PTdate" for="x_PTdate" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_PTdate" type="text/html"><?php echo $ivf_outcome_edit->PTdate->caption() ?><?php echo $ivf_outcome_edit->PTdate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->PTdate->cellAttributes() ?>>
<script id="tpx_ivf_outcome_PTdate" type="text/html"><span id="el_ivf_outcome_PTdate">
<input type="text" data-table="ivf_outcome" data-field="x_PTdate" name="x_PTdate" id="x_PTdate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_edit->PTdate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_edit->PTdate->EditValue ?>"<?php echo $ivf_outcome_edit->PTdate->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_edit->PTdate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->Reduced->Visible) { // Reduced ?>
	<div id="r_Reduced" class="form-group row">
		<label id="elh_ivf_outcome_Reduced" for="x_Reduced" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_Reduced" type="text/html"><?php echo $ivf_outcome_edit->Reduced->caption() ?><?php echo $ivf_outcome_edit->Reduced->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->Reduced->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Reduced" type="text/html"><span id="el_ivf_outcome_Reduced">
<input type="text" data-table="ivf_outcome" data-field="x_Reduced" name="x_Reduced" id="x_Reduced" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_edit->Reduced->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_edit->Reduced->EditValue ?>"<?php echo $ivf_outcome_edit->Reduced->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_edit->Reduced->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->INduced->Visible) { // INduced ?>
	<div id="r_INduced" class="form-group row">
		<label id="elh_ivf_outcome_INduced" for="x_INduced" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_INduced" type="text/html"><?php echo $ivf_outcome_edit->INduced->caption() ?><?php echo $ivf_outcome_edit->INduced->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->INduced->cellAttributes() ?>>
<script id="tpx_ivf_outcome_INduced" type="text/html"><span id="el_ivf_outcome_INduced">
<input type="text" data-table="ivf_outcome" data-field="x_INduced" name="x_INduced" id="x_INduced" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_edit->INduced->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_edit->INduced->EditValue ?>"<?php echo $ivf_outcome_edit->INduced->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_edit->INduced->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->INducedDate->Visible) { // INducedDate ?>
	<div id="r_INducedDate" class="form-group row">
		<label id="elh_ivf_outcome_INducedDate" for="x_INducedDate" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_INducedDate" type="text/html"><?php echo $ivf_outcome_edit->INducedDate->caption() ?><?php echo $ivf_outcome_edit->INducedDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->INducedDate->cellAttributes() ?>>
<script id="tpx_ivf_outcome_INducedDate" type="text/html"><span id="el_ivf_outcome_INducedDate">
<input type="text" data-table="ivf_outcome" data-field="x_INducedDate" name="x_INducedDate" id="x_INducedDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_edit->INducedDate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_edit->INducedDate->EditValue ?>"<?php echo $ivf_outcome_edit->INducedDate->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_edit->INducedDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->Miscarriage->Visible) { // Miscarriage ?>
	<div id="r_Miscarriage" class="form-group row">
		<label id="elh_ivf_outcome_Miscarriage" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_Miscarriage" type="text/html"><?php echo $ivf_outcome_edit->Miscarriage->caption() ?><?php echo $ivf_outcome_edit->Miscarriage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->Miscarriage->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Miscarriage" type="text/html"><span id="el_ivf_outcome_Miscarriage">
<div id="tp_x_Miscarriage" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Miscarriage" data-value-separator="<?php echo $ivf_outcome_edit->Miscarriage->displayValueSeparatorAttribute() ?>" name="x_Miscarriage" id="x_Miscarriage" value="{value}"<?php echo $ivf_outcome_edit->Miscarriage->editAttributes() ?>></div>
<div id="dsl_x_Miscarriage" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome_edit->Miscarriage->radioButtonListHtml(FALSE, "x_Miscarriage") ?>
</div></div>
</span></script>
<?php echo $ivf_outcome_edit->Miscarriage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->Induced1->Visible) { // Induced1 ?>
	<div id="r_Induced1" class="form-group row">
		<label id="elh_ivf_outcome_Induced1" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_Induced1" type="text/html"><?php echo $ivf_outcome_edit->Induced1->caption() ?><?php echo $ivf_outcome_edit->Induced1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->Induced1->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Induced1" type="text/html"><span id="el_ivf_outcome_Induced1">
<div id="tp_x_Induced1" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Induced1" data-value-separator="<?php echo $ivf_outcome_edit->Induced1->displayValueSeparatorAttribute() ?>" name="x_Induced1" id="x_Induced1" value="{value}"<?php echo $ivf_outcome_edit->Induced1->editAttributes() ?>></div>
<div id="dsl_x_Induced1" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome_edit->Induced1->radioButtonListHtml(FALSE, "x_Induced1") ?>
</div></div>
</span></script>
<?php echo $ivf_outcome_edit->Induced1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->Type->Visible) { // Type ?>
	<div id="r_Type" class="form-group row">
		<label id="elh_ivf_outcome_Type" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_Type" type="text/html"><?php echo $ivf_outcome_edit->Type->caption() ?><?php echo $ivf_outcome_edit->Type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->Type->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Type" type="text/html"><span id="el_ivf_outcome_Type">
<div id="tp_x_Type" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Type" data-value-separator="<?php echo $ivf_outcome_edit->Type->displayValueSeparatorAttribute() ?>" name="x_Type" id="x_Type" value="{value}"<?php echo $ivf_outcome_edit->Type->editAttributes() ?>></div>
<div id="dsl_x_Type" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome_edit->Type->radioButtonListHtml(FALSE, "x_Type") ?>
</div></div>
</span></script>
<?php echo $ivf_outcome_edit->Type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->IfClinical->Visible) { // IfClinical ?>
	<div id="r_IfClinical" class="form-group row">
		<label id="elh_ivf_outcome_IfClinical" for="x_IfClinical" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_IfClinical" type="text/html"><?php echo $ivf_outcome_edit->IfClinical->caption() ?><?php echo $ivf_outcome_edit->IfClinical->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->IfClinical->cellAttributes() ?>>
<script id="tpx_ivf_outcome_IfClinical" type="text/html"><span id="el_ivf_outcome_IfClinical">
<input type="text" data-table="ivf_outcome" data-field="x_IfClinical" name="x_IfClinical" id="x_IfClinical" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_edit->IfClinical->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_edit->IfClinical->EditValue ?>"<?php echo $ivf_outcome_edit->IfClinical->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_edit->IfClinical->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->GADate->Visible) { // GADate ?>
	<div id="r_GADate" class="form-group row">
		<label id="elh_ivf_outcome_GADate" for="x_GADate" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_GADate" type="text/html"><?php echo $ivf_outcome_edit->GADate->caption() ?><?php echo $ivf_outcome_edit->GADate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->GADate->cellAttributes() ?>>
<script id="tpx_ivf_outcome_GADate" type="text/html"><span id="el_ivf_outcome_GADate">
<input type="text" data-table="ivf_outcome" data-field="x_GADate" name="x_GADate" id="x_GADate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_edit->GADate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_edit->GADate->EditValue ?>"<?php echo $ivf_outcome_edit->GADate->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_edit->GADate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->GA->Visible) { // GA ?>
	<div id="r_GA" class="form-group row">
		<label id="elh_ivf_outcome_GA" for="x_GA" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_GA" type="text/html"><?php echo $ivf_outcome_edit->GA->caption() ?><?php echo $ivf_outcome_edit->GA->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->GA->cellAttributes() ?>>
<script id="tpx_ivf_outcome_GA" type="text/html"><span id="el_ivf_outcome_GA">
<input type="text" data-table="ivf_outcome" data-field="x_GA" name="x_GA" id="x_GA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_edit->GA->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_edit->GA->EditValue ?>"<?php echo $ivf_outcome_edit->GA->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_edit->GA->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->FoetalDeath->Visible) { // FoetalDeath ?>
	<div id="r_FoetalDeath" class="form-group row">
		<label id="elh_ivf_outcome_FoetalDeath" for="x_FoetalDeath" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_FoetalDeath" type="text/html"><?php echo $ivf_outcome_edit->FoetalDeath->caption() ?><?php echo $ivf_outcome_edit->FoetalDeath->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->FoetalDeath->cellAttributes() ?>>
<script id="tpx_ivf_outcome_FoetalDeath" type="text/html"><span id="el_ivf_outcome_FoetalDeath">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_outcome" data-field="x_FoetalDeath" data-value-separator="<?php echo $ivf_outcome_edit->FoetalDeath->displayValueSeparatorAttribute() ?>" id="x_FoetalDeath" name="x_FoetalDeath"<?php echo $ivf_outcome_edit->FoetalDeath->editAttributes() ?>>
			<?php echo $ivf_outcome_edit->FoetalDeath->selectOptionListHtml("x_FoetalDeath") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_outcome_edit->FoetalDeath->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->FerinatalDeath->Visible) { // FerinatalDeath ?>
	<div id="r_FerinatalDeath" class="form-group row">
		<label id="elh_ivf_outcome_FerinatalDeath" for="x_FerinatalDeath" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_FerinatalDeath" type="text/html"><?php echo $ivf_outcome_edit->FerinatalDeath->caption() ?><?php echo $ivf_outcome_edit->FerinatalDeath->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->FerinatalDeath->cellAttributes() ?>>
<script id="tpx_ivf_outcome_FerinatalDeath" type="text/html"><span id="el_ivf_outcome_FerinatalDeath">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_outcome" data-field="x_FerinatalDeath" data-value-separator="<?php echo $ivf_outcome_edit->FerinatalDeath->displayValueSeparatorAttribute() ?>" id="x_FerinatalDeath" name="x_FerinatalDeath"<?php echo $ivf_outcome_edit->FerinatalDeath->editAttributes() ?>>
			<?php echo $ivf_outcome_edit->FerinatalDeath->selectOptionListHtml("x_FerinatalDeath") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_outcome_edit->FerinatalDeath->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_ivf_outcome_TidNo" for="x_TidNo" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_TidNo" type="text/html"><?php echo $ivf_outcome_edit->TidNo->caption() ?><?php echo $ivf_outcome_edit->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->TidNo->cellAttributes() ?>>
<?php if ($ivf_outcome_edit->TidNo->getSessionValue() != "") { ?>
<script id="tpx_ivf_outcome_TidNo" type="text/html"><span id="el_ivf_outcome_TidNo">
<span<?php echo $ivf_outcome_edit->TidNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_edit->TidNo->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_TidNo" name="x_TidNo" value="<?php echo HtmlEncode($ivf_outcome_edit->TidNo->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_ivf_outcome_TidNo" type="text/html"><span id="el_ivf_outcome_TidNo">
<input type="text" data-table="ivf_outcome" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome_edit->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_edit->TidNo->EditValue ?>"<?php echo $ivf_outcome_edit->TidNo->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $ivf_outcome_edit->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->Ectopic->Visible) { // Ectopic ?>
	<div id="r_Ectopic" class="form-group row">
		<label id="elh_ivf_outcome_Ectopic" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_Ectopic" type="text/html"><?php echo $ivf_outcome_edit->Ectopic->caption() ?><?php echo $ivf_outcome_edit->Ectopic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->Ectopic->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Ectopic" type="text/html"><span id="el_ivf_outcome_Ectopic">
<div id="tp_x_Ectopic" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Ectopic" data-value-separator="<?php echo $ivf_outcome_edit->Ectopic->displayValueSeparatorAttribute() ?>" name="x_Ectopic" id="x_Ectopic" value="{value}"<?php echo $ivf_outcome_edit->Ectopic->editAttributes() ?>></div>
<div id="dsl_x_Ectopic" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome_edit->Ectopic->radioButtonListHtml(FALSE, "x_Ectopic") ?>
</div></div>
</span></script>
<?php echo $ivf_outcome_edit->Ectopic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_edit->Extra->Visible) { // Extra ?>
	<div id="r_Extra" class="form-group row">
		<label id="elh_ivf_outcome_Extra" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_Extra" type="text/html"><?php echo $ivf_outcome_edit->Extra->caption() ?><?php echo $ivf_outcome_edit->Extra->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div <?php echo $ivf_outcome_edit->Extra->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Extra" type="text/html"><span id="el_ivf_outcome_Extra">
<div id="tp_x_Extra" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Extra" data-value-separator="<?php echo $ivf_outcome_edit->Extra->displayValueSeparatorAttribute() ?>" name="x_Extra" id="x_Extra" value="{value}"<?php echo $ivf_outcome_edit->Extra->editAttributes() ?>></div>
<div id="dsl_x_Extra" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome_edit->Extra->radioButtonListHtml(FALSE, "x_Extra") ?>
</div></div>
</span></script>
<?php echo $ivf_outcome_edit->Extra->CustomMsg ?></div></div>
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
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_outcomeDate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_outcome_outcomeDate")/}}</span>
						</td>
						<td id="SpermOrgin"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_outcomeDay"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_outcome_outcomeDay")/}}</span>
						</td>
					</tr>
										<tr>
						<td id="State"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_OPResult"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_outcome_OPResult")/}}</span>
						</td>
						<td id="Origin"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_Gestation"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_outcome_Gestation")/}}</span>
						</td>
					</tr>
										<tr>
						<td id="State"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_Ectopic"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_outcome_Ectopic")/}}</span>
						</td>
						<td id="Origin"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_Extra"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_outcome_Extra")/}}</span>
						</td>
					</tr>
										<tr>
						<td id="MACS"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_InitalOfSacs"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_outcome_InitalOfSacs")/}}</span>
						</td>
						<td  id="Technique" style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_ImplimentationRate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_outcome_ImplimentationRate")/}}</span>
						</td>
					</tr>
					<tr>
						<td id="PgdPlanning"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_Miscarriage"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_outcome_Miscarriage")/}}</span>
						</td>
						<td id="IMSI"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_Induced1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_outcome_Induced1")/}}</span>
						</td>
					</tr>
 					<tr>
						<td id="SequentialCulture"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_Type"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_outcome_Type")/}}</span>
						</td>
						<td id="TimeLapse"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_GADate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_outcome_GADate")/}}</span>
						</td>
					</tr>
															<tr>
						<td id="AH"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_GA"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_outcome_GA")/}}</span>
						</td>
						<td id="Weight"  style="width:50%">
							<span class="ew-cell"></span>
						</td>
					</tr>
					<tr>
						<td id="AH"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_Urine"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_outcome_Urine")/}}</span>
						</td>
						<td id="Weight"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_PTdate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_outcome_PTdate")/}}</span>
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
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($ivf_outcome->Rows) ?> };
	ew.applyTemplate("tpd_ivf_outcomeedit", "tpm_ivf_outcomeedit", "ivf_outcomeedit", "<?php echo $ivf_outcome->CustomExport ?>", ew.templateData.rows[0]);
	$("script.ivf_outcomeedit_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$ivf_outcome_edit->showPageFooter();
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
$ivf_outcome_edit->terminate();
?>