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
$pharmacy_combination_edit = new pharmacy_combination_edit();

// Run the page
$pharmacy_combination_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_combination_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpharmacy_combinationedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpharmacy_combinationedit = currentForm = new ew.Form("fpharmacy_combinationedit", "edit");

	// Validate form
	fpharmacy_combinationedit.validate = function() {
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
			<?php if ($pharmacy_combination_edit->GENCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_GENCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_combination_edit->GENCODE->caption(), $pharmacy_combination_edit->GENCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_combination_edit->COMBCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_COMBCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_combination_edit->COMBCODE->caption(), $pharmacy_combination_edit->COMBCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_combination_edit->STRENGTH->Required) { ?>
				elm = this.getElements("x" + infix + "_STRENGTH");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_combination_edit->STRENGTH->caption(), $pharmacy_combination_edit->STRENGTH->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_STRENGTH");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_combination_edit->STRENGTH->errorMessage()) ?>");
			<?php if ($pharmacy_combination_edit->SLNO->Required) { ?>
				elm = this.getElements("x" + infix + "_SLNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_combination_edit->SLNO->caption(), $pharmacy_combination_edit->SLNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_combination_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_combination_edit->id->caption(), $pharmacy_combination_edit->id->RequiredErrorMessage)) ?>");
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
	fpharmacy_combinationedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_combinationedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpharmacy_combinationedit.lists["x_GENCODE"] = <?php echo $pharmacy_combination_edit->GENCODE->Lookup->toClientList($pharmacy_combination_edit) ?>;
	fpharmacy_combinationedit.lists["x_GENCODE"].options = <?php echo JsonEncode($pharmacy_combination_edit->GENCODE->lookupOptions()) ?>;
	fpharmacy_combinationedit.lists["x_COMBCODE"] = <?php echo $pharmacy_combination_edit->COMBCODE->Lookup->toClientList($pharmacy_combination_edit) ?>;
	fpharmacy_combinationedit.lists["x_COMBCODE"].options = <?php echo JsonEncode($pharmacy_combination_edit->COMBCODE->lookupOptions()) ?>;
	loadjs.done("fpharmacy_combinationedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_combination_edit->showPageHeader(); ?>
<?php
$pharmacy_combination_edit->showMessage();
?>
<form name="fpharmacy_combinationedit" id="fpharmacy_combinationedit" class="<?php echo $pharmacy_combination_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_combination">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_combination_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($pharmacy_combination_edit->GENCODE->Visible) { // GENCODE ?>
	<div id="r_GENCODE" class="form-group row">
		<label id="elh_pharmacy_combination_GENCODE" for="x_GENCODE" class="<?php echo $pharmacy_combination_edit->LeftColumnClass ?>"><?php echo $pharmacy_combination_edit->GENCODE->caption() ?><?php echo $pharmacy_combination_edit->GENCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_combination_edit->RightColumnClass ?>"><div <?php echo $pharmacy_combination_edit->GENCODE->cellAttributes() ?>>
<span id="el_pharmacy_combination_GENCODE">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_GENCODE"><?php echo EmptyValue(strval($pharmacy_combination_edit->GENCODE->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_combination_edit->GENCODE->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_combination_edit->GENCODE->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_combination_edit->GENCODE->ReadOnly || $pharmacy_combination_edit->GENCODE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_GENCODE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_combination_edit->GENCODE->Lookup->getParamTag($pharmacy_combination_edit, "p_x_GENCODE") ?>
<input type="hidden" data-table="pharmacy_combination" data-field="x_GENCODE" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_combination_edit->GENCODE->displayValueSeparatorAttribute() ?>" name="x_GENCODE" id="x_GENCODE" value="<?php echo $pharmacy_combination_edit->GENCODE->CurrentValue ?>"<?php echo $pharmacy_combination_edit->GENCODE->editAttributes() ?>>
</span>
<?php echo $pharmacy_combination_edit->GENCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_combination_edit->COMBCODE->Visible) { // COMBCODE ?>
	<div id="r_COMBCODE" class="form-group row">
		<label id="elh_pharmacy_combination_COMBCODE" for="x_COMBCODE" class="<?php echo $pharmacy_combination_edit->LeftColumnClass ?>"><?php echo $pharmacy_combination_edit->COMBCODE->caption() ?><?php echo $pharmacy_combination_edit->COMBCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_combination_edit->RightColumnClass ?>"><div <?php echo $pharmacy_combination_edit->COMBCODE->cellAttributes() ?>>
<span id="el_pharmacy_combination_COMBCODE">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_COMBCODE"><?php echo EmptyValue(strval($pharmacy_combination_edit->COMBCODE->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_combination_edit->COMBCODE->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_combination_edit->COMBCODE->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_combination_edit->COMBCODE->ReadOnly || $pharmacy_combination_edit->COMBCODE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_COMBCODE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_combination_edit->COMBCODE->Lookup->getParamTag($pharmacy_combination_edit, "p_x_COMBCODE") ?>
<input type="hidden" data-table="pharmacy_combination" data-field="x_COMBCODE" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_combination_edit->COMBCODE->displayValueSeparatorAttribute() ?>" name="x_COMBCODE" id="x_COMBCODE" value="<?php echo $pharmacy_combination_edit->COMBCODE->CurrentValue ?>"<?php echo $pharmacy_combination_edit->COMBCODE->editAttributes() ?>>
</span>
<?php echo $pharmacy_combination_edit->COMBCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_combination_edit->STRENGTH->Visible) { // STRENGTH ?>
	<div id="r_STRENGTH" class="form-group row">
		<label id="elh_pharmacy_combination_STRENGTH" for="x_STRENGTH" class="<?php echo $pharmacy_combination_edit->LeftColumnClass ?>"><?php echo $pharmacy_combination_edit->STRENGTH->caption() ?><?php echo $pharmacy_combination_edit->STRENGTH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_combination_edit->RightColumnClass ?>"><div <?php echo $pharmacy_combination_edit->STRENGTH->cellAttributes() ?>>
<span id="el_pharmacy_combination_STRENGTH">
<input type="text" data-table="pharmacy_combination" data-field="x_STRENGTH" name="x_STRENGTH" id="x_STRENGTH" size="30" placeholder="<?php echo HtmlEncode($pharmacy_combination_edit->STRENGTH->getPlaceHolder()) ?>" value="<?php echo $pharmacy_combination_edit->STRENGTH->EditValue ?>"<?php echo $pharmacy_combination_edit->STRENGTH->editAttributes() ?>>
</span>
<?php echo $pharmacy_combination_edit->STRENGTH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_combination_edit->SLNO->Visible) { // SLNO ?>
	<div id="r_SLNO" class="form-group row">
		<label id="elh_pharmacy_combination_SLNO" for="x_SLNO" class="<?php echo $pharmacy_combination_edit->LeftColumnClass ?>"><?php echo $pharmacy_combination_edit->SLNO->caption() ?><?php echo $pharmacy_combination_edit->SLNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_combination_edit->RightColumnClass ?>"><div <?php echo $pharmacy_combination_edit->SLNO->cellAttributes() ?>>
<span id="el_pharmacy_combination_SLNO">
<input type="text" data-table="pharmacy_combination" data-field="x_SLNO" name="x_SLNO" id="x_SLNO" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($pharmacy_combination_edit->SLNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_combination_edit->SLNO->EditValue ?>"<?php echo $pharmacy_combination_edit->SLNO->editAttributes() ?>>
</span>
<?php echo $pharmacy_combination_edit->SLNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_combination_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_pharmacy_combination_id" class="<?php echo $pharmacy_combination_edit->LeftColumnClass ?>"><?php echo $pharmacy_combination_edit->id->caption() ?><?php echo $pharmacy_combination_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_combination_edit->RightColumnClass ?>"><div <?php echo $pharmacy_combination_edit->id->cellAttributes() ?>>
<span id="el_pharmacy_combination_id">
<span<?php echo $pharmacy_combination_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_combination_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_combination" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($pharmacy_combination_edit->id->CurrentValue) ?>">
<?php echo $pharmacy_combination_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pharmacy_combination_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_combination_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_combination_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pharmacy_combination_edit->showPageFooter();
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
$pharmacy_combination_edit->terminate();
?>