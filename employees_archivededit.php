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
$employees_archived_edit = new employees_archived_edit();

// Run the page
$employees_archived_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employees_archived_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var femployees_archivededit = currentForm = new ew.Form("femployees_archivededit", "edit");

// Validate form
femployees_archivededit.validate = function() {
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
		<?php if ($employees_archived_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employees_archived->id->caption(), $employees_archived->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employees_archived_edit->ref_id->Required) { ?>
			elm = this.getElements("x" + infix + "_ref_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employees_archived->ref_id->caption(), $employees_archived->ref_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ref_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employees_archived->ref_id->errorMessage()) ?>");
		<?php if ($employees_archived_edit->employee_id->Required) { ?>
			elm = this.getElements("x" + infix + "_employee_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employees_archived->employee_id->caption(), $employees_archived->employee_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employees_archived_edit->first_name->Required) { ?>
			elm = this.getElements("x" + infix + "_first_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employees_archived->first_name->caption(), $employees_archived->first_name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employees_archived_edit->last_name->Required) { ?>
			elm = this.getElements("x" + infix + "_last_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employees_archived->last_name->caption(), $employees_archived->last_name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employees_archived_edit->gender->Required) { ?>
			elm = this.getElements("x" + infix + "_gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employees_archived->gender->caption(), $employees_archived->gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employees_archived_edit->ssn_num->Required) { ?>
			elm = this.getElements("x" + infix + "_ssn_num");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employees_archived->ssn_num->caption(), $employees_archived->ssn_num->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employees_archived_edit->nic_num->Required) { ?>
			elm = this.getElements("x" + infix + "_nic_num");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employees_archived->nic_num->caption(), $employees_archived->nic_num->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employees_archived_edit->other_id->Required) { ?>
			elm = this.getElements("x" + infix + "_other_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employees_archived->other_id->caption(), $employees_archived->other_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employees_archived_edit->work_email->Required) { ?>
			elm = this.getElements("x" + infix + "_work_email");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employees_archived->work_email->caption(), $employees_archived->work_email->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employees_archived_edit->joined_date->Required) { ?>
			elm = this.getElements("x" + infix + "_joined_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employees_archived->joined_date->caption(), $employees_archived->joined_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_joined_date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employees_archived->joined_date->errorMessage()) ?>");
		<?php if ($employees_archived_edit->confirmation_date->Required) { ?>
			elm = this.getElements("x" + infix + "_confirmation_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employees_archived->confirmation_date->caption(), $employees_archived->confirmation_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_confirmation_date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employees_archived->confirmation_date->errorMessage()) ?>");
		<?php if ($employees_archived_edit->supervisor->Required) { ?>
			elm = this.getElements("x" + infix + "_supervisor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employees_archived->supervisor->caption(), $employees_archived->supervisor->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_supervisor");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employees_archived->supervisor->errorMessage()) ?>");
		<?php if ($employees_archived_edit->department->Required) { ?>
			elm = this.getElements("x" + infix + "_department");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employees_archived->department->caption(), $employees_archived->department->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_department");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employees_archived->department->errorMessage()) ?>");
		<?php if ($employees_archived_edit->termination_date->Required) { ?>
			elm = this.getElements("x" + infix + "_termination_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employees_archived->termination_date->caption(), $employees_archived->termination_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_termination_date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employees_archived->termination_date->errorMessage()) ?>");
		<?php if ($employees_archived_edit->notes->Required) { ?>
			elm = this.getElements("x" + infix + "_notes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employees_archived->notes->caption(), $employees_archived->notes->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employees_archived_edit->data->Required) { ?>
			elm = this.getElements("x" + infix + "_data");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employees_archived->data->caption(), $employees_archived->data->RequiredErrorMessage)) ?>");
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
femployees_archivededit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployees_archivededit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployees_archivededit.lists["x_gender"] = <?php echo $employees_archived_edit->gender->Lookup->toClientList() ?>;
femployees_archivededit.lists["x_gender"].options = <?php echo JsonEncode($employees_archived_edit->gender->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employees_archived_edit->showPageHeader(); ?>
<?php
$employees_archived_edit->showMessage();
?>
<form name="femployees_archivededit" id="femployees_archivededit" class="<?php echo $employees_archived_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employees_archived_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employees_archived_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employees_archived">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$employees_archived_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($employees_archived->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_employees_archived_id" class="<?php echo $employees_archived_edit->LeftColumnClass ?>"><?php echo $employees_archived->id->caption() ?><?php echo ($employees_archived->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employees_archived_edit->RightColumnClass ?>"><div<?php echo $employees_archived->id->cellAttributes() ?>>
<span id="el_employees_archived_id">
<span<?php echo $employees_archived->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employees_archived->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="employees_archived" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($employees_archived->id->CurrentValue) ?>">
<?php echo $employees_archived->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employees_archived->ref_id->Visible) { // ref_id ?>
	<div id="r_ref_id" class="form-group row">
		<label id="elh_employees_archived_ref_id" for="x_ref_id" class="<?php echo $employees_archived_edit->LeftColumnClass ?>"><?php echo $employees_archived->ref_id->caption() ?><?php echo ($employees_archived->ref_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employees_archived_edit->RightColumnClass ?>"><div<?php echo $employees_archived->ref_id->cellAttributes() ?>>
<span id="el_employees_archived_ref_id">
<input type="text" data-table="employees_archived" data-field="x_ref_id" name="x_ref_id" id="x_ref_id" size="30" placeholder="<?php echo HtmlEncode($employees_archived->ref_id->getPlaceHolder()) ?>" value="<?php echo $employees_archived->ref_id->EditValue ?>"<?php echo $employees_archived->ref_id->editAttributes() ?>>
</span>
<?php echo $employees_archived->ref_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employees_archived->employee_id->Visible) { // employee_id ?>
	<div id="r_employee_id" class="form-group row">
		<label id="elh_employees_archived_employee_id" for="x_employee_id" class="<?php echo $employees_archived_edit->LeftColumnClass ?>"><?php echo $employees_archived->employee_id->caption() ?><?php echo ($employees_archived->employee_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employees_archived_edit->RightColumnClass ?>"><div<?php echo $employees_archived->employee_id->cellAttributes() ?>>
<span id="el_employees_archived_employee_id">
<input type="text" data-table="employees_archived" data-field="x_employee_id" name="x_employee_id" id="x_employee_id" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employees_archived->employee_id->getPlaceHolder()) ?>" value="<?php echo $employees_archived->employee_id->EditValue ?>"<?php echo $employees_archived->employee_id->editAttributes() ?>>
</span>
<?php echo $employees_archived->employee_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employees_archived->first_name->Visible) { // first_name ?>
	<div id="r_first_name" class="form-group row">
		<label id="elh_employees_archived_first_name" for="x_first_name" class="<?php echo $employees_archived_edit->LeftColumnClass ?>"><?php echo $employees_archived->first_name->caption() ?><?php echo ($employees_archived->first_name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employees_archived_edit->RightColumnClass ?>"><div<?php echo $employees_archived->first_name->cellAttributes() ?>>
<span id="el_employees_archived_first_name">
<input type="text" data-table="employees_archived" data-field="x_first_name" name="x_first_name" id="x_first_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employees_archived->first_name->getPlaceHolder()) ?>" value="<?php echo $employees_archived->first_name->EditValue ?>"<?php echo $employees_archived->first_name->editAttributes() ?>>
</span>
<?php echo $employees_archived->first_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employees_archived->last_name->Visible) { // last_name ?>
	<div id="r_last_name" class="form-group row">
		<label id="elh_employees_archived_last_name" for="x_last_name" class="<?php echo $employees_archived_edit->LeftColumnClass ?>"><?php echo $employees_archived->last_name->caption() ?><?php echo ($employees_archived->last_name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employees_archived_edit->RightColumnClass ?>"><div<?php echo $employees_archived->last_name->cellAttributes() ?>>
<span id="el_employees_archived_last_name">
<input type="text" data-table="employees_archived" data-field="x_last_name" name="x_last_name" id="x_last_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employees_archived->last_name->getPlaceHolder()) ?>" value="<?php echo $employees_archived->last_name->EditValue ?>"<?php echo $employees_archived->last_name->editAttributes() ?>>
</span>
<?php echo $employees_archived->last_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employees_archived->gender->Visible) { // gender ?>
	<div id="r_gender" class="form-group row">
		<label id="elh_employees_archived_gender" class="<?php echo $employees_archived_edit->LeftColumnClass ?>"><?php echo $employees_archived->gender->caption() ?><?php echo ($employees_archived->gender->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employees_archived_edit->RightColumnClass ?>"><div<?php echo $employees_archived->gender->cellAttributes() ?>>
<span id="el_employees_archived_gender">
<div id="tp_x_gender" class="ew-template"><input type="radio" class="form-check-input" data-table="employees_archived" data-field="x_gender" data-value-separator="<?php echo $employees_archived->gender->displayValueSeparatorAttribute() ?>" name="x_gender" id="x_gender" value="{value}"<?php echo $employees_archived->gender->editAttributes() ?>></div>
<div id="dsl_x_gender" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employees_archived->gender->radioButtonListHtml(FALSE, "x_gender") ?>
</div></div>
</span>
<?php echo $employees_archived->gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employees_archived->ssn_num->Visible) { // ssn_num ?>
	<div id="r_ssn_num" class="form-group row">
		<label id="elh_employees_archived_ssn_num" for="x_ssn_num" class="<?php echo $employees_archived_edit->LeftColumnClass ?>"><?php echo $employees_archived->ssn_num->caption() ?><?php echo ($employees_archived->ssn_num->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employees_archived_edit->RightColumnClass ?>"><div<?php echo $employees_archived->ssn_num->cellAttributes() ?>>
<span id="el_employees_archived_ssn_num">
<input type="text" data-table="employees_archived" data-field="x_ssn_num" name="x_ssn_num" id="x_ssn_num" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employees_archived->ssn_num->getPlaceHolder()) ?>" value="<?php echo $employees_archived->ssn_num->EditValue ?>"<?php echo $employees_archived->ssn_num->editAttributes() ?>>
</span>
<?php echo $employees_archived->ssn_num->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employees_archived->nic_num->Visible) { // nic_num ?>
	<div id="r_nic_num" class="form-group row">
		<label id="elh_employees_archived_nic_num" for="x_nic_num" class="<?php echo $employees_archived_edit->LeftColumnClass ?>"><?php echo $employees_archived->nic_num->caption() ?><?php echo ($employees_archived->nic_num->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employees_archived_edit->RightColumnClass ?>"><div<?php echo $employees_archived->nic_num->cellAttributes() ?>>
<span id="el_employees_archived_nic_num">
<input type="text" data-table="employees_archived" data-field="x_nic_num" name="x_nic_num" id="x_nic_num" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employees_archived->nic_num->getPlaceHolder()) ?>" value="<?php echo $employees_archived->nic_num->EditValue ?>"<?php echo $employees_archived->nic_num->editAttributes() ?>>
</span>
<?php echo $employees_archived->nic_num->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employees_archived->other_id->Visible) { // other_id ?>
	<div id="r_other_id" class="form-group row">
		<label id="elh_employees_archived_other_id" for="x_other_id" class="<?php echo $employees_archived_edit->LeftColumnClass ?>"><?php echo $employees_archived->other_id->caption() ?><?php echo ($employees_archived->other_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employees_archived_edit->RightColumnClass ?>"><div<?php echo $employees_archived->other_id->cellAttributes() ?>>
<span id="el_employees_archived_other_id">
<input type="text" data-table="employees_archived" data-field="x_other_id" name="x_other_id" id="x_other_id" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employees_archived->other_id->getPlaceHolder()) ?>" value="<?php echo $employees_archived->other_id->EditValue ?>"<?php echo $employees_archived->other_id->editAttributes() ?>>
</span>
<?php echo $employees_archived->other_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employees_archived->work_email->Visible) { // work_email ?>
	<div id="r_work_email" class="form-group row">
		<label id="elh_employees_archived_work_email" for="x_work_email" class="<?php echo $employees_archived_edit->LeftColumnClass ?>"><?php echo $employees_archived->work_email->caption() ?><?php echo ($employees_archived->work_email->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employees_archived_edit->RightColumnClass ?>"><div<?php echo $employees_archived->work_email->cellAttributes() ?>>
<span id="el_employees_archived_work_email">
<input type="text" data-table="employees_archived" data-field="x_work_email" name="x_work_email" id="x_work_email" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employees_archived->work_email->getPlaceHolder()) ?>" value="<?php echo $employees_archived->work_email->EditValue ?>"<?php echo $employees_archived->work_email->editAttributes() ?>>
</span>
<?php echo $employees_archived->work_email->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employees_archived->joined_date->Visible) { // joined_date ?>
	<div id="r_joined_date" class="form-group row">
		<label id="elh_employees_archived_joined_date" for="x_joined_date" class="<?php echo $employees_archived_edit->LeftColumnClass ?>"><?php echo $employees_archived->joined_date->caption() ?><?php echo ($employees_archived->joined_date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employees_archived_edit->RightColumnClass ?>"><div<?php echo $employees_archived->joined_date->cellAttributes() ?>>
<span id="el_employees_archived_joined_date">
<input type="text" data-table="employees_archived" data-field="x_joined_date" name="x_joined_date" id="x_joined_date" placeholder="<?php echo HtmlEncode($employees_archived->joined_date->getPlaceHolder()) ?>" value="<?php echo $employees_archived->joined_date->EditValue ?>"<?php echo $employees_archived->joined_date->editAttributes() ?>>
<?php if (!$employees_archived->joined_date->ReadOnly && !$employees_archived->joined_date->Disabled && !isset($employees_archived->joined_date->EditAttrs["readonly"]) && !isset($employees_archived->joined_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployees_archivededit", "x_joined_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employees_archived->joined_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employees_archived->confirmation_date->Visible) { // confirmation_date ?>
	<div id="r_confirmation_date" class="form-group row">
		<label id="elh_employees_archived_confirmation_date" for="x_confirmation_date" class="<?php echo $employees_archived_edit->LeftColumnClass ?>"><?php echo $employees_archived->confirmation_date->caption() ?><?php echo ($employees_archived->confirmation_date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employees_archived_edit->RightColumnClass ?>"><div<?php echo $employees_archived->confirmation_date->cellAttributes() ?>>
<span id="el_employees_archived_confirmation_date">
<input type="text" data-table="employees_archived" data-field="x_confirmation_date" name="x_confirmation_date" id="x_confirmation_date" placeholder="<?php echo HtmlEncode($employees_archived->confirmation_date->getPlaceHolder()) ?>" value="<?php echo $employees_archived->confirmation_date->EditValue ?>"<?php echo $employees_archived->confirmation_date->editAttributes() ?>>
<?php if (!$employees_archived->confirmation_date->ReadOnly && !$employees_archived->confirmation_date->Disabled && !isset($employees_archived->confirmation_date->EditAttrs["readonly"]) && !isset($employees_archived->confirmation_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployees_archivededit", "x_confirmation_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employees_archived->confirmation_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employees_archived->supervisor->Visible) { // supervisor ?>
	<div id="r_supervisor" class="form-group row">
		<label id="elh_employees_archived_supervisor" for="x_supervisor" class="<?php echo $employees_archived_edit->LeftColumnClass ?>"><?php echo $employees_archived->supervisor->caption() ?><?php echo ($employees_archived->supervisor->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employees_archived_edit->RightColumnClass ?>"><div<?php echo $employees_archived->supervisor->cellAttributes() ?>>
<span id="el_employees_archived_supervisor">
<input type="text" data-table="employees_archived" data-field="x_supervisor" name="x_supervisor" id="x_supervisor" size="30" placeholder="<?php echo HtmlEncode($employees_archived->supervisor->getPlaceHolder()) ?>" value="<?php echo $employees_archived->supervisor->EditValue ?>"<?php echo $employees_archived->supervisor->editAttributes() ?>>
</span>
<?php echo $employees_archived->supervisor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employees_archived->department->Visible) { // department ?>
	<div id="r_department" class="form-group row">
		<label id="elh_employees_archived_department" for="x_department" class="<?php echo $employees_archived_edit->LeftColumnClass ?>"><?php echo $employees_archived->department->caption() ?><?php echo ($employees_archived->department->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employees_archived_edit->RightColumnClass ?>"><div<?php echo $employees_archived->department->cellAttributes() ?>>
<span id="el_employees_archived_department">
<input type="text" data-table="employees_archived" data-field="x_department" name="x_department" id="x_department" size="30" placeholder="<?php echo HtmlEncode($employees_archived->department->getPlaceHolder()) ?>" value="<?php echo $employees_archived->department->EditValue ?>"<?php echo $employees_archived->department->editAttributes() ?>>
</span>
<?php echo $employees_archived->department->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employees_archived->termination_date->Visible) { // termination_date ?>
	<div id="r_termination_date" class="form-group row">
		<label id="elh_employees_archived_termination_date" for="x_termination_date" class="<?php echo $employees_archived_edit->LeftColumnClass ?>"><?php echo $employees_archived->termination_date->caption() ?><?php echo ($employees_archived->termination_date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employees_archived_edit->RightColumnClass ?>"><div<?php echo $employees_archived->termination_date->cellAttributes() ?>>
<span id="el_employees_archived_termination_date">
<input type="text" data-table="employees_archived" data-field="x_termination_date" name="x_termination_date" id="x_termination_date" placeholder="<?php echo HtmlEncode($employees_archived->termination_date->getPlaceHolder()) ?>" value="<?php echo $employees_archived->termination_date->EditValue ?>"<?php echo $employees_archived->termination_date->editAttributes() ?>>
<?php if (!$employees_archived->termination_date->ReadOnly && !$employees_archived->termination_date->Disabled && !isset($employees_archived->termination_date->EditAttrs["readonly"]) && !isset($employees_archived->termination_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployees_archivededit", "x_termination_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employees_archived->termination_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employees_archived->notes->Visible) { // notes ?>
	<div id="r_notes" class="form-group row">
		<label id="elh_employees_archived_notes" for="x_notes" class="<?php echo $employees_archived_edit->LeftColumnClass ?>"><?php echo $employees_archived->notes->caption() ?><?php echo ($employees_archived->notes->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employees_archived_edit->RightColumnClass ?>"><div<?php echo $employees_archived->notes->cellAttributes() ?>>
<span id="el_employees_archived_notes">
<textarea data-table="employees_archived" data-field="x_notes" name="x_notes" id="x_notes" cols="35" rows="4" placeholder="<?php echo HtmlEncode($employees_archived->notes->getPlaceHolder()) ?>"<?php echo $employees_archived->notes->editAttributes() ?>><?php echo $employees_archived->notes->EditValue ?></textarea>
</span>
<?php echo $employees_archived->notes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employees_archived->data->Visible) { // data ?>
	<div id="r_data" class="form-group row">
		<label id="elh_employees_archived_data" for="x_data" class="<?php echo $employees_archived_edit->LeftColumnClass ?>"><?php echo $employees_archived->data->caption() ?><?php echo ($employees_archived->data->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employees_archived_edit->RightColumnClass ?>"><div<?php echo $employees_archived->data->cellAttributes() ?>>
<span id="el_employees_archived_data">
<textarea data-table="employees_archived" data-field="x_data" name="x_data" id="x_data" cols="35" rows="4" placeholder="<?php echo HtmlEncode($employees_archived->data->getPlaceHolder()) ?>"<?php echo $employees_archived->data->editAttributes() ?>><?php echo $employees_archived->data->EditValue ?></textarea>
</span>
<?php echo $employees_archived->data->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$employees_archived_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $employees_archived_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employees_archived_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$employees_archived_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employees_archived_edit->terminate();
?>