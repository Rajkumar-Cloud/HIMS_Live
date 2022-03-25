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
$sys_country_edit = new sys_country_edit();

// Run the page
$sys_country_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_country_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fsys_countryedit = currentForm = new ew.Form("fsys_countryedit", "edit");

// Validate form
fsys_countryedit.validate = function() {
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
		<?php if ($sys_country_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sys_country->id->caption(), $sys_country->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($sys_country_edit->code->Required) { ?>
			elm = this.getElements("x" + infix + "_code");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sys_country->code->caption(), $sys_country->code->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($sys_country_edit->namecap->Required) { ?>
			elm = this.getElements("x" + infix + "_namecap");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sys_country->namecap->caption(), $sys_country->namecap->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($sys_country_edit->name->Required) { ?>
			elm = this.getElements("x" + infix + "_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sys_country->name->caption(), $sys_country->name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($sys_country_edit->iso3->Required) { ?>
			elm = this.getElements("x" + infix + "_iso3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sys_country->iso3->caption(), $sys_country->iso3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($sys_country_edit->numcode->Required) { ?>
			elm = this.getElements("x" + infix + "_numcode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sys_country->numcode->caption(), $sys_country->numcode->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_numcode");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($sys_country->numcode->errorMessage()) ?>");

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
fsys_countryedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsys_countryedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $sys_country_edit->showPageHeader(); ?>
<?php
$sys_country_edit->showMessage();
?>
<form name="fsys_countryedit" id="fsys_countryedit" class="<?php echo $sys_country_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sys_country_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sys_country_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_country">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$sys_country_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($sys_country->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_sys_country_id" class="<?php echo $sys_country_edit->LeftColumnClass ?>"><?php echo $sys_country->id->caption() ?><?php echo ($sys_country->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sys_country_edit->RightColumnClass ?>"><div<?php echo $sys_country->id->cellAttributes() ?>>
<span id="el_sys_country_id">
<span<?php echo $sys_country->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($sys_country->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="sys_country" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($sys_country->id->CurrentValue) ?>">
<?php echo $sys_country->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sys_country->code->Visible) { // code ?>
	<div id="r_code" class="form-group row">
		<label id="elh_sys_country_code" for="x_code" class="<?php echo $sys_country_edit->LeftColumnClass ?>"><?php echo $sys_country->code->caption() ?><?php echo ($sys_country->code->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sys_country_edit->RightColumnClass ?>"><div<?php echo $sys_country->code->cellAttributes() ?>>
<span id="el_sys_country_code">
<input type="text" data-table="sys_country" data-field="x_code" name="x_code" id="x_code" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($sys_country->code->getPlaceHolder()) ?>" value="<?php echo $sys_country->code->EditValue ?>"<?php echo $sys_country->code->editAttributes() ?>>
</span>
<?php echo $sys_country->code->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sys_country->namecap->Visible) { // namecap ?>
	<div id="r_namecap" class="form-group row">
		<label id="elh_sys_country_namecap" for="x_namecap" class="<?php echo $sys_country_edit->LeftColumnClass ?>"><?php echo $sys_country->namecap->caption() ?><?php echo ($sys_country->namecap->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sys_country_edit->RightColumnClass ?>"><div<?php echo $sys_country->namecap->cellAttributes() ?>>
<span id="el_sys_country_namecap">
<input type="text" data-table="sys_country" data-field="x_namecap" name="x_namecap" id="x_namecap" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($sys_country->namecap->getPlaceHolder()) ?>" value="<?php echo $sys_country->namecap->EditValue ?>"<?php echo $sys_country->namecap->editAttributes() ?>>
</span>
<?php echo $sys_country->namecap->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sys_country->name->Visible) { // name ?>
	<div id="r_name" class="form-group row">
		<label id="elh_sys_country_name" for="x_name" class="<?php echo $sys_country_edit->LeftColumnClass ?>"><?php echo $sys_country->name->caption() ?><?php echo ($sys_country->name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sys_country_edit->RightColumnClass ?>"><div<?php echo $sys_country->name->cellAttributes() ?>>
<span id="el_sys_country_name">
<input type="text" data-table="sys_country" data-field="x_name" name="x_name" id="x_name" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($sys_country->name->getPlaceHolder()) ?>" value="<?php echo $sys_country->name->EditValue ?>"<?php echo $sys_country->name->editAttributes() ?>>
</span>
<?php echo $sys_country->name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sys_country->iso3->Visible) { // iso3 ?>
	<div id="r_iso3" class="form-group row">
		<label id="elh_sys_country_iso3" for="x_iso3" class="<?php echo $sys_country_edit->LeftColumnClass ?>"><?php echo $sys_country->iso3->caption() ?><?php echo ($sys_country->iso3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sys_country_edit->RightColumnClass ?>"><div<?php echo $sys_country->iso3->cellAttributes() ?>>
<span id="el_sys_country_iso3">
<input type="text" data-table="sys_country" data-field="x_iso3" name="x_iso3" id="x_iso3" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($sys_country->iso3->getPlaceHolder()) ?>" value="<?php echo $sys_country->iso3->EditValue ?>"<?php echo $sys_country->iso3->editAttributes() ?>>
</span>
<?php echo $sys_country->iso3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sys_country->numcode->Visible) { // numcode ?>
	<div id="r_numcode" class="form-group row">
		<label id="elh_sys_country_numcode" for="x_numcode" class="<?php echo $sys_country_edit->LeftColumnClass ?>"><?php echo $sys_country->numcode->caption() ?><?php echo ($sys_country->numcode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sys_country_edit->RightColumnClass ?>"><div<?php echo $sys_country->numcode->cellAttributes() ?>>
<span id="el_sys_country_numcode">
<input type="text" data-table="sys_country" data-field="x_numcode" name="x_numcode" id="x_numcode" size="30" placeholder="<?php echo HtmlEncode($sys_country->numcode->getPlaceHolder()) ?>" value="<?php echo $sys_country->numcode->EditValue ?>"<?php echo $sys_country->numcode->editAttributes() ?>>
</span>
<?php echo $sys_country->numcode->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$sys_country_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $sys_country_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sys_country_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$sys_country_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$sys_country_edit->terminate();
?>