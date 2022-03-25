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
$employee_leavedays_edit = new employee_leavedays_edit();

// Run the page
$employee_leavedays_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_leavedays_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var femployee_leavedaysedit = currentForm = new ew.Form("femployee_leavedaysedit", "edit");

// Validate form
femployee_leavedaysedit.validate = function() {
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
		<?php if ($employee_leavedays_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_leavedays->id->caption(), $employee_leavedays->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_leavedays_edit->employee_leave->Required) { ?>
			elm = this.getElements("x" + infix + "_employee_leave");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_leavedays->employee_leave->caption(), $employee_leavedays->employee_leave->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_employee_leave");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_leavedays->employee_leave->errorMessage()) ?>");
		<?php if ($employee_leavedays_edit->leave_date->Required) { ?>
			elm = this.getElements("x" + infix + "_leave_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_leavedays->leave_date->caption(), $employee_leavedays->leave_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_leave_date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_leavedays->leave_date->errorMessage()) ?>");
		<?php if ($employee_leavedays_edit->leave_type->Required) { ?>
			elm = this.getElements("x" + infix + "_leave_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_leavedays->leave_type->caption(), $employee_leavedays->leave_type->RequiredErrorMessage)) ?>");
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
femployee_leavedaysedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_leavedaysedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_leavedaysedit.lists["x_leave_type"] = <?php echo $employee_leavedays_edit->leave_type->Lookup->toClientList() ?>;
femployee_leavedaysedit.lists["x_leave_type"].options = <?php echo JsonEncode($employee_leavedays_edit->leave_type->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_leavedays_edit->showPageHeader(); ?>
<?php
$employee_leavedays_edit->showMessage();
?>
<form name="femployee_leavedaysedit" id="femployee_leavedaysedit" class="<?php echo $employee_leavedays_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_leavedays_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_leavedays_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_leavedays">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$employee_leavedays_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($employee_leavedays->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_employee_leavedays_id" class="<?php echo $employee_leavedays_edit->LeftColumnClass ?>"><?php echo $employee_leavedays->id->caption() ?><?php echo ($employee_leavedays->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_leavedays_edit->RightColumnClass ?>"><div<?php echo $employee_leavedays->id->cellAttributes() ?>>
<span id="el_employee_leavedays_id">
<span<?php echo $employee_leavedays->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_leavedays->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_leavedays" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($employee_leavedays->id->CurrentValue) ?>">
<?php echo $employee_leavedays->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_leavedays->employee_leave->Visible) { // employee_leave ?>
	<div id="r_employee_leave" class="form-group row">
		<label id="elh_employee_leavedays_employee_leave" for="x_employee_leave" class="<?php echo $employee_leavedays_edit->LeftColumnClass ?>"><?php echo $employee_leavedays->employee_leave->caption() ?><?php echo ($employee_leavedays->employee_leave->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_leavedays_edit->RightColumnClass ?>"><div<?php echo $employee_leavedays->employee_leave->cellAttributes() ?>>
<span id="el_employee_leavedays_employee_leave">
<input type="text" data-table="employee_leavedays" data-field="x_employee_leave" name="x_employee_leave" id="x_employee_leave" size="30" placeholder="<?php echo HtmlEncode($employee_leavedays->employee_leave->getPlaceHolder()) ?>" value="<?php echo $employee_leavedays->employee_leave->EditValue ?>"<?php echo $employee_leavedays->employee_leave->editAttributes() ?>>
</span>
<?php echo $employee_leavedays->employee_leave->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_leavedays->leave_date->Visible) { // leave_date ?>
	<div id="r_leave_date" class="form-group row">
		<label id="elh_employee_leavedays_leave_date" for="x_leave_date" class="<?php echo $employee_leavedays_edit->LeftColumnClass ?>"><?php echo $employee_leavedays->leave_date->caption() ?><?php echo ($employee_leavedays->leave_date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_leavedays_edit->RightColumnClass ?>"><div<?php echo $employee_leavedays->leave_date->cellAttributes() ?>>
<span id="el_employee_leavedays_leave_date">
<input type="text" data-table="employee_leavedays" data-field="x_leave_date" name="x_leave_date" id="x_leave_date" placeholder="<?php echo HtmlEncode($employee_leavedays->leave_date->getPlaceHolder()) ?>" value="<?php echo $employee_leavedays->leave_date->EditValue ?>"<?php echo $employee_leavedays->leave_date->editAttributes() ?>>
<?php if (!$employee_leavedays->leave_date->ReadOnly && !$employee_leavedays->leave_date->Disabled && !isset($employee_leavedays->leave_date->EditAttrs["readonly"]) && !isset($employee_leavedays->leave_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_leavedaysedit", "x_leave_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee_leavedays->leave_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_leavedays->leave_type->Visible) { // leave_type ?>
	<div id="r_leave_type" class="form-group row">
		<label id="elh_employee_leavedays_leave_type" class="<?php echo $employee_leavedays_edit->LeftColumnClass ?>"><?php echo $employee_leavedays->leave_type->caption() ?><?php echo ($employee_leavedays->leave_type->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_leavedays_edit->RightColumnClass ?>"><div<?php echo $employee_leavedays->leave_type->cellAttributes() ?>>
<span id="el_employee_leavedays_leave_type">
<div id="tp_x_leave_type" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_leavedays" data-field="x_leave_type" data-value-separator="<?php echo $employee_leavedays->leave_type->displayValueSeparatorAttribute() ?>" name="x_leave_type" id="x_leave_type" value="{value}"<?php echo $employee_leavedays->leave_type->editAttributes() ?>></div>
<div id="dsl_x_leave_type" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_leavedays->leave_type->radioButtonListHtml(FALSE, "x_leave_type") ?>
</div></div>
</span>
<?php echo $employee_leavedays->leave_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$employee_leavedays_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $employee_leavedays_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_leavedays_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$employee_leavedays_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_leavedays_edit->terminate();
?>