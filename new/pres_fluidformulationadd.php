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
$pres_fluidformulation_add = new pres_fluidformulation_add();

// Run the page
$pres_fluidformulation_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_fluidformulation_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpres_fluidformulationadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpres_fluidformulationadd = currentForm = new ew.Form("fpres_fluidformulationadd", "add");

	// Validate form
	fpres_fluidformulationadd.validate = function() {
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
			<?php if ($pres_fluidformulation_add->Tradename->Required) { ?>
				elm = this.getElements("x" + infix + "_Tradename");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_fluidformulation_add->Tradename->caption(), $pres_fluidformulation_add->Tradename->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_fluidformulation_add->Itemcode->Required) { ?>
				elm = this.getElements("x" + infix + "_Itemcode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_fluidformulation_add->Itemcode->caption(), $pres_fluidformulation_add->Itemcode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_fluidformulation_add->Genericname->Required) { ?>
				elm = this.getElements("x" + infix + "_Genericname");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_fluidformulation_add->Genericname->caption(), $pres_fluidformulation_add->Genericname->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_fluidformulation_add->Volume->Required) { ?>
				elm = this.getElements("x" + infix + "_Volume");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_fluidformulation_add->Volume->caption(), $pres_fluidformulation_add->Volume->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Volume");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pres_fluidformulation_add->Volume->errorMessage()) ?>");
			<?php if ($pres_fluidformulation_add->VolumeUnit->Required) { ?>
				elm = this.getElements("x" + infix + "_VolumeUnit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_fluidformulation_add->VolumeUnit->caption(), $pres_fluidformulation_add->VolumeUnit->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_fluidformulation_add->Strength->Required) { ?>
				elm = this.getElements("x" + infix + "_Strength");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_fluidformulation_add->Strength->caption(), $pres_fluidformulation_add->Strength->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Strength");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pres_fluidformulation_add->Strength->errorMessage()) ?>");
			<?php if ($pres_fluidformulation_add->StrengthUnit->Required) { ?>
				elm = this.getElements("x" + infix + "_StrengthUnit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_fluidformulation_add->StrengthUnit->caption(), $pres_fluidformulation_add->StrengthUnit->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_fluidformulation_add->_Route->Required) { ?>
				elm = this.getElements("x" + infix + "__Route");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_fluidformulation_add->_Route->caption(), $pres_fluidformulation_add->_Route->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_fluidformulation_add->Forms->Required) { ?>
				elm = this.getElements("x" + infix + "_Forms");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_fluidformulation_add->Forms->caption(), $pres_fluidformulation_add->Forms->RequiredErrorMessage)) ?>");
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
	fpres_fluidformulationadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpres_fluidformulationadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpres_fluidformulationadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pres_fluidformulation_add->showPageHeader(); ?>
<?php
$pres_fluidformulation_add->showMessage();
?>
<form name="fpres_fluidformulationadd" id="fpres_fluidformulationadd" class="<?php echo $pres_fluidformulation_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_fluidformulation">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$pres_fluidformulation_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($pres_fluidformulation_add->Tradename->Visible) { // Tradename ?>
	<div id="r_Tradename" class="form-group row">
		<label id="elh_pres_fluidformulation_Tradename" for="x_Tradename" class="<?php echo $pres_fluidformulation_add->LeftColumnClass ?>"><?php echo $pres_fluidformulation_add->Tradename->caption() ?><?php echo $pres_fluidformulation_add->Tradename->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_fluidformulation_add->RightColumnClass ?>"><div <?php echo $pres_fluidformulation_add->Tradename->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Tradename">
<input type="text" data-table="pres_fluidformulation" data-field="x_Tradename" name="x_Tradename" id="x_Tradename" placeholder="<?php echo HtmlEncode($pres_fluidformulation_add->Tradename->getPlaceHolder()) ?>" value="<?php echo $pres_fluidformulation_add->Tradename->EditValue ?>"<?php echo $pres_fluidformulation_add->Tradename->editAttributes() ?>>
</span>
<?php echo $pres_fluidformulation_add->Tradename->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_fluidformulation_add->Itemcode->Visible) { // Itemcode ?>
	<div id="r_Itemcode" class="form-group row">
		<label id="elh_pres_fluidformulation_Itemcode" for="x_Itemcode" class="<?php echo $pres_fluidformulation_add->LeftColumnClass ?>"><?php echo $pres_fluidformulation_add->Itemcode->caption() ?><?php echo $pres_fluidformulation_add->Itemcode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_fluidformulation_add->RightColumnClass ?>"><div <?php echo $pres_fluidformulation_add->Itemcode->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Itemcode">
<input type="text" data-table="pres_fluidformulation" data-field="x_Itemcode" name="x_Itemcode" id="x_Itemcode" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($pres_fluidformulation_add->Itemcode->getPlaceHolder()) ?>" value="<?php echo $pres_fluidformulation_add->Itemcode->EditValue ?>"<?php echo $pres_fluidformulation_add->Itemcode->editAttributes() ?>>
</span>
<?php echo $pres_fluidformulation_add->Itemcode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_fluidformulation_add->Genericname->Visible) { // Genericname ?>
	<div id="r_Genericname" class="form-group row">
		<label id="elh_pres_fluidformulation_Genericname" for="x_Genericname" class="<?php echo $pres_fluidformulation_add->LeftColumnClass ?>"><?php echo $pres_fluidformulation_add->Genericname->caption() ?><?php echo $pres_fluidformulation_add->Genericname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_fluidformulation_add->RightColumnClass ?>"><div <?php echo $pres_fluidformulation_add->Genericname->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Genericname">
<input type="text" data-table="pres_fluidformulation" data-field="x_Genericname" name="x_Genericname" id="x_Genericname" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pres_fluidformulation_add->Genericname->getPlaceHolder()) ?>" value="<?php echo $pres_fluidformulation_add->Genericname->EditValue ?>"<?php echo $pres_fluidformulation_add->Genericname->editAttributes() ?>>
</span>
<?php echo $pres_fluidformulation_add->Genericname->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_fluidformulation_add->Volume->Visible) { // Volume ?>
	<div id="r_Volume" class="form-group row">
		<label id="elh_pres_fluidformulation_Volume" for="x_Volume" class="<?php echo $pres_fluidformulation_add->LeftColumnClass ?>"><?php echo $pres_fluidformulation_add->Volume->caption() ?><?php echo $pres_fluidformulation_add->Volume->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_fluidformulation_add->RightColumnClass ?>"><div <?php echo $pres_fluidformulation_add->Volume->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Volume">
<input type="text" data-table="pres_fluidformulation" data-field="x_Volume" name="x_Volume" id="x_Volume" size="30" placeholder="<?php echo HtmlEncode($pres_fluidformulation_add->Volume->getPlaceHolder()) ?>" value="<?php echo $pres_fluidformulation_add->Volume->EditValue ?>"<?php echo $pres_fluidformulation_add->Volume->editAttributes() ?>>
</span>
<?php echo $pres_fluidformulation_add->Volume->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_fluidformulation_add->VolumeUnit->Visible) { // VolumeUnit ?>
	<div id="r_VolumeUnit" class="form-group row">
		<label id="elh_pres_fluidformulation_VolumeUnit" for="x_VolumeUnit" class="<?php echo $pres_fluidformulation_add->LeftColumnClass ?>"><?php echo $pres_fluidformulation_add->VolumeUnit->caption() ?><?php echo $pres_fluidformulation_add->VolumeUnit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_fluidformulation_add->RightColumnClass ?>"><div <?php echo $pres_fluidformulation_add->VolumeUnit->cellAttributes() ?>>
<span id="el_pres_fluidformulation_VolumeUnit">
<input type="text" data-table="pres_fluidformulation" data-field="x_VolumeUnit" name="x_VolumeUnit" id="x_VolumeUnit" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($pres_fluidformulation_add->VolumeUnit->getPlaceHolder()) ?>" value="<?php echo $pres_fluidformulation_add->VolumeUnit->EditValue ?>"<?php echo $pres_fluidformulation_add->VolumeUnit->editAttributes() ?>>
</span>
<?php echo $pres_fluidformulation_add->VolumeUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_fluidformulation_add->Strength->Visible) { // Strength ?>
	<div id="r_Strength" class="form-group row">
		<label id="elh_pres_fluidformulation_Strength" for="x_Strength" class="<?php echo $pres_fluidformulation_add->LeftColumnClass ?>"><?php echo $pres_fluidformulation_add->Strength->caption() ?><?php echo $pres_fluidformulation_add->Strength->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_fluidformulation_add->RightColumnClass ?>"><div <?php echo $pres_fluidformulation_add->Strength->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Strength">
<input type="text" data-table="pres_fluidformulation" data-field="x_Strength" name="x_Strength" id="x_Strength" size="30" placeholder="<?php echo HtmlEncode($pres_fluidformulation_add->Strength->getPlaceHolder()) ?>" value="<?php echo $pres_fluidformulation_add->Strength->EditValue ?>"<?php echo $pres_fluidformulation_add->Strength->editAttributes() ?>>
</span>
<?php echo $pres_fluidformulation_add->Strength->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_fluidformulation_add->StrengthUnit->Visible) { // StrengthUnit ?>
	<div id="r_StrengthUnit" class="form-group row">
		<label id="elh_pres_fluidformulation_StrengthUnit" for="x_StrengthUnit" class="<?php echo $pres_fluidformulation_add->LeftColumnClass ?>"><?php echo $pres_fluidformulation_add->StrengthUnit->caption() ?><?php echo $pres_fluidformulation_add->StrengthUnit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_fluidformulation_add->RightColumnClass ?>"><div <?php echo $pres_fluidformulation_add->StrengthUnit->cellAttributes() ?>>
<span id="el_pres_fluidformulation_StrengthUnit">
<input type="text" data-table="pres_fluidformulation" data-field="x_StrengthUnit" name="x_StrengthUnit" id="x_StrengthUnit" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($pres_fluidformulation_add->StrengthUnit->getPlaceHolder()) ?>" value="<?php echo $pres_fluidformulation_add->StrengthUnit->EditValue ?>"<?php echo $pres_fluidformulation_add->StrengthUnit->editAttributes() ?>>
</span>
<?php echo $pres_fluidformulation_add->StrengthUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_fluidformulation_add->_Route->Visible) { // Route ?>
	<div id="r__Route" class="form-group row">
		<label id="elh_pres_fluidformulation__Route" for="x__Route" class="<?php echo $pres_fluidformulation_add->LeftColumnClass ?>"><?php echo $pres_fluidformulation_add->_Route->caption() ?><?php echo $pres_fluidformulation_add->_Route->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_fluidformulation_add->RightColumnClass ?>"><div <?php echo $pres_fluidformulation_add->_Route->cellAttributes() ?>>
<span id="el_pres_fluidformulation__Route">
<input type="text" data-table="pres_fluidformulation" data-field="x__Route" name="x__Route" id="x__Route" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($pres_fluidformulation_add->_Route->getPlaceHolder()) ?>" value="<?php echo $pres_fluidformulation_add->_Route->EditValue ?>"<?php echo $pres_fluidformulation_add->_Route->editAttributes() ?>>
</span>
<?php echo $pres_fluidformulation_add->_Route->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_fluidformulation_add->Forms->Visible) { // Forms ?>
	<div id="r_Forms" class="form-group row">
		<label id="elh_pres_fluidformulation_Forms" for="x_Forms" class="<?php echo $pres_fluidformulation_add->LeftColumnClass ?>"><?php echo $pres_fluidformulation_add->Forms->caption() ?><?php echo $pres_fluidformulation_add->Forms->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_fluidformulation_add->RightColumnClass ?>"><div <?php echo $pres_fluidformulation_add->Forms->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Forms">
<input type="text" data-table="pres_fluidformulation" data-field="x_Forms" name="x_Forms" id="x_Forms" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($pres_fluidformulation_add->Forms->getPlaceHolder()) ?>" value="<?php echo $pres_fluidformulation_add->Forms->EditValue ?>"<?php echo $pres_fluidformulation_add->Forms->editAttributes() ?>>
</span>
<?php echo $pres_fluidformulation_add->Forms->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pres_fluidformulation_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pres_fluidformulation_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_fluidformulation_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pres_fluidformulation_add->showPageFooter();
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
$pres_fluidformulation_add->terminate();
?>