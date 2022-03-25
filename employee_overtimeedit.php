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
$employee_overtime_edit = new employee_overtime_edit();

// Run the page
$employee_overtime_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_overtime_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var femployee_overtimeedit = currentForm = new ew.Form("femployee_overtimeedit", "edit");

// Validate form
femployee_overtimeedit.validate = function() {
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
		<?php if ($employee_overtime_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_overtime->id->caption(), $employee_overtime->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_overtime_edit->employee->Required) { ?>
			elm = this.getElements("x" + infix + "_employee");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_overtime->employee->caption(), $employee_overtime->employee->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_employee");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_overtime->employee->errorMessage()) ?>");
		<?php if ($employee_overtime_edit->start_time->Required) { ?>
			elm = this.getElements("x" + infix + "_start_time");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_overtime->start_time->caption(), $employee_overtime->start_time->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_start_time");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_overtime->start_time->errorMessage()) ?>");
		<?php if ($employee_overtime_edit->end_time->Required) { ?>
			elm = this.getElements("x" + infix + "_end_time");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_overtime->end_time->caption(), $employee_overtime->end_time->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_end_time");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_overtime->end_time->errorMessage()) ?>");
		<?php if ($employee_overtime_edit->category->Required) { ?>
			elm = this.getElements("x" + infix + "_category");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_overtime->category->caption(), $employee_overtime->category->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_category");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_overtime->category->errorMessage()) ?>");
		<?php if ($employee_overtime_edit->project->Required) { ?>
			elm = this.getElements("x" + infix + "_project");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_overtime->project->caption(), $employee_overtime->project->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_project");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_overtime->project->errorMessage()) ?>");
		<?php if ($employee_overtime_edit->notes->Required) { ?>
			elm = this.getElements("x" + infix + "_notes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_overtime->notes->caption(), $employee_overtime->notes->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_overtime_edit->created->Required) { ?>
			elm = this.getElements("x" + infix + "_created");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_overtime->created->caption(), $employee_overtime->created->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_created");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_overtime->created->errorMessage()) ?>");
		<?php if ($employee_overtime_edit->updated->Required) { ?>
			elm = this.getElements("x" + infix + "_updated");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_overtime->updated->caption(), $employee_overtime->updated->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_updated");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_overtime->updated->errorMessage()) ?>");
		<?php if ($employee_overtime_edit->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_overtime->status->caption(), $employee_overtime->status->RequiredErrorMessage)) ?>");
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
femployee_overtimeedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_overtimeedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_overtimeedit.lists["x_status"] = <?php echo $employee_overtime_edit->status->Lookup->toClientList() ?>;
femployee_overtimeedit.lists["x_status"].options = <?php echo JsonEncode($employee_overtime_edit->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_overtime_edit->showPageHeader(); ?>
<?php
$employee_overtime_edit->showMessage();
?>
<form name="femployee_overtimeedit" id="femployee_overtimeedit" class="<?php echo $employee_overtime_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_overtime_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_overtime_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_overtime">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$employee_overtime_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($employee_overtime->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_employee_overtime_id" class="<?php echo $employee_overtime_edit->LeftColumnClass ?>"><?php echo $employee_overtime->id->caption() ?><?php echo ($employee_overtime->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_overtime_edit->RightColumnClass ?>"><div<?php echo $employee_overtime->id->cellAttributes() ?>>
<span id="el_employee_overtime_id">
<span<?php echo $employee_overtime->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_overtime->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_overtime" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($employee_overtime->id->CurrentValue) ?>">
<?php echo $employee_overtime->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_overtime->employee->Visible) { // employee ?>
	<div id="r_employee" class="form-group row">
		<label id="elh_employee_overtime_employee" for="x_employee" class="<?php echo $employee_overtime_edit->LeftColumnClass ?>"><?php echo $employee_overtime->employee->caption() ?><?php echo ($employee_overtime->employee->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_overtime_edit->RightColumnClass ?>"><div<?php echo $employee_overtime->employee->cellAttributes() ?>>
<span id="el_employee_overtime_employee">
<input type="text" data-table="employee_overtime" data-field="x_employee" name="x_employee" id="x_employee" size="30" placeholder="<?php echo HtmlEncode($employee_overtime->employee->getPlaceHolder()) ?>" value="<?php echo $employee_overtime->employee->EditValue ?>"<?php echo $employee_overtime->employee->editAttributes() ?>>
</span>
<?php echo $employee_overtime->employee->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_overtime->start_time->Visible) { // start_time ?>
	<div id="r_start_time" class="form-group row">
		<label id="elh_employee_overtime_start_time" for="x_start_time" class="<?php echo $employee_overtime_edit->LeftColumnClass ?>"><?php echo $employee_overtime->start_time->caption() ?><?php echo ($employee_overtime->start_time->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_overtime_edit->RightColumnClass ?>"><div<?php echo $employee_overtime->start_time->cellAttributes() ?>>
<span id="el_employee_overtime_start_time">
<input type="text" data-table="employee_overtime" data-field="x_start_time" name="x_start_time" id="x_start_time" placeholder="<?php echo HtmlEncode($employee_overtime->start_time->getPlaceHolder()) ?>" value="<?php echo $employee_overtime->start_time->EditValue ?>"<?php echo $employee_overtime->start_time->editAttributes() ?>>
<?php if (!$employee_overtime->start_time->ReadOnly && !$employee_overtime->start_time->Disabled && !isset($employee_overtime->start_time->EditAttrs["readonly"]) && !isset($employee_overtime->start_time->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_overtimeedit", "x_start_time", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee_overtime->start_time->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_overtime->end_time->Visible) { // end_time ?>
	<div id="r_end_time" class="form-group row">
		<label id="elh_employee_overtime_end_time" for="x_end_time" class="<?php echo $employee_overtime_edit->LeftColumnClass ?>"><?php echo $employee_overtime->end_time->caption() ?><?php echo ($employee_overtime->end_time->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_overtime_edit->RightColumnClass ?>"><div<?php echo $employee_overtime->end_time->cellAttributes() ?>>
<span id="el_employee_overtime_end_time">
<input type="text" data-table="employee_overtime" data-field="x_end_time" name="x_end_time" id="x_end_time" placeholder="<?php echo HtmlEncode($employee_overtime->end_time->getPlaceHolder()) ?>" value="<?php echo $employee_overtime->end_time->EditValue ?>"<?php echo $employee_overtime->end_time->editAttributes() ?>>
<?php if (!$employee_overtime->end_time->ReadOnly && !$employee_overtime->end_time->Disabled && !isset($employee_overtime->end_time->EditAttrs["readonly"]) && !isset($employee_overtime->end_time->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_overtimeedit", "x_end_time", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee_overtime->end_time->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_overtime->category->Visible) { // category ?>
	<div id="r_category" class="form-group row">
		<label id="elh_employee_overtime_category" for="x_category" class="<?php echo $employee_overtime_edit->LeftColumnClass ?>"><?php echo $employee_overtime->category->caption() ?><?php echo ($employee_overtime->category->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_overtime_edit->RightColumnClass ?>"><div<?php echo $employee_overtime->category->cellAttributes() ?>>
<span id="el_employee_overtime_category">
<input type="text" data-table="employee_overtime" data-field="x_category" name="x_category" id="x_category" size="30" placeholder="<?php echo HtmlEncode($employee_overtime->category->getPlaceHolder()) ?>" value="<?php echo $employee_overtime->category->EditValue ?>"<?php echo $employee_overtime->category->editAttributes() ?>>
</span>
<?php echo $employee_overtime->category->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_overtime->project->Visible) { // project ?>
	<div id="r_project" class="form-group row">
		<label id="elh_employee_overtime_project" for="x_project" class="<?php echo $employee_overtime_edit->LeftColumnClass ?>"><?php echo $employee_overtime->project->caption() ?><?php echo ($employee_overtime->project->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_overtime_edit->RightColumnClass ?>"><div<?php echo $employee_overtime->project->cellAttributes() ?>>
<span id="el_employee_overtime_project">
<input type="text" data-table="employee_overtime" data-field="x_project" name="x_project" id="x_project" size="30" placeholder="<?php echo HtmlEncode($employee_overtime->project->getPlaceHolder()) ?>" value="<?php echo $employee_overtime->project->EditValue ?>"<?php echo $employee_overtime->project->editAttributes() ?>>
</span>
<?php echo $employee_overtime->project->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_overtime->notes->Visible) { // notes ?>
	<div id="r_notes" class="form-group row">
		<label id="elh_employee_overtime_notes" for="x_notes" class="<?php echo $employee_overtime_edit->LeftColumnClass ?>"><?php echo $employee_overtime->notes->caption() ?><?php echo ($employee_overtime->notes->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_overtime_edit->RightColumnClass ?>"><div<?php echo $employee_overtime->notes->cellAttributes() ?>>
<span id="el_employee_overtime_notes">
<textarea data-table="employee_overtime" data-field="x_notes" name="x_notes" id="x_notes" cols="35" rows="4" placeholder="<?php echo HtmlEncode($employee_overtime->notes->getPlaceHolder()) ?>"<?php echo $employee_overtime->notes->editAttributes() ?>><?php echo $employee_overtime->notes->EditValue ?></textarea>
</span>
<?php echo $employee_overtime->notes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_overtime->created->Visible) { // created ?>
	<div id="r_created" class="form-group row">
		<label id="elh_employee_overtime_created" for="x_created" class="<?php echo $employee_overtime_edit->LeftColumnClass ?>"><?php echo $employee_overtime->created->caption() ?><?php echo ($employee_overtime->created->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_overtime_edit->RightColumnClass ?>"><div<?php echo $employee_overtime->created->cellAttributes() ?>>
<span id="el_employee_overtime_created">
<input type="text" data-table="employee_overtime" data-field="x_created" name="x_created" id="x_created" placeholder="<?php echo HtmlEncode($employee_overtime->created->getPlaceHolder()) ?>" value="<?php echo $employee_overtime->created->EditValue ?>"<?php echo $employee_overtime->created->editAttributes() ?>>
<?php if (!$employee_overtime->created->ReadOnly && !$employee_overtime->created->Disabled && !isset($employee_overtime->created->EditAttrs["readonly"]) && !isset($employee_overtime->created->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_overtimeedit", "x_created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee_overtime->created->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_overtime->updated->Visible) { // updated ?>
	<div id="r_updated" class="form-group row">
		<label id="elh_employee_overtime_updated" for="x_updated" class="<?php echo $employee_overtime_edit->LeftColumnClass ?>"><?php echo $employee_overtime->updated->caption() ?><?php echo ($employee_overtime->updated->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_overtime_edit->RightColumnClass ?>"><div<?php echo $employee_overtime->updated->cellAttributes() ?>>
<span id="el_employee_overtime_updated">
<input type="text" data-table="employee_overtime" data-field="x_updated" name="x_updated" id="x_updated" placeholder="<?php echo HtmlEncode($employee_overtime->updated->getPlaceHolder()) ?>" value="<?php echo $employee_overtime->updated->EditValue ?>"<?php echo $employee_overtime->updated->editAttributes() ?>>
<?php if (!$employee_overtime->updated->ReadOnly && !$employee_overtime->updated->Disabled && !isset($employee_overtime->updated->EditAttrs["readonly"]) && !isset($employee_overtime->updated->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_overtimeedit", "x_updated", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee_overtime->updated->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_overtime->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_employee_overtime_status" class="<?php echo $employee_overtime_edit->LeftColumnClass ?>"><?php echo $employee_overtime->status->caption() ?><?php echo ($employee_overtime->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_overtime_edit->RightColumnClass ?>"><div<?php echo $employee_overtime->status->cellAttributes() ?>>
<span id="el_employee_overtime_status">
<div id="tp_x_status" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_overtime" data-field="x_status" data-value-separator="<?php echo $employee_overtime->status->displayValueSeparatorAttribute() ?>" name="x_status" id="x_status" value="{value}"<?php echo $employee_overtime->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_overtime->status->radioButtonListHtml(FALSE, "x_status") ?>
</div></div>
</span>
<?php echo $employee_overtime->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$employee_overtime_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $employee_overtime_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_overtime_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$employee_overtime_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_overtime_edit->terminate();
?>