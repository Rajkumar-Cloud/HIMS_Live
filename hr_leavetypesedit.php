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
$hr_leavetypes_edit = new hr_leavetypes_edit();

// Run the page
$hr_leavetypes_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_leavetypes_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fhr_leavetypesedit = currentForm = new ew.Form("fhr_leavetypesedit", "edit");

// Validate form
fhr_leavetypesedit.validate = function() {
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
		<?php if ($hr_leavetypes_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_leavetypes->id->caption(), $hr_leavetypes->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_leavetypes_edit->name->Required) { ?>
			elm = this.getElements("x" + infix + "_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_leavetypes->name->caption(), $hr_leavetypes->name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_leavetypes_edit->supervisor_leave_assign->Required) { ?>
			elm = this.getElements("x" + infix + "_supervisor_leave_assign");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_leavetypes->supervisor_leave_assign->caption(), $hr_leavetypes->supervisor_leave_assign->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_leavetypes_edit->employee_can_apply->Required) { ?>
			elm = this.getElements("x" + infix + "_employee_can_apply");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_leavetypes->employee_can_apply->caption(), $hr_leavetypes->employee_can_apply->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_leavetypes_edit->apply_beyond_current->Required) { ?>
			elm = this.getElements("x" + infix + "_apply_beyond_current");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_leavetypes->apply_beyond_current->caption(), $hr_leavetypes->apply_beyond_current->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_leavetypes_edit->leave_accrue->Required) { ?>
			elm = this.getElements("x" + infix + "_leave_accrue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_leavetypes->leave_accrue->caption(), $hr_leavetypes->leave_accrue->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_leavetypes_edit->carried_forward->Required) { ?>
			elm = this.getElements("x" + infix + "_carried_forward");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_leavetypes->carried_forward->caption(), $hr_leavetypes->carried_forward->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_leavetypes_edit->default_per_year->Required) { ?>
			elm = this.getElements("x" + infix + "_default_per_year");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_leavetypes->default_per_year->caption(), $hr_leavetypes->default_per_year->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_default_per_year");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($hr_leavetypes->default_per_year->errorMessage()) ?>");
		<?php if ($hr_leavetypes_edit->carried_forward_percentage->Required) { ?>
			elm = this.getElements("x" + infix + "_carried_forward_percentage");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_leavetypes->carried_forward_percentage->caption(), $hr_leavetypes->carried_forward_percentage->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_carried_forward_percentage");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($hr_leavetypes->carried_forward_percentage->errorMessage()) ?>");
		<?php if ($hr_leavetypes_edit->carried_forward_leave_availability->Required) { ?>
			elm = this.getElements("x" + infix + "_carried_forward_leave_availability");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_leavetypes->carried_forward_leave_availability->caption(), $hr_leavetypes->carried_forward_leave_availability->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_carried_forward_leave_availability");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($hr_leavetypes->carried_forward_leave_availability->errorMessage()) ?>");
		<?php if ($hr_leavetypes_edit->propotionate_on_joined_date->Required) { ?>
			elm = this.getElements("x" + infix + "_propotionate_on_joined_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_leavetypes->propotionate_on_joined_date->caption(), $hr_leavetypes->propotionate_on_joined_date->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_leavetypes_edit->send_notification_emails->Required) { ?>
			elm = this.getElements("x" + infix + "_send_notification_emails");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_leavetypes->send_notification_emails->caption(), $hr_leavetypes->send_notification_emails->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_leavetypes_edit->leave_group->Required) { ?>
			elm = this.getElements("x" + infix + "_leave_group");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_leavetypes->leave_group->caption(), $hr_leavetypes->leave_group->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_leave_group");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($hr_leavetypes->leave_group->errorMessage()) ?>");
		<?php if ($hr_leavetypes_edit->leave_color->Required) { ?>
			elm = this.getElements("x" + infix + "_leave_color");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_leavetypes->leave_color->caption(), $hr_leavetypes->leave_color->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_leavetypes_edit->max_carried_forward_amount->Required) { ?>
			elm = this.getElements("x" + infix + "_max_carried_forward_amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_leavetypes->max_carried_forward_amount->caption(), $hr_leavetypes->max_carried_forward_amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_max_carried_forward_amount");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($hr_leavetypes->max_carried_forward_amount->errorMessage()) ?>");
		<?php if ($hr_leavetypes_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_leavetypes->HospID->caption(), $hr_leavetypes->HospID->RequiredErrorMessage)) ?>");
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
fhr_leavetypesedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_leavetypesedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_leavetypesedit.lists["x_supervisor_leave_assign"] = <?php echo $hr_leavetypes_edit->supervisor_leave_assign->Lookup->toClientList() ?>;
fhr_leavetypesedit.lists["x_supervisor_leave_assign"].options = <?php echo JsonEncode($hr_leavetypes_edit->supervisor_leave_assign->options(FALSE, TRUE)) ?>;
fhr_leavetypesedit.lists["x_employee_can_apply"] = <?php echo $hr_leavetypes_edit->employee_can_apply->Lookup->toClientList() ?>;
fhr_leavetypesedit.lists["x_employee_can_apply"].options = <?php echo JsonEncode($hr_leavetypes_edit->employee_can_apply->options(FALSE, TRUE)) ?>;
fhr_leavetypesedit.lists["x_apply_beyond_current"] = <?php echo $hr_leavetypes_edit->apply_beyond_current->Lookup->toClientList() ?>;
fhr_leavetypesedit.lists["x_apply_beyond_current"].options = <?php echo JsonEncode($hr_leavetypes_edit->apply_beyond_current->options(FALSE, TRUE)) ?>;
fhr_leavetypesedit.lists["x_leave_accrue"] = <?php echo $hr_leavetypes_edit->leave_accrue->Lookup->toClientList() ?>;
fhr_leavetypesedit.lists["x_leave_accrue"].options = <?php echo JsonEncode($hr_leavetypes_edit->leave_accrue->options(FALSE, TRUE)) ?>;
fhr_leavetypesedit.lists["x_carried_forward"] = <?php echo $hr_leavetypes_edit->carried_forward->Lookup->toClientList() ?>;
fhr_leavetypesedit.lists["x_carried_forward"].options = <?php echo JsonEncode($hr_leavetypes_edit->carried_forward->options(FALSE, TRUE)) ?>;
fhr_leavetypesedit.lists["x_propotionate_on_joined_date"] = <?php echo $hr_leavetypes_edit->propotionate_on_joined_date->Lookup->toClientList() ?>;
fhr_leavetypesedit.lists["x_propotionate_on_joined_date"].options = <?php echo JsonEncode($hr_leavetypes_edit->propotionate_on_joined_date->options(FALSE, TRUE)) ?>;
fhr_leavetypesedit.lists["x_send_notification_emails"] = <?php echo $hr_leavetypes_edit->send_notification_emails->Lookup->toClientList() ?>;
fhr_leavetypesedit.lists["x_send_notification_emails"].options = <?php echo JsonEncode($hr_leavetypes_edit->send_notification_emails->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_leavetypes_edit->showPageHeader(); ?>
<?php
$hr_leavetypes_edit->showMessage();
?>
<form name="fhr_leavetypesedit" id="fhr_leavetypesedit" class="<?php echo $hr_leavetypes_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_leavetypes_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_leavetypes_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_leavetypes">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$hr_leavetypes_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($hr_leavetypes->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_hr_leavetypes_id" class="<?php echo $hr_leavetypes_edit->LeftColumnClass ?>"><?php echo $hr_leavetypes->id->caption() ?><?php echo ($hr_leavetypes->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_leavetypes_edit->RightColumnClass ?>"><div<?php echo $hr_leavetypes->id->cellAttributes() ?>>
<span id="el_hr_leavetypes_id">
<span<?php echo $hr_leavetypes->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($hr_leavetypes->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="hr_leavetypes" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($hr_leavetypes->id->CurrentValue) ?>">
<?php echo $hr_leavetypes->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_leavetypes->name->Visible) { // name ?>
	<div id="r_name" class="form-group row">
		<label id="elh_hr_leavetypes_name" for="x_name" class="<?php echo $hr_leavetypes_edit->LeftColumnClass ?>"><?php echo $hr_leavetypes->name->caption() ?><?php echo ($hr_leavetypes->name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_leavetypes_edit->RightColumnClass ?>"><div<?php echo $hr_leavetypes->name->cellAttributes() ?>>
<span id="el_hr_leavetypes_name">
<input type="text" data-table="hr_leavetypes" data-field="x_name" name="x_name" id="x_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hr_leavetypes->name->getPlaceHolder()) ?>" value="<?php echo $hr_leavetypes->name->EditValue ?>"<?php echo $hr_leavetypes->name->editAttributes() ?>>
</span>
<?php echo $hr_leavetypes->name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_leavetypes->supervisor_leave_assign->Visible) { // supervisor_leave_assign ?>
	<div id="r_supervisor_leave_assign" class="form-group row">
		<label id="elh_hr_leavetypes_supervisor_leave_assign" class="<?php echo $hr_leavetypes_edit->LeftColumnClass ?>"><?php echo $hr_leavetypes->supervisor_leave_assign->caption() ?><?php echo ($hr_leavetypes->supervisor_leave_assign->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_leavetypes_edit->RightColumnClass ?>"><div<?php echo $hr_leavetypes->supervisor_leave_assign->cellAttributes() ?>>
<span id="el_hr_leavetypes_supervisor_leave_assign">
<div id="tp_x_supervisor_leave_assign" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_leavetypes" data-field="x_supervisor_leave_assign" data-value-separator="<?php echo $hr_leavetypes->supervisor_leave_assign->displayValueSeparatorAttribute() ?>" name="x_supervisor_leave_assign" id="x_supervisor_leave_assign" value="{value}"<?php echo $hr_leavetypes->supervisor_leave_assign->editAttributes() ?>></div>
<div id="dsl_x_supervisor_leave_assign" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_leavetypes->supervisor_leave_assign->radioButtonListHtml(FALSE, "x_supervisor_leave_assign") ?>
</div></div>
</span>
<?php echo $hr_leavetypes->supervisor_leave_assign->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_leavetypes->employee_can_apply->Visible) { // employee_can_apply ?>
	<div id="r_employee_can_apply" class="form-group row">
		<label id="elh_hr_leavetypes_employee_can_apply" class="<?php echo $hr_leavetypes_edit->LeftColumnClass ?>"><?php echo $hr_leavetypes->employee_can_apply->caption() ?><?php echo ($hr_leavetypes->employee_can_apply->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_leavetypes_edit->RightColumnClass ?>"><div<?php echo $hr_leavetypes->employee_can_apply->cellAttributes() ?>>
<span id="el_hr_leavetypes_employee_can_apply">
<div id="tp_x_employee_can_apply" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_leavetypes" data-field="x_employee_can_apply" data-value-separator="<?php echo $hr_leavetypes->employee_can_apply->displayValueSeparatorAttribute() ?>" name="x_employee_can_apply" id="x_employee_can_apply" value="{value}"<?php echo $hr_leavetypes->employee_can_apply->editAttributes() ?>></div>
<div id="dsl_x_employee_can_apply" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_leavetypes->employee_can_apply->radioButtonListHtml(FALSE, "x_employee_can_apply") ?>
</div></div>
</span>
<?php echo $hr_leavetypes->employee_can_apply->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_leavetypes->apply_beyond_current->Visible) { // apply_beyond_current ?>
	<div id="r_apply_beyond_current" class="form-group row">
		<label id="elh_hr_leavetypes_apply_beyond_current" class="<?php echo $hr_leavetypes_edit->LeftColumnClass ?>"><?php echo $hr_leavetypes->apply_beyond_current->caption() ?><?php echo ($hr_leavetypes->apply_beyond_current->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_leavetypes_edit->RightColumnClass ?>"><div<?php echo $hr_leavetypes->apply_beyond_current->cellAttributes() ?>>
<span id="el_hr_leavetypes_apply_beyond_current">
<div id="tp_x_apply_beyond_current" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_leavetypes" data-field="x_apply_beyond_current" data-value-separator="<?php echo $hr_leavetypes->apply_beyond_current->displayValueSeparatorAttribute() ?>" name="x_apply_beyond_current" id="x_apply_beyond_current" value="{value}"<?php echo $hr_leavetypes->apply_beyond_current->editAttributes() ?>></div>
<div id="dsl_x_apply_beyond_current" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_leavetypes->apply_beyond_current->radioButtonListHtml(FALSE, "x_apply_beyond_current") ?>
</div></div>
</span>
<?php echo $hr_leavetypes->apply_beyond_current->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_leavetypes->leave_accrue->Visible) { // leave_accrue ?>
	<div id="r_leave_accrue" class="form-group row">
		<label id="elh_hr_leavetypes_leave_accrue" class="<?php echo $hr_leavetypes_edit->LeftColumnClass ?>"><?php echo $hr_leavetypes->leave_accrue->caption() ?><?php echo ($hr_leavetypes->leave_accrue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_leavetypes_edit->RightColumnClass ?>"><div<?php echo $hr_leavetypes->leave_accrue->cellAttributes() ?>>
<span id="el_hr_leavetypes_leave_accrue">
<div id="tp_x_leave_accrue" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_leavetypes" data-field="x_leave_accrue" data-value-separator="<?php echo $hr_leavetypes->leave_accrue->displayValueSeparatorAttribute() ?>" name="x_leave_accrue" id="x_leave_accrue" value="{value}"<?php echo $hr_leavetypes->leave_accrue->editAttributes() ?>></div>
<div id="dsl_x_leave_accrue" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_leavetypes->leave_accrue->radioButtonListHtml(FALSE, "x_leave_accrue") ?>
</div></div>
</span>
<?php echo $hr_leavetypes->leave_accrue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_leavetypes->carried_forward->Visible) { // carried_forward ?>
	<div id="r_carried_forward" class="form-group row">
		<label id="elh_hr_leavetypes_carried_forward" class="<?php echo $hr_leavetypes_edit->LeftColumnClass ?>"><?php echo $hr_leavetypes->carried_forward->caption() ?><?php echo ($hr_leavetypes->carried_forward->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_leavetypes_edit->RightColumnClass ?>"><div<?php echo $hr_leavetypes->carried_forward->cellAttributes() ?>>
<span id="el_hr_leavetypes_carried_forward">
<div id="tp_x_carried_forward" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_leavetypes" data-field="x_carried_forward" data-value-separator="<?php echo $hr_leavetypes->carried_forward->displayValueSeparatorAttribute() ?>" name="x_carried_forward" id="x_carried_forward" value="{value}"<?php echo $hr_leavetypes->carried_forward->editAttributes() ?>></div>
<div id="dsl_x_carried_forward" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_leavetypes->carried_forward->radioButtonListHtml(FALSE, "x_carried_forward") ?>
</div></div>
</span>
<?php echo $hr_leavetypes->carried_forward->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_leavetypes->default_per_year->Visible) { // default_per_year ?>
	<div id="r_default_per_year" class="form-group row">
		<label id="elh_hr_leavetypes_default_per_year" for="x_default_per_year" class="<?php echo $hr_leavetypes_edit->LeftColumnClass ?>"><?php echo $hr_leavetypes->default_per_year->caption() ?><?php echo ($hr_leavetypes->default_per_year->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_leavetypes_edit->RightColumnClass ?>"><div<?php echo $hr_leavetypes->default_per_year->cellAttributes() ?>>
<span id="el_hr_leavetypes_default_per_year">
<input type="text" data-table="hr_leavetypes" data-field="x_default_per_year" name="x_default_per_year" id="x_default_per_year" size="30" placeholder="<?php echo HtmlEncode($hr_leavetypes->default_per_year->getPlaceHolder()) ?>" value="<?php echo $hr_leavetypes->default_per_year->EditValue ?>"<?php echo $hr_leavetypes->default_per_year->editAttributes() ?>>
</span>
<?php echo $hr_leavetypes->default_per_year->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_leavetypes->carried_forward_percentage->Visible) { // carried_forward_percentage ?>
	<div id="r_carried_forward_percentage" class="form-group row">
		<label id="elh_hr_leavetypes_carried_forward_percentage" for="x_carried_forward_percentage" class="<?php echo $hr_leavetypes_edit->LeftColumnClass ?>"><?php echo $hr_leavetypes->carried_forward_percentage->caption() ?><?php echo ($hr_leavetypes->carried_forward_percentage->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_leavetypes_edit->RightColumnClass ?>"><div<?php echo $hr_leavetypes->carried_forward_percentage->cellAttributes() ?>>
<span id="el_hr_leavetypes_carried_forward_percentage">
<input type="text" data-table="hr_leavetypes" data-field="x_carried_forward_percentage" name="x_carried_forward_percentage" id="x_carried_forward_percentage" size="30" placeholder="<?php echo HtmlEncode($hr_leavetypes->carried_forward_percentage->getPlaceHolder()) ?>" value="<?php echo $hr_leavetypes->carried_forward_percentage->EditValue ?>"<?php echo $hr_leavetypes->carried_forward_percentage->editAttributes() ?>>
</span>
<?php echo $hr_leavetypes->carried_forward_percentage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_leavetypes->carried_forward_leave_availability->Visible) { // carried_forward_leave_availability ?>
	<div id="r_carried_forward_leave_availability" class="form-group row">
		<label id="elh_hr_leavetypes_carried_forward_leave_availability" for="x_carried_forward_leave_availability" class="<?php echo $hr_leavetypes_edit->LeftColumnClass ?>"><?php echo $hr_leavetypes->carried_forward_leave_availability->caption() ?><?php echo ($hr_leavetypes->carried_forward_leave_availability->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_leavetypes_edit->RightColumnClass ?>"><div<?php echo $hr_leavetypes->carried_forward_leave_availability->cellAttributes() ?>>
<span id="el_hr_leavetypes_carried_forward_leave_availability">
<input type="text" data-table="hr_leavetypes" data-field="x_carried_forward_leave_availability" name="x_carried_forward_leave_availability" id="x_carried_forward_leave_availability" size="30" placeholder="<?php echo HtmlEncode($hr_leavetypes->carried_forward_leave_availability->getPlaceHolder()) ?>" value="<?php echo $hr_leavetypes->carried_forward_leave_availability->EditValue ?>"<?php echo $hr_leavetypes->carried_forward_leave_availability->editAttributes() ?>>
</span>
<?php echo $hr_leavetypes->carried_forward_leave_availability->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_leavetypes->propotionate_on_joined_date->Visible) { // propotionate_on_joined_date ?>
	<div id="r_propotionate_on_joined_date" class="form-group row">
		<label id="elh_hr_leavetypes_propotionate_on_joined_date" class="<?php echo $hr_leavetypes_edit->LeftColumnClass ?>"><?php echo $hr_leavetypes->propotionate_on_joined_date->caption() ?><?php echo ($hr_leavetypes->propotionate_on_joined_date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_leavetypes_edit->RightColumnClass ?>"><div<?php echo $hr_leavetypes->propotionate_on_joined_date->cellAttributes() ?>>
<span id="el_hr_leavetypes_propotionate_on_joined_date">
<div id="tp_x_propotionate_on_joined_date" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_leavetypes" data-field="x_propotionate_on_joined_date" data-value-separator="<?php echo $hr_leavetypes->propotionate_on_joined_date->displayValueSeparatorAttribute() ?>" name="x_propotionate_on_joined_date" id="x_propotionate_on_joined_date" value="{value}"<?php echo $hr_leavetypes->propotionate_on_joined_date->editAttributes() ?>></div>
<div id="dsl_x_propotionate_on_joined_date" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_leavetypes->propotionate_on_joined_date->radioButtonListHtml(FALSE, "x_propotionate_on_joined_date") ?>
</div></div>
</span>
<?php echo $hr_leavetypes->propotionate_on_joined_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_leavetypes->send_notification_emails->Visible) { // send_notification_emails ?>
	<div id="r_send_notification_emails" class="form-group row">
		<label id="elh_hr_leavetypes_send_notification_emails" class="<?php echo $hr_leavetypes_edit->LeftColumnClass ?>"><?php echo $hr_leavetypes->send_notification_emails->caption() ?><?php echo ($hr_leavetypes->send_notification_emails->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_leavetypes_edit->RightColumnClass ?>"><div<?php echo $hr_leavetypes->send_notification_emails->cellAttributes() ?>>
<span id="el_hr_leavetypes_send_notification_emails">
<div id="tp_x_send_notification_emails" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_leavetypes" data-field="x_send_notification_emails" data-value-separator="<?php echo $hr_leavetypes->send_notification_emails->displayValueSeparatorAttribute() ?>" name="x_send_notification_emails" id="x_send_notification_emails" value="{value}"<?php echo $hr_leavetypes->send_notification_emails->editAttributes() ?>></div>
<div id="dsl_x_send_notification_emails" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_leavetypes->send_notification_emails->radioButtonListHtml(FALSE, "x_send_notification_emails") ?>
</div></div>
</span>
<?php echo $hr_leavetypes->send_notification_emails->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_leavetypes->leave_group->Visible) { // leave_group ?>
	<div id="r_leave_group" class="form-group row">
		<label id="elh_hr_leavetypes_leave_group" for="x_leave_group" class="<?php echo $hr_leavetypes_edit->LeftColumnClass ?>"><?php echo $hr_leavetypes->leave_group->caption() ?><?php echo ($hr_leavetypes->leave_group->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_leavetypes_edit->RightColumnClass ?>"><div<?php echo $hr_leavetypes->leave_group->cellAttributes() ?>>
<span id="el_hr_leavetypes_leave_group">
<input type="text" data-table="hr_leavetypes" data-field="x_leave_group" name="x_leave_group" id="x_leave_group" size="30" placeholder="<?php echo HtmlEncode($hr_leavetypes->leave_group->getPlaceHolder()) ?>" value="<?php echo $hr_leavetypes->leave_group->EditValue ?>"<?php echo $hr_leavetypes->leave_group->editAttributes() ?>>
</span>
<?php echo $hr_leavetypes->leave_group->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_leavetypes->leave_color->Visible) { // leave_color ?>
	<div id="r_leave_color" class="form-group row">
		<label id="elh_hr_leavetypes_leave_color" for="x_leave_color" class="<?php echo $hr_leavetypes_edit->LeftColumnClass ?>"><?php echo $hr_leavetypes->leave_color->caption() ?><?php echo ($hr_leavetypes->leave_color->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_leavetypes_edit->RightColumnClass ?>"><div<?php echo $hr_leavetypes->leave_color->cellAttributes() ?>>
<span id="el_hr_leavetypes_leave_color">
<input type="text" data-table="hr_leavetypes" data-field="x_leave_color" name="x_leave_color" id="x_leave_color" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($hr_leavetypes->leave_color->getPlaceHolder()) ?>" value="<?php echo $hr_leavetypes->leave_color->EditValue ?>"<?php echo $hr_leavetypes->leave_color->editAttributes() ?>>
</span>
<?php echo $hr_leavetypes->leave_color->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_leavetypes->max_carried_forward_amount->Visible) { // max_carried_forward_amount ?>
	<div id="r_max_carried_forward_amount" class="form-group row">
		<label id="elh_hr_leavetypes_max_carried_forward_amount" for="x_max_carried_forward_amount" class="<?php echo $hr_leavetypes_edit->LeftColumnClass ?>"><?php echo $hr_leavetypes->max_carried_forward_amount->caption() ?><?php echo ($hr_leavetypes->max_carried_forward_amount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_leavetypes_edit->RightColumnClass ?>"><div<?php echo $hr_leavetypes->max_carried_forward_amount->cellAttributes() ?>>
<span id="el_hr_leavetypes_max_carried_forward_amount">
<input type="text" data-table="hr_leavetypes" data-field="x_max_carried_forward_amount" name="x_max_carried_forward_amount" id="x_max_carried_forward_amount" size="30" placeholder="<?php echo HtmlEncode($hr_leavetypes->max_carried_forward_amount->getPlaceHolder()) ?>" value="<?php echo $hr_leavetypes->max_carried_forward_amount->EditValue ?>"<?php echo $hr_leavetypes->max_carried_forward_amount->editAttributes() ?>>
</span>
<?php echo $hr_leavetypes->max_carried_forward_amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$hr_leavetypes_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $hr_leavetypes_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_leavetypes_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$hr_leavetypes_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_leavetypes_edit->terminate();
?>