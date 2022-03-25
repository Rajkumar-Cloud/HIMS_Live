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
$ivf_vitrification_add = new ivf_vitrification_add();

// Run the page
$ivf_vitrification_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_vitrification_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fivf_vitrificationadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fivf_vitrificationadd = currentForm = new ew.Form("fivf_vitrificationadd", "add");

	// Validate form
	fivf_vitrificationadd.validate = function() {
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
			<?php if ($ivf_vitrification_add->RIDNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_add->RIDNo->caption(), $ivf_vitrification_add->RIDNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_vitrification_add->RIDNo->errorMessage()) ?>");
			<?php if ($ivf_vitrification_add->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_add->PatientName->caption(), $ivf_vitrification_add->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitrification_add->TiDNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TiDNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_add->TiDNo->caption(), $ivf_vitrification_add->TiDNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TiDNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_vitrification_add->TiDNo->errorMessage()) ?>");
			<?php if ($ivf_vitrification_add->vitrificationDate->Required) { ?>
				elm = this.getElements("x" + infix + "_vitrificationDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_add->vitrificationDate->caption(), $ivf_vitrification_add->vitrificationDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_vitrificationDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_vitrification_add->vitrificationDate->errorMessage()) ?>");
			<?php if ($ivf_vitrification_add->PrimaryEmbryologist->Required) { ?>
				elm = this.getElements("x" + infix + "_PrimaryEmbryologist");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_add->PrimaryEmbryologist->caption(), $ivf_vitrification_add->PrimaryEmbryologist->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitrification_add->SecondaryEmbryologist->Required) { ?>
				elm = this.getElements("x" + infix + "_SecondaryEmbryologist");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_add->SecondaryEmbryologist->caption(), $ivf_vitrification_add->SecondaryEmbryologist->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitrification_add->EmbryoNo->Required) { ?>
				elm = this.getElements("x" + infix + "_EmbryoNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_add->EmbryoNo->caption(), $ivf_vitrification_add->EmbryoNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitrification_add->FertilisationDate->Required) { ?>
				elm = this.getElements("x" + infix + "_FertilisationDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_add->FertilisationDate->caption(), $ivf_vitrification_add->FertilisationDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_FertilisationDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_vitrification_add->FertilisationDate->errorMessage()) ?>");
			<?php if ($ivf_vitrification_add->Day->Required) { ?>
				elm = this.getElements("x" + infix + "_Day");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_add->Day->caption(), $ivf_vitrification_add->Day->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitrification_add->Grade->Required) { ?>
				elm = this.getElements("x" + infix + "_Grade");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_add->Grade->caption(), $ivf_vitrification_add->Grade->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitrification_add->Incubator->Required) { ?>
				elm = this.getElements("x" + infix + "_Incubator");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_add->Incubator->caption(), $ivf_vitrification_add->Incubator->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitrification_add->Tank->Required) { ?>
				elm = this.getElements("x" + infix + "_Tank");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_add->Tank->caption(), $ivf_vitrification_add->Tank->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitrification_add->Canister->Required) { ?>
				elm = this.getElements("x" + infix + "_Canister");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_add->Canister->caption(), $ivf_vitrification_add->Canister->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitrification_add->Gobiet->Required) { ?>
				elm = this.getElements("x" + infix + "_Gobiet");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_add->Gobiet->caption(), $ivf_vitrification_add->Gobiet->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitrification_add->CryolockNo->Required) { ?>
				elm = this.getElements("x" + infix + "_CryolockNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_add->CryolockNo->caption(), $ivf_vitrification_add->CryolockNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitrification_add->CryolockColour->Required) { ?>
				elm = this.getElements("x" + infix + "_CryolockColour");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_add->CryolockColour->caption(), $ivf_vitrification_add->CryolockColour->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitrification_add->Stage->Required) { ?>
				elm = this.getElements("x" + infix + "_Stage");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_add->Stage->caption(), $ivf_vitrification_add->Stage->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitrification_add->thawDate->Required) { ?>
				elm = this.getElements("x" + infix + "_thawDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_add->thawDate->caption(), $ivf_vitrification_add->thawDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_thawDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_vitrification_add->thawDate->errorMessage()) ?>");
			<?php if ($ivf_vitrification_add->thawPrimaryEmbryologist->Required) { ?>
				elm = this.getElements("x" + infix + "_thawPrimaryEmbryologist");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_add->thawPrimaryEmbryologist->caption(), $ivf_vitrification_add->thawPrimaryEmbryologist->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitrification_add->thawSecondaryEmbryologist->Required) { ?>
				elm = this.getElements("x" + infix + "_thawSecondaryEmbryologist");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_add->thawSecondaryEmbryologist->caption(), $ivf_vitrification_add->thawSecondaryEmbryologist->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitrification_add->thawET->Required) { ?>
				elm = this.getElements("x" + infix + "_thawET");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_add->thawET->caption(), $ivf_vitrification_add->thawET->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitrification_add->thawReFrozen->Required) { ?>
				elm = this.getElements("x" + infix + "_thawReFrozen");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_add->thawReFrozen->caption(), $ivf_vitrification_add->thawReFrozen->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitrification_add->thawAbserve->Required) { ?>
				elm = this.getElements("x" + infix + "_thawAbserve");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_add->thawAbserve->caption(), $ivf_vitrification_add->thawAbserve->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitrification_add->thawDiscard->Required) { ?>
				elm = this.getElements("x" + infix + "_thawDiscard");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_add->thawDiscard->caption(), $ivf_vitrification_add->thawDiscard->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitrification_add->Catheter->Required) { ?>
				elm = this.getElements("x" + infix + "_Catheter");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_add->Catheter->caption(), $ivf_vitrification_add->Catheter->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitrification_add->Difficulty->Required) { ?>
				elm = this.getElements("x" + infix + "_Difficulty");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_add->Difficulty->caption(), $ivf_vitrification_add->Difficulty->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitrification_add->Easy->Required) { ?>
				elm = this.getElements("x" + infix + "_Easy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_add->Easy->caption(), $ivf_vitrification_add->Easy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitrification_add->Comments->Required) { ?>
				elm = this.getElements("x" + infix + "_Comments");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_add->Comments->caption(), $ivf_vitrification_add->Comments->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitrification_add->Doctor->Required) { ?>
				elm = this.getElements("x" + infix + "_Doctor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_add->Doctor->caption(), $ivf_vitrification_add->Doctor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitrification_add->Embryologist->Required) { ?>
				elm = this.getElements("x" + infix + "_Embryologist");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_add->Embryologist->caption(), $ivf_vitrification_add->Embryologist->RequiredErrorMessage)) ?>");
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
	fivf_vitrificationadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivf_vitrificationadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fivf_vitrificationadd.lists["x_Day"] = <?php echo $ivf_vitrification_add->Day->Lookup->toClientList($ivf_vitrification_add) ?>;
	fivf_vitrificationadd.lists["x_Day"].options = <?php echo JsonEncode($ivf_vitrification_add->Day->options(FALSE, TRUE)) ?>;
	fivf_vitrificationadd.lists["x_Grade"] = <?php echo $ivf_vitrification_add->Grade->Lookup->toClientList($ivf_vitrification_add) ?>;
	fivf_vitrificationadd.lists["x_Grade"].options = <?php echo JsonEncode($ivf_vitrification_add->Grade->options(FALSE, TRUE)) ?>;
	loadjs.done("fivf_vitrificationadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_vitrification_add->showPageHeader(); ?>
<?php
$ivf_vitrification_add->showMessage();
?>
<form name="fivf_vitrificationadd" id="fivf_vitrificationadd" class="<?php echo $ivf_vitrification_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_vitrification">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_vitrification_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($ivf_vitrification_add->RIDNo->Visible) { // RIDNo ?>
	<div id="r_RIDNo" class="form-group row">
		<label id="elh_ivf_vitrification_RIDNo" for="x_RIDNo" class="<?php echo $ivf_vitrification_add->LeftColumnClass ?>"><?php echo $ivf_vitrification_add->RIDNo->caption() ?><?php echo $ivf_vitrification_add->RIDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_add->RightColumnClass ?>"><div <?php echo $ivf_vitrification_add->RIDNo->cellAttributes() ?>>
<span id="el_ivf_vitrification_RIDNo">
<input type="text" data-table="ivf_vitrification" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_vitrification_add->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_add->RIDNo->EditValue ?>"<?php echo $ivf_vitrification_add->RIDNo->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification_add->RIDNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification_add->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_ivf_vitrification_PatientName" for="x_PatientName" class="<?php echo $ivf_vitrification_add->LeftColumnClass ?>"><?php echo $ivf_vitrification_add->PatientName->caption() ?><?php echo $ivf_vitrification_add->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_add->RightColumnClass ?>"><div <?php echo $ivf_vitrification_add->PatientName->cellAttributes() ?>>
<span id="el_ivf_vitrification_PatientName">
<input type="text" data-table="ivf_vitrification" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_add->PatientName->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_add->PatientName->EditValue ?>"<?php echo $ivf_vitrification_add->PatientName->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification_add->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification_add->TiDNo->Visible) { // TiDNo ?>
	<div id="r_TiDNo" class="form-group row">
		<label id="elh_ivf_vitrification_TiDNo" for="x_TiDNo" class="<?php echo $ivf_vitrification_add->LeftColumnClass ?>"><?php echo $ivf_vitrification_add->TiDNo->caption() ?><?php echo $ivf_vitrification_add->TiDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_add->RightColumnClass ?>"><div <?php echo $ivf_vitrification_add->TiDNo->cellAttributes() ?>>
<span id="el_ivf_vitrification_TiDNo">
<input type="text" data-table="ivf_vitrification" data-field="x_TiDNo" name="x_TiDNo" id="x_TiDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_vitrification_add->TiDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_add->TiDNo->EditValue ?>"<?php echo $ivf_vitrification_add->TiDNo->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification_add->TiDNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification_add->vitrificationDate->Visible) { // vitrificationDate ?>
	<div id="r_vitrificationDate" class="form-group row">
		<label id="elh_ivf_vitrification_vitrificationDate" for="x_vitrificationDate" class="<?php echo $ivf_vitrification_add->LeftColumnClass ?>"><?php echo $ivf_vitrification_add->vitrificationDate->caption() ?><?php echo $ivf_vitrification_add->vitrificationDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_add->RightColumnClass ?>"><div <?php echo $ivf_vitrification_add->vitrificationDate->cellAttributes() ?>>
<span id="el_ivf_vitrification_vitrificationDate">
<input type="text" data-table="ivf_vitrification" data-field="x_vitrificationDate" name="x_vitrificationDate" id="x_vitrificationDate" placeholder="<?php echo HtmlEncode($ivf_vitrification_add->vitrificationDate->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_add->vitrificationDate->EditValue ?>"<?php echo $ivf_vitrification_add->vitrificationDate->editAttributes() ?>>
<?php if (!$ivf_vitrification_add->vitrificationDate->ReadOnly && !$ivf_vitrification_add->vitrificationDate->Disabled && !isset($ivf_vitrification_add->vitrificationDate->EditAttrs["readonly"]) && !isset($ivf_vitrification_add->vitrificationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_vitrificationadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_vitrificationadd", "x_vitrificationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $ivf_vitrification_add->vitrificationDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification_add->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
	<div id="r_PrimaryEmbryologist" class="form-group row">
		<label id="elh_ivf_vitrification_PrimaryEmbryologist" for="x_PrimaryEmbryologist" class="<?php echo $ivf_vitrification_add->LeftColumnClass ?>"><?php echo $ivf_vitrification_add->PrimaryEmbryologist->caption() ?><?php echo $ivf_vitrification_add->PrimaryEmbryologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_add->RightColumnClass ?>"><div <?php echo $ivf_vitrification_add->PrimaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_vitrification_PrimaryEmbryologist">
<input type="text" data-table="ivf_vitrification" data-field="x_PrimaryEmbryologist" name="x_PrimaryEmbryologist" id="x_PrimaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_add->PrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_add->PrimaryEmbryologist->EditValue ?>"<?php echo $ivf_vitrification_add->PrimaryEmbryologist->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification_add->PrimaryEmbryologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification_add->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
	<div id="r_SecondaryEmbryologist" class="form-group row">
		<label id="elh_ivf_vitrification_SecondaryEmbryologist" for="x_SecondaryEmbryologist" class="<?php echo $ivf_vitrification_add->LeftColumnClass ?>"><?php echo $ivf_vitrification_add->SecondaryEmbryologist->caption() ?><?php echo $ivf_vitrification_add->SecondaryEmbryologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_add->RightColumnClass ?>"><div <?php echo $ivf_vitrification_add->SecondaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_vitrification_SecondaryEmbryologist">
<input type="text" data-table="ivf_vitrification" data-field="x_SecondaryEmbryologist" name="x_SecondaryEmbryologist" id="x_SecondaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_add->SecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_add->SecondaryEmbryologist->EditValue ?>"<?php echo $ivf_vitrification_add->SecondaryEmbryologist->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification_add->SecondaryEmbryologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification_add->EmbryoNo->Visible) { // EmbryoNo ?>
	<div id="r_EmbryoNo" class="form-group row">
		<label id="elh_ivf_vitrification_EmbryoNo" for="x_EmbryoNo" class="<?php echo $ivf_vitrification_add->LeftColumnClass ?>"><?php echo $ivf_vitrification_add->EmbryoNo->caption() ?><?php echo $ivf_vitrification_add->EmbryoNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_add->RightColumnClass ?>"><div <?php echo $ivf_vitrification_add->EmbryoNo->cellAttributes() ?>>
<span id="el_ivf_vitrification_EmbryoNo">
<input type="text" data-table="ivf_vitrification" data-field="x_EmbryoNo" name="x_EmbryoNo" id="x_EmbryoNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_add->EmbryoNo->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_add->EmbryoNo->EditValue ?>"<?php echo $ivf_vitrification_add->EmbryoNo->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification_add->EmbryoNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification_add->FertilisationDate->Visible) { // FertilisationDate ?>
	<div id="r_FertilisationDate" class="form-group row">
		<label id="elh_ivf_vitrification_FertilisationDate" for="x_FertilisationDate" class="<?php echo $ivf_vitrification_add->LeftColumnClass ?>"><?php echo $ivf_vitrification_add->FertilisationDate->caption() ?><?php echo $ivf_vitrification_add->FertilisationDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_add->RightColumnClass ?>"><div <?php echo $ivf_vitrification_add->FertilisationDate->cellAttributes() ?>>
<span id="el_ivf_vitrification_FertilisationDate">
<input type="text" data-table="ivf_vitrification" data-field="x_FertilisationDate" name="x_FertilisationDate" id="x_FertilisationDate" placeholder="<?php echo HtmlEncode($ivf_vitrification_add->FertilisationDate->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_add->FertilisationDate->EditValue ?>"<?php echo $ivf_vitrification_add->FertilisationDate->editAttributes() ?>>
<?php if (!$ivf_vitrification_add->FertilisationDate->ReadOnly && !$ivf_vitrification_add->FertilisationDate->Disabled && !isset($ivf_vitrification_add->FertilisationDate->EditAttrs["readonly"]) && !isset($ivf_vitrification_add->FertilisationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_vitrificationadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_vitrificationadd", "x_FertilisationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $ivf_vitrification_add->FertilisationDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification_add->Day->Visible) { // Day ?>
	<div id="r_Day" class="form-group row">
		<label id="elh_ivf_vitrification_Day" for="x_Day" class="<?php echo $ivf_vitrification_add->LeftColumnClass ?>"><?php echo $ivf_vitrification_add->Day->caption() ?><?php echo $ivf_vitrification_add->Day->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_add->RightColumnClass ?>"><div <?php echo $ivf_vitrification_add->Day->cellAttributes() ?>>
<span id="el_ivf_vitrification_Day">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitrification" data-field="x_Day" data-value-separator="<?php echo $ivf_vitrification_add->Day->displayValueSeparatorAttribute() ?>" id="x_Day" name="x_Day"<?php echo $ivf_vitrification_add->Day->editAttributes() ?>>
			<?php echo $ivf_vitrification_add->Day->selectOptionListHtml("x_Day") ?>
		</select>
</div>
</span>
<?php echo $ivf_vitrification_add->Day->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification_add->Grade->Visible) { // Grade ?>
	<div id="r_Grade" class="form-group row">
		<label id="elh_ivf_vitrification_Grade" for="x_Grade" class="<?php echo $ivf_vitrification_add->LeftColumnClass ?>"><?php echo $ivf_vitrification_add->Grade->caption() ?><?php echo $ivf_vitrification_add->Grade->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_add->RightColumnClass ?>"><div <?php echo $ivf_vitrification_add->Grade->cellAttributes() ?>>
<span id="el_ivf_vitrification_Grade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitrification" data-field="x_Grade" data-value-separator="<?php echo $ivf_vitrification_add->Grade->displayValueSeparatorAttribute() ?>" id="x_Grade" name="x_Grade"<?php echo $ivf_vitrification_add->Grade->editAttributes() ?>>
			<?php echo $ivf_vitrification_add->Grade->selectOptionListHtml("x_Grade") ?>
		</select>
</div>
</span>
<?php echo $ivf_vitrification_add->Grade->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification_add->Incubator->Visible) { // Incubator ?>
	<div id="r_Incubator" class="form-group row">
		<label id="elh_ivf_vitrification_Incubator" for="x_Incubator" class="<?php echo $ivf_vitrification_add->LeftColumnClass ?>"><?php echo $ivf_vitrification_add->Incubator->caption() ?><?php echo $ivf_vitrification_add->Incubator->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_add->RightColumnClass ?>"><div <?php echo $ivf_vitrification_add->Incubator->cellAttributes() ?>>
<span id="el_ivf_vitrification_Incubator">
<input type="text" data-table="ivf_vitrification" data-field="x_Incubator" name="x_Incubator" id="x_Incubator" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_add->Incubator->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_add->Incubator->EditValue ?>"<?php echo $ivf_vitrification_add->Incubator->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification_add->Incubator->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification_add->Tank->Visible) { // Tank ?>
	<div id="r_Tank" class="form-group row">
		<label id="elh_ivf_vitrification_Tank" for="x_Tank" class="<?php echo $ivf_vitrification_add->LeftColumnClass ?>"><?php echo $ivf_vitrification_add->Tank->caption() ?><?php echo $ivf_vitrification_add->Tank->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_add->RightColumnClass ?>"><div <?php echo $ivf_vitrification_add->Tank->cellAttributes() ?>>
<span id="el_ivf_vitrification_Tank">
<input type="text" data-table="ivf_vitrification" data-field="x_Tank" name="x_Tank" id="x_Tank" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_add->Tank->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_add->Tank->EditValue ?>"<?php echo $ivf_vitrification_add->Tank->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification_add->Tank->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification_add->Canister->Visible) { // Canister ?>
	<div id="r_Canister" class="form-group row">
		<label id="elh_ivf_vitrification_Canister" for="x_Canister" class="<?php echo $ivf_vitrification_add->LeftColumnClass ?>"><?php echo $ivf_vitrification_add->Canister->caption() ?><?php echo $ivf_vitrification_add->Canister->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_add->RightColumnClass ?>"><div <?php echo $ivf_vitrification_add->Canister->cellAttributes() ?>>
<span id="el_ivf_vitrification_Canister">
<input type="text" data-table="ivf_vitrification" data-field="x_Canister" name="x_Canister" id="x_Canister" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_add->Canister->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_add->Canister->EditValue ?>"<?php echo $ivf_vitrification_add->Canister->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification_add->Canister->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification_add->Gobiet->Visible) { // Gobiet ?>
	<div id="r_Gobiet" class="form-group row">
		<label id="elh_ivf_vitrification_Gobiet" for="x_Gobiet" class="<?php echo $ivf_vitrification_add->LeftColumnClass ?>"><?php echo $ivf_vitrification_add->Gobiet->caption() ?><?php echo $ivf_vitrification_add->Gobiet->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_add->RightColumnClass ?>"><div <?php echo $ivf_vitrification_add->Gobiet->cellAttributes() ?>>
<span id="el_ivf_vitrification_Gobiet">
<input type="text" data-table="ivf_vitrification" data-field="x_Gobiet" name="x_Gobiet" id="x_Gobiet" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_add->Gobiet->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_add->Gobiet->EditValue ?>"<?php echo $ivf_vitrification_add->Gobiet->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification_add->Gobiet->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification_add->CryolockNo->Visible) { // CryolockNo ?>
	<div id="r_CryolockNo" class="form-group row">
		<label id="elh_ivf_vitrification_CryolockNo" for="x_CryolockNo" class="<?php echo $ivf_vitrification_add->LeftColumnClass ?>"><?php echo $ivf_vitrification_add->CryolockNo->caption() ?><?php echo $ivf_vitrification_add->CryolockNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_add->RightColumnClass ?>"><div <?php echo $ivf_vitrification_add->CryolockNo->cellAttributes() ?>>
<span id="el_ivf_vitrification_CryolockNo">
<input type="text" data-table="ivf_vitrification" data-field="x_CryolockNo" name="x_CryolockNo" id="x_CryolockNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_add->CryolockNo->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_add->CryolockNo->EditValue ?>"<?php echo $ivf_vitrification_add->CryolockNo->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification_add->CryolockNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification_add->CryolockColour->Visible) { // CryolockColour ?>
	<div id="r_CryolockColour" class="form-group row">
		<label id="elh_ivf_vitrification_CryolockColour" for="x_CryolockColour" class="<?php echo $ivf_vitrification_add->LeftColumnClass ?>"><?php echo $ivf_vitrification_add->CryolockColour->caption() ?><?php echo $ivf_vitrification_add->CryolockColour->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_add->RightColumnClass ?>"><div <?php echo $ivf_vitrification_add->CryolockColour->cellAttributes() ?>>
<span id="el_ivf_vitrification_CryolockColour">
<input type="text" data-table="ivf_vitrification" data-field="x_CryolockColour" name="x_CryolockColour" id="x_CryolockColour" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_add->CryolockColour->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_add->CryolockColour->EditValue ?>"<?php echo $ivf_vitrification_add->CryolockColour->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification_add->CryolockColour->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification_add->Stage->Visible) { // Stage ?>
	<div id="r_Stage" class="form-group row">
		<label id="elh_ivf_vitrification_Stage" for="x_Stage" class="<?php echo $ivf_vitrification_add->LeftColumnClass ?>"><?php echo $ivf_vitrification_add->Stage->caption() ?><?php echo $ivf_vitrification_add->Stage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_add->RightColumnClass ?>"><div <?php echo $ivf_vitrification_add->Stage->cellAttributes() ?>>
<span id="el_ivf_vitrification_Stage">
<input type="text" data-table="ivf_vitrification" data-field="x_Stage" name="x_Stage" id="x_Stage" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_add->Stage->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_add->Stage->EditValue ?>"<?php echo $ivf_vitrification_add->Stage->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification_add->Stage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification_add->thawDate->Visible) { // thawDate ?>
	<div id="r_thawDate" class="form-group row">
		<label id="elh_ivf_vitrification_thawDate" for="x_thawDate" class="<?php echo $ivf_vitrification_add->LeftColumnClass ?>"><?php echo $ivf_vitrification_add->thawDate->caption() ?><?php echo $ivf_vitrification_add->thawDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_add->RightColumnClass ?>"><div <?php echo $ivf_vitrification_add->thawDate->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawDate">
<input type="text" data-table="ivf_vitrification" data-field="x_thawDate" name="x_thawDate" id="x_thawDate" placeholder="<?php echo HtmlEncode($ivf_vitrification_add->thawDate->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_add->thawDate->EditValue ?>"<?php echo $ivf_vitrification_add->thawDate->editAttributes() ?>>
<?php if (!$ivf_vitrification_add->thawDate->ReadOnly && !$ivf_vitrification_add->thawDate->Disabled && !isset($ivf_vitrification_add->thawDate->EditAttrs["readonly"]) && !isset($ivf_vitrification_add->thawDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_vitrificationadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_vitrificationadd", "x_thawDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $ivf_vitrification_add->thawDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification_add->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
	<div id="r_thawPrimaryEmbryologist" class="form-group row">
		<label id="elh_ivf_vitrification_thawPrimaryEmbryologist" for="x_thawPrimaryEmbryologist" class="<?php echo $ivf_vitrification_add->LeftColumnClass ?>"><?php echo $ivf_vitrification_add->thawPrimaryEmbryologist->caption() ?><?php echo $ivf_vitrification_add->thawPrimaryEmbryologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_add->RightColumnClass ?>"><div <?php echo $ivf_vitrification_add->thawPrimaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawPrimaryEmbryologist">
<input type="text" data-table="ivf_vitrification" data-field="x_thawPrimaryEmbryologist" name="x_thawPrimaryEmbryologist" id="x_thawPrimaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_add->thawPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_add->thawPrimaryEmbryologist->EditValue ?>"<?php echo $ivf_vitrification_add->thawPrimaryEmbryologist->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification_add->thawPrimaryEmbryologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification_add->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
	<div id="r_thawSecondaryEmbryologist" class="form-group row">
		<label id="elh_ivf_vitrification_thawSecondaryEmbryologist" for="x_thawSecondaryEmbryologist" class="<?php echo $ivf_vitrification_add->LeftColumnClass ?>"><?php echo $ivf_vitrification_add->thawSecondaryEmbryologist->caption() ?><?php echo $ivf_vitrification_add->thawSecondaryEmbryologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_add->RightColumnClass ?>"><div <?php echo $ivf_vitrification_add->thawSecondaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawSecondaryEmbryologist">
<input type="text" data-table="ivf_vitrification" data-field="x_thawSecondaryEmbryologist" name="x_thawSecondaryEmbryologist" id="x_thawSecondaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_add->thawSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_add->thawSecondaryEmbryologist->EditValue ?>"<?php echo $ivf_vitrification_add->thawSecondaryEmbryologist->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification_add->thawSecondaryEmbryologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification_add->thawET->Visible) { // thawET ?>
	<div id="r_thawET" class="form-group row">
		<label id="elh_ivf_vitrification_thawET" for="x_thawET" class="<?php echo $ivf_vitrification_add->LeftColumnClass ?>"><?php echo $ivf_vitrification_add->thawET->caption() ?><?php echo $ivf_vitrification_add->thawET->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_add->RightColumnClass ?>"><div <?php echo $ivf_vitrification_add->thawET->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawET">
<input type="text" data-table="ivf_vitrification" data-field="x_thawET" name="x_thawET" id="x_thawET" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_add->thawET->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_add->thawET->EditValue ?>"<?php echo $ivf_vitrification_add->thawET->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification_add->thawET->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification_add->thawReFrozen->Visible) { // thawReFrozen ?>
	<div id="r_thawReFrozen" class="form-group row">
		<label id="elh_ivf_vitrification_thawReFrozen" for="x_thawReFrozen" class="<?php echo $ivf_vitrification_add->LeftColumnClass ?>"><?php echo $ivf_vitrification_add->thawReFrozen->caption() ?><?php echo $ivf_vitrification_add->thawReFrozen->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_add->RightColumnClass ?>"><div <?php echo $ivf_vitrification_add->thawReFrozen->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawReFrozen">
<input type="text" data-table="ivf_vitrification" data-field="x_thawReFrozen" name="x_thawReFrozen" id="x_thawReFrozen" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_add->thawReFrozen->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_add->thawReFrozen->EditValue ?>"<?php echo $ivf_vitrification_add->thawReFrozen->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification_add->thawReFrozen->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification_add->thawAbserve->Visible) { // thawAbserve ?>
	<div id="r_thawAbserve" class="form-group row">
		<label id="elh_ivf_vitrification_thawAbserve" for="x_thawAbserve" class="<?php echo $ivf_vitrification_add->LeftColumnClass ?>"><?php echo $ivf_vitrification_add->thawAbserve->caption() ?><?php echo $ivf_vitrification_add->thawAbserve->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_add->RightColumnClass ?>"><div <?php echo $ivf_vitrification_add->thawAbserve->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawAbserve">
<input type="text" data-table="ivf_vitrification" data-field="x_thawAbserve" name="x_thawAbserve" id="x_thawAbserve" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_add->thawAbserve->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_add->thawAbserve->EditValue ?>"<?php echo $ivf_vitrification_add->thawAbserve->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification_add->thawAbserve->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification_add->thawDiscard->Visible) { // thawDiscard ?>
	<div id="r_thawDiscard" class="form-group row">
		<label id="elh_ivf_vitrification_thawDiscard" for="x_thawDiscard" class="<?php echo $ivf_vitrification_add->LeftColumnClass ?>"><?php echo $ivf_vitrification_add->thawDiscard->caption() ?><?php echo $ivf_vitrification_add->thawDiscard->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_add->RightColumnClass ?>"><div <?php echo $ivf_vitrification_add->thawDiscard->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawDiscard">
<input type="text" data-table="ivf_vitrification" data-field="x_thawDiscard" name="x_thawDiscard" id="x_thawDiscard" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_add->thawDiscard->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_add->thawDiscard->EditValue ?>"<?php echo $ivf_vitrification_add->thawDiscard->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification_add->thawDiscard->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification_add->Catheter->Visible) { // Catheter ?>
	<div id="r_Catheter" class="form-group row">
		<label id="elh_ivf_vitrification_Catheter" for="x_Catheter" class="<?php echo $ivf_vitrification_add->LeftColumnClass ?>"><?php echo $ivf_vitrification_add->Catheter->caption() ?><?php echo $ivf_vitrification_add->Catheter->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_add->RightColumnClass ?>"><div <?php echo $ivf_vitrification_add->Catheter->cellAttributes() ?>>
<span id="el_ivf_vitrification_Catheter">
<input type="text" data-table="ivf_vitrification" data-field="x_Catheter" name="x_Catheter" id="x_Catheter" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_add->Catheter->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_add->Catheter->EditValue ?>"<?php echo $ivf_vitrification_add->Catheter->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification_add->Catheter->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification_add->Difficulty->Visible) { // Difficulty ?>
	<div id="r_Difficulty" class="form-group row">
		<label id="elh_ivf_vitrification_Difficulty" for="x_Difficulty" class="<?php echo $ivf_vitrification_add->LeftColumnClass ?>"><?php echo $ivf_vitrification_add->Difficulty->caption() ?><?php echo $ivf_vitrification_add->Difficulty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_add->RightColumnClass ?>"><div <?php echo $ivf_vitrification_add->Difficulty->cellAttributes() ?>>
<span id="el_ivf_vitrification_Difficulty">
<input type="text" data-table="ivf_vitrification" data-field="x_Difficulty" name="x_Difficulty" id="x_Difficulty" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_add->Difficulty->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_add->Difficulty->EditValue ?>"<?php echo $ivf_vitrification_add->Difficulty->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification_add->Difficulty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification_add->Easy->Visible) { // Easy ?>
	<div id="r_Easy" class="form-group row">
		<label id="elh_ivf_vitrification_Easy" for="x_Easy" class="<?php echo $ivf_vitrification_add->LeftColumnClass ?>"><?php echo $ivf_vitrification_add->Easy->caption() ?><?php echo $ivf_vitrification_add->Easy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_add->RightColumnClass ?>"><div <?php echo $ivf_vitrification_add->Easy->cellAttributes() ?>>
<span id="el_ivf_vitrification_Easy">
<input type="text" data-table="ivf_vitrification" data-field="x_Easy" name="x_Easy" id="x_Easy" size="30" maxlength="220" placeholder="<?php echo HtmlEncode($ivf_vitrification_add->Easy->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_add->Easy->EditValue ?>"<?php echo $ivf_vitrification_add->Easy->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification_add->Easy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification_add->Comments->Visible) { // Comments ?>
	<div id="r_Comments" class="form-group row">
		<label id="elh_ivf_vitrification_Comments" for="x_Comments" class="<?php echo $ivf_vitrification_add->LeftColumnClass ?>"><?php echo $ivf_vitrification_add->Comments->caption() ?><?php echo $ivf_vitrification_add->Comments->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_add->RightColumnClass ?>"><div <?php echo $ivf_vitrification_add->Comments->cellAttributes() ?>>
<span id="el_ivf_vitrification_Comments">
<input type="text" data-table="ivf_vitrification" data-field="x_Comments" name="x_Comments" id="x_Comments" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_add->Comments->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_add->Comments->EditValue ?>"<?php echo $ivf_vitrification_add->Comments->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification_add->Comments->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification_add->Doctor->Visible) { // Doctor ?>
	<div id="r_Doctor" class="form-group row">
		<label id="elh_ivf_vitrification_Doctor" for="x_Doctor" class="<?php echo $ivf_vitrification_add->LeftColumnClass ?>"><?php echo $ivf_vitrification_add->Doctor->caption() ?><?php echo $ivf_vitrification_add->Doctor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_add->RightColumnClass ?>"><div <?php echo $ivf_vitrification_add->Doctor->cellAttributes() ?>>
<span id="el_ivf_vitrification_Doctor">
<input type="text" data-table="ivf_vitrification" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_add->Doctor->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_add->Doctor->EditValue ?>"<?php echo $ivf_vitrification_add->Doctor->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification_add->Doctor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification_add->Embryologist->Visible) { // Embryologist ?>
	<div id="r_Embryologist" class="form-group row">
		<label id="elh_ivf_vitrification_Embryologist" for="x_Embryologist" class="<?php echo $ivf_vitrification_add->LeftColumnClass ?>"><?php echo $ivf_vitrification_add->Embryologist->caption() ?><?php echo $ivf_vitrification_add->Embryologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_add->RightColumnClass ?>"><div <?php echo $ivf_vitrification_add->Embryologist->cellAttributes() ?>>
<span id="el_ivf_vitrification_Embryologist">
<input type="text" data-table="ivf_vitrification" data-field="x_Embryologist" name="x_Embryologist" id="x_Embryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_add->Embryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_add->Embryologist->EditValue ?>"<?php echo $ivf_vitrification_add->Embryologist->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification_add->Embryologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$ivf_vitrification_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ivf_vitrification_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_vitrification_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$ivf_vitrification_add->showPageFooter();
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
$ivf_vitrification_add->terminate();
?>