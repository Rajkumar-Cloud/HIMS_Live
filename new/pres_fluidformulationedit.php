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
<?php include_once "header.php"; ?>
<script>
var fpres_fluidformulationedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpres_fluidformulationedit = currentForm = new ew.Form("fpres_fluidformulationedit", "edit");

	// Validate form
	fpres_fluidformulationedit.validate = function() {
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
			<?php if ($pres_fluidformulation_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_fluidformulation_edit->id->caption(), $pres_fluidformulation_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_fluidformulation_edit->Tradename->Required) { ?>
				elm = this.getElements("x" + infix + "_Tradename");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_fluidformulation_edit->Tradename->caption(), $pres_fluidformulation_edit->Tradename->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_fluidformulation_edit->Itemcode->Required) { ?>
				elm = this.getElements("x" + infix + "_Itemcode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_fluidformulation_edit->Itemcode->caption(), $pres_fluidformulation_edit->Itemcode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_fluidformulation_edit->Genericname->Required) { ?>
				elm = this.getElements("x" + infix + "_Genericname");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_fluidformulation_edit->Genericname->caption(), $pres_fluidformulation_edit->Genericname->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_fluidformulation_edit->Volume->Required) { ?>
				elm = this.getElements("x" + infix + "_Volume");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_fluidformulation_edit->Volume->caption(), $pres_fluidformulation_edit->Volume->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Volume");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pres_fluidformulation_edit->Volume->errorMessage()) ?>");
			<?php if ($pres_fluidformulation_edit->VolumeUnit->Required) { ?>
				elm = this.getElements("x" + infix + "_VolumeUnit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_fluidformulation_edit->VolumeUnit->caption(), $pres_fluidformulation_edit->VolumeUnit->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_fluidformulation_edit->Strength->Required) { ?>
				elm = this.getElements("x" + infix + "_Strength");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_fluidformulation_edit->Strength->caption(), $pres_fluidformulation_edit->Strength->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Strength");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pres_fluidformulation_edit->Strength->errorMessage()) ?>");
			<?php if ($pres_fluidformulation_edit->StrengthUnit->Required) { ?>
				elm = this.getElements("x" + infix + "_StrengthUnit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_fluidformulation_edit->StrengthUnit->caption(), $pres_fluidformulation_edit->StrengthUnit->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_fluidformulation_edit->_Route->Required) { ?>
				elm = this.getElements("x" + infix + "__Route");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_fluidformulation_edit->_Route->caption(), $pres_fluidformulation_edit->_Route->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_fluidformulation_edit->Forms->Required) { ?>
				elm = this.getElements("x" + infix + "_Forms");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_fluidformulation_edit->Forms->caption(), $pres_fluidformulation_edit->Forms->RequiredErrorMessage)) ?>");
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
	fpres_fluidformulationedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpres_fluidformulationedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpres_fluidformulationedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pres_fluidformulation_edit->showPageHeader(); ?>
<?php
$pres_fluidformulation_edit->showMessage();
?>
<form name="fpres_fluidformulationedit" id="fpres_fluidformulationedit" class="<?php echo $pres_fluidformulation_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_fluidformulation">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pres_fluidformulation_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($pres_fluidformulation_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_pres_fluidformulation_id" class="<?php echo $pres_fluidformulation_edit->LeftColumnClass ?>"><?php echo $pres_fluidformulation_edit->id->caption() ?><?php echo $pres_fluidformulation_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_fluidformulation_edit->RightColumnClass ?>"><div <?php echo $pres_fluidformulation_edit->id->cellAttributes() ?>>
<span id="el_pres_fluidformulation_id">
<span<?php echo $pres_fluidformulation_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pres_fluidformulation_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="pres_fluidformulation" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($pres_fluidformulation_edit->id->CurrentValue) ?>">
<?php echo $pres_fluidformulation_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_fluidformulation_edit->Tradename->Visible) { // Tradename ?>
	<div id="r_Tradename" class="form-group row">
		<label id="elh_pres_fluidformulation_Tradename" for="x_Tradename" class="<?php echo $pres_fluidformulation_edit->LeftColumnClass ?>"><?php echo $pres_fluidformulation_edit->Tradename->caption() ?><?php echo $pres_fluidformulation_edit->Tradename->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_fluidformulation_edit->RightColumnClass ?>"><div <?php echo $pres_fluidformulation_edit->Tradename->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Tradename">
<input type="text" data-table="pres_fluidformulation" data-field="x_Tradename" name="x_Tradename" id="x_Tradename" placeholder="<?php echo HtmlEncode($pres_fluidformulation_edit->Tradename->getPlaceHolder()) ?>" value="<?php echo $pres_fluidformulation_edit->Tradename->EditValue ?>"<?php echo $pres_fluidformulation_edit->Tradename->editAttributes() ?>>
</span>
<?php echo $pres_fluidformulation_edit->Tradename->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_fluidformulation_edit->Itemcode->Visible) { // Itemcode ?>
	<div id="r_Itemcode" class="form-group row">
		<label id="elh_pres_fluidformulation_Itemcode" for="x_Itemcode" class="<?php echo $pres_fluidformulation_edit->LeftColumnClass ?>"><?php echo $pres_fluidformulation_edit->Itemcode->caption() ?><?php echo $pres_fluidformulation_edit->Itemcode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_fluidformulation_edit->RightColumnClass ?>"><div <?php echo $pres_fluidformulation_edit->Itemcode->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Itemcode">
<input type="text" data-table="pres_fluidformulation" data-field="x_Itemcode" name="x_Itemcode" id="x_Itemcode" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($pres_fluidformulation_edit->Itemcode->getPlaceHolder()) ?>" value="<?php echo $pres_fluidformulation_edit->Itemcode->EditValue ?>"<?php echo $pres_fluidformulation_edit->Itemcode->editAttributes() ?>>
</span>
<?php echo $pres_fluidformulation_edit->Itemcode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_fluidformulation_edit->Genericname->Visible) { // Genericname ?>
	<div id="r_Genericname" class="form-group row">
		<label id="elh_pres_fluidformulation_Genericname" for="x_Genericname" class="<?php echo $pres_fluidformulation_edit->LeftColumnClass ?>"><?php echo $pres_fluidformulation_edit->Genericname->caption() ?><?php echo $pres_fluidformulation_edit->Genericname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_fluidformulation_edit->RightColumnClass ?>"><div <?php echo $pres_fluidformulation_edit->Genericname->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Genericname">
<input type="text" data-table="pres_fluidformulation" data-field="x_Genericname" name="x_Genericname" id="x_Genericname" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pres_fluidformulation_edit->Genericname->getPlaceHolder()) ?>" value="<?php echo $pres_fluidformulation_edit->Genericname->EditValue ?>"<?php echo $pres_fluidformulation_edit->Genericname->editAttributes() ?>>
</span>
<?php echo $pres_fluidformulation_edit->Genericname->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_fluidformulation_edit->Volume->Visible) { // Volume ?>
	<div id="r_Volume" class="form-group row">
		<label id="elh_pres_fluidformulation_Volume" for="x_Volume" class="<?php echo $pres_fluidformulation_edit->LeftColumnClass ?>"><?php echo $pres_fluidformulation_edit->Volume->caption() ?><?php echo $pres_fluidformulation_edit->Volume->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_fluidformulation_edit->RightColumnClass ?>"><div <?php echo $pres_fluidformulation_edit->Volume->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Volume">
<input type="text" data-table="pres_fluidformulation" data-field="x_Volume" name="x_Volume" id="x_Volume" size="30" placeholder="<?php echo HtmlEncode($pres_fluidformulation_edit->Volume->getPlaceHolder()) ?>" value="<?php echo $pres_fluidformulation_edit->Volume->EditValue ?>"<?php echo $pres_fluidformulation_edit->Volume->editAttributes() ?>>
</span>
<?php echo $pres_fluidformulation_edit->Volume->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_fluidformulation_edit->VolumeUnit->Visible) { // VolumeUnit ?>
	<div id="r_VolumeUnit" class="form-group row">
		<label id="elh_pres_fluidformulation_VolumeUnit" for="x_VolumeUnit" class="<?php echo $pres_fluidformulation_edit->LeftColumnClass ?>"><?php echo $pres_fluidformulation_edit->VolumeUnit->caption() ?><?php echo $pres_fluidformulation_edit->VolumeUnit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_fluidformulation_edit->RightColumnClass ?>"><div <?php echo $pres_fluidformulation_edit->VolumeUnit->cellAttributes() ?>>
<span id="el_pres_fluidformulation_VolumeUnit">
<input type="text" data-table="pres_fluidformulation" data-field="x_VolumeUnit" name="x_VolumeUnit" id="x_VolumeUnit" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($pres_fluidformulation_edit->VolumeUnit->getPlaceHolder()) ?>" value="<?php echo $pres_fluidformulation_edit->VolumeUnit->EditValue ?>"<?php echo $pres_fluidformulation_edit->VolumeUnit->editAttributes() ?>>
</span>
<?php echo $pres_fluidformulation_edit->VolumeUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_fluidformulation_edit->Strength->Visible) { // Strength ?>
	<div id="r_Strength" class="form-group row">
		<label id="elh_pres_fluidformulation_Strength" for="x_Strength" class="<?php echo $pres_fluidformulation_edit->LeftColumnClass ?>"><?php echo $pres_fluidformulation_edit->Strength->caption() ?><?php echo $pres_fluidformulation_edit->Strength->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_fluidformulation_edit->RightColumnClass ?>"><div <?php echo $pres_fluidformulation_edit->Strength->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Strength">
<input type="text" data-table="pres_fluidformulation" data-field="x_Strength" name="x_Strength" id="x_Strength" size="30" placeholder="<?php echo HtmlEncode($pres_fluidformulation_edit->Strength->getPlaceHolder()) ?>" value="<?php echo $pres_fluidformulation_edit->Strength->EditValue ?>"<?php echo $pres_fluidformulation_edit->Strength->editAttributes() ?>>
</span>
<?php echo $pres_fluidformulation_edit->Strength->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_fluidformulation_edit->StrengthUnit->Visible) { // StrengthUnit ?>
	<div id="r_StrengthUnit" class="form-group row">
		<label id="elh_pres_fluidformulation_StrengthUnit" for="x_StrengthUnit" class="<?php echo $pres_fluidformulation_edit->LeftColumnClass ?>"><?php echo $pres_fluidformulation_edit->StrengthUnit->caption() ?><?php echo $pres_fluidformulation_edit->StrengthUnit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_fluidformulation_edit->RightColumnClass ?>"><div <?php echo $pres_fluidformulation_edit->StrengthUnit->cellAttributes() ?>>
<span id="el_pres_fluidformulation_StrengthUnit">
<input type="text" data-table="pres_fluidformulation" data-field="x_StrengthUnit" name="x_StrengthUnit" id="x_StrengthUnit" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($pres_fluidformulation_edit->StrengthUnit->getPlaceHolder()) ?>" value="<?php echo $pres_fluidformulation_edit->StrengthUnit->EditValue ?>"<?php echo $pres_fluidformulation_edit->StrengthUnit->editAttributes() ?>>
</span>
<?php echo $pres_fluidformulation_edit->StrengthUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_fluidformulation_edit->_Route->Visible) { // Route ?>
	<div id="r__Route" class="form-group row">
		<label id="elh_pres_fluidformulation__Route" for="x__Route" class="<?php echo $pres_fluidformulation_edit->LeftColumnClass ?>"><?php echo $pres_fluidformulation_edit->_Route->caption() ?><?php echo $pres_fluidformulation_edit->_Route->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_fluidformulation_edit->RightColumnClass ?>"><div <?php echo $pres_fluidformulation_edit->_Route->cellAttributes() ?>>
<span id="el_pres_fluidformulation__Route">
<input type="text" data-table="pres_fluidformulation" data-field="x__Route" name="x__Route" id="x__Route" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($pres_fluidformulation_edit->_Route->getPlaceHolder()) ?>" value="<?php echo $pres_fluidformulation_edit->_Route->EditValue ?>"<?php echo $pres_fluidformulation_edit->_Route->editAttributes() ?>>
</span>
<?php echo $pres_fluidformulation_edit->_Route->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_fluidformulation_edit->Forms->Visible) { // Forms ?>
	<div id="r_Forms" class="form-group row">
		<label id="elh_pres_fluidformulation_Forms" for="x_Forms" class="<?php echo $pres_fluidformulation_edit->LeftColumnClass ?>"><?php echo $pres_fluidformulation_edit->Forms->caption() ?><?php echo $pres_fluidformulation_edit->Forms->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_fluidformulation_edit->RightColumnClass ?>"><div <?php echo $pres_fluidformulation_edit->Forms->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Forms">
<input type="text" data-table="pres_fluidformulation" data-field="x_Forms" name="x_Forms" id="x_Forms" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($pres_fluidformulation_edit->Forms->getPlaceHolder()) ?>" value="<?php echo $pres_fluidformulation_edit->Forms->EditValue ?>"<?php echo $pres_fluidformulation_edit->Forms->editAttributes() ?>>
</span>
<?php echo $pres_fluidformulation_edit->Forms->CustomMsg ?></div></div>
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
$pres_fluidformulation_edit->terminate();
?>