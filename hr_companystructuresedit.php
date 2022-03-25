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
$hr_companystructures_edit = new hr_companystructures_edit();

// Run the page
$hr_companystructures_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_companystructures_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fhr_companystructuresedit = currentForm = new ew.Form("fhr_companystructuresedit", "edit");

// Validate form
fhr_companystructuresedit.validate = function() {
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
		<?php if ($hr_companystructures_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_companystructures->id->caption(), $hr_companystructures->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_companystructures_edit->title->Required) { ?>
			elm = this.getElements("x" + infix + "_title");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_companystructures->title->caption(), $hr_companystructures->title->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_companystructures_edit->description->Required) { ?>
			elm = this.getElements("x" + infix + "_description");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_companystructures->description->caption(), $hr_companystructures->description->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_companystructures_edit->address->Required) { ?>
			elm = this.getElements("x" + infix + "_address");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_companystructures->address->caption(), $hr_companystructures->address->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_companystructures_edit->type->Required) { ?>
			elm = this.getElements("x" + infix + "_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_companystructures->type->caption(), $hr_companystructures->type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_companystructures_edit->country->Required) { ?>
			elm = this.getElements("x" + infix + "_country");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_companystructures->country->caption(), $hr_companystructures->country->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_companystructures_edit->parent->Required) { ?>
			elm = this.getElements("x" + infix + "_parent");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_companystructures->parent->caption(), $hr_companystructures->parent->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_parent");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($hr_companystructures->parent->errorMessage()) ?>");
		<?php if ($hr_companystructures_edit->timezone->Required) { ?>
			elm = this.getElements("x" + infix + "_timezone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_companystructures->timezone->caption(), $hr_companystructures->timezone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_companystructures_edit->heads->Required) { ?>
			elm = this.getElements("x" + infix + "_heads");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_companystructures->heads->caption(), $hr_companystructures->heads->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_companystructures_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_companystructures->HospID->caption(), $hr_companystructures->HospID->RequiredErrorMessage)) ?>");
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
fhr_companystructuresedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_companystructuresedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_companystructuresedit.lists["x_type"] = <?php echo $hr_companystructures_edit->type->Lookup->toClientList() ?>;
fhr_companystructuresedit.lists["x_type"].options = <?php echo JsonEncode($hr_companystructures_edit->type->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_companystructures_edit->showPageHeader(); ?>
<?php
$hr_companystructures_edit->showMessage();
?>
<form name="fhr_companystructuresedit" id="fhr_companystructuresedit" class="<?php echo $hr_companystructures_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_companystructures_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_companystructures_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_companystructures">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$hr_companystructures_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($hr_companystructures->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_hr_companystructures_id" class="<?php echo $hr_companystructures_edit->LeftColumnClass ?>"><?php echo $hr_companystructures->id->caption() ?><?php echo ($hr_companystructures->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_companystructures_edit->RightColumnClass ?>"><div<?php echo $hr_companystructures->id->cellAttributes() ?>>
<span id="el_hr_companystructures_id">
<span<?php echo $hr_companystructures->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($hr_companystructures->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="hr_companystructures" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($hr_companystructures->id->CurrentValue) ?>">
<?php echo $hr_companystructures->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_companystructures->title->Visible) { // title ?>
	<div id="r_title" class="form-group row">
		<label id="elh_hr_companystructures_title" for="x_title" class="<?php echo $hr_companystructures_edit->LeftColumnClass ?>"><?php echo $hr_companystructures->title->caption() ?><?php echo ($hr_companystructures->title->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_companystructures_edit->RightColumnClass ?>"><div<?php echo $hr_companystructures->title->cellAttributes() ?>>
<span id="el_hr_companystructures_title">
<input type="text" data-table="hr_companystructures" data-field="x_title" name="x_title" id="x_title" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($hr_companystructures->title->getPlaceHolder()) ?>" value="<?php echo $hr_companystructures->title->EditValue ?>"<?php echo $hr_companystructures->title->editAttributes() ?>>
</span>
<?php echo $hr_companystructures->title->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_companystructures->description->Visible) { // description ?>
	<div id="r_description" class="form-group row">
		<label id="elh_hr_companystructures_description" for="x_description" class="<?php echo $hr_companystructures_edit->LeftColumnClass ?>"><?php echo $hr_companystructures->description->caption() ?><?php echo ($hr_companystructures->description->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_companystructures_edit->RightColumnClass ?>"><div<?php echo $hr_companystructures->description->cellAttributes() ?>>
<span id="el_hr_companystructures_description">
<textarea data-table="hr_companystructures" data-field="x_description" name="x_description" id="x_description" cols="35" rows="4" placeholder="<?php echo HtmlEncode($hr_companystructures->description->getPlaceHolder()) ?>"<?php echo $hr_companystructures->description->editAttributes() ?>><?php echo $hr_companystructures->description->EditValue ?></textarea>
</span>
<?php echo $hr_companystructures->description->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_companystructures->address->Visible) { // address ?>
	<div id="r_address" class="form-group row">
		<label id="elh_hr_companystructures_address" for="x_address" class="<?php echo $hr_companystructures_edit->LeftColumnClass ?>"><?php echo $hr_companystructures->address->caption() ?><?php echo ($hr_companystructures->address->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_companystructures_edit->RightColumnClass ?>"><div<?php echo $hr_companystructures->address->cellAttributes() ?>>
<span id="el_hr_companystructures_address">
<textarea data-table="hr_companystructures" data-field="x_address" name="x_address" id="x_address" cols="35" rows="4" placeholder="<?php echo HtmlEncode($hr_companystructures->address->getPlaceHolder()) ?>"<?php echo $hr_companystructures->address->editAttributes() ?>><?php echo $hr_companystructures->address->EditValue ?></textarea>
</span>
<?php echo $hr_companystructures->address->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_companystructures->type->Visible) { // type ?>
	<div id="r_type" class="form-group row">
		<label id="elh_hr_companystructures_type" class="<?php echo $hr_companystructures_edit->LeftColumnClass ?>"><?php echo $hr_companystructures->type->caption() ?><?php echo ($hr_companystructures->type->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_companystructures_edit->RightColumnClass ?>"><div<?php echo $hr_companystructures->type->cellAttributes() ?>>
<span id="el_hr_companystructures_type">
<div id="tp_x_type" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_companystructures" data-field="x_type" data-value-separator="<?php echo $hr_companystructures->type->displayValueSeparatorAttribute() ?>" name="x_type" id="x_type" value="{value}"<?php echo $hr_companystructures->type->editAttributes() ?>></div>
<div id="dsl_x_type" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_companystructures->type->radioButtonListHtml(FALSE, "x_type") ?>
</div></div>
</span>
<?php echo $hr_companystructures->type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_companystructures->country->Visible) { // country ?>
	<div id="r_country" class="form-group row">
		<label id="elh_hr_companystructures_country" for="x_country" class="<?php echo $hr_companystructures_edit->LeftColumnClass ?>"><?php echo $hr_companystructures->country->caption() ?><?php echo ($hr_companystructures->country->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_companystructures_edit->RightColumnClass ?>"><div<?php echo $hr_companystructures->country->cellAttributes() ?>>
<span id="el_hr_companystructures_country">
<input type="text" data-table="hr_companystructures" data-field="x_country" name="x_country" id="x_country" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($hr_companystructures->country->getPlaceHolder()) ?>" value="<?php echo $hr_companystructures->country->EditValue ?>"<?php echo $hr_companystructures->country->editAttributes() ?>>
</span>
<?php echo $hr_companystructures->country->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_companystructures->parent->Visible) { // parent ?>
	<div id="r_parent" class="form-group row">
		<label id="elh_hr_companystructures_parent" for="x_parent" class="<?php echo $hr_companystructures_edit->LeftColumnClass ?>"><?php echo $hr_companystructures->parent->caption() ?><?php echo ($hr_companystructures->parent->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_companystructures_edit->RightColumnClass ?>"><div<?php echo $hr_companystructures->parent->cellAttributes() ?>>
<span id="el_hr_companystructures_parent">
<input type="text" data-table="hr_companystructures" data-field="x_parent" name="x_parent" id="x_parent" size="30" placeholder="<?php echo HtmlEncode($hr_companystructures->parent->getPlaceHolder()) ?>" value="<?php echo $hr_companystructures->parent->EditValue ?>"<?php echo $hr_companystructures->parent->editAttributes() ?>>
</span>
<?php echo $hr_companystructures->parent->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_companystructures->timezone->Visible) { // timezone ?>
	<div id="r_timezone" class="form-group row">
		<label id="elh_hr_companystructures_timezone" for="x_timezone" class="<?php echo $hr_companystructures_edit->LeftColumnClass ?>"><?php echo $hr_companystructures->timezone->caption() ?><?php echo ($hr_companystructures->timezone->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_companystructures_edit->RightColumnClass ?>"><div<?php echo $hr_companystructures->timezone->cellAttributes() ?>>
<span id="el_hr_companystructures_timezone">
<input type="text" data-table="hr_companystructures" data-field="x_timezone" name="x_timezone" id="x_timezone" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hr_companystructures->timezone->getPlaceHolder()) ?>" value="<?php echo $hr_companystructures->timezone->EditValue ?>"<?php echo $hr_companystructures->timezone->editAttributes() ?>>
</span>
<?php echo $hr_companystructures->timezone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_companystructures->heads->Visible) { // heads ?>
	<div id="r_heads" class="form-group row">
		<label id="elh_hr_companystructures_heads" for="x_heads" class="<?php echo $hr_companystructures_edit->LeftColumnClass ?>"><?php echo $hr_companystructures->heads->caption() ?><?php echo ($hr_companystructures->heads->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_companystructures_edit->RightColumnClass ?>"><div<?php echo $hr_companystructures->heads->cellAttributes() ?>>
<span id="el_hr_companystructures_heads">
<input type="text" data-table="hr_companystructures" data-field="x_heads" name="x_heads" id="x_heads" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($hr_companystructures->heads->getPlaceHolder()) ?>" value="<?php echo $hr_companystructures->heads->EditValue ?>"<?php echo $hr_companystructures->heads->editAttributes() ?>>
</span>
<?php echo $hr_companystructures->heads->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$hr_companystructures_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $hr_companystructures_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_companystructures_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$hr_companystructures_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_companystructures_edit->terminate();
?>