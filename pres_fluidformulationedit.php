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
$pres_fluidformulation_edit = new pres_fluidformulation_edit();

// Run the page
$pres_fluidformulation_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_fluidformulation_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fpres_fluidformulationedit = currentForm = new ew.Form("fpres_fluidformulationedit", "edit");

// Validate form
fpres_fluidformulationedit.validate = function() {
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
		<?php if ($pres_fluidformulation_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_fluidformulation->id->caption(), $pres_fluidformulation->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_fluidformulation_edit->Tradename->Required) { ?>
			elm = this.getElements("x" + infix + "_Tradename");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_fluidformulation->Tradename->caption(), $pres_fluidformulation->Tradename->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_fluidformulation_edit->Itemcode->Required) { ?>
			elm = this.getElements("x" + infix + "_Itemcode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_fluidformulation->Itemcode->caption(), $pres_fluidformulation->Itemcode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_fluidformulation_edit->Genericname->Required) { ?>
			elm = this.getElements("x" + infix + "_Genericname");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_fluidformulation->Genericname->caption(), $pres_fluidformulation->Genericname->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_fluidformulation_edit->Volume->Required) { ?>
			elm = this.getElements("x" + infix + "_Volume");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_fluidformulation->Volume->caption(), $pres_fluidformulation->Volume->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Volume");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pres_fluidformulation->Volume->errorMessage()) ?>");
		<?php if ($pres_fluidformulation_edit->VolumeUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_VolumeUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_fluidformulation->VolumeUnit->caption(), $pres_fluidformulation->VolumeUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_fluidformulation_edit->Strength->Required) { ?>
			elm = this.getElements("x" + infix + "_Strength");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_fluidformulation->Strength->caption(), $pres_fluidformulation->Strength->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Strength");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pres_fluidformulation->Strength->errorMessage()) ?>");
		<?php if ($pres_fluidformulation_edit->StrengthUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_StrengthUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_fluidformulation->StrengthUnit->caption(), $pres_fluidformulation->StrengthUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_fluidformulation_edit->_Route->Required) { ?>
			elm = this.getElements("x" + infix + "__Route");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_fluidformulation->_Route->caption(), $pres_fluidformulation->_Route->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_fluidformulation_edit->Forms->Required) { ?>
			elm = this.getElements("x" + infix + "_Forms");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_fluidformulation->Forms->caption(), $pres_fluidformulation->Forms->RequiredErrorMessage)) ?>");
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
fpres_fluidformulationedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_fluidformulationedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pres_fluidformulation_edit->showPageHeader(); ?>
<?php
$pres_fluidformulation_edit->showMessage();
?>
<form name="fpres_fluidformulationedit" id="fpres_fluidformulationedit" class="<?php echo $pres_fluidformulation_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_fluidformulation_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_fluidformulation_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_fluidformulation">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pres_fluidformulation_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($pres_fluidformulation->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_pres_fluidformulation_id" class="<?php echo $pres_fluidformulation_edit->LeftColumnClass ?>"><?php echo $pres_fluidformulation->id->caption() ?><?php echo ($pres_fluidformulation->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_fluidformulation_edit->RightColumnClass ?>"><div<?php echo $pres_fluidformulation->id->cellAttributes() ?>>
<span id="el_pres_fluidformulation_id">
<span<?php echo $pres_fluidformulation->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pres_fluidformulation->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="pres_fluidformulation" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($pres_fluidformulation->id->CurrentValue) ?>">
<?php echo $pres_fluidformulation->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_fluidformulation->Tradename->Visible) { // Tradename ?>
	<div id="r_Tradename" class="form-group row">
		<label id="elh_pres_fluidformulation_Tradename" for="x_Tradename" class="<?php echo $pres_fluidformulation_edit->LeftColumnClass ?>"><?php echo $pres_fluidformulation->Tradename->caption() ?><?php echo ($pres_fluidformulation->Tradename->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_fluidformulation_edit->RightColumnClass ?>"><div<?php echo $pres_fluidformulation->Tradename->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Tradename">
<input type="text" data-table="pres_fluidformulation" data-field="x_Tradename" name="x_Tradename" id="x_Tradename" placeholder="<?php echo HtmlEncode($pres_fluidformulation->Tradename->getPlaceHolder()) ?>" value="<?php echo $pres_fluidformulation->Tradename->EditValue ?>"<?php echo $pres_fluidformulation->Tradename->editAttributes() ?>>
</span>
<?php echo $pres_fluidformulation->Tradename->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_fluidformulation->Itemcode->Visible) { // Itemcode ?>
	<div id="r_Itemcode" class="form-group row">
		<label id="elh_pres_fluidformulation_Itemcode" for="x_Itemcode" class="<?php echo $pres_fluidformulation_edit->LeftColumnClass ?>"><?php echo $pres_fluidformulation->Itemcode->caption() ?><?php echo ($pres_fluidformulation->Itemcode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_fluidformulation_edit->RightColumnClass ?>"><div<?php echo $pres_fluidformulation->Itemcode->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Itemcode">
<input type="text" data-table="pres_fluidformulation" data-field="x_Itemcode" name="x_Itemcode" id="x_Itemcode" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($pres_fluidformulation->Itemcode->getPlaceHolder()) ?>" value="<?php echo $pres_fluidformulation->Itemcode->EditValue ?>"<?php echo $pres_fluidformulation->Itemcode->editAttributes() ?>>
</span>
<?php echo $pres_fluidformulation->Itemcode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_fluidformulation->Genericname->Visible) { // Genericname ?>
	<div id="r_Genericname" class="form-group row">
		<label id="elh_pres_fluidformulation_Genericname" for="x_Genericname" class="<?php echo $pres_fluidformulation_edit->LeftColumnClass ?>"><?php echo $pres_fluidformulation->Genericname->caption() ?><?php echo ($pres_fluidformulation->Genericname->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_fluidformulation_edit->RightColumnClass ?>"><div<?php echo $pres_fluidformulation->Genericname->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Genericname">
<input type="text" data-table="pres_fluidformulation" data-field="x_Genericname" name="x_Genericname" id="x_Genericname" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pres_fluidformulation->Genericname->getPlaceHolder()) ?>" value="<?php echo $pres_fluidformulation->Genericname->EditValue ?>"<?php echo $pres_fluidformulation->Genericname->editAttributes() ?>>
</span>
<?php echo $pres_fluidformulation->Genericname->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_fluidformulation->Volume->Visible) { // Volume ?>
	<div id="r_Volume" class="form-group row">
		<label id="elh_pres_fluidformulation_Volume" for="x_Volume" class="<?php echo $pres_fluidformulation_edit->LeftColumnClass ?>"><?php echo $pres_fluidformulation->Volume->caption() ?><?php echo ($pres_fluidformulation->Volume->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_fluidformulation_edit->RightColumnClass ?>"><div<?php echo $pres_fluidformulation->Volume->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Volume">
<input type="text" data-table="pres_fluidformulation" data-field="x_Volume" name="x_Volume" id="x_Volume" size="30" placeholder="<?php echo HtmlEncode($pres_fluidformulation->Volume->getPlaceHolder()) ?>" value="<?php echo $pres_fluidformulation->Volume->EditValue ?>"<?php echo $pres_fluidformulation->Volume->editAttributes() ?>>
</span>
<?php echo $pres_fluidformulation->Volume->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_fluidformulation->VolumeUnit->Visible) { // VolumeUnit ?>
	<div id="r_VolumeUnit" class="form-group row">
		<label id="elh_pres_fluidformulation_VolumeUnit" for="x_VolumeUnit" class="<?php echo $pres_fluidformulation_edit->LeftColumnClass ?>"><?php echo $pres_fluidformulation->VolumeUnit->caption() ?><?php echo ($pres_fluidformulation->VolumeUnit->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_fluidformulation_edit->RightColumnClass ?>"><div<?php echo $pres_fluidformulation->VolumeUnit->cellAttributes() ?>>
<span id="el_pres_fluidformulation_VolumeUnit">
<input type="text" data-table="pres_fluidformulation" data-field="x_VolumeUnit" name="x_VolumeUnit" id="x_VolumeUnit" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($pres_fluidformulation->VolumeUnit->getPlaceHolder()) ?>" value="<?php echo $pres_fluidformulation->VolumeUnit->EditValue ?>"<?php echo $pres_fluidformulation->VolumeUnit->editAttributes() ?>>
</span>
<?php echo $pres_fluidformulation->VolumeUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_fluidformulation->Strength->Visible) { // Strength ?>
	<div id="r_Strength" class="form-group row">
		<label id="elh_pres_fluidformulation_Strength" for="x_Strength" class="<?php echo $pres_fluidformulation_edit->LeftColumnClass ?>"><?php echo $pres_fluidformulation->Strength->caption() ?><?php echo ($pres_fluidformulation->Strength->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_fluidformulation_edit->RightColumnClass ?>"><div<?php echo $pres_fluidformulation->Strength->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Strength">
<input type="text" data-table="pres_fluidformulation" data-field="x_Strength" name="x_Strength" id="x_Strength" size="30" placeholder="<?php echo HtmlEncode($pres_fluidformulation->Strength->getPlaceHolder()) ?>" value="<?php echo $pres_fluidformulation->Strength->EditValue ?>"<?php echo $pres_fluidformulation->Strength->editAttributes() ?>>
</span>
<?php echo $pres_fluidformulation->Strength->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_fluidformulation->StrengthUnit->Visible) { // StrengthUnit ?>
	<div id="r_StrengthUnit" class="form-group row">
		<label id="elh_pres_fluidformulation_StrengthUnit" for="x_StrengthUnit" class="<?php echo $pres_fluidformulation_edit->LeftColumnClass ?>"><?php echo $pres_fluidformulation->StrengthUnit->caption() ?><?php echo ($pres_fluidformulation->StrengthUnit->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_fluidformulation_edit->RightColumnClass ?>"><div<?php echo $pres_fluidformulation->StrengthUnit->cellAttributes() ?>>
<span id="el_pres_fluidformulation_StrengthUnit">
<input type="text" data-table="pres_fluidformulation" data-field="x_StrengthUnit" name="x_StrengthUnit" id="x_StrengthUnit" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($pres_fluidformulation->StrengthUnit->getPlaceHolder()) ?>" value="<?php echo $pres_fluidformulation->StrengthUnit->EditValue ?>"<?php echo $pres_fluidformulation->StrengthUnit->editAttributes() ?>>
</span>
<?php echo $pres_fluidformulation->StrengthUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_fluidformulation->_Route->Visible) { // Route ?>
	<div id="r__Route" class="form-group row">
		<label id="elh_pres_fluidformulation__Route" for="x__Route" class="<?php echo $pres_fluidformulation_edit->LeftColumnClass ?>"><?php echo $pres_fluidformulation->_Route->caption() ?><?php echo ($pres_fluidformulation->_Route->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_fluidformulation_edit->RightColumnClass ?>"><div<?php echo $pres_fluidformulation->_Route->cellAttributes() ?>>
<span id="el_pres_fluidformulation__Route">
<input type="text" data-table="pres_fluidformulation" data-field="x__Route" name="x__Route" id="x__Route" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($pres_fluidformulation->_Route->getPlaceHolder()) ?>" value="<?php echo $pres_fluidformulation->_Route->EditValue ?>"<?php echo $pres_fluidformulation->_Route->editAttributes() ?>>
</span>
<?php echo $pres_fluidformulation->_Route->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_fluidformulation->Forms->Visible) { // Forms ?>
	<div id="r_Forms" class="form-group row">
		<label id="elh_pres_fluidformulation_Forms" for="x_Forms" class="<?php echo $pres_fluidformulation_edit->LeftColumnClass ?>"><?php echo $pres_fluidformulation->Forms->caption() ?><?php echo ($pres_fluidformulation->Forms->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_fluidformulation_edit->RightColumnClass ?>"><div<?php echo $pres_fluidformulation->Forms->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Forms">
<input type="text" data-table="pres_fluidformulation" data-field="x_Forms" name="x_Forms" id="x_Forms" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($pres_fluidformulation->Forms->getPlaceHolder()) ?>" value="<?php echo $pres_fluidformulation->Forms->EditValue ?>"<?php echo $pres_fluidformulation->Forms->editAttributes() ?>>
</span>
<?php echo $pres_fluidformulation->Forms->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pres_fluidformulation_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pres_fluidformulation_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_fluidformulation_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pres_fluidformulation_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pres_fluidformulation_edit->terminate();
?>