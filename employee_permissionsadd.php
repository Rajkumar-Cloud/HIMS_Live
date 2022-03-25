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
$employee_permissions_add = new employee_permissions_add();

// Run the page
$employee_permissions_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_permissions_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var femployee_permissionsadd = currentForm = new ew.Form("femployee_permissionsadd", "add");

// Validate form
femployee_permissionsadd.validate = function() {
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
		<?php if ($employee_permissions_add->user_level->Required) { ?>
			elm = this.getElements("x" + infix + "_user_level");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_permissions->user_level->caption(), $employee_permissions->user_level->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_permissions_add->module_id->Required) { ?>
			elm = this.getElements("x" + infix + "_module_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_permissions->module_id->caption(), $employee_permissions->module_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_module_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_permissions->module_id->errorMessage()) ?>");
		<?php if ($employee_permissions_add->permission->Required) { ?>
			elm = this.getElements("x" + infix + "_permission");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_permissions->permission->caption(), $employee_permissions->permission->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_permissions_add->meta->Required) { ?>
			elm = this.getElements("x" + infix + "_meta");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_permissions->meta->caption(), $employee_permissions->meta->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_permissions_add->value->Required) { ?>
			elm = this.getElements("x" + infix + "_value");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_permissions->value->caption(), $employee_permissions->value->RequiredErrorMessage)) ?>");
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
femployee_permissionsadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_permissionsadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_permissionsadd.lists["x_user_level"] = <?php echo $employee_permissions_add->user_level->Lookup->toClientList() ?>;
femployee_permissionsadd.lists["x_user_level"].options = <?php echo JsonEncode($employee_permissions_add->user_level->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_permissions_add->showPageHeader(); ?>
<?php
$employee_permissions_add->showMessage();
?>
<form name="femployee_permissionsadd" id="femployee_permissionsadd" class="<?php echo $employee_permissions_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_permissions_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_permissions_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_permissions">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$employee_permissions_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($employee_permissions->user_level->Visible) { // user_level ?>
	<div id="r_user_level" class="form-group row">
		<label id="elh_employee_permissions_user_level" class="<?php echo $employee_permissions_add->LeftColumnClass ?>"><?php echo $employee_permissions->user_level->caption() ?><?php echo ($employee_permissions->user_level->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_permissions_add->RightColumnClass ?>"><div<?php echo $employee_permissions->user_level->cellAttributes() ?>>
<span id="el_employee_permissions_user_level">
<div id="tp_x_user_level" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_permissions" data-field="x_user_level" data-value-separator="<?php echo $employee_permissions->user_level->displayValueSeparatorAttribute() ?>" name="x_user_level" id="x_user_level" value="{value}"<?php echo $employee_permissions->user_level->editAttributes() ?>></div>
<div id="dsl_x_user_level" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_permissions->user_level->radioButtonListHtml(FALSE, "x_user_level") ?>
</div></div>
</span>
<?php echo $employee_permissions->user_level->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_permissions->module_id->Visible) { // module_id ?>
	<div id="r_module_id" class="form-group row">
		<label id="elh_employee_permissions_module_id" for="x_module_id" class="<?php echo $employee_permissions_add->LeftColumnClass ?>"><?php echo $employee_permissions->module_id->caption() ?><?php echo ($employee_permissions->module_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_permissions_add->RightColumnClass ?>"><div<?php echo $employee_permissions->module_id->cellAttributes() ?>>
<span id="el_employee_permissions_module_id">
<input type="text" data-table="employee_permissions" data-field="x_module_id" name="x_module_id" id="x_module_id" size="30" placeholder="<?php echo HtmlEncode($employee_permissions->module_id->getPlaceHolder()) ?>" value="<?php echo $employee_permissions->module_id->EditValue ?>"<?php echo $employee_permissions->module_id->editAttributes() ?>>
</span>
<?php echo $employee_permissions->module_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_permissions->permission->Visible) { // permission ?>
	<div id="r_permission" class="form-group row">
		<label id="elh_employee_permissions_permission" for="x_permission" class="<?php echo $employee_permissions_add->LeftColumnClass ?>"><?php echo $employee_permissions->permission->caption() ?><?php echo ($employee_permissions->permission->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_permissions_add->RightColumnClass ?>"><div<?php echo $employee_permissions->permission->cellAttributes() ?>>
<span id="el_employee_permissions_permission">
<input type="text" data-table="employee_permissions" data-field="x_permission" name="x_permission" id="x_permission" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($employee_permissions->permission->getPlaceHolder()) ?>" value="<?php echo $employee_permissions->permission->EditValue ?>"<?php echo $employee_permissions->permission->editAttributes() ?>>
</span>
<?php echo $employee_permissions->permission->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_permissions->meta->Visible) { // meta ?>
	<div id="r_meta" class="form-group row">
		<label id="elh_employee_permissions_meta" for="x_meta" class="<?php echo $employee_permissions_add->LeftColumnClass ?>"><?php echo $employee_permissions->meta->caption() ?><?php echo ($employee_permissions->meta->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_permissions_add->RightColumnClass ?>"><div<?php echo $employee_permissions->meta->cellAttributes() ?>>
<span id="el_employee_permissions_meta">
<textarea data-table="employee_permissions" data-field="x_meta" name="x_meta" id="x_meta" cols="35" rows="4" placeholder="<?php echo HtmlEncode($employee_permissions->meta->getPlaceHolder()) ?>"<?php echo $employee_permissions->meta->editAttributes() ?>><?php echo $employee_permissions->meta->EditValue ?></textarea>
</span>
<?php echo $employee_permissions->meta->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_permissions->value->Visible) { // value ?>
	<div id="r_value" class="form-group row">
		<label id="elh_employee_permissions_value" for="x_value" class="<?php echo $employee_permissions_add->LeftColumnClass ?>"><?php echo $employee_permissions->value->caption() ?><?php echo ($employee_permissions->value->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_permissions_add->RightColumnClass ?>"><div<?php echo $employee_permissions->value->cellAttributes() ?>>
<span id="el_employee_permissions_value">
<input type="text" data-table="employee_permissions" data-field="x_value" name="x_value" id="x_value" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($employee_permissions->value->getPlaceHolder()) ?>" value="<?php echo $employee_permissions->value->EditValue ?>"<?php echo $employee_permissions->value->editAttributes() ?>>
</span>
<?php echo $employee_permissions->value->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$employee_permissions_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $employee_permissions_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_permissions_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$employee_permissions_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_permissions_add->terminate();
?>