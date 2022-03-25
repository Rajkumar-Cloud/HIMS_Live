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
$employee_dependents_edit = new employee_dependents_edit();

// Run the page
$employee_dependents_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_dependents_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var femployee_dependentsedit = currentForm = new ew.Form("femployee_dependentsedit", "edit");

// Validate form
femployee_dependentsedit.validate = function() {
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
		<?php if ($employee_dependents_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_dependents->id->caption(), $employee_dependents->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_dependents_edit->employee->Required) { ?>
			elm = this.getElements("x" + infix + "_employee");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_dependents->employee->caption(), $employee_dependents->employee->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_employee");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_dependents->employee->errorMessage()) ?>");
		<?php if ($employee_dependents_edit->name->Required) { ?>
			elm = this.getElements("x" + infix + "_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_dependents->name->caption(), $employee_dependents->name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_dependents_edit->relationship->Required) { ?>
			elm = this.getElements("x" + infix + "_relationship");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_dependents->relationship->caption(), $employee_dependents->relationship->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_dependents_edit->dob->Required) { ?>
			elm = this.getElements("x" + infix + "_dob");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_dependents->dob->caption(), $employee_dependents->dob->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_dob");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_dependents->dob->errorMessage()) ?>");
		<?php if ($employee_dependents_edit->id_number->Required) { ?>
			elm = this.getElements("x" + infix + "_id_number");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_dependents->id_number->caption(), $employee_dependents->id_number->RequiredErrorMessage)) ?>");
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
femployee_dependentsedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_dependentsedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_dependentsedit.lists["x_relationship"] = <?php echo $employee_dependents_edit->relationship->Lookup->toClientList() ?>;
femployee_dependentsedit.lists["x_relationship"].options = <?php echo JsonEncode($employee_dependents_edit->relationship->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_dependents_edit->showPageHeader(); ?>
<?php
$employee_dependents_edit->showMessage();
?>
<form name="femployee_dependentsedit" id="femployee_dependentsedit" class="<?php echo $employee_dependents_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_dependents_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_dependents_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_dependents">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$employee_dependents_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($employee_dependents->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_employee_dependents_id" class="<?php echo $employee_dependents_edit->LeftColumnClass ?>"><?php echo $employee_dependents->id->caption() ?><?php echo ($employee_dependents->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_dependents_edit->RightColumnClass ?>"><div<?php echo $employee_dependents->id->cellAttributes() ?>>
<span id="el_employee_dependents_id">
<span<?php echo $employee_dependents->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_dependents->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_dependents" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($employee_dependents->id->CurrentValue) ?>">
<?php echo $employee_dependents->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_dependents->employee->Visible) { // employee ?>
	<div id="r_employee" class="form-group row">
		<label id="elh_employee_dependents_employee" for="x_employee" class="<?php echo $employee_dependents_edit->LeftColumnClass ?>"><?php echo $employee_dependents->employee->caption() ?><?php echo ($employee_dependents->employee->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_dependents_edit->RightColumnClass ?>"><div<?php echo $employee_dependents->employee->cellAttributes() ?>>
<span id="el_employee_dependents_employee">
<input type="text" data-table="employee_dependents" data-field="x_employee" name="x_employee" id="x_employee" size="30" placeholder="<?php echo HtmlEncode($employee_dependents->employee->getPlaceHolder()) ?>" value="<?php echo $employee_dependents->employee->EditValue ?>"<?php echo $employee_dependents->employee->editAttributes() ?>>
</span>
<?php echo $employee_dependents->employee->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_dependents->name->Visible) { // name ?>
	<div id="r_name" class="form-group row">
		<label id="elh_employee_dependents_name" for="x_name" class="<?php echo $employee_dependents_edit->LeftColumnClass ?>"><?php echo $employee_dependents->name->caption() ?><?php echo ($employee_dependents->name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_dependents_edit->RightColumnClass ?>"><div<?php echo $employee_dependents->name->cellAttributes() ?>>
<span id="el_employee_dependents_name">
<input type="text" data-table="employee_dependents" data-field="x_name" name="x_name" id="x_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_dependents->name->getPlaceHolder()) ?>" value="<?php echo $employee_dependents->name->EditValue ?>"<?php echo $employee_dependents->name->editAttributes() ?>>
</span>
<?php echo $employee_dependents->name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_dependents->relationship->Visible) { // relationship ?>
	<div id="r_relationship" class="form-group row">
		<label id="elh_employee_dependents_relationship" class="<?php echo $employee_dependents_edit->LeftColumnClass ?>"><?php echo $employee_dependents->relationship->caption() ?><?php echo ($employee_dependents->relationship->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_dependents_edit->RightColumnClass ?>"><div<?php echo $employee_dependents->relationship->cellAttributes() ?>>
<span id="el_employee_dependents_relationship">
<div id="tp_x_relationship" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_dependents" data-field="x_relationship" data-value-separator="<?php echo $employee_dependents->relationship->displayValueSeparatorAttribute() ?>" name="x_relationship" id="x_relationship" value="{value}"<?php echo $employee_dependents->relationship->editAttributes() ?>></div>
<div id="dsl_x_relationship" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_dependents->relationship->radioButtonListHtml(FALSE, "x_relationship") ?>
</div></div>
</span>
<?php echo $employee_dependents->relationship->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_dependents->dob->Visible) { // dob ?>
	<div id="r_dob" class="form-group row">
		<label id="elh_employee_dependents_dob" for="x_dob" class="<?php echo $employee_dependents_edit->LeftColumnClass ?>"><?php echo $employee_dependents->dob->caption() ?><?php echo ($employee_dependents->dob->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_dependents_edit->RightColumnClass ?>"><div<?php echo $employee_dependents->dob->cellAttributes() ?>>
<span id="el_employee_dependents_dob">
<input type="text" data-table="employee_dependents" data-field="x_dob" name="x_dob" id="x_dob" placeholder="<?php echo HtmlEncode($employee_dependents->dob->getPlaceHolder()) ?>" value="<?php echo $employee_dependents->dob->EditValue ?>"<?php echo $employee_dependents->dob->editAttributes() ?>>
<?php if (!$employee_dependents->dob->ReadOnly && !$employee_dependents->dob->Disabled && !isset($employee_dependents->dob->EditAttrs["readonly"]) && !isset($employee_dependents->dob->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_dependentsedit", "x_dob", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee_dependents->dob->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_dependents->id_number->Visible) { // id_number ?>
	<div id="r_id_number" class="form-group row">
		<label id="elh_employee_dependents_id_number" for="x_id_number" class="<?php echo $employee_dependents_edit->LeftColumnClass ?>"><?php echo $employee_dependents->id_number->caption() ?><?php echo ($employee_dependents->id_number->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_dependents_edit->RightColumnClass ?>"><div<?php echo $employee_dependents->id_number->cellAttributes() ?>>
<span id="el_employee_dependents_id_number">
<input type="text" data-table="employee_dependents" data-field="x_id_number" name="x_id_number" id="x_id_number" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($employee_dependents->id_number->getPlaceHolder()) ?>" value="<?php echo $employee_dependents->id_number->EditValue ?>"<?php echo $employee_dependents->id_number->editAttributes() ?>>
</span>
<?php echo $employee_dependents->id_number->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$employee_dependents_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $employee_dependents_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_dependents_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$employee_dependents_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_dependents_edit->terminate();
?>