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
$employee_timeentry_edit = new employee_timeentry_edit();

// Run the page
$employee_timeentry_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_timeentry_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var femployee_timeentryedit = currentForm = new ew.Form("femployee_timeentryedit", "edit");

// Validate form
femployee_timeentryedit.validate = function() {
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
		<?php if ($employee_timeentry_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_timeentry->id->caption(), $employee_timeentry->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_timeentry_edit->project->Required) { ?>
			elm = this.getElements("x" + infix + "_project");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_timeentry->project->caption(), $employee_timeentry->project->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_project");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_timeentry->project->errorMessage()) ?>");
		<?php if ($employee_timeentry_edit->employee->Required) { ?>
			elm = this.getElements("x" + infix + "_employee");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_timeentry->employee->caption(), $employee_timeentry->employee->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_employee");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_timeentry->employee->errorMessage()) ?>");
		<?php if ($employee_timeentry_edit->timesheet->Required) { ?>
			elm = this.getElements("x" + infix + "_timesheet");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_timeentry->timesheet->caption(), $employee_timeentry->timesheet->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_timesheet");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_timeentry->timesheet->errorMessage()) ?>");
		<?php if ($employee_timeentry_edit->details->Required) { ?>
			elm = this.getElements("x" + infix + "_details");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_timeentry->details->caption(), $employee_timeentry->details->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_timeentry_edit->created->Required) { ?>
			elm = this.getElements("x" + infix + "_created");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_timeentry->created->caption(), $employee_timeentry->created->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_created");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_timeentry->created->errorMessage()) ?>");
		<?php if ($employee_timeentry_edit->date_start->Required) { ?>
			elm = this.getElements("x" + infix + "_date_start");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_timeentry->date_start->caption(), $employee_timeentry->date_start->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_date_start");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_timeentry->date_start->errorMessage()) ?>");
		<?php if ($employee_timeentry_edit->time_start->Required) { ?>
			elm = this.getElements("x" + infix + "_time_start");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_timeentry->time_start->caption(), $employee_timeentry->time_start->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_timeentry_edit->date_end->Required) { ?>
			elm = this.getElements("x" + infix + "_date_end");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_timeentry->date_end->caption(), $employee_timeentry->date_end->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_date_end");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_timeentry->date_end->errorMessage()) ?>");
		<?php if ($employee_timeentry_edit->time_end->Required) { ?>
			elm = this.getElements("x" + infix + "_time_end");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_timeentry->time_end->caption(), $employee_timeentry->time_end->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_timeentry_edit->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_timeentry->status->caption(), $employee_timeentry->status->RequiredErrorMessage)) ?>");
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
femployee_timeentryedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_timeentryedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_timeentryedit.lists["x_status"] = <?php echo $employee_timeentry_edit->status->Lookup->toClientList() ?>;
femployee_timeentryedit.lists["x_status"].options = <?php echo JsonEncode($employee_timeentry_edit->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_timeentry_edit->showPageHeader(); ?>
<?php
$employee_timeentry_edit->showMessage();
?>
<form name="femployee_timeentryedit" id="femployee_timeentryedit" class="<?php echo $employee_timeentry_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_timeentry_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_timeentry_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_timeentry">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$employee_timeentry_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($employee_timeentry->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_employee_timeentry_id" class="<?php echo $employee_timeentry_edit->LeftColumnClass ?>"><?php echo $employee_timeentry->id->caption() ?><?php echo ($employee_timeentry->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_timeentry_edit->RightColumnClass ?>"><div<?php echo $employee_timeentry->id->cellAttributes() ?>>
<span id="el_employee_timeentry_id">
<span<?php echo $employee_timeentry->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_timeentry->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_timeentry" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($employee_timeentry->id->CurrentValue) ?>">
<?php echo $employee_timeentry->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_timeentry->project->Visible) { // project ?>
	<div id="r_project" class="form-group row">
		<label id="elh_employee_timeentry_project" for="x_project" class="<?php echo $employee_timeentry_edit->LeftColumnClass ?>"><?php echo $employee_timeentry->project->caption() ?><?php echo ($employee_timeentry->project->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_timeentry_edit->RightColumnClass ?>"><div<?php echo $employee_timeentry->project->cellAttributes() ?>>
<span id="el_employee_timeentry_project">
<input type="text" data-table="employee_timeentry" data-field="x_project" name="x_project" id="x_project" size="30" placeholder="<?php echo HtmlEncode($employee_timeentry->project->getPlaceHolder()) ?>" value="<?php echo $employee_timeentry->project->EditValue ?>"<?php echo $employee_timeentry->project->editAttributes() ?>>
</span>
<?php echo $employee_timeentry->project->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_timeentry->employee->Visible) { // employee ?>
	<div id="r_employee" class="form-group row">
		<label id="elh_employee_timeentry_employee" for="x_employee" class="<?php echo $employee_timeentry_edit->LeftColumnClass ?>"><?php echo $employee_timeentry->employee->caption() ?><?php echo ($employee_timeentry->employee->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_timeentry_edit->RightColumnClass ?>"><div<?php echo $employee_timeentry->employee->cellAttributes() ?>>
<span id="el_employee_timeentry_employee">
<input type="text" data-table="employee_timeentry" data-field="x_employee" name="x_employee" id="x_employee" size="30" placeholder="<?php echo HtmlEncode($employee_timeentry->employee->getPlaceHolder()) ?>" value="<?php echo $employee_timeentry->employee->EditValue ?>"<?php echo $employee_timeentry->employee->editAttributes() ?>>
</span>
<?php echo $employee_timeentry->employee->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_timeentry->timesheet->Visible) { // timesheet ?>
	<div id="r_timesheet" class="form-group row">
		<label id="elh_employee_timeentry_timesheet" for="x_timesheet" class="<?php echo $employee_timeentry_edit->LeftColumnClass ?>"><?php echo $employee_timeentry->timesheet->caption() ?><?php echo ($employee_timeentry->timesheet->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_timeentry_edit->RightColumnClass ?>"><div<?php echo $employee_timeentry->timesheet->cellAttributes() ?>>
<span id="el_employee_timeentry_timesheet">
<input type="text" data-table="employee_timeentry" data-field="x_timesheet" name="x_timesheet" id="x_timesheet" size="30" placeholder="<?php echo HtmlEncode($employee_timeentry->timesheet->getPlaceHolder()) ?>" value="<?php echo $employee_timeentry->timesheet->EditValue ?>"<?php echo $employee_timeentry->timesheet->editAttributes() ?>>
</span>
<?php echo $employee_timeentry->timesheet->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_timeentry->details->Visible) { // details ?>
	<div id="r_details" class="form-group row">
		<label id="elh_employee_timeentry_details" for="x_details" class="<?php echo $employee_timeentry_edit->LeftColumnClass ?>"><?php echo $employee_timeentry->details->caption() ?><?php echo ($employee_timeentry->details->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_timeentry_edit->RightColumnClass ?>"><div<?php echo $employee_timeentry->details->cellAttributes() ?>>
<span id="el_employee_timeentry_details">
<textarea data-table="employee_timeentry" data-field="x_details" name="x_details" id="x_details" cols="35" rows="4" placeholder="<?php echo HtmlEncode($employee_timeentry->details->getPlaceHolder()) ?>"<?php echo $employee_timeentry->details->editAttributes() ?>><?php echo $employee_timeentry->details->EditValue ?></textarea>
</span>
<?php echo $employee_timeentry->details->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_timeentry->created->Visible) { // created ?>
	<div id="r_created" class="form-group row">
		<label id="elh_employee_timeentry_created" for="x_created" class="<?php echo $employee_timeentry_edit->LeftColumnClass ?>"><?php echo $employee_timeentry->created->caption() ?><?php echo ($employee_timeentry->created->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_timeentry_edit->RightColumnClass ?>"><div<?php echo $employee_timeentry->created->cellAttributes() ?>>
<span id="el_employee_timeentry_created">
<input type="text" data-table="employee_timeentry" data-field="x_created" name="x_created" id="x_created" placeholder="<?php echo HtmlEncode($employee_timeentry->created->getPlaceHolder()) ?>" value="<?php echo $employee_timeentry->created->EditValue ?>"<?php echo $employee_timeentry->created->editAttributes() ?>>
<?php if (!$employee_timeentry->created->ReadOnly && !$employee_timeentry->created->Disabled && !isset($employee_timeentry->created->EditAttrs["readonly"]) && !isset($employee_timeentry->created->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_timeentryedit", "x_created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee_timeentry->created->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_timeentry->date_start->Visible) { // date_start ?>
	<div id="r_date_start" class="form-group row">
		<label id="elh_employee_timeentry_date_start" for="x_date_start" class="<?php echo $employee_timeentry_edit->LeftColumnClass ?>"><?php echo $employee_timeentry->date_start->caption() ?><?php echo ($employee_timeentry->date_start->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_timeentry_edit->RightColumnClass ?>"><div<?php echo $employee_timeentry->date_start->cellAttributes() ?>>
<span id="el_employee_timeentry_date_start">
<input type="text" data-table="employee_timeentry" data-field="x_date_start" name="x_date_start" id="x_date_start" placeholder="<?php echo HtmlEncode($employee_timeentry->date_start->getPlaceHolder()) ?>" value="<?php echo $employee_timeentry->date_start->EditValue ?>"<?php echo $employee_timeentry->date_start->editAttributes() ?>>
<?php if (!$employee_timeentry->date_start->ReadOnly && !$employee_timeentry->date_start->Disabled && !isset($employee_timeentry->date_start->EditAttrs["readonly"]) && !isset($employee_timeentry->date_start->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_timeentryedit", "x_date_start", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee_timeentry->date_start->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_timeentry->time_start->Visible) { // time_start ?>
	<div id="r_time_start" class="form-group row">
		<label id="elh_employee_timeentry_time_start" for="x_time_start" class="<?php echo $employee_timeentry_edit->LeftColumnClass ?>"><?php echo $employee_timeentry->time_start->caption() ?><?php echo ($employee_timeentry->time_start->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_timeentry_edit->RightColumnClass ?>"><div<?php echo $employee_timeentry->time_start->cellAttributes() ?>>
<span id="el_employee_timeentry_time_start">
<input type="text" data-table="employee_timeentry" data-field="x_time_start" name="x_time_start" id="x_time_start" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($employee_timeentry->time_start->getPlaceHolder()) ?>" value="<?php echo $employee_timeentry->time_start->EditValue ?>"<?php echo $employee_timeentry->time_start->editAttributes() ?>>
</span>
<?php echo $employee_timeentry->time_start->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_timeentry->date_end->Visible) { // date_end ?>
	<div id="r_date_end" class="form-group row">
		<label id="elh_employee_timeentry_date_end" for="x_date_end" class="<?php echo $employee_timeentry_edit->LeftColumnClass ?>"><?php echo $employee_timeentry->date_end->caption() ?><?php echo ($employee_timeentry->date_end->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_timeentry_edit->RightColumnClass ?>"><div<?php echo $employee_timeentry->date_end->cellAttributes() ?>>
<span id="el_employee_timeentry_date_end">
<input type="text" data-table="employee_timeentry" data-field="x_date_end" name="x_date_end" id="x_date_end" placeholder="<?php echo HtmlEncode($employee_timeentry->date_end->getPlaceHolder()) ?>" value="<?php echo $employee_timeentry->date_end->EditValue ?>"<?php echo $employee_timeentry->date_end->editAttributes() ?>>
<?php if (!$employee_timeentry->date_end->ReadOnly && !$employee_timeentry->date_end->Disabled && !isset($employee_timeentry->date_end->EditAttrs["readonly"]) && !isset($employee_timeentry->date_end->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_timeentryedit", "x_date_end", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee_timeentry->date_end->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_timeentry->time_end->Visible) { // time_end ?>
	<div id="r_time_end" class="form-group row">
		<label id="elh_employee_timeentry_time_end" for="x_time_end" class="<?php echo $employee_timeentry_edit->LeftColumnClass ?>"><?php echo $employee_timeentry->time_end->caption() ?><?php echo ($employee_timeentry->time_end->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_timeentry_edit->RightColumnClass ?>"><div<?php echo $employee_timeentry->time_end->cellAttributes() ?>>
<span id="el_employee_timeentry_time_end">
<input type="text" data-table="employee_timeentry" data-field="x_time_end" name="x_time_end" id="x_time_end" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($employee_timeentry->time_end->getPlaceHolder()) ?>" value="<?php echo $employee_timeentry->time_end->EditValue ?>"<?php echo $employee_timeentry->time_end->editAttributes() ?>>
</span>
<?php echo $employee_timeentry->time_end->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_timeentry->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_employee_timeentry_status" class="<?php echo $employee_timeentry_edit->LeftColumnClass ?>"><?php echo $employee_timeentry->status->caption() ?><?php echo ($employee_timeentry->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_timeentry_edit->RightColumnClass ?>"><div<?php echo $employee_timeentry->status->cellAttributes() ?>>
<span id="el_employee_timeentry_status">
<div id="tp_x_status" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_timeentry" data-field="x_status" data-value-separator="<?php echo $employee_timeentry->status->displayValueSeparatorAttribute() ?>" name="x_status" id="x_status" value="{value}"<?php echo $employee_timeentry->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_timeentry->status->radioButtonListHtml(FALSE, "x_status") ?>
</div></div>
</span>
<?php echo $employee_timeentry->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$employee_timeentry_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $employee_timeentry_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_timeentry_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$employee_timeentry_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_timeentry_edit->terminate();
?>