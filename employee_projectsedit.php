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
$employee_projects_edit = new employee_projects_edit();

// Run the page
$employee_projects_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_projects_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var femployee_projectsedit = currentForm = new ew.Form("femployee_projectsedit", "edit");

// Validate form
femployee_projectsedit.validate = function() {
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
		<?php if ($employee_projects_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_projects->id->caption(), $employee_projects->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_projects_edit->employee->Required) { ?>
			elm = this.getElements("x" + infix + "_employee");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_projects->employee->caption(), $employee_projects->employee->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_employee");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_projects->employee->errorMessage()) ?>");
		<?php if ($employee_projects_edit->project->Required) { ?>
			elm = this.getElements("x" + infix + "_project");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_projects->project->caption(), $employee_projects->project->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_project");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_projects->project->errorMessage()) ?>");
		<?php if ($employee_projects_edit->date_start->Required) { ?>
			elm = this.getElements("x" + infix + "_date_start");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_projects->date_start->caption(), $employee_projects->date_start->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_date_start");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_projects->date_start->errorMessage()) ?>");
		<?php if ($employee_projects_edit->date_end->Required) { ?>
			elm = this.getElements("x" + infix + "_date_end");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_projects->date_end->caption(), $employee_projects->date_end->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_date_end");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_projects->date_end->errorMessage()) ?>");
		<?php if ($employee_projects_edit->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_projects->status->caption(), $employee_projects->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_projects_edit->details->Required) { ?>
			elm = this.getElements("x" + infix + "_details");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_projects->details->caption(), $employee_projects->details->RequiredErrorMessage)) ?>");
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
femployee_projectsedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_projectsedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_projectsedit.lists["x_status"] = <?php echo $employee_projects_edit->status->Lookup->toClientList() ?>;
femployee_projectsedit.lists["x_status"].options = <?php echo JsonEncode($employee_projects_edit->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_projects_edit->showPageHeader(); ?>
<?php
$employee_projects_edit->showMessage();
?>
<form name="femployee_projectsedit" id="femployee_projectsedit" class="<?php echo $employee_projects_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_projects_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_projects_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_projects">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$employee_projects_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($employee_projects->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_employee_projects_id" class="<?php echo $employee_projects_edit->LeftColumnClass ?>"><?php echo $employee_projects->id->caption() ?><?php echo ($employee_projects->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_projects_edit->RightColumnClass ?>"><div<?php echo $employee_projects->id->cellAttributes() ?>>
<span id="el_employee_projects_id">
<span<?php echo $employee_projects->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_projects->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_projects" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($employee_projects->id->CurrentValue) ?>">
<?php echo $employee_projects->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_projects->employee->Visible) { // employee ?>
	<div id="r_employee" class="form-group row">
		<label id="elh_employee_projects_employee" for="x_employee" class="<?php echo $employee_projects_edit->LeftColumnClass ?>"><?php echo $employee_projects->employee->caption() ?><?php echo ($employee_projects->employee->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_projects_edit->RightColumnClass ?>"><div<?php echo $employee_projects->employee->cellAttributes() ?>>
<span id="el_employee_projects_employee">
<input type="text" data-table="employee_projects" data-field="x_employee" name="x_employee" id="x_employee" size="30" placeholder="<?php echo HtmlEncode($employee_projects->employee->getPlaceHolder()) ?>" value="<?php echo $employee_projects->employee->EditValue ?>"<?php echo $employee_projects->employee->editAttributes() ?>>
</span>
<?php echo $employee_projects->employee->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_projects->project->Visible) { // project ?>
	<div id="r_project" class="form-group row">
		<label id="elh_employee_projects_project" for="x_project" class="<?php echo $employee_projects_edit->LeftColumnClass ?>"><?php echo $employee_projects->project->caption() ?><?php echo ($employee_projects->project->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_projects_edit->RightColumnClass ?>"><div<?php echo $employee_projects->project->cellAttributes() ?>>
<span id="el_employee_projects_project">
<input type="text" data-table="employee_projects" data-field="x_project" name="x_project" id="x_project" size="30" placeholder="<?php echo HtmlEncode($employee_projects->project->getPlaceHolder()) ?>" value="<?php echo $employee_projects->project->EditValue ?>"<?php echo $employee_projects->project->editAttributes() ?>>
</span>
<?php echo $employee_projects->project->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_projects->date_start->Visible) { // date_start ?>
	<div id="r_date_start" class="form-group row">
		<label id="elh_employee_projects_date_start" for="x_date_start" class="<?php echo $employee_projects_edit->LeftColumnClass ?>"><?php echo $employee_projects->date_start->caption() ?><?php echo ($employee_projects->date_start->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_projects_edit->RightColumnClass ?>"><div<?php echo $employee_projects->date_start->cellAttributes() ?>>
<span id="el_employee_projects_date_start">
<input type="text" data-table="employee_projects" data-field="x_date_start" name="x_date_start" id="x_date_start" placeholder="<?php echo HtmlEncode($employee_projects->date_start->getPlaceHolder()) ?>" value="<?php echo $employee_projects->date_start->EditValue ?>"<?php echo $employee_projects->date_start->editAttributes() ?>>
<?php if (!$employee_projects->date_start->ReadOnly && !$employee_projects->date_start->Disabled && !isset($employee_projects->date_start->EditAttrs["readonly"]) && !isset($employee_projects->date_start->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_projectsedit", "x_date_start", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee_projects->date_start->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_projects->date_end->Visible) { // date_end ?>
	<div id="r_date_end" class="form-group row">
		<label id="elh_employee_projects_date_end" for="x_date_end" class="<?php echo $employee_projects_edit->LeftColumnClass ?>"><?php echo $employee_projects->date_end->caption() ?><?php echo ($employee_projects->date_end->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_projects_edit->RightColumnClass ?>"><div<?php echo $employee_projects->date_end->cellAttributes() ?>>
<span id="el_employee_projects_date_end">
<input type="text" data-table="employee_projects" data-field="x_date_end" name="x_date_end" id="x_date_end" placeholder="<?php echo HtmlEncode($employee_projects->date_end->getPlaceHolder()) ?>" value="<?php echo $employee_projects->date_end->EditValue ?>"<?php echo $employee_projects->date_end->editAttributes() ?>>
<?php if (!$employee_projects->date_end->ReadOnly && !$employee_projects->date_end->Disabled && !isset($employee_projects->date_end->EditAttrs["readonly"]) && !isset($employee_projects->date_end->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_projectsedit", "x_date_end", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee_projects->date_end->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_projects->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_employee_projects_status" class="<?php echo $employee_projects_edit->LeftColumnClass ?>"><?php echo $employee_projects->status->caption() ?><?php echo ($employee_projects->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_projects_edit->RightColumnClass ?>"><div<?php echo $employee_projects->status->cellAttributes() ?>>
<span id="el_employee_projects_status">
<div id="tp_x_status" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_projects" data-field="x_status" data-value-separator="<?php echo $employee_projects->status->displayValueSeparatorAttribute() ?>" name="x_status" id="x_status" value="{value}"<?php echo $employee_projects->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_projects->status->radioButtonListHtml(FALSE, "x_status") ?>
</div></div>
</span>
<?php echo $employee_projects->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_projects->details->Visible) { // details ?>
	<div id="r_details" class="form-group row">
		<label id="elh_employee_projects_details" for="x_details" class="<?php echo $employee_projects_edit->LeftColumnClass ?>"><?php echo $employee_projects->details->caption() ?><?php echo ($employee_projects->details->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_projects_edit->RightColumnClass ?>"><div<?php echo $employee_projects->details->cellAttributes() ?>>
<span id="el_employee_projects_details">
<textarea data-table="employee_projects" data-field="x_details" name="x_details" id="x_details" cols="35" rows="4" placeholder="<?php echo HtmlEncode($employee_projects->details->getPlaceHolder()) ?>"<?php echo $employee_projects->details->editAttributes() ?>><?php echo $employee_projects->details->EditValue ?></textarea>
</span>
<?php echo $employee_projects->details->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$employee_projects_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $employee_projects_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_projects_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$employee_projects_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_projects_edit->terminate();
?>