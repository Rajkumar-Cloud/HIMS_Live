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
$ivf_outcome_add = new ivf_outcome_add();

// Run the page
$ivf_outcome_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_outcome_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fivf_outcomeadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fivf_outcomeadd = currentForm = new ew.Form("fivf_outcomeadd", "add");

	// Validate form
	fivf_outcomeadd.validate = function() {
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
			<?php if ($ivf_outcome_add->RIDNO->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->RIDNO->caption(), $ivf_outcome_add->RIDNO->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RIDNO");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_outcome_add->RIDNO->errorMessage()) ?>");
			<?php if ($ivf_outcome_add->Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->Name->caption(), $ivf_outcome_add->Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_add->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->Age->caption(), $ivf_outcome_add->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_add->treatment_status->Required) { ?>
				elm = this.getElements("x" + infix + "_treatment_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->treatment_status->caption(), $ivf_outcome_add->treatment_status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_add->ARTCYCLE->Required) { ?>
				elm = this.getElements("x" + infix + "_ARTCYCLE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->ARTCYCLE->caption(), $ivf_outcome_add->ARTCYCLE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_add->RESULT->Required) { ?>
				elm = this.getElements("x" + infix + "_RESULT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->RESULT->caption(), $ivf_outcome_add->RESULT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_add->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->status->caption(), $ivf_outcome_add->status->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_outcome_add->status->errorMessage()) ?>");
			<?php if ($ivf_outcome_add->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->createdby->caption(), $ivf_outcome_add->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_outcome_add->createdby->errorMessage()) ?>");
			<?php if ($ivf_outcome_add->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->createddatetime->caption(), $ivf_outcome_add->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_outcome_add->createddatetime->errorMessage()) ?>");
			<?php if ($ivf_outcome_add->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->modifiedby->caption(), $ivf_outcome_add->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_outcome_add->modifiedby->errorMessage()) ?>");
			<?php if ($ivf_outcome_add->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->modifieddatetime->caption(), $ivf_outcome_add->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_outcome_add->modifieddatetime->errorMessage()) ?>");
			<?php if ($ivf_outcome_add->outcomeDate->Required) { ?>
				elm = this.getElements("x" + infix + "_outcomeDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->outcomeDate->caption(), $ivf_outcome_add->outcomeDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_outcomeDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_outcome_add->outcomeDate->errorMessage()) ?>");
			<?php if ($ivf_outcome_add->outcomeDay->Required) { ?>
				elm = this.getElements("x" + infix + "_outcomeDay");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->outcomeDay->caption(), $ivf_outcome_add->outcomeDay->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_outcomeDay");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_outcome_add->outcomeDay->errorMessage()) ?>");
			<?php if ($ivf_outcome_add->OPResult->Required) { ?>
				elm = this.getElements("x" + infix + "_OPResult");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->OPResult->caption(), $ivf_outcome_add->OPResult->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_add->Gestation->Required) { ?>
				elm = this.getElements("x" + infix + "_Gestation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->Gestation->caption(), $ivf_outcome_add->Gestation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_add->TransferdEmbryos->Required) { ?>
				elm = this.getElements("x" + infix + "_TransferdEmbryos");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->TransferdEmbryos->caption(), $ivf_outcome_add->TransferdEmbryos->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_add->InitalOfSacs->Required) { ?>
				elm = this.getElements("x" + infix + "_InitalOfSacs");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->InitalOfSacs->caption(), $ivf_outcome_add->InitalOfSacs->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_add->ImplimentationRate->Required) { ?>
				elm = this.getElements("x" + infix + "_ImplimentationRate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->ImplimentationRate->caption(), $ivf_outcome_add->ImplimentationRate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_add->EmbryoNo->Required) { ?>
				elm = this.getElements("x" + infix + "_EmbryoNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->EmbryoNo->caption(), $ivf_outcome_add->EmbryoNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_add->ExtrauterineSac->Required) { ?>
				elm = this.getElements("x" + infix + "_ExtrauterineSac");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->ExtrauterineSac->caption(), $ivf_outcome_add->ExtrauterineSac->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_add->PregnancyMonozygotic->Required) { ?>
				elm = this.getElements("x" + infix + "_PregnancyMonozygotic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->PregnancyMonozygotic->caption(), $ivf_outcome_add->PregnancyMonozygotic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_add->TypeGestation->Required) { ?>
				elm = this.getElements("x" + infix + "_TypeGestation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->TypeGestation->caption(), $ivf_outcome_add->TypeGestation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_add->Urine->Required) { ?>
				elm = this.getElements("x" + infix + "_Urine");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->Urine->caption(), $ivf_outcome_add->Urine->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_add->PTdate->Required) { ?>
				elm = this.getElements("x" + infix + "_PTdate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->PTdate->caption(), $ivf_outcome_add->PTdate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_add->Reduced->Required) { ?>
				elm = this.getElements("x" + infix + "_Reduced");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->Reduced->caption(), $ivf_outcome_add->Reduced->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_add->INduced->Required) { ?>
				elm = this.getElements("x" + infix + "_INduced");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->INduced->caption(), $ivf_outcome_add->INduced->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_add->INducedDate->Required) { ?>
				elm = this.getElements("x" + infix + "_INducedDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->INducedDate->caption(), $ivf_outcome_add->INducedDate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_add->Miscarriage->Required) { ?>
				elm = this.getElements("x" + infix + "_Miscarriage");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->Miscarriage->caption(), $ivf_outcome_add->Miscarriage->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_add->Induced1->Required) { ?>
				elm = this.getElements("x" + infix + "_Induced1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->Induced1->caption(), $ivf_outcome_add->Induced1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_add->Type->Required) { ?>
				elm = this.getElements("x" + infix + "_Type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->Type->caption(), $ivf_outcome_add->Type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_add->IfClinical->Required) { ?>
				elm = this.getElements("x" + infix + "_IfClinical");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->IfClinical->caption(), $ivf_outcome_add->IfClinical->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_add->GADate->Required) { ?>
				elm = this.getElements("x" + infix + "_GADate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->GADate->caption(), $ivf_outcome_add->GADate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_add->GA->Required) { ?>
				elm = this.getElements("x" + infix + "_GA");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->GA->caption(), $ivf_outcome_add->GA->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_add->FoetalDeath->Required) { ?>
				elm = this.getElements("x" + infix + "_FoetalDeath");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->FoetalDeath->caption(), $ivf_outcome_add->FoetalDeath->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_add->FerinatalDeath->Required) { ?>
				elm = this.getElements("x" + infix + "_FerinatalDeath");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->FerinatalDeath->caption(), $ivf_outcome_add->FerinatalDeath->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_add->TidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->TidNo->caption(), $ivf_outcome_add->TidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_outcome_add->TidNo->errorMessage()) ?>");
			<?php if ($ivf_outcome_add->Ectopic->Required) { ?>
				elm = this.getElements("x" + infix + "_Ectopic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->Ectopic->caption(), $ivf_outcome_add->Ectopic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_outcome_add->Extra->Required) { ?>
				elm = this.getElements("x" + infix + "_Extra");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome_add->Extra->caption(), $ivf_outcome_add->Extra->RequiredErrorMessage)) ?>");
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
	fivf_outcomeadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivf_outcomeadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fivf_outcomeadd.lists["x_Gestation"] = <?php echo $ivf_outcome_add->Gestation->Lookup->toClientList($ivf_outcome_add) ?>;
	fivf_outcomeadd.lists["x_Gestation"].options = <?php echo JsonEncode($ivf_outcome_add->Gestation->options(FALSE, TRUE)) ?>;
	fivf_outcomeadd.lists["x_Urine"] = <?php echo $ivf_outcome_add->Urine->Lookup->toClientList($ivf_outcome_add) ?>;
	fivf_outcomeadd.lists["x_Urine"].options = <?php echo JsonEncode($ivf_outcome_add->Urine->options(FALSE, TRUE)) ?>;
	fivf_outcomeadd.lists["x_Miscarriage"] = <?php echo $ivf_outcome_add->Miscarriage->Lookup->toClientList($ivf_outcome_add) ?>;
	fivf_outcomeadd.lists["x_Miscarriage"].options = <?php echo JsonEncode($ivf_outcome_add->Miscarriage->options(FALSE, TRUE)) ?>;
	fivf_outcomeadd.lists["x_Induced1"] = <?php echo $ivf_outcome_add->Induced1->Lookup->toClientList($ivf_outcome_add) ?>;
	fivf_outcomeadd.lists["x_Induced1"].options = <?php echo JsonEncode($ivf_outcome_add->Induced1->options(FALSE, TRUE)) ?>;
	fivf_outcomeadd.lists["x_Type"] = <?php echo $ivf_outcome_add->Type->Lookup->toClientList($ivf_outcome_add) ?>;
	fivf_outcomeadd.lists["x_Type"].options = <?php echo JsonEncode($ivf_outcome_add->Type->options(FALSE, TRUE)) ?>;
	fivf_outcomeadd.lists["x_FoetalDeath"] = <?php echo $ivf_outcome_add->FoetalDeath->Lookup->toClientList($ivf_outcome_add) ?>;
	fivf_outcomeadd.lists["x_FoetalDeath"].options = <?php echo JsonEncode($ivf_outcome_add->FoetalDeath->options(FALSE, TRUE)) ?>;
	fivf_outcomeadd.lists["x_FerinatalDeath"] = <?php echo $ivf_outcome_add->FerinatalDeath->Lookup->toClientList($ivf_outcome_add) ?>;
	fivf_outcomeadd.lists["x_FerinatalDeath"].options = <?php echo JsonEncode($ivf_outcome_add->FerinatalDeath->options(FALSE, TRUE)) ?>;
	fivf_outcomeadd.lists["x_Ectopic"] = <?php echo $ivf_outcome_add->Ectopic->Lookup->toClientList($ivf_outcome_add) ?>;
	fivf_outcomeadd.lists["x_Ectopic"].options = <?php echo JsonEncode($ivf_outcome_add->Ectopic->options(FALSE, TRUE)) ?>;
	fivf_outcomeadd.lists["x_Extra"] = <?php echo $ivf_outcome_add->Extra->Lookup->toClientList($ivf_outcome_add) ?>;
	fivf_outcomeadd.lists["x_Extra"].options = <?php echo JsonEncode($ivf_outcome_add->Extra->options(FALSE, TRUE)) ?>;
	loadjs.done("fivf_outcomeadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_outcome_add->showPageHeader(); ?>
<?php
$ivf_outcome_add->showMessage();
?>
<form name="fivf_outcomeadd" id="fivf_outcomeadd" class="<?php echo $ivf_outcome_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_outcome">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_outcome_add->IsModal ?>">
<?php if ($ivf_outcome->getCurrentMasterTable() == "ivf_treatment_plan") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ivf_treatment_plan">
<input type="hidden" name="fk_RIDNO" value="<?php echo HtmlEncode($ivf_outcome_add->RIDNO->getSessionValue()) ?>">
<input type="hidden" name="fk_Name" value="<?php echo HtmlEncode($ivf_outcome_add->Name->getSessionValue()) ?>">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($ivf_outcome_add->TidNo->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($ivf_outcome_add->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label id="elh_ivf_outcome_RIDNO" for="x_RIDNO" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_RIDNO" type="text/html"><?php echo $ivf_outcome_add->RIDNO->caption() ?><?php echo $ivf_outcome_add->RIDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->RIDNO->cellAttributes() ?>>
<?php if ($ivf_outcome_add->RIDNO->getSessionValue() != "") { ?>
<script id="tpx_ivf_outcome_RIDNO" type="text/html"><span id="el_ivf_outcome_RIDNO">
<span<?php echo $ivf_outcome_add->RIDNO->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_add->RIDNO->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_RIDNO" name="x_RIDNO" value="<?php echo HtmlEncode($ivf_outcome_add->RIDNO->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_ivf_outcome_RIDNO" type="text/html"><span id="el_ivf_outcome_RIDNO">
<input type="text" data-table="ivf_outcome" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome_add->RIDNO->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_add->RIDNO->EditValue ?>"<?php echo $ivf_outcome_add->RIDNO->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $ivf_outcome_add->RIDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_add->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_ivf_outcome_Name" for="x_Name" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_Name" type="text/html"><?php echo $ivf_outcome_add->Name->caption() ?><?php echo $ivf_outcome_add->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->Name->cellAttributes() ?>>
<?php if ($ivf_outcome_add->Name->getSessionValue() != "") { ?>
<script id="tpx_ivf_outcome_Name" type="text/html"><span id="el_ivf_outcome_Name">
<span<?php echo $ivf_outcome_add->Name->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_add->Name->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_Name" name="x_Name" value="<?php echo HtmlEncode($ivf_outcome_add->Name->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_ivf_outcome_Name" type="text/html"><span id="el_ivf_outcome_Name">
<input type="text" data-table="ivf_outcome" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_add->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_add->Name->EditValue ?>"<?php echo $ivf_outcome_add->Name->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $ivf_outcome_add->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_add->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_ivf_outcome_Age" for="x_Age" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_Age" type="text/html"><?php echo $ivf_outcome_add->Age->caption() ?><?php echo $ivf_outcome_add->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->Age->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Age" type="text/html"><span id="el_ivf_outcome_Age">
<input type="text" data-table="ivf_outcome" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_add->Age->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_add->Age->EditValue ?>"<?php echo $ivf_outcome_add->Age->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_add->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_add->treatment_status->Visible) { // treatment_status ?>
	<div id="r_treatment_status" class="form-group row">
		<label id="elh_ivf_outcome_treatment_status" for="x_treatment_status" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_treatment_status" type="text/html"><?php echo $ivf_outcome_add->treatment_status->caption() ?><?php echo $ivf_outcome_add->treatment_status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->treatment_status->cellAttributes() ?>>
<script id="tpx_ivf_outcome_treatment_status" type="text/html"><span id="el_ivf_outcome_treatment_status">
<input type="text" data-table="ivf_outcome" data-field="x_treatment_status" name="x_treatment_status" id="x_treatment_status" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_add->treatment_status->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_add->treatment_status->EditValue ?>"<?php echo $ivf_outcome_add->treatment_status->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_add->treatment_status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_add->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<div id="r_ARTCYCLE" class="form-group row">
		<label id="elh_ivf_outcome_ARTCYCLE" for="x_ARTCYCLE" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_ARTCYCLE" type="text/html"><?php echo $ivf_outcome_add->ARTCYCLE->caption() ?><?php echo $ivf_outcome_add->ARTCYCLE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->ARTCYCLE->cellAttributes() ?>>
<script id="tpx_ivf_outcome_ARTCYCLE" type="text/html"><span id="el_ivf_outcome_ARTCYCLE">
<input type="text" data-table="ivf_outcome" data-field="x_ARTCYCLE" name="x_ARTCYCLE" id="x_ARTCYCLE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_add->ARTCYCLE->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_add->ARTCYCLE->EditValue ?>"<?php echo $ivf_outcome_add->ARTCYCLE->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_add->ARTCYCLE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_add->RESULT->Visible) { // RESULT ?>
	<div id="r_RESULT" class="form-group row">
		<label id="elh_ivf_outcome_RESULT" for="x_RESULT" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_RESULT" type="text/html"><?php echo $ivf_outcome_add->RESULT->caption() ?><?php echo $ivf_outcome_add->RESULT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->RESULT->cellAttributes() ?>>
<script id="tpx_ivf_outcome_RESULT" type="text/html"><span id="el_ivf_outcome_RESULT">
<input type="text" data-table="ivf_outcome" data-field="x_RESULT" name="x_RESULT" id="x_RESULT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_add->RESULT->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_add->RESULT->EditValue ?>"<?php echo $ivf_outcome_add->RESULT->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_add->RESULT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_add->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_ivf_outcome_status" for="x_status" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_status" type="text/html"><?php echo $ivf_outcome_add->status->caption() ?><?php echo $ivf_outcome_add->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->status->cellAttributes() ?>>
<script id="tpx_ivf_outcome_status" type="text/html"><span id="el_ivf_outcome_status">
<input type="text" data-table="ivf_outcome" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome_add->status->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_add->status->EditValue ?>"<?php echo $ivf_outcome_add->status->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_add->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_add->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label id="elh_ivf_outcome_createdby" for="x_createdby" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_createdby" type="text/html"><?php echo $ivf_outcome_add->createdby->caption() ?><?php echo $ivf_outcome_add->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->createdby->cellAttributes() ?>>
<script id="tpx_ivf_outcome_createdby" type="text/html"><span id="el_ivf_outcome_createdby">
<input type="text" data-table="ivf_outcome" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome_add->createdby->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_add->createdby->EditValue ?>"<?php echo $ivf_outcome_add->createdby->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_add->createdby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_add->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label id="elh_ivf_outcome_createddatetime" for="x_createddatetime" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_createddatetime" type="text/html"><?php echo $ivf_outcome_add->createddatetime->caption() ?><?php echo $ivf_outcome_add->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->createddatetime->cellAttributes() ?>>
<script id="tpx_ivf_outcome_createddatetime" type="text/html"><span id="el_ivf_outcome_createddatetime">
<input type="text" data-table="ivf_outcome" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($ivf_outcome_add->createddatetime->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_add->createddatetime->EditValue ?>"<?php echo $ivf_outcome_add->createddatetime->editAttributes() ?>>
<?php if (!$ivf_outcome_add->createddatetime->ReadOnly && !$ivf_outcome_add->createddatetime->Disabled && !isset($ivf_outcome_add->createddatetime->EditAttrs["readonly"]) && !isset($ivf_outcome_add->createddatetime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_outcomeadd_js">
loadjs.ready(["fivf_outcomeadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_outcomeadd", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $ivf_outcome_add->createddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_add->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label id="elh_ivf_outcome_modifiedby" for="x_modifiedby" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_modifiedby" type="text/html"><?php echo $ivf_outcome_add->modifiedby->caption() ?><?php echo $ivf_outcome_add->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->modifiedby->cellAttributes() ?>>
<script id="tpx_ivf_outcome_modifiedby" type="text/html"><span id="el_ivf_outcome_modifiedby">
<input type="text" data-table="ivf_outcome" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome_add->modifiedby->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_add->modifiedby->EditValue ?>"<?php echo $ivf_outcome_add->modifiedby->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_add->modifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_add->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label id="elh_ivf_outcome_modifieddatetime" for="x_modifieddatetime" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_modifieddatetime" type="text/html"><?php echo $ivf_outcome_add->modifieddatetime->caption() ?><?php echo $ivf_outcome_add->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->modifieddatetime->cellAttributes() ?>>
<script id="tpx_ivf_outcome_modifieddatetime" type="text/html"><span id="el_ivf_outcome_modifieddatetime">
<input type="text" data-table="ivf_outcome" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($ivf_outcome_add->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_add->modifieddatetime->EditValue ?>"<?php echo $ivf_outcome_add->modifieddatetime->editAttributes() ?>>
<?php if (!$ivf_outcome_add->modifieddatetime->ReadOnly && !$ivf_outcome_add->modifieddatetime->Disabled && !isset($ivf_outcome_add->modifieddatetime->EditAttrs["readonly"]) && !isset($ivf_outcome_add->modifieddatetime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_outcomeadd_js">
loadjs.ready(["fivf_outcomeadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_outcomeadd", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $ivf_outcome_add->modifieddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_add->outcomeDate->Visible) { // outcomeDate ?>
	<div id="r_outcomeDate" class="form-group row">
		<label id="elh_ivf_outcome_outcomeDate" for="x_outcomeDate" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_outcomeDate" type="text/html"><?php echo $ivf_outcome_add->outcomeDate->caption() ?><?php echo $ivf_outcome_add->outcomeDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->outcomeDate->cellAttributes() ?>>
<script id="tpx_ivf_outcome_outcomeDate" type="text/html"><span id="el_ivf_outcome_outcomeDate">
<input type="text" data-table="ivf_outcome" data-field="x_outcomeDate" name="x_outcomeDate" id="x_outcomeDate" placeholder="<?php echo HtmlEncode($ivf_outcome_add->outcomeDate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_add->outcomeDate->EditValue ?>"<?php echo $ivf_outcome_add->outcomeDate->editAttributes() ?>>
<?php if (!$ivf_outcome_add->outcomeDate->ReadOnly && !$ivf_outcome_add->outcomeDate->Disabled && !isset($ivf_outcome_add->outcomeDate->EditAttrs["readonly"]) && !isset($ivf_outcome_add->outcomeDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_outcomeadd_js">
loadjs.ready(["fivf_outcomeadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_outcomeadd", "x_outcomeDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $ivf_outcome_add->outcomeDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_add->outcomeDay->Visible) { // outcomeDay ?>
	<div id="r_outcomeDay" class="form-group row">
		<label id="elh_ivf_outcome_outcomeDay" for="x_outcomeDay" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_outcomeDay" type="text/html"><?php echo $ivf_outcome_add->outcomeDay->caption() ?><?php echo $ivf_outcome_add->outcomeDay->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->outcomeDay->cellAttributes() ?>>
<script id="tpx_ivf_outcome_outcomeDay" type="text/html"><span id="el_ivf_outcome_outcomeDay">
<input type="text" data-table="ivf_outcome" data-field="x_outcomeDay" name="x_outcomeDay" id="x_outcomeDay" placeholder="<?php echo HtmlEncode($ivf_outcome_add->outcomeDay->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_add->outcomeDay->EditValue ?>"<?php echo $ivf_outcome_add->outcomeDay->editAttributes() ?>>
<?php if (!$ivf_outcome_add->outcomeDay->ReadOnly && !$ivf_outcome_add->outcomeDay->Disabled && !isset($ivf_outcome_add->outcomeDay->EditAttrs["readonly"]) && !isset($ivf_outcome_add->outcomeDay->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_outcomeadd_js">
loadjs.ready(["fivf_outcomeadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_outcomeadd", "x_outcomeDay", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $ivf_outcome_add->outcomeDay->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_add->OPResult->Visible) { // OPResult ?>
	<div id="r_OPResult" class="form-group row">
		<label id="elh_ivf_outcome_OPResult" for="x_OPResult" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_OPResult" type="text/html"><?php echo $ivf_outcome_add->OPResult->caption() ?><?php echo $ivf_outcome_add->OPResult->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->OPResult->cellAttributes() ?>>
<script id="tpx_ivf_outcome_OPResult" type="text/html"><span id="el_ivf_outcome_OPResult">
<input type="text" data-table="ivf_outcome" data-field="x_OPResult" name="x_OPResult" id="x_OPResult" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_add->OPResult->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_add->OPResult->EditValue ?>"<?php echo $ivf_outcome_add->OPResult->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_add->OPResult->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_add->Gestation->Visible) { // Gestation ?>
	<div id="r_Gestation" class="form-group row">
		<label id="elh_ivf_outcome_Gestation" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_Gestation" type="text/html"><?php echo $ivf_outcome_add->Gestation->caption() ?><?php echo $ivf_outcome_add->Gestation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->Gestation->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Gestation" type="text/html"><span id="el_ivf_outcome_Gestation">
<div id="tp_x_Gestation" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Gestation" data-value-separator="<?php echo $ivf_outcome_add->Gestation->displayValueSeparatorAttribute() ?>" name="x_Gestation" id="x_Gestation" value="{value}"<?php echo $ivf_outcome_add->Gestation->editAttributes() ?>></div>
<div id="dsl_x_Gestation" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome_add->Gestation->radioButtonListHtml(FALSE, "x_Gestation") ?>
</div></div>
</span></script>
<?php echo $ivf_outcome_add->Gestation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_add->TransferdEmbryos->Visible) { // TransferdEmbryos ?>
	<div id="r_TransferdEmbryos" class="form-group row">
		<label id="elh_ivf_outcome_TransferdEmbryos" for="x_TransferdEmbryos" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_TransferdEmbryos" type="text/html"><?php echo $ivf_outcome_add->TransferdEmbryos->caption() ?><?php echo $ivf_outcome_add->TransferdEmbryos->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->TransferdEmbryos->cellAttributes() ?>>
<script id="tpx_ivf_outcome_TransferdEmbryos" type="text/html"><span id="el_ivf_outcome_TransferdEmbryos">
<input type="text" data-table="ivf_outcome" data-field="x_TransferdEmbryos" name="x_TransferdEmbryos" id="x_TransferdEmbryos" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_add->TransferdEmbryos->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_add->TransferdEmbryos->EditValue ?>"<?php echo $ivf_outcome_add->TransferdEmbryos->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_add->TransferdEmbryos->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_add->InitalOfSacs->Visible) { // InitalOfSacs ?>
	<div id="r_InitalOfSacs" class="form-group row">
		<label id="elh_ivf_outcome_InitalOfSacs" for="x_InitalOfSacs" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_InitalOfSacs" type="text/html"><?php echo $ivf_outcome_add->InitalOfSacs->caption() ?><?php echo $ivf_outcome_add->InitalOfSacs->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->InitalOfSacs->cellAttributes() ?>>
<script id="tpx_ivf_outcome_InitalOfSacs" type="text/html"><span id="el_ivf_outcome_InitalOfSacs">
<input type="text" data-table="ivf_outcome" data-field="x_InitalOfSacs" name="x_InitalOfSacs" id="x_InitalOfSacs" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_add->InitalOfSacs->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_add->InitalOfSacs->EditValue ?>"<?php echo $ivf_outcome_add->InitalOfSacs->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_add->InitalOfSacs->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_add->ImplimentationRate->Visible) { // ImplimentationRate ?>
	<div id="r_ImplimentationRate" class="form-group row">
		<label id="elh_ivf_outcome_ImplimentationRate" for="x_ImplimentationRate" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_ImplimentationRate" type="text/html"><?php echo $ivf_outcome_add->ImplimentationRate->caption() ?><?php echo $ivf_outcome_add->ImplimentationRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->ImplimentationRate->cellAttributes() ?>>
<script id="tpx_ivf_outcome_ImplimentationRate" type="text/html"><span id="el_ivf_outcome_ImplimentationRate">
<input type="text" data-table="ivf_outcome" data-field="x_ImplimentationRate" name="x_ImplimentationRate" id="x_ImplimentationRate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_add->ImplimentationRate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_add->ImplimentationRate->EditValue ?>"<?php echo $ivf_outcome_add->ImplimentationRate->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_add->ImplimentationRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_add->EmbryoNo->Visible) { // EmbryoNo ?>
	<div id="r_EmbryoNo" class="form-group row">
		<label id="elh_ivf_outcome_EmbryoNo" for="x_EmbryoNo" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_EmbryoNo" type="text/html"><?php echo $ivf_outcome_add->EmbryoNo->caption() ?><?php echo $ivf_outcome_add->EmbryoNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->EmbryoNo->cellAttributes() ?>>
<script id="tpx_ivf_outcome_EmbryoNo" type="text/html"><span id="el_ivf_outcome_EmbryoNo">
<input type="text" data-table="ivf_outcome" data-field="x_EmbryoNo" name="x_EmbryoNo" id="x_EmbryoNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_add->EmbryoNo->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_add->EmbryoNo->EditValue ?>"<?php echo $ivf_outcome_add->EmbryoNo->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_add->EmbryoNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_add->ExtrauterineSac->Visible) { // ExtrauterineSac ?>
	<div id="r_ExtrauterineSac" class="form-group row">
		<label id="elh_ivf_outcome_ExtrauterineSac" for="x_ExtrauterineSac" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_ExtrauterineSac" type="text/html"><?php echo $ivf_outcome_add->ExtrauterineSac->caption() ?><?php echo $ivf_outcome_add->ExtrauterineSac->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->ExtrauterineSac->cellAttributes() ?>>
<script id="tpx_ivf_outcome_ExtrauterineSac" type="text/html"><span id="el_ivf_outcome_ExtrauterineSac">
<input type="text" data-table="ivf_outcome" data-field="x_ExtrauterineSac" name="x_ExtrauterineSac" id="x_ExtrauterineSac" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_add->ExtrauterineSac->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_add->ExtrauterineSac->EditValue ?>"<?php echo $ivf_outcome_add->ExtrauterineSac->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_add->ExtrauterineSac->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_add->PregnancyMonozygotic->Visible) { // PregnancyMonozygotic ?>
	<div id="r_PregnancyMonozygotic" class="form-group row">
		<label id="elh_ivf_outcome_PregnancyMonozygotic" for="x_PregnancyMonozygotic" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_PregnancyMonozygotic" type="text/html"><?php echo $ivf_outcome_add->PregnancyMonozygotic->caption() ?><?php echo $ivf_outcome_add->PregnancyMonozygotic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->PregnancyMonozygotic->cellAttributes() ?>>
<script id="tpx_ivf_outcome_PregnancyMonozygotic" type="text/html"><span id="el_ivf_outcome_PregnancyMonozygotic">
<input type="text" data-table="ivf_outcome" data-field="x_PregnancyMonozygotic" name="x_PregnancyMonozygotic" id="x_PregnancyMonozygotic" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_add->PregnancyMonozygotic->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_add->PregnancyMonozygotic->EditValue ?>"<?php echo $ivf_outcome_add->PregnancyMonozygotic->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_add->PregnancyMonozygotic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_add->TypeGestation->Visible) { // TypeGestation ?>
	<div id="r_TypeGestation" class="form-group row">
		<label id="elh_ivf_outcome_TypeGestation" for="x_TypeGestation" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_TypeGestation" type="text/html"><?php echo $ivf_outcome_add->TypeGestation->caption() ?><?php echo $ivf_outcome_add->TypeGestation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->TypeGestation->cellAttributes() ?>>
<script id="tpx_ivf_outcome_TypeGestation" type="text/html"><span id="el_ivf_outcome_TypeGestation">
<input type="text" data-table="ivf_outcome" data-field="x_TypeGestation" name="x_TypeGestation" id="x_TypeGestation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_add->TypeGestation->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_add->TypeGestation->EditValue ?>"<?php echo $ivf_outcome_add->TypeGestation->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_add->TypeGestation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_add->Urine->Visible) { // Urine ?>
	<div id="r_Urine" class="form-group row">
		<label id="elh_ivf_outcome_Urine" for="x_Urine" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_Urine" type="text/html"><?php echo $ivf_outcome_add->Urine->caption() ?><?php echo $ivf_outcome_add->Urine->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->Urine->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Urine" type="text/html"><span id="el_ivf_outcome_Urine">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_outcome" data-field="x_Urine" data-value-separator="<?php echo $ivf_outcome_add->Urine->displayValueSeparatorAttribute() ?>" id="x_Urine" name="x_Urine"<?php echo $ivf_outcome_add->Urine->editAttributes() ?>>
			<?php echo $ivf_outcome_add->Urine->selectOptionListHtml("x_Urine") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_outcome_add->Urine->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_add->PTdate->Visible) { // PTdate ?>
	<div id="r_PTdate" class="form-group row">
		<label id="elh_ivf_outcome_PTdate" for="x_PTdate" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_PTdate" type="text/html"><?php echo $ivf_outcome_add->PTdate->caption() ?><?php echo $ivf_outcome_add->PTdate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->PTdate->cellAttributes() ?>>
<script id="tpx_ivf_outcome_PTdate" type="text/html"><span id="el_ivf_outcome_PTdate">
<input type="text" data-table="ivf_outcome" data-field="x_PTdate" name="x_PTdate" id="x_PTdate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_add->PTdate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_add->PTdate->EditValue ?>"<?php echo $ivf_outcome_add->PTdate->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_add->PTdate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_add->Reduced->Visible) { // Reduced ?>
	<div id="r_Reduced" class="form-group row">
		<label id="elh_ivf_outcome_Reduced" for="x_Reduced" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_Reduced" type="text/html"><?php echo $ivf_outcome_add->Reduced->caption() ?><?php echo $ivf_outcome_add->Reduced->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->Reduced->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Reduced" type="text/html"><span id="el_ivf_outcome_Reduced">
<input type="text" data-table="ivf_outcome" data-field="x_Reduced" name="x_Reduced" id="x_Reduced" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_add->Reduced->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_add->Reduced->EditValue ?>"<?php echo $ivf_outcome_add->Reduced->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_add->Reduced->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_add->INduced->Visible) { // INduced ?>
	<div id="r_INduced" class="form-group row">
		<label id="elh_ivf_outcome_INduced" for="x_INduced" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_INduced" type="text/html"><?php echo $ivf_outcome_add->INduced->caption() ?><?php echo $ivf_outcome_add->INduced->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->INduced->cellAttributes() ?>>
<script id="tpx_ivf_outcome_INduced" type="text/html"><span id="el_ivf_outcome_INduced">
<input type="text" data-table="ivf_outcome" data-field="x_INduced" name="x_INduced" id="x_INduced" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_add->INduced->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_add->INduced->EditValue ?>"<?php echo $ivf_outcome_add->INduced->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_add->INduced->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_add->INducedDate->Visible) { // INducedDate ?>
	<div id="r_INducedDate" class="form-group row">
		<label id="elh_ivf_outcome_INducedDate" for="x_INducedDate" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_INducedDate" type="text/html"><?php echo $ivf_outcome_add->INducedDate->caption() ?><?php echo $ivf_outcome_add->INducedDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->INducedDate->cellAttributes() ?>>
<script id="tpx_ivf_outcome_INducedDate" type="text/html"><span id="el_ivf_outcome_INducedDate">
<input type="text" data-table="ivf_outcome" data-field="x_INducedDate" name="x_INducedDate" id="x_INducedDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_add->INducedDate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_add->INducedDate->EditValue ?>"<?php echo $ivf_outcome_add->INducedDate->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_add->INducedDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_add->Miscarriage->Visible) { // Miscarriage ?>
	<div id="r_Miscarriage" class="form-group row">
		<label id="elh_ivf_outcome_Miscarriage" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_Miscarriage" type="text/html"><?php echo $ivf_outcome_add->Miscarriage->caption() ?><?php echo $ivf_outcome_add->Miscarriage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->Miscarriage->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Miscarriage" type="text/html"><span id="el_ivf_outcome_Miscarriage">
<div id="tp_x_Miscarriage" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Miscarriage" data-value-separator="<?php echo $ivf_outcome_add->Miscarriage->displayValueSeparatorAttribute() ?>" name="x_Miscarriage" id="x_Miscarriage" value="{value}"<?php echo $ivf_outcome_add->Miscarriage->editAttributes() ?>></div>
<div id="dsl_x_Miscarriage" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome_add->Miscarriage->radioButtonListHtml(FALSE, "x_Miscarriage") ?>
</div></div>
</span></script>
<?php echo $ivf_outcome_add->Miscarriage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_add->Induced1->Visible) { // Induced1 ?>
	<div id="r_Induced1" class="form-group row">
		<label id="elh_ivf_outcome_Induced1" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_Induced1" type="text/html"><?php echo $ivf_outcome_add->Induced1->caption() ?><?php echo $ivf_outcome_add->Induced1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->Induced1->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Induced1" type="text/html"><span id="el_ivf_outcome_Induced1">
<div id="tp_x_Induced1" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Induced1" data-value-separator="<?php echo $ivf_outcome_add->Induced1->displayValueSeparatorAttribute() ?>" name="x_Induced1" id="x_Induced1" value="{value}"<?php echo $ivf_outcome_add->Induced1->editAttributes() ?>></div>
<div id="dsl_x_Induced1" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome_add->Induced1->radioButtonListHtml(FALSE, "x_Induced1") ?>
</div></div>
</span></script>
<?php echo $ivf_outcome_add->Induced1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_add->Type->Visible) { // Type ?>
	<div id="r_Type" class="form-group row">
		<label id="elh_ivf_outcome_Type" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_Type" type="text/html"><?php echo $ivf_outcome_add->Type->caption() ?><?php echo $ivf_outcome_add->Type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->Type->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Type" type="text/html"><span id="el_ivf_outcome_Type">
<div id="tp_x_Type" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Type" data-value-separator="<?php echo $ivf_outcome_add->Type->displayValueSeparatorAttribute() ?>" name="x_Type" id="x_Type" value="{value}"<?php echo $ivf_outcome_add->Type->editAttributes() ?>></div>
<div id="dsl_x_Type" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome_add->Type->radioButtonListHtml(FALSE, "x_Type") ?>
</div></div>
</span></script>
<?php echo $ivf_outcome_add->Type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_add->IfClinical->Visible) { // IfClinical ?>
	<div id="r_IfClinical" class="form-group row">
		<label id="elh_ivf_outcome_IfClinical" for="x_IfClinical" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_IfClinical" type="text/html"><?php echo $ivf_outcome_add->IfClinical->caption() ?><?php echo $ivf_outcome_add->IfClinical->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->IfClinical->cellAttributes() ?>>
<script id="tpx_ivf_outcome_IfClinical" type="text/html"><span id="el_ivf_outcome_IfClinical">
<input type="text" data-table="ivf_outcome" data-field="x_IfClinical" name="x_IfClinical" id="x_IfClinical" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_add->IfClinical->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_add->IfClinical->EditValue ?>"<?php echo $ivf_outcome_add->IfClinical->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_add->IfClinical->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_add->GADate->Visible) { // GADate ?>
	<div id="r_GADate" class="form-group row">
		<label id="elh_ivf_outcome_GADate" for="x_GADate" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_GADate" type="text/html"><?php echo $ivf_outcome_add->GADate->caption() ?><?php echo $ivf_outcome_add->GADate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->GADate->cellAttributes() ?>>
<script id="tpx_ivf_outcome_GADate" type="text/html"><span id="el_ivf_outcome_GADate">
<input type="text" data-table="ivf_outcome" data-field="x_GADate" name="x_GADate" id="x_GADate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_add->GADate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_add->GADate->EditValue ?>"<?php echo $ivf_outcome_add->GADate->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_add->GADate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_add->GA->Visible) { // GA ?>
	<div id="r_GA" class="form-group row">
		<label id="elh_ivf_outcome_GA" for="x_GA" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_GA" type="text/html"><?php echo $ivf_outcome_add->GA->caption() ?><?php echo $ivf_outcome_add->GA->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->GA->cellAttributes() ?>>
<script id="tpx_ivf_outcome_GA" type="text/html"><span id="el_ivf_outcome_GA">
<input type="text" data-table="ivf_outcome" data-field="x_GA" name="x_GA" id="x_GA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome_add->GA->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_add->GA->EditValue ?>"<?php echo $ivf_outcome_add->GA->editAttributes() ?>>
</span></script>
<?php echo $ivf_outcome_add->GA->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_add->FoetalDeath->Visible) { // FoetalDeath ?>
	<div id="r_FoetalDeath" class="form-group row">
		<label id="elh_ivf_outcome_FoetalDeath" for="x_FoetalDeath" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_FoetalDeath" type="text/html"><?php echo $ivf_outcome_add->FoetalDeath->caption() ?><?php echo $ivf_outcome_add->FoetalDeath->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->FoetalDeath->cellAttributes() ?>>
<script id="tpx_ivf_outcome_FoetalDeath" type="text/html"><span id="el_ivf_outcome_FoetalDeath">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_outcome" data-field="x_FoetalDeath" data-value-separator="<?php echo $ivf_outcome_add->FoetalDeath->displayValueSeparatorAttribute() ?>" id="x_FoetalDeath" name="x_FoetalDeath"<?php echo $ivf_outcome_add->FoetalDeath->editAttributes() ?>>
			<?php echo $ivf_outcome_add->FoetalDeath->selectOptionListHtml("x_FoetalDeath") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_outcome_add->FoetalDeath->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_add->FerinatalDeath->Visible) { // FerinatalDeath ?>
	<div id="r_FerinatalDeath" class="form-group row">
		<label id="elh_ivf_outcome_FerinatalDeath" for="x_FerinatalDeath" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_FerinatalDeath" type="text/html"><?php echo $ivf_outcome_add->FerinatalDeath->caption() ?><?php echo $ivf_outcome_add->FerinatalDeath->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->FerinatalDeath->cellAttributes() ?>>
<script id="tpx_ivf_outcome_FerinatalDeath" type="text/html"><span id="el_ivf_outcome_FerinatalDeath">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_outcome" data-field="x_FerinatalDeath" data-value-separator="<?php echo $ivf_outcome_add->FerinatalDeath->displayValueSeparatorAttribute() ?>" id="x_FerinatalDeath" name="x_FerinatalDeath"<?php echo $ivf_outcome_add->FerinatalDeath->editAttributes() ?>>
			<?php echo $ivf_outcome_add->FerinatalDeath->selectOptionListHtml("x_FerinatalDeath") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_outcome_add->FerinatalDeath->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_add->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_ivf_outcome_TidNo" for="x_TidNo" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_TidNo" type="text/html"><?php echo $ivf_outcome_add->TidNo->caption() ?><?php echo $ivf_outcome_add->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->TidNo->cellAttributes() ?>>
<?php if ($ivf_outcome_add->TidNo->getSessionValue() != "") { ?>
<script id="tpx_ivf_outcome_TidNo" type="text/html"><span id="el_ivf_outcome_TidNo">
<span<?php echo $ivf_outcome_add->TidNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_outcome_add->TidNo->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_TidNo" name="x_TidNo" value="<?php echo HtmlEncode($ivf_outcome_add->TidNo->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_ivf_outcome_TidNo" type="text/html"><span id="el_ivf_outcome_TidNo">
<input type="text" data-table="ivf_outcome" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome_add->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome_add->TidNo->EditValue ?>"<?php echo $ivf_outcome_add->TidNo->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $ivf_outcome_add->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_add->Ectopic->Visible) { // Ectopic ?>
	<div id="r_Ectopic" class="form-group row">
		<label id="elh_ivf_outcome_Ectopic" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_Ectopic" type="text/html"><?php echo $ivf_outcome_add->Ectopic->caption() ?><?php echo $ivf_outcome_add->Ectopic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->Ectopic->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Ectopic" type="text/html"><span id="el_ivf_outcome_Ectopic">
<div id="tp_x_Ectopic" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Ectopic" data-value-separator="<?php echo $ivf_outcome_add->Ectopic->displayValueSeparatorAttribute() ?>" name="x_Ectopic" id="x_Ectopic" value="{value}"<?php echo $ivf_outcome_add->Ectopic->editAttributes() ?>></div>
<div id="dsl_x_Ectopic" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome_add->Ectopic->radioButtonListHtml(FALSE, "x_Ectopic") ?>
</div></div>
</span></script>
<?php echo $ivf_outcome_add->Ectopic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome_add->Extra->Visible) { // Extra ?>
	<div id="r_Extra" class="form-group row">
		<label id="elh_ivf_outcome_Extra" class="<?php echo $ivf_outcome_add->LeftColumnClass ?>"><script id="tpc_ivf_outcome_Extra" type="text/html"><?php echo $ivf_outcome_add->Extra->caption() ?><?php echo $ivf_outcome_add->Extra->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_outcome_add->RightColumnClass ?>"><div <?php echo $ivf_outcome_add->Extra->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Extra" type="text/html"><span id="el_ivf_outcome_Extra">
<div id="tp_x_Extra" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Extra" data-value-separator="<?php echo $ivf_outcome_add->Extra->displayValueSeparatorAttribute() ?>" name="x_Extra" id="x_Extra" value="{value}"<?php echo $ivf_outcome_add->Extra->editAttributes() ?>></div>
<div id="dsl_x_Extra" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome_add->Extra->radioButtonListHtml(FALSE, "x_Extra") ?>
</div></div>
</span></script>
<?php echo $ivf_outcome_add->Extra->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_ivf_outcomeadd" class="ew-custom-template"></div>
<script id="tpm_ivf_outcomeadd" type="text/html">
<div id="ct_ivf_outcome_add"><style>
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

<?php if (!$ivf_outcome_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ivf_outcome_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_outcome_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($ivf_outcome->Rows) ?> };
	ew.applyTemplate("tpd_ivf_outcomeadd", "tpm_ivf_outcomeadd", "ivf_outcomeadd", "<?php echo $ivf_outcome->CustomExport ?>", ew.templateData.rows[0]);
	$("script.ivf_outcomeadd_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$ivf_outcome_add->showPageFooter();
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
$ivf_outcome_add->terminate();
?>