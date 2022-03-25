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
$ivf_vitrification_edit = new ivf_vitrification_edit();

// Run the page
$ivf_vitrification_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_vitrification_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fivf_vitrificationedit = currentForm = new ew.Form("fivf_vitrificationedit", "edit");

// Validate form
fivf_vitrificationedit.validate = function() {
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
		<?php if ($ivf_vitrification_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->id->caption(), $ivf_vitrification->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_edit->RIDNo->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->RIDNo->caption(), $ivf_vitrification->RIDNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RIDNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_vitrification->RIDNo->errorMessage()) ?>");
		<?php if ($ivf_vitrification_edit->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->PatientName->caption(), $ivf_vitrification->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_edit->TiDNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TiDNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->TiDNo->caption(), $ivf_vitrification->TiDNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TiDNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_vitrification->TiDNo->errorMessage()) ?>");
		<?php if ($ivf_vitrification_edit->vitrificationDate->Required) { ?>
			elm = this.getElements("x" + infix + "_vitrificationDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->vitrificationDate->caption(), $ivf_vitrification->vitrificationDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_vitrificationDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_vitrification->vitrificationDate->errorMessage()) ?>");
		<?php if ($ivf_vitrification_edit->PrimaryEmbryologist->Required) { ?>
			elm = this.getElements("x" + infix + "_PrimaryEmbryologist");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->PrimaryEmbryologist->caption(), $ivf_vitrification->PrimaryEmbryologist->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_edit->SecondaryEmbryologist->Required) { ?>
			elm = this.getElements("x" + infix + "_SecondaryEmbryologist");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->SecondaryEmbryologist->caption(), $ivf_vitrification->SecondaryEmbryologist->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_edit->EmbryoNo->Required) { ?>
			elm = this.getElements("x" + infix + "_EmbryoNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->EmbryoNo->caption(), $ivf_vitrification->EmbryoNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_edit->FertilisationDate->Required) { ?>
			elm = this.getElements("x" + infix + "_FertilisationDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->FertilisationDate->caption(), $ivf_vitrification->FertilisationDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FertilisationDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_vitrification->FertilisationDate->errorMessage()) ?>");
		<?php if ($ivf_vitrification_edit->Day->Required) { ?>
			elm = this.getElements("x" + infix + "_Day");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->Day->caption(), $ivf_vitrification->Day->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_edit->Grade->Required) { ?>
			elm = this.getElements("x" + infix + "_Grade");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->Grade->caption(), $ivf_vitrification->Grade->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_edit->Incubator->Required) { ?>
			elm = this.getElements("x" + infix + "_Incubator");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->Incubator->caption(), $ivf_vitrification->Incubator->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_edit->Tank->Required) { ?>
			elm = this.getElements("x" + infix + "_Tank");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->Tank->caption(), $ivf_vitrification->Tank->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_edit->Canister->Required) { ?>
			elm = this.getElements("x" + infix + "_Canister");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->Canister->caption(), $ivf_vitrification->Canister->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_edit->Gobiet->Required) { ?>
			elm = this.getElements("x" + infix + "_Gobiet");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->Gobiet->caption(), $ivf_vitrification->Gobiet->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_edit->CryolockNo->Required) { ?>
			elm = this.getElements("x" + infix + "_CryolockNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->CryolockNo->caption(), $ivf_vitrification->CryolockNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_edit->CryolockColour->Required) { ?>
			elm = this.getElements("x" + infix + "_CryolockColour");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->CryolockColour->caption(), $ivf_vitrification->CryolockColour->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_edit->Stage->Required) { ?>
			elm = this.getElements("x" + infix + "_Stage");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->Stage->caption(), $ivf_vitrification->Stage->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_edit->thawDate->Required) { ?>
			elm = this.getElements("x" + infix + "_thawDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->thawDate->caption(), $ivf_vitrification->thawDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_thawDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_vitrification->thawDate->errorMessage()) ?>");
		<?php if ($ivf_vitrification_edit->thawPrimaryEmbryologist->Required) { ?>
			elm = this.getElements("x" + infix + "_thawPrimaryEmbryologist");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->thawPrimaryEmbryologist->caption(), $ivf_vitrification->thawPrimaryEmbryologist->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_edit->thawSecondaryEmbryologist->Required) { ?>
			elm = this.getElements("x" + infix + "_thawSecondaryEmbryologist");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->thawSecondaryEmbryologist->caption(), $ivf_vitrification->thawSecondaryEmbryologist->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_edit->thawET->Required) { ?>
			elm = this.getElements("x" + infix + "_thawET");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->thawET->caption(), $ivf_vitrification->thawET->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_edit->thawReFrozen->Required) { ?>
			elm = this.getElements("x" + infix + "_thawReFrozen");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->thawReFrozen->caption(), $ivf_vitrification->thawReFrozen->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_edit->thawAbserve->Required) { ?>
			elm = this.getElements("x" + infix + "_thawAbserve");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->thawAbserve->caption(), $ivf_vitrification->thawAbserve->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_edit->thawDiscard->Required) { ?>
			elm = this.getElements("x" + infix + "_thawDiscard");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->thawDiscard->caption(), $ivf_vitrification->thawDiscard->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_edit->Catheter->Required) { ?>
			elm = this.getElements("x" + infix + "_Catheter");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->Catheter->caption(), $ivf_vitrification->Catheter->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_edit->Difficulty->Required) { ?>
			elm = this.getElements("x" + infix + "_Difficulty");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->Difficulty->caption(), $ivf_vitrification->Difficulty->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_edit->Easy->Required) { ?>
			elm = this.getElements("x" + infix + "_Easy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->Easy->caption(), $ivf_vitrification->Easy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_edit->Comments->Required) { ?>
			elm = this.getElements("x" + infix + "_Comments");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->Comments->caption(), $ivf_vitrification->Comments->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_edit->Doctor->Required) { ?>
			elm = this.getElements("x" + infix + "_Doctor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->Doctor->caption(), $ivf_vitrification->Doctor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_edit->Embryologist->Required) { ?>
			elm = this.getElements("x" + infix + "_Embryologist");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->Embryologist->caption(), $ivf_vitrification->Embryologist->RequiredErrorMessage)) ?>");
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
fivf_vitrificationedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_vitrificationedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_vitrificationedit.lists["x_Day"] = <?php echo $ivf_vitrification_edit->Day->Lookup->toClientList() ?>;
fivf_vitrificationedit.lists["x_Day"].options = <?php echo JsonEncode($ivf_vitrification_edit->Day->options(FALSE, TRUE)) ?>;
fivf_vitrificationedit.lists["x_Grade"] = <?php echo $ivf_vitrification_edit->Grade->Lookup->toClientList() ?>;
fivf_vitrificationedit.lists["x_Grade"].options = <?php echo JsonEncode($ivf_vitrification_edit->Grade->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_vitrification_edit->showPageHeader(); ?>
<?php
$ivf_vitrification_edit->showMessage();
?>
<form name="fivf_vitrificationedit" id="fivf_vitrificationedit" class="<?php echo $ivf_vitrification_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_vitrification_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_vitrification_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_vitrification">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_vitrification_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($ivf_vitrification->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_ivf_vitrification_id" class="<?php echo $ivf_vitrification_edit->LeftColumnClass ?>"><?php echo $ivf_vitrification->id->caption() ?><?php echo ($ivf_vitrification->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_edit->RightColumnClass ?>"><div<?php echo $ivf_vitrification->id->cellAttributes() ?>>
<span id="el_ivf_vitrification_id">
<span<?php echo $ivf_vitrification->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitrification->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($ivf_vitrification->id->CurrentValue) ?>">
<?php echo $ivf_vitrification->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification->RIDNo->Visible) { // RIDNo ?>
	<div id="r_RIDNo" class="form-group row">
		<label id="elh_ivf_vitrification_RIDNo" for="x_RIDNo" class="<?php echo $ivf_vitrification_edit->LeftColumnClass ?>"><?php echo $ivf_vitrification->RIDNo->caption() ?><?php echo ($ivf_vitrification->RIDNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_edit->RightColumnClass ?>"><div<?php echo $ivf_vitrification->RIDNo->cellAttributes() ?>>
<span id="el_ivf_vitrification_RIDNo">
<input type="text" data-table="ivf_vitrification" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_vitrification->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->RIDNo->EditValue ?>"<?php echo $ivf_vitrification->RIDNo->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification->RIDNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_ivf_vitrification_PatientName" for="x_PatientName" class="<?php echo $ivf_vitrification_edit->LeftColumnClass ?>"><?php echo $ivf_vitrification->PatientName->caption() ?><?php echo ($ivf_vitrification->PatientName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_edit->RightColumnClass ?>"><div<?php echo $ivf_vitrification->PatientName->cellAttributes() ?>>
<span id="el_ivf_vitrification_PatientName">
<input type="text" data-table="ivf_vitrification" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->PatientName->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->PatientName->EditValue ?>"<?php echo $ivf_vitrification->PatientName->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification->TiDNo->Visible) { // TiDNo ?>
	<div id="r_TiDNo" class="form-group row">
		<label id="elh_ivf_vitrification_TiDNo" for="x_TiDNo" class="<?php echo $ivf_vitrification_edit->LeftColumnClass ?>"><?php echo $ivf_vitrification->TiDNo->caption() ?><?php echo ($ivf_vitrification->TiDNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_edit->RightColumnClass ?>"><div<?php echo $ivf_vitrification->TiDNo->cellAttributes() ?>>
<span id="el_ivf_vitrification_TiDNo">
<input type="text" data-table="ivf_vitrification" data-field="x_TiDNo" name="x_TiDNo" id="x_TiDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_vitrification->TiDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->TiDNo->EditValue ?>"<?php echo $ivf_vitrification->TiDNo->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification->TiDNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification->vitrificationDate->Visible) { // vitrificationDate ?>
	<div id="r_vitrificationDate" class="form-group row">
		<label id="elh_ivf_vitrification_vitrificationDate" for="x_vitrificationDate" class="<?php echo $ivf_vitrification_edit->LeftColumnClass ?>"><?php echo $ivf_vitrification->vitrificationDate->caption() ?><?php echo ($ivf_vitrification->vitrificationDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_edit->RightColumnClass ?>"><div<?php echo $ivf_vitrification->vitrificationDate->cellAttributes() ?>>
<span id="el_ivf_vitrification_vitrificationDate">
<input type="text" data-table="ivf_vitrification" data-field="x_vitrificationDate" name="x_vitrificationDate" id="x_vitrificationDate" placeholder="<?php echo HtmlEncode($ivf_vitrification->vitrificationDate->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->vitrificationDate->EditValue ?>"<?php echo $ivf_vitrification->vitrificationDate->editAttributes() ?>>
<?php if (!$ivf_vitrification->vitrificationDate->ReadOnly && !$ivf_vitrification->vitrificationDate->Disabled && !isset($ivf_vitrification->vitrificationDate->EditAttrs["readonly"]) && !isset($ivf_vitrification->vitrificationDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_vitrificationedit", "x_vitrificationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $ivf_vitrification->vitrificationDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
	<div id="r_PrimaryEmbryologist" class="form-group row">
		<label id="elh_ivf_vitrification_PrimaryEmbryologist" for="x_PrimaryEmbryologist" class="<?php echo $ivf_vitrification_edit->LeftColumnClass ?>"><?php echo $ivf_vitrification->PrimaryEmbryologist->caption() ?><?php echo ($ivf_vitrification->PrimaryEmbryologist->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_edit->RightColumnClass ?>"><div<?php echo $ivf_vitrification->PrimaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_vitrification_PrimaryEmbryologist">
<input type="text" data-table="ivf_vitrification" data-field="x_PrimaryEmbryologist" name="x_PrimaryEmbryologist" id="x_PrimaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->PrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->PrimaryEmbryologist->EditValue ?>"<?php echo $ivf_vitrification->PrimaryEmbryologist->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification->PrimaryEmbryologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
	<div id="r_SecondaryEmbryologist" class="form-group row">
		<label id="elh_ivf_vitrification_SecondaryEmbryologist" for="x_SecondaryEmbryologist" class="<?php echo $ivf_vitrification_edit->LeftColumnClass ?>"><?php echo $ivf_vitrification->SecondaryEmbryologist->caption() ?><?php echo ($ivf_vitrification->SecondaryEmbryologist->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_edit->RightColumnClass ?>"><div<?php echo $ivf_vitrification->SecondaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_vitrification_SecondaryEmbryologist">
<input type="text" data-table="ivf_vitrification" data-field="x_SecondaryEmbryologist" name="x_SecondaryEmbryologist" id="x_SecondaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->SecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->SecondaryEmbryologist->EditValue ?>"<?php echo $ivf_vitrification->SecondaryEmbryologist->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification->SecondaryEmbryologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification->EmbryoNo->Visible) { // EmbryoNo ?>
	<div id="r_EmbryoNo" class="form-group row">
		<label id="elh_ivf_vitrification_EmbryoNo" for="x_EmbryoNo" class="<?php echo $ivf_vitrification_edit->LeftColumnClass ?>"><?php echo $ivf_vitrification->EmbryoNo->caption() ?><?php echo ($ivf_vitrification->EmbryoNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_edit->RightColumnClass ?>"><div<?php echo $ivf_vitrification->EmbryoNo->cellAttributes() ?>>
<span id="el_ivf_vitrification_EmbryoNo">
<input type="text" data-table="ivf_vitrification" data-field="x_EmbryoNo" name="x_EmbryoNo" id="x_EmbryoNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->EmbryoNo->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->EmbryoNo->EditValue ?>"<?php echo $ivf_vitrification->EmbryoNo->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification->EmbryoNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification->FertilisationDate->Visible) { // FertilisationDate ?>
	<div id="r_FertilisationDate" class="form-group row">
		<label id="elh_ivf_vitrification_FertilisationDate" for="x_FertilisationDate" class="<?php echo $ivf_vitrification_edit->LeftColumnClass ?>"><?php echo $ivf_vitrification->FertilisationDate->caption() ?><?php echo ($ivf_vitrification->FertilisationDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_edit->RightColumnClass ?>"><div<?php echo $ivf_vitrification->FertilisationDate->cellAttributes() ?>>
<span id="el_ivf_vitrification_FertilisationDate">
<input type="text" data-table="ivf_vitrification" data-field="x_FertilisationDate" name="x_FertilisationDate" id="x_FertilisationDate" placeholder="<?php echo HtmlEncode($ivf_vitrification->FertilisationDate->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->FertilisationDate->EditValue ?>"<?php echo $ivf_vitrification->FertilisationDate->editAttributes() ?>>
<?php if (!$ivf_vitrification->FertilisationDate->ReadOnly && !$ivf_vitrification->FertilisationDate->Disabled && !isset($ivf_vitrification->FertilisationDate->EditAttrs["readonly"]) && !isset($ivf_vitrification->FertilisationDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_vitrificationedit", "x_FertilisationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $ivf_vitrification->FertilisationDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification->Day->Visible) { // Day ?>
	<div id="r_Day" class="form-group row">
		<label id="elh_ivf_vitrification_Day" for="x_Day" class="<?php echo $ivf_vitrification_edit->LeftColumnClass ?>"><?php echo $ivf_vitrification->Day->caption() ?><?php echo ($ivf_vitrification->Day->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_edit->RightColumnClass ?>"><div<?php echo $ivf_vitrification->Day->cellAttributes() ?>>
<span id="el_ivf_vitrification_Day">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitrification" data-field="x_Day" data-value-separator="<?php echo $ivf_vitrification->Day->displayValueSeparatorAttribute() ?>" id="x_Day" name="x_Day"<?php echo $ivf_vitrification->Day->editAttributes() ?>>
		<?php echo $ivf_vitrification->Day->selectOptionListHtml("x_Day") ?>
	</select>
</div>
</span>
<?php echo $ivf_vitrification->Day->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification->Grade->Visible) { // Grade ?>
	<div id="r_Grade" class="form-group row">
		<label id="elh_ivf_vitrification_Grade" for="x_Grade" class="<?php echo $ivf_vitrification_edit->LeftColumnClass ?>"><?php echo $ivf_vitrification->Grade->caption() ?><?php echo ($ivf_vitrification->Grade->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_edit->RightColumnClass ?>"><div<?php echo $ivf_vitrification->Grade->cellAttributes() ?>>
<span id="el_ivf_vitrification_Grade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitrification" data-field="x_Grade" data-value-separator="<?php echo $ivf_vitrification->Grade->displayValueSeparatorAttribute() ?>" id="x_Grade" name="x_Grade"<?php echo $ivf_vitrification->Grade->editAttributes() ?>>
		<?php echo $ivf_vitrification->Grade->selectOptionListHtml("x_Grade") ?>
	</select>
</div>
</span>
<?php echo $ivf_vitrification->Grade->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification->Incubator->Visible) { // Incubator ?>
	<div id="r_Incubator" class="form-group row">
		<label id="elh_ivf_vitrification_Incubator" for="x_Incubator" class="<?php echo $ivf_vitrification_edit->LeftColumnClass ?>"><?php echo $ivf_vitrification->Incubator->caption() ?><?php echo ($ivf_vitrification->Incubator->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_edit->RightColumnClass ?>"><div<?php echo $ivf_vitrification->Incubator->cellAttributes() ?>>
<span id="el_ivf_vitrification_Incubator">
<input type="text" data-table="ivf_vitrification" data-field="x_Incubator" name="x_Incubator" id="x_Incubator" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Incubator->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Incubator->EditValue ?>"<?php echo $ivf_vitrification->Incubator->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification->Incubator->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification->Tank->Visible) { // Tank ?>
	<div id="r_Tank" class="form-group row">
		<label id="elh_ivf_vitrification_Tank" for="x_Tank" class="<?php echo $ivf_vitrification_edit->LeftColumnClass ?>"><?php echo $ivf_vitrification->Tank->caption() ?><?php echo ($ivf_vitrification->Tank->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_edit->RightColumnClass ?>"><div<?php echo $ivf_vitrification->Tank->cellAttributes() ?>>
<span id="el_ivf_vitrification_Tank">
<input type="text" data-table="ivf_vitrification" data-field="x_Tank" name="x_Tank" id="x_Tank" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Tank->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Tank->EditValue ?>"<?php echo $ivf_vitrification->Tank->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification->Tank->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification->Canister->Visible) { // Canister ?>
	<div id="r_Canister" class="form-group row">
		<label id="elh_ivf_vitrification_Canister" for="x_Canister" class="<?php echo $ivf_vitrification_edit->LeftColumnClass ?>"><?php echo $ivf_vitrification->Canister->caption() ?><?php echo ($ivf_vitrification->Canister->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_edit->RightColumnClass ?>"><div<?php echo $ivf_vitrification->Canister->cellAttributes() ?>>
<span id="el_ivf_vitrification_Canister">
<input type="text" data-table="ivf_vitrification" data-field="x_Canister" name="x_Canister" id="x_Canister" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Canister->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Canister->EditValue ?>"<?php echo $ivf_vitrification->Canister->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification->Canister->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification->Gobiet->Visible) { // Gobiet ?>
	<div id="r_Gobiet" class="form-group row">
		<label id="elh_ivf_vitrification_Gobiet" for="x_Gobiet" class="<?php echo $ivf_vitrification_edit->LeftColumnClass ?>"><?php echo $ivf_vitrification->Gobiet->caption() ?><?php echo ($ivf_vitrification->Gobiet->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_edit->RightColumnClass ?>"><div<?php echo $ivf_vitrification->Gobiet->cellAttributes() ?>>
<span id="el_ivf_vitrification_Gobiet">
<input type="text" data-table="ivf_vitrification" data-field="x_Gobiet" name="x_Gobiet" id="x_Gobiet" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Gobiet->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Gobiet->EditValue ?>"<?php echo $ivf_vitrification->Gobiet->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification->Gobiet->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification->CryolockNo->Visible) { // CryolockNo ?>
	<div id="r_CryolockNo" class="form-group row">
		<label id="elh_ivf_vitrification_CryolockNo" for="x_CryolockNo" class="<?php echo $ivf_vitrification_edit->LeftColumnClass ?>"><?php echo $ivf_vitrification->CryolockNo->caption() ?><?php echo ($ivf_vitrification->CryolockNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_edit->RightColumnClass ?>"><div<?php echo $ivf_vitrification->CryolockNo->cellAttributes() ?>>
<span id="el_ivf_vitrification_CryolockNo">
<input type="text" data-table="ivf_vitrification" data-field="x_CryolockNo" name="x_CryolockNo" id="x_CryolockNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->CryolockNo->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->CryolockNo->EditValue ?>"<?php echo $ivf_vitrification->CryolockNo->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification->CryolockNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification->CryolockColour->Visible) { // CryolockColour ?>
	<div id="r_CryolockColour" class="form-group row">
		<label id="elh_ivf_vitrification_CryolockColour" for="x_CryolockColour" class="<?php echo $ivf_vitrification_edit->LeftColumnClass ?>"><?php echo $ivf_vitrification->CryolockColour->caption() ?><?php echo ($ivf_vitrification->CryolockColour->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_edit->RightColumnClass ?>"><div<?php echo $ivf_vitrification->CryolockColour->cellAttributes() ?>>
<span id="el_ivf_vitrification_CryolockColour">
<input type="text" data-table="ivf_vitrification" data-field="x_CryolockColour" name="x_CryolockColour" id="x_CryolockColour" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->CryolockColour->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->CryolockColour->EditValue ?>"<?php echo $ivf_vitrification->CryolockColour->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification->CryolockColour->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification->Stage->Visible) { // Stage ?>
	<div id="r_Stage" class="form-group row">
		<label id="elh_ivf_vitrification_Stage" for="x_Stage" class="<?php echo $ivf_vitrification_edit->LeftColumnClass ?>"><?php echo $ivf_vitrification->Stage->caption() ?><?php echo ($ivf_vitrification->Stage->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_edit->RightColumnClass ?>"><div<?php echo $ivf_vitrification->Stage->cellAttributes() ?>>
<span id="el_ivf_vitrification_Stage">
<input type="text" data-table="ivf_vitrification" data-field="x_Stage" name="x_Stage" id="x_Stage" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Stage->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Stage->EditValue ?>"<?php echo $ivf_vitrification->Stage->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification->Stage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification->thawDate->Visible) { // thawDate ?>
	<div id="r_thawDate" class="form-group row">
		<label id="elh_ivf_vitrification_thawDate" for="x_thawDate" class="<?php echo $ivf_vitrification_edit->LeftColumnClass ?>"><?php echo $ivf_vitrification->thawDate->caption() ?><?php echo ($ivf_vitrification->thawDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_edit->RightColumnClass ?>"><div<?php echo $ivf_vitrification->thawDate->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawDate">
<input type="text" data-table="ivf_vitrification" data-field="x_thawDate" name="x_thawDate" id="x_thawDate" placeholder="<?php echo HtmlEncode($ivf_vitrification->thawDate->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->thawDate->EditValue ?>"<?php echo $ivf_vitrification->thawDate->editAttributes() ?>>
<?php if (!$ivf_vitrification->thawDate->ReadOnly && !$ivf_vitrification->thawDate->Disabled && !isset($ivf_vitrification->thawDate->EditAttrs["readonly"]) && !isset($ivf_vitrification->thawDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_vitrificationedit", "x_thawDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $ivf_vitrification->thawDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
	<div id="r_thawPrimaryEmbryologist" class="form-group row">
		<label id="elh_ivf_vitrification_thawPrimaryEmbryologist" for="x_thawPrimaryEmbryologist" class="<?php echo $ivf_vitrification_edit->LeftColumnClass ?>"><?php echo $ivf_vitrification->thawPrimaryEmbryologist->caption() ?><?php echo ($ivf_vitrification->thawPrimaryEmbryologist->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_edit->RightColumnClass ?>"><div<?php echo $ivf_vitrification->thawPrimaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawPrimaryEmbryologist">
<input type="text" data-table="ivf_vitrification" data-field="x_thawPrimaryEmbryologist" name="x_thawPrimaryEmbryologist" id="x_thawPrimaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->thawPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->thawPrimaryEmbryologist->EditValue ?>"<?php echo $ivf_vitrification->thawPrimaryEmbryologist->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification->thawPrimaryEmbryologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
	<div id="r_thawSecondaryEmbryologist" class="form-group row">
		<label id="elh_ivf_vitrification_thawSecondaryEmbryologist" for="x_thawSecondaryEmbryologist" class="<?php echo $ivf_vitrification_edit->LeftColumnClass ?>"><?php echo $ivf_vitrification->thawSecondaryEmbryologist->caption() ?><?php echo ($ivf_vitrification->thawSecondaryEmbryologist->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_edit->RightColumnClass ?>"><div<?php echo $ivf_vitrification->thawSecondaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawSecondaryEmbryologist">
<input type="text" data-table="ivf_vitrification" data-field="x_thawSecondaryEmbryologist" name="x_thawSecondaryEmbryologist" id="x_thawSecondaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->thawSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->thawSecondaryEmbryologist->EditValue ?>"<?php echo $ivf_vitrification->thawSecondaryEmbryologist->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification->thawSecondaryEmbryologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification->thawET->Visible) { // thawET ?>
	<div id="r_thawET" class="form-group row">
		<label id="elh_ivf_vitrification_thawET" for="x_thawET" class="<?php echo $ivf_vitrification_edit->LeftColumnClass ?>"><?php echo $ivf_vitrification->thawET->caption() ?><?php echo ($ivf_vitrification->thawET->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_edit->RightColumnClass ?>"><div<?php echo $ivf_vitrification->thawET->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawET">
<input type="text" data-table="ivf_vitrification" data-field="x_thawET" name="x_thawET" id="x_thawET" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->thawET->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->thawET->EditValue ?>"<?php echo $ivf_vitrification->thawET->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification->thawET->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification->thawReFrozen->Visible) { // thawReFrozen ?>
	<div id="r_thawReFrozen" class="form-group row">
		<label id="elh_ivf_vitrification_thawReFrozen" for="x_thawReFrozen" class="<?php echo $ivf_vitrification_edit->LeftColumnClass ?>"><?php echo $ivf_vitrification->thawReFrozen->caption() ?><?php echo ($ivf_vitrification->thawReFrozen->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_edit->RightColumnClass ?>"><div<?php echo $ivf_vitrification->thawReFrozen->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawReFrozen">
<input type="text" data-table="ivf_vitrification" data-field="x_thawReFrozen" name="x_thawReFrozen" id="x_thawReFrozen" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->thawReFrozen->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->thawReFrozen->EditValue ?>"<?php echo $ivf_vitrification->thawReFrozen->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification->thawReFrozen->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification->thawAbserve->Visible) { // thawAbserve ?>
	<div id="r_thawAbserve" class="form-group row">
		<label id="elh_ivf_vitrification_thawAbserve" for="x_thawAbserve" class="<?php echo $ivf_vitrification_edit->LeftColumnClass ?>"><?php echo $ivf_vitrification->thawAbserve->caption() ?><?php echo ($ivf_vitrification->thawAbserve->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_edit->RightColumnClass ?>"><div<?php echo $ivf_vitrification->thawAbserve->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawAbserve">
<input type="text" data-table="ivf_vitrification" data-field="x_thawAbserve" name="x_thawAbserve" id="x_thawAbserve" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->thawAbserve->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->thawAbserve->EditValue ?>"<?php echo $ivf_vitrification->thawAbserve->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification->thawAbserve->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification->thawDiscard->Visible) { // thawDiscard ?>
	<div id="r_thawDiscard" class="form-group row">
		<label id="elh_ivf_vitrification_thawDiscard" for="x_thawDiscard" class="<?php echo $ivf_vitrification_edit->LeftColumnClass ?>"><?php echo $ivf_vitrification->thawDiscard->caption() ?><?php echo ($ivf_vitrification->thawDiscard->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_edit->RightColumnClass ?>"><div<?php echo $ivf_vitrification->thawDiscard->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawDiscard">
<input type="text" data-table="ivf_vitrification" data-field="x_thawDiscard" name="x_thawDiscard" id="x_thawDiscard" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->thawDiscard->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->thawDiscard->EditValue ?>"<?php echo $ivf_vitrification->thawDiscard->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification->thawDiscard->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification->Catheter->Visible) { // Catheter ?>
	<div id="r_Catheter" class="form-group row">
		<label id="elh_ivf_vitrification_Catheter" for="x_Catheter" class="<?php echo $ivf_vitrification_edit->LeftColumnClass ?>"><?php echo $ivf_vitrification->Catheter->caption() ?><?php echo ($ivf_vitrification->Catheter->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_edit->RightColumnClass ?>"><div<?php echo $ivf_vitrification->Catheter->cellAttributes() ?>>
<span id="el_ivf_vitrification_Catheter">
<input type="text" data-table="ivf_vitrification" data-field="x_Catheter" name="x_Catheter" id="x_Catheter" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Catheter->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Catheter->EditValue ?>"<?php echo $ivf_vitrification->Catheter->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification->Catheter->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification->Difficulty->Visible) { // Difficulty ?>
	<div id="r_Difficulty" class="form-group row">
		<label id="elh_ivf_vitrification_Difficulty" for="x_Difficulty" class="<?php echo $ivf_vitrification_edit->LeftColumnClass ?>"><?php echo $ivf_vitrification->Difficulty->caption() ?><?php echo ($ivf_vitrification->Difficulty->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_edit->RightColumnClass ?>"><div<?php echo $ivf_vitrification->Difficulty->cellAttributes() ?>>
<span id="el_ivf_vitrification_Difficulty">
<input type="text" data-table="ivf_vitrification" data-field="x_Difficulty" name="x_Difficulty" id="x_Difficulty" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Difficulty->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Difficulty->EditValue ?>"<?php echo $ivf_vitrification->Difficulty->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification->Difficulty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification->Easy->Visible) { // Easy ?>
	<div id="r_Easy" class="form-group row">
		<label id="elh_ivf_vitrification_Easy" for="x_Easy" class="<?php echo $ivf_vitrification_edit->LeftColumnClass ?>"><?php echo $ivf_vitrification->Easy->caption() ?><?php echo ($ivf_vitrification->Easy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_edit->RightColumnClass ?>"><div<?php echo $ivf_vitrification->Easy->cellAttributes() ?>>
<span id="el_ivf_vitrification_Easy">
<input type="text" data-table="ivf_vitrification" data-field="x_Easy" name="x_Easy" id="x_Easy" size="30" maxlength="220" placeholder="<?php echo HtmlEncode($ivf_vitrification->Easy->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Easy->EditValue ?>"<?php echo $ivf_vitrification->Easy->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification->Easy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification->Comments->Visible) { // Comments ?>
	<div id="r_Comments" class="form-group row">
		<label id="elh_ivf_vitrification_Comments" for="x_Comments" class="<?php echo $ivf_vitrification_edit->LeftColumnClass ?>"><?php echo $ivf_vitrification->Comments->caption() ?><?php echo ($ivf_vitrification->Comments->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_edit->RightColumnClass ?>"><div<?php echo $ivf_vitrification->Comments->cellAttributes() ?>>
<span id="el_ivf_vitrification_Comments">
<input type="text" data-table="ivf_vitrification" data-field="x_Comments" name="x_Comments" id="x_Comments" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Comments->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Comments->EditValue ?>"<?php echo $ivf_vitrification->Comments->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification->Comments->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification->Doctor->Visible) { // Doctor ?>
	<div id="r_Doctor" class="form-group row">
		<label id="elh_ivf_vitrification_Doctor" for="x_Doctor" class="<?php echo $ivf_vitrification_edit->LeftColumnClass ?>"><?php echo $ivf_vitrification->Doctor->caption() ?><?php echo ($ivf_vitrification->Doctor->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_edit->RightColumnClass ?>"><div<?php echo $ivf_vitrification->Doctor->cellAttributes() ?>>
<span id="el_ivf_vitrification_Doctor">
<input type="text" data-table="ivf_vitrification" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Doctor->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Doctor->EditValue ?>"<?php echo $ivf_vitrification->Doctor->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification->Doctor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_vitrification->Embryologist->Visible) { // Embryologist ?>
	<div id="r_Embryologist" class="form-group row">
		<label id="elh_ivf_vitrification_Embryologist" for="x_Embryologist" class="<?php echo $ivf_vitrification_edit->LeftColumnClass ?>"><?php echo $ivf_vitrification->Embryologist->caption() ?><?php echo ($ivf_vitrification->Embryologist->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_vitrification_edit->RightColumnClass ?>"><div<?php echo $ivf_vitrification->Embryologist->cellAttributes() ?>>
<span id="el_ivf_vitrification_Embryologist">
<input type="text" data-table="ivf_vitrification" data-field="x_Embryologist" name="x_Embryologist" id="x_Embryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Embryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Embryologist->EditValue ?>"<?php echo $ivf_vitrification->Embryologist->editAttributes() ?>>
</span>
<?php echo $ivf_vitrification->Embryologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$ivf_vitrification_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ivf_vitrification_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_vitrification_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$ivf_vitrification_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_vitrification_edit->terminate();
?>