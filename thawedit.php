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
$thaw_edit = new thaw_edit();

// Run the page
$thaw_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$thaw_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fthawedit = currentForm = new ew.Form("fthawedit", "edit");

// Validate form
fthawedit.validate = function() {
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
		<?php if ($thaw_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw->id->caption(), $thaw->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($thaw_edit->RIDNo->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw->RIDNo->caption(), $thaw->RIDNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($thaw_edit->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw->PatientName->caption(), $thaw->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($thaw_edit->TiDNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TiDNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw->TiDNo->caption(), $thaw->TiDNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($thaw_edit->thawDate->Required) { ?>
			elm = this.getElements("x" + infix + "_thawDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw->thawDate->caption(), $thaw->thawDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_thawDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($thaw->thawDate->errorMessage()) ?>");
		<?php if ($thaw_edit->thawPrimaryEmbryologist->Required) { ?>
			elm = this.getElements("x" + infix + "_thawPrimaryEmbryologist");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw->thawPrimaryEmbryologist->caption(), $thaw->thawPrimaryEmbryologist->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($thaw_edit->thawSecondaryEmbryologist->Required) { ?>
			elm = this.getElements("x" + infix + "_thawSecondaryEmbryologist");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw->thawSecondaryEmbryologist->caption(), $thaw->thawSecondaryEmbryologist->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($thaw_edit->thawReFrozen->Required) { ?>
			elm = this.getElements("x" + infix + "_thawReFrozen");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw->thawReFrozen->caption(), $thaw->thawReFrozen->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($thaw_edit->vitrificationDate->Required) { ?>
			elm = this.getElements("x" + infix + "_vitrificationDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw->vitrificationDate->caption(), $thaw->vitrificationDate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($thaw_edit->PrimaryEmbryologist->Required) { ?>
			elm = this.getElements("x" + infix + "_PrimaryEmbryologist");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw->PrimaryEmbryologist->caption(), $thaw->PrimaryEmbryologist->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($thaw_edit->SecondaryEmbryologist->Required) { ?>
			elm = this.getElements("x" + infix + "_SecondaryEmbryologist");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw->SecondaryEmbryologist->caption(), $thaw->SecondaryEmbryologist->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($thaw_edit->EmbryoNo->Required) { ?>
			elm = this.getElements("x" + infix + "_EmbryoNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw->EmbryoNo->caption(), $thaw->EmbryoNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($thaw_edit->FertilisationDate->Required) { ?>
			elm = this.getElements("x" + infix + "_FertilisationDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw->FertilisationDate->caption(), $thaw->FertilisationDate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($thaw_edit->Day->Required) { ?>
			elm = this.getElements("x" + infix + "_Day");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw->Day->caption(), $thaw->Day->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($thaw_edit->Grade->Required) { ?>
			elm = this.getElements("x" + infix + "_Grade");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw->Grade->caption(), $thaw->Grade->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($thaw_edit->Incubator->Required) { ?>
			elm = this.getElements("x" + infix + "_Incubator");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw->Incubator->caption(), $thaw->Incubator->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($thaw_edit->Tank->Required) { ?>
			elm = this.getElements("x" + infix + "_Tank");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw->Tank->caption(), $thaw->Tank->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($thaw_edit->Canister->Required) { ?>
			elm = this.getElements("x" + infix + "_Canister");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw->Canister->caption(), $thaw->Canister->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($thaw_edit->Gobiet->Required) { ?>
			elm = this.getElements("x" + infix + "_Gobiet");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw->Gobiet->caption(), $thaw->Gobiet->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($thaw_edit->CryolockNo->Required) { ?>
			elm = this.getElements("x" + infix + "_CryolockNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw->CryolockNo->caption(), $thaw->CryolockNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($thaw_edit->CryolockColour->Required) { ?>
			elm = this.getElements("x" + infix + "_CryolockColour");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw->CryolockColour->caption(), $thaw->CryolockColour->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($thaw_edit->Stage->Required) { ?>
			elm = this.getElements("x" + infix + "_Stage");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw->Stage->caption(), $thaw->Stage->RequiredErrorMessage)) ?>");
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
fthawedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fthawedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fthawedit.lists["x_thawReFrozen"] = <?php echo $thaw_edit->thawReFrozen->Lookup->toClientList() ?>;
fthawedit.lists["x_thawReFrozen"].options = <?php echo JsonEncode($thaw_edit->thawReFrozen->options(FALSE, TRUE)) ?>;
fthawedit.lists["x_Day"] = <?php echo $thaw_edit->Day->Lookup->toClientList() ?>;
fthawedit.lists["x_Day"].options = <?php echo JsonEncode($thaw_edit->Day->options(FALSE, TRUE)) ?>;
fthawedit.lists["x_Grade"] = <?php echo $thaw_edit->Grade->Lookup->toClientList() ?>;
fthawedit.lists["x_Grade"].options = <?php echo JsonEncode($thaw_edit->Grade->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $thaw_edit->showPageHeader(); ?>
<?php
$thaw_edit->showMessage();
?>
<form name="fthawedit" id="fthawedit" class="<?php echo $thaw_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($thaw_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $thaw_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="thaw">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$thaw_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($thaw->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_thaw_id" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw->id->caption() ?><?php echo ($thaw->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div<?php echo $thaw->id->cellAttributes() ?>>
<span id="el_thaw_id">
<span<?php echo $thaw->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($thaw->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($thaw->id->CurrentValue) ?>">
<?php echo $thaw->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw->RIDNo->Visible) { // RIDNo ?>
	<div id="r_RIDNo" class="form-group row">
		<label id="elh_thaw_RIDNo" for="x_RIDNo" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw->RIDNo->caption() ?><?php echo ($thaw->RIDNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div<?php echo $thaw->RIDNo->cellAttributes() ?>>
<span id="el_thaw_RIDNo">
<span<?php echo $thaw->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($thaw->RIDNo->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" value="<?php echo HtmlEncode($thaw->RIDNo->CurrentValue) ?>">
<?php echo $thaw->RIDNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_thaw_PatientName" for="x_PatientName" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw->PatientName->caption() ?><?php echo ($thaw->PatientName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div<?php echo $thaw->PatientName->cellAttributes() ?>>
<span id="el_thaw_PatientName">
<span<?php echo $thaw->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($thaw->PatientName->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" value="<?php echo HtmlEncode($thaw->PatientName->CurrentValue) ?>">
<?php echo $thaw->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw->TiDNo->Visible) { // TiDNo ?>
	<div id="r_TiDNo" class="form-group row">
		<label id="elh_thaw_TiDNo" for="x_TiDNo" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw->TiDNo->caption() ?><?php echo ($thaw->TiDNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div<?php echo $thaw->TiDNo->cellAttributes() ?>>
<span id="el_thaw_TiDNo">
<span<?php echo $thaw->TiDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($thaw->TiDNo->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_TiDNo" name="x_TiDNo" id="x_TiDNo" value="<?php echo HtmlEncode($thaw->TiDNo->CurrentValue) ?>">
<?php echo $thaw->TiDNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw->thawDate->Visible) { // thawDate ?>
	<div id="r_thawDate" class="form-group row">
		<label id="elh_thaw_thawDate" for="x_thawDate" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw->thawDate->caption() ?><?php echo ($thaw->thawDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div<?php echo $thaw->thawDate->cellAttributes() ?>>
<span id="el_thaw_thawDate">
<input type="text" data-table="thaw" data-field="x_thawDate" name="x_thawDate" id="x_thawDate" placeholder="<?php echo HtmlEncode($thaw->thawDate->getPlaceHolder()) ?>" value="<?php echo $thaw->thawDate->EditValue ?>"<?php echo $thaw->thawDate->editAttributes() ?>>
<?php if (!$thaw->thawDate->ReadOnly && !$thaw->thawDate->Disabled && !isset($thaw->thawDate->EditAttrs["readonly"]) && !isset($thaw->thawDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fthawedit", "x_thawDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $thaw->thawDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
	<div id="r_thawPrimaryEmbryologist" class="form-group row">
		<label id="elh_thaw_thawPrimaryEmbryologist" for="x_thawPrimaryEmbryologist" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw->thawPrimaryEmbryologist->caption() ?><?php echo ($thaw->thawPrimaryEmbryologist->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div<?php echo $thaw->thawPrimaryEmbryologist->cellAttributes() ?>>
<span id="el_thaw_thawPrimaryEmbryologist">
<input type="text" data-table="thaw" data-field="x_thawPrimaryEmbryologist" name="x_thawPrimaryEmbryologist" id="x_thawPrimaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw->thawPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $thaw->thawPrimaryEmbryologist->EditValue ?>"<?php echo $thaw->thawPrimaryEmbryologist->editAttributes() ?>>
</span>
<?php echo $thaw->thawPrimaryEmbryologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
	<div id="r_thawSecondaryEmbryologist" class="form-group row">
		<label id="elh_thaw_thawSecondaryEmbryologist" for="x_thawSecondaryEmbryologist" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw->thawSecondaryEmbryologist->caption() ?><?php echo ($thaw->thawSecondaryEmbryologist->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div<?php echo $thaw->thawSecondaryEmbryologist->cellAttributes() ?>>
<span id="el_thaw_thawSecondaryEmbryologist">
<input type="text" data-table="thaw" data-field="x_thawSecondaryEmbryologist" name="x_thawSecondaryEmbryologist" id="x_thawSecondaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw->thawSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $thaw->thawSecondaryEmbryologist->EditValue ?>"<?php echo $thaw->thawSecondaryEmbryologist->editAttributes() ?>>
</span>
<?php echo $thaw->thawSecondaryEmbryologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw->thawReFrozen->Visible) { // thawReFrozen ?>
	<div id="r_thawReFrozen" class="form-group row">
		<label id="elh_thaw_thawReFrozen" for="x_thawReFrozen" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw->thawReFrozen->caption() ?><?php echo ($thaw->thawReFrozen->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div<?php echo $thaw->thawReFrozen->cellAttributes() ?>>
<span id="el_thaw_thawReFrozen">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="thaw" data-field="x_thawReFrozen" data-value-separator="<?php echo $thaw->thawReFrozen->displayValueSeparatorAttribute() ?>" id="x_thawReFrozen" name="x_thawReFrozen"<?php echo $thaw->thawReFrozen->editAttributes() ?>>
		<?php echo $thaw->thawReFrozen->selectOptionListHtml("x_thawReFrozen") ?>
	</select>
</div>
</span>
<?php echo $thaw->thawReFrozen->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw->vitrificationDate->Visible) { // vitrificationDate ?>
	<div id="r_vitrificationDate" class="form-group row">
		<label id="elh_thaw_vitrificationDate" for="x_vitrificationDate" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw->vitrificationDate->caption() ?><?php echo ($thaw->vitrificationDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div<?php echo $thaw->vitrificationDate->cellAttributes() ?>>
<span id="el_thaw_vitrificationDate">
<span<?php echo $thaw->vitrificationDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($thaw->vitrificationDate->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_vitrificationDate" name="x_vitrificationDate" id="x_vitrificationDate" value="<?php echo HtmlEncode($thaw->vitrificationDate->CurrentValue) ?>">
<?php echo $thaw->vitrificationDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
	<div id="r_PrimaryEmbryologist" class="form-group row">
		<label id="elh_thaw_PrimaryEmbryologist" for="x_PrimaryEmbryologist" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw->PrimaryEmbryologist->caption() ?><?php echo ($thaw->PrimaryEmbryologist->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div<?php echo $thaw->PrimaryEmbryologist->cellAttributes() ?>>
<span id="el_thaw_PrimaryEmbryologist">
<span<?php echo $thaw->PrimaryEmbryologist->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($thaw->PrimaryEmbryologist->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_PrimaryEmbryologist" name="x_PrimaryEmbryologist" id="x_PrimaryEmbryologist" value="<?php echo HtmlEncode($thaw->PrimaryEmbryologist->CurrentValue) ?>">
<?php echo $thaw->PrimaryEmbryologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
	<div id="r_SecondaryEmbryologist" class="form-group row">
		<label id="elh_thaw_SecondaryEmbryologist" for="x_SecondaryEmbryologist" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw->SecondaryEmbryologist->caption() ?><?php echo ($thaw->SecondaryEmbryologist->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div<?php echo $thaw->SecondaryEmbryologist->cellAttributes() ?>>
<span id="el_thaw_SecondaryEmbryologist">
<span<?php echo $thaw->SecondaryEmbryologist->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($thaw->SecondaryEmbryologist->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_SecondaryEmbryologist" name="x_SecondaryEmbryologist" id="x_SecondaryEmbryologist" value="<?php echo HtmlEncode($thaw->SecondaryEmbryologist->CurrentValue) ?>">
<?php echo $thaw->SecondaryEmbryologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw->EmbryoNo->Visible) { // EmbryoNo ?>
	<div id="r_EmbryoNo" class="form-group row">
		<label id="elh_thaw_EmbryoNo" for="x_EmbryoNo" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw->EmbryoNo->caption() ?><?php echo ($thaw->EmbryoNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div<?php echo $thaw->EmbryoNo->cellAttributes() ?>>
<span id="el_thaw_EmbryoNo">
<span<?php echo $thaw->EmbryoNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($thaw->EmbryoNo->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_EmbryoNo" name="x_EmbryoNo" id="x_EmbryoNo" value="<?php echo HtmlEncode($thaw->EmbryoNo->CurrentValue) ?>">
<?php echo $thaw->EmbryoNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw->FertilisationDate->Visible) { // FertilisationDate ?>
	<div id="r_FertilisationDate" class="form-group row">
		<label id="elh_thaw_FertilisationDate" for="x_FertilisationDate" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw->FertilisationDate->caption() ?><?php echo ($thaw->FertilisationDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div<?php echo $thaw->FertilisationDate->cellAttributes() ?>>
<span id="el_thaw_FertilisationDate">
<span<?php echo $thaw->FertilisationDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($thaw->FertilisationDate->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_FertilisationDate" name="x_FertilisationDate" id="x_FertilisationDate" value="<?php echo HtmlEncode($thaw->FertilisationDate->CurrentValue) ?>">
<?php echo $thaw->FertilisationDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw->Day->Visible) { // Day ?>
	<div id="r_Day" class="form-group row">
		<label id="elh_thaw_Day" for="x_Day" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw->Day->caption() ?><?php echo ($thaw->Day->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div<?php echo $thaw->Day->cellAttributes() ?>>
<span id="el_thaw_Day">
<span<?php echo $thaw->Day->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($thaw->Day->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_Day" name="x_Day" id="x_Day" value="<?php echo HtmlEncode($thaw->Day->CurrentValue) ?>">
<?php echo $thaw->Day->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw->Grade->Visible) { // Grade ?>
	<div id="r_Grade" class="form-group row">
		<label id="elh_thaw_Grade" for="x_Grade" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw->Grade->caption() ?><?php echo ($thaw->Grade->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div<?php echo $thaw->Grade->cellAttributes() ?>>
<span id="el_thaw_Grade">
<span<?php echo $thaw->Grade->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($thaw->Grade->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_Grade" name="x_Grade" id="x_Grade" value="<?php echo HtmlEncode($thaw->Grade->CurrentValue) ?>">
<?php echo $thaw->Grade->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw->Incubator->Visible) { // Incubator ?>
	<div id="r_Incubator" class="form-group row">
		<label id="elh_thaw_Incubator" for="x_Incubator" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw->Incubator->caption() ?><?php echo ($thaw->Incubator->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div<?php echo $thaw->Incubator->cellAttributes() ?>>
<span id="el_thaw_Incubator">
<span<?php echo $thaw->Incubator->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($thaw->Incubator->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_Incubator" name="x_Incubator" id="x_Incubator" value="<?php echo HtmlEncode($thaw->Incubator->CurrentValue) ?>">
<?php echo $thaw->Incubator->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw->Tank->Visible) { // Tank ?>
	<div id="r_Tank" class="form-group row">
		<label id="elh_thaw_Tank" for="x_Tank" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw->Tank->caption() ?><?php echo ($thaw->Tank->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div<?php echo $thaw->Tank->cellAttributes() ?>>
<span id="el_thaw_Tank">
<span<?php echo $thaw->Tank->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($thaw->Tank->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_Tank" name="x_Tank" id="x_Tank" value="<?php echo HtmlEncode($thaw->Tank->CurrentValue) ?>">
<?php echo $thaw->Tank->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw->Canister->Visible) { // Canister ?>
	<div id="r_Canister" class="form-group row">
		<label id="elh_thaw_Canister" for="x_Canister" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw->Canister->caption() ?><?php echo ($thaw->Canister->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div<?php echo $thaw->Canister->cellAttributes() ?>>
<span id="el_thaw_Canister">
<span<?php echo $thaw->Canister->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($thaw->Canister->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_Canister" name="x_Canister" id="x_Canister" value="<?php echo HtmlEncode($thaw->Canister->CurrentValue) ?>">
<?php echo $thaw->Canister->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw->Gobiet->Visible) { // Gobiet ?>
	<div id="r_Gobiet" class="form-group row">
		<label id="elh_thaw_Gobiet" for="x_Gobiet" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw->Gobiet->caption() ?><?php echo ($thaw->Gobiet->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div<?php echo $thaw->Gobiet->cellAttributes() ?>>
<span id="el_thaw_Gobiet">
<span<?php echo $thaw->Gobiet->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($thaw->Gobiet->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_Gobiet" name="x_Gobiet" id="x_Gobiet" value="<?php echo HtmlEncode($thaw->Gobiet->CurrentValue) ?>">
<?php echo $thaw->Gobiet->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw->CryolockNo->Visible) { // CryolockNo ?>
	<div id="r_CryolockNo" class="form-group row">
		<label id="elh_thaw_CryolockNo" for="x_CryolockNo" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw->CryolockNo->caption() ?><?php echo ($thaw->CryolockNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div<?php echo $thaw->CryolockNo->cellAttributes() ?>>
<span id="el_thaw_CryolockNo">
<span<?php echo $thaw->CryolockNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($thaw->CryolockNo->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_CryolockNo" name="x_CryolockNo" id="x_CryolockNo" value="<?php echo HtmlEncode($thaw->CryolockNo->CurrentValue) ?>">
<?php echo $thaw->CryolockNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw->CryolockColour->Visible) { // CryolockColour ?>
	<div id="r_CryolockColour" class="form-group row">
		<label id="elh_thaw_CryolockColour" for="x_CryolockColour" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw->CryolockColour->caption() ?><?php echo ($thaw->CryolockColour->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div<?php echo $thaw->CryolockColour->cellAttributes() ?>>
<span id="el_thaw_CryolockColour">
<span<?php echo $thaw->CryolockColour->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($thaw->CryolockColour->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_CryolockColour" name="x_CryolockColour" id="x_CryolockColour" value="<?php echo HtmlEncode($thaw->CryolockColour->CurrentValue) ?>">
<?php echo $thaw->CryolockColour->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw->Stage->Visible) { // Stage ?>
	<div id="r_Stage" class="form-group row">
		<label id="elh_thaw_Stage" for="x_Stage" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw->Stage->caption() ?><?php echo ($thaw->Stage->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div<?php echo $thaw->Stage->cellAttributes() ?>>
<span id="el_thaw_Stage">
<span<?php echo $thaw->Stage->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($thaw->Stage->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_Stage" name="x_Stage" id="x_Stage" value="<?php echo HtmlEncode($thaw->Stage->CurrentValue) ?>">
<?php echo $thaw->Stage->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$thaw_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $thaw_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $thaw_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$thaw_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$thaw_edit->terminate();
?>