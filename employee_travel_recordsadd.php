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
$employee_travel_records_add = new employee_travel_records_add();

// Run the page
$employee_travel_records_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_travel_records_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var femployee_travel_recordsadd = currentForm = new ew.Form("femployee_travel_recordsadd", "add");

// Validate form
femployee_travel_recordsadd.validate = function() {
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
		<?php if ($employee_travel_records_add->employee->Required) { ?>
			elm = this.getElements("x" + infix + "_employee");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_travel_records->employee->caption(), $employee_travel_records->employee->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_employee");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_travel_records->employee->errorMessage()) ?>");
		<?php if ($employee_travel_records_add->type->Required) { ?>
			elm = this.getElements("x" + infix + "_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_travel_records->type->caption(), $employee_travel_records->type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_travel_records_add->purpose->Required) { ?>
			elm = this.getElements("x" + infix + "_purpose");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_travel_records->purpose->caption(), $employee_travel_records->purpose->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_travel_records_add->travel_from->Required) { ?>
			elm = this.getElements("x" + infix + "_travel_from");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_travel_records->travel_from->caption(), $employee_travel_records->travel_from->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_travel_records_add->travel_to->Required) { ?>
			elm = this.getElements("x" + infix + "_travel_to");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_travel_records->travel_to->caption(), $employee_travel_records->travel_to->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_travel_records_add->travel_date->Required) { ?>
			elm = this.getElements("x" + infix + "_travel_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_travel_records->travel_date->caption(), $employee_travel_records->travel_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_travel_date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_travel_records->travel_date->errorMessage()) ?>");
		<?php if ($employee_travel_records_add->return_date->Required) { ?>
			elm = this.getElements("x" + infix + "_return_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_travel_records->return_date->caption(), $employee_travel_records->return_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_return_date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_travel_records->return_date->errorMessage()) ?>");
		<?php if ($employee_travel_records_add->details->Required) { ?>
			elm = this.getElements("x" + infix + "_details");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_travel_records->details->caption(), $employee_travel_records->details->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_travel_records_add->funding->Required) { ?>
			elm = this.getElements("x" + infix + "_funding");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_travel_records->funding->caption(), $employee_travel_records->funding->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_funding");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_travel_records->funding->errorMessage()) ?>");
		<?php if ($employee_travel_records_add->currency->Required) { ?>
			elm = this.getElements("x" + infix + "_currency");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_travel_records->currency->caption(), $employee_travel_records->currency->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_currency");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_travel_records->currency->errorMessage()) ?>");
		<?php if ($employee_travel_records_add->attachment1->Required) { ?>
			elm = this.getElements("x" + infix + "_attachment1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_travel_records->attachment1->caption(), $employee_travel_records->attachment1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_travel_records_add->attachment2->Required) { ?>
			elm = this.getElements("x" + infix + "_attachment2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_travel_records->attachment2->caption(), $employee_travel_records->attachment2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_travel_records_add->attachment3->Required) { ?>
			elm = this.getElements("x" + infix + "_attachment3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_travel_records->attachment3->caption(), $employee_travel_records->attachment3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_travel_records_add->created->Required) { ?>
			elm = this.getElements("x" + infix + "_created");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_travel_records->created->caption(), $employee_travel_records->created->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_created");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_travel_records->created->errorMessage()) ?>");
		<?php if ($employee_travel_records_add->updated->Required) { ?>
			elm = this.getElements("x" + infix + "_updated");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_travel_records->updated->caption(), $employee_travel_records->updated->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_updated");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_travel_records->updated->errorMessage()) ?>");
		<?php if ($employee_travel_records_add->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_travel_records->status->caption(), $employee_travel_records->status->RequiredErrorMessage)) ?>");
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
femployee_travel_recordsadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_travel_recordsadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_travel_recordsadd.lists["x_type"] = <?php echo $employee_travel_records_add->type->Lookup->toClientList() ?>;
femployee_travel_recordsadd.lists["x_type"].options = <?php echo JsonEncode($employee_travel_records_add->type->options(FALSE, TRUE)) ?>;
femployee_travel_recordsadd.lists["x_status"] = <?php echo $employee_travel_records_add->status->Lookup->toClientList() ?>;
femployee_travel_recordsadd.lists["x_status"].options = <?php echo JsonEncode($employee_travel_records_add->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_travel_records_add->showPageHeader(); ?>
<?php
$employee_travel_records_add->showMessage();
?>
<form name="femployee_travel_recordsadd" id="femployee_travel_recordsadd" class="<?php echo $employee_travel_records_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_travel_records_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_travel_records_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_travel_records">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$employee_travel_records_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($employee_travel_records->employee->Visible) { // employee ?>
	<div id="r_employee" class="form-group row">
		<label id="elh_employee_travel_records_employee" for="x_employee" class="<?php echo $employee_travel_records_add->LeftColumnClass ?>"><?php echo $employee_travel_records->employee->caption() ?><?php echo ($employee_travel_records->employee->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_travel_records_add->RightColumnClass ?>"><div<?php echo $employee_travel_records->employee->cellAttributes() ?>>
<span id="el_employee_travel_records_employee">
<input type="text" data-table="employee_travel_records" data-field="x_employee" name="x_employee" id="x_employee" size="30" placeholder="<?php echo HtmlEncode($employee_travel_records->employee->getPlaceHolder()) ?>" value="<?php echo $employee_travel_records->employee->EditValue ?>"<?php echo $employee_travel_records->employee->editAttributes() ?>>
</span>
<?php echo $employee_travel_records->employee->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_travel_records->type->Visible) { // type ?>
	<div id="r_type" class="form-group row">
		<label id="elh_employee_travel_records_type" class="<?php echo $employee_travel_records_add->LeftColumnClass ?>"><?php echo $employee_travel_records->type->caption() ?><?php echo ($employee_travel_records->type->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_travel_records_add->RightColumnClass ?>"><div<?php echo $employee_travel_records->type->cellAttributes() ?>>
<span id="el_employee_travel_records_type">
<div id="tp_x_type" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_travel_records" data-field="x_type" data-value-separator="<?php echo $employee_travel_records->type->displayValueSeparatorAttribute() ?>" name="x_type" id="x_type" value="{value}"<?php echo $employee_travel_records->type->editAttributes() ?>></div>
<div id="dsl_x_type" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_travel_records->type->radioButtonListHtml(FALSE, "x_type") ?>
</div></div>
</span>
<?php echo $employee_travel_records->type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_travel_records->purpose->Visible) { // purpose ?>
	<div id="r_purpose" class="form-group row">
		<label id="elh_employee_travel_records_purpose" for="x_purpose" class="<?php echo $employee_travel_records_add->LeftColumnClass ?>"><?php echo $employee_travel_records->purpose->caption() ?><?php echo ($employee_travel_records->purpose->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_travel_records_add->RightColumnClass ?>"><div<?php echo $employee_travel_records->purpose->cellAttributes() ?>>
<span id="el_employee_travel_records_purpose">
<input type="text" data-table="employee_travel_records" data-field="x_purpose" name="x_purpose" id="x_purpose" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($employee_travel_records->purpose->getPlaceHolder()) ?>" value="<?php echo $employee_travel_records->purpose->EditValue ?>"<?php echo $employee_travel_records->purpose->editAttributes() ?>>
</span>
<?php echo $employee_travel_records->purpose->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_travel_records->travel_from->Visible) { // travel_from ?>
	<div id="r_travel_from" class="form-group row">
		<label id="elh_employee_travel_records_travel_from" for="x_travel_from" class="<?php echo $employee_travel_records_add->LeftColumnClass ?>"><?php echo $employee_travel_records->travel_from->caption() ?><?php echo ($employee_travel_records->travel_from->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_travel_records_add->RightColumnClass ?>"><div<?php echo $employee_travel_records->travel_from->cellAttributes() ?>>
<span id="el_employee_travel_records_travel_from">
<input type="text" data-table="employee_travel_records" data-field="x_travel_from" name="x_travel_from" id="x_travel_from" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($employee_travel_records->travel_from->getPlaceHolder()) ?>" value="<?php echo $employee_travel_records->travel_from->EditValue ?>"<?php echo $employee_travel_records->travel_from->editAttributes() ?>>
</span>
<?php echo $employee_travel_records->travel_from->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_travel_records->travel_to->Visible) { // travel_to ?>
	<div id="r_travel_to" class="form-group row">
		<label id="elh_employee_travel_records_travel_to" for="x_travel_to" class="<?php echo $employee_travel_records_add->LeftColumnClass ?>"><?php echo $employee_travel_records->travel_to->caption() ?><?php echo ($employee_travel_records->travel_to->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_travel_records_add->RightColumnClass ?>"><div<?php echo $employee_travel_records->travel_to->cellAttributes() ?>>
<span id="el_employee_travel_records_travel_to">
<input type="text" data-table="employee_travel_records" data-field="x_travel_to" name="x_travel_to" id="x_travel_to" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($employee_travel_records->travel_to->getPlaceHolder()) ?>" value="<?php echo $employee_travel_records->travel_to->EditValue ?>"<?php echo $employee_travel_records->travel_to->editAttributes() ?>>
</span>
<?php echo $employee_travel_records->travel_to->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_travel_records->travel_date->Visible) { // travel_date ?>
	<div id="r_travel_date" class="form-group row">
		<label id="elh_employee_travel_records_travel_date" for="x_travel_date" class="<?php echo $employee_travel_records_add->LeftColumnClass ?>"><?php echo $employee_travel_records->travel_date->caption() ?><?php echo ($employee_travel_records->travel_date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_travel_records_add->RightColumnClass ?>"><div<?php echo $employee_travel_records->travel_date->cellAttributes() ?>>
<span id="el_employee_travel_records_travel_date">
<input type="text" data-table="employee_travel_records" data-field="x_travel_date" name="x_travel_date" id="x_travel_date" placeholder="<?php echo HtmlEncode($employee_travel_records->travel_date->getPlaceHolder()) ?>" value="<?php echo $employee_travel_records->travel_date->EditValue ?>"<?php echo $employee_travel_records->travel_date->editAttributes() ?>>
<?php if (!$employee_travel_records->travel_date->ReadOnly && !$employee_travel_records->travel_date->Disabled && !isset($employee_travel_records->travel_date->EditAttrs["readonly"]) && !isset($employee_travel_records->travel_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_travel_recordsadd", "x_travel_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee_travel_records->travel_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_travel_records->return_date->Visible) { // return_date ?>
	<div id="r_return_date" class="form-group row">
		<label id="elh_employee_travel_records_return_date" for="x_return_date" class="<?php echo $employee_travel_records_add->LeftColumnClass ?>"><?php echo $employee_travel_records->return_date->caption() ?><?php echo ($employee_travel_records->return_date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_travel_records_add->RightColumnClass ?>"><div<?php echo $employee_travel_records->return_date->cellAttributes() ?>>
<span id="el_employee_travel_records_return_date">
<input type="text" data-table="employee_travel_records" data-field="x_return_date" name="x_return_date" id="x_return_date" placeholder="<?php echo HtmlEncode($employee_travel_records->return_date->getPlaceHolder()) ?>" value="<?php echo $employee_travel_records->return_date->EditValue ?>"<?php echo $employee_travel_records->return_date->editAttributes() ?>>
<?php if (!$employee_travel_records->return_date->ReadOnly && !$employee_travel_records->return_date->Disabled && !isset($employee_travel_records->return_date->EditAttrs["readonly"]) && !isset($employee_travel_records->return_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_travel_recordsadd", "x_return_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee_travel_records->return_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_travel_records->details->Visible) { // details ?>
	<div id="r_details" class="form-group row">
		<label id="elh_employee_travel_records_details" for="x_details" class="<?php echo $employee_travel_records_add->LeftColumnClass ?>"><?php echo $employee_travel_records->details->caption() ?><?php echo ($employee_travel_records->details->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_travel_records_add->RightColumnClass ?>"><div<?php echo $employee_travel_records->details->cellAttributes() ?>>
<span id="el_employee_travel_records_details">
<textarea data-table="employee_travel_records" data-field="x_details" name="x_details" id="x_details" cols="35" rows="4" placeholder="<?php echo HtmlEncode($employee_travel_records->details->getPlaceHolder()) ?>"<?php echo $employee_travel_records->details->editAttributes() ?>><?php echo $employee_travel_records->details->EditValue ?></textarea>
</span>
<?php echo $employee_travel_records->details->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_travel_records->funding->Visible) { // funding ?>
	<div id="r_funding" class="form-group row">
		<label id="elh_employee_travel_records_funding" for="x_funding" class="<?php echo $employee_travel_records_add->LeftColumnClass ?>"><?php echo $employee_travel_records->funding->caption() ?><?php echo ($employee_travel_records->funding->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_travel_records_add->RightColumnClass ?>"><div<?php echo $employee_travel_records->funding->cellAttributes() ?>>
<span id="el_employee_travel_records_funding">
<input type="text" data-table="employee_travel_records" data-field="x_funding" name="x_funding" id="x_funding" size="30" placeholder="<?php echo HtmlEncode($employee_travel_records->funding->getPlaceHolder()) ?>" value="<?php echo $employee_travel_records->funding->EditValue ?>"<?php echo $employee_travel_records->funding->editAttributes() ?>>
</span>
<?php echo $employee_travel_records->funding->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_travel_records->currency->Visible) { // currency ?>
	<div id="r_currency" class="form-group row">
		<label id="elh_employee_travel_records_currency" for="x_currency" class="<?php echo $employee_travel_records_add->LeftColumnClass ?>"><?php echo $employee_travel_records->currency->caption() ?><?php echo ($employee_travel_records->currency->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_travel_records_add->RightColumnClass ?>"><div<?php echo $employee_travel_records->currency->cellAttributes() ?>>
<span id="el_employee_travel_records_currency">
<input type="text" data-table="employee_travel_records" data-field="x_currency" name="x_currency" id="x_currency" size="30" placeholder="<?php echo HtmlEncode($employee_travel_records->currency->getPlaceHolder()) ?>" value="<?php echo $employee_travel_records->currency->EditValue ?>"<?php echo $employee_travel_records->currency->editAttributes() ?>>
</span>
<?php echo $employee_travel_records->currency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_travel_records->attachment1->Visible) { // attachment1 ?>
	<div id="r_attachment1" class="form-group row">
		<label id="elh_employee_travel_records_attachment1" for="x_attachment1" class="<?php echo $employee_travel_records_add->LeftColumnClass ?>"><?php echo $employee_travel_records->attachment1->caption() ?><?php echo ($employee_travel_records->attachment1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_travel_records_add->RightColumnClass ?>"><div<?php echo $employee_travel_records->attachment1->cellAttributes() ?>>
<span id="el_employee_travel_records_attachment1">
<input type="text" data-table="employee_travel_records" data-field="x_attachment1" name="x_attachment1" id="x_attachment1" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_travel_records->attachment1->getPlaceHolder()) ?>" value="<?php echo $employee_travel_records->attachment1->EditValue ?>"<?php echo $employee_travel_records->attachment1->editAttributes() ?>>
</span>
<?php echo $employee_travel_records->attachment1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_travel_records->attachment2->Visible) { // attachment2 ?>
	<div id="r_attachment2" class="form-group row">
		<label id="elh_employee_travel_records_attachment2" for="x_attachment2" class="<?php echo $employee_travel_records_add->LeftColumnClass ?>"><?php echo $employee_travel_records->attachment2->caption() ?><?php echo ($employee_travel_records->attachment2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_travel_records_add->RightColumnClass ?>"><div<?php echo $employee_travel_records->attachment2->cellAttributes() ?>>
<span id="el_employee_travel_records_attachment2">
<input type="text" data-table="employee_travel_records" data-field="x_attachment2" name="x_attachment2" id="x_attachment2" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_travel_records->attachment2->getPlaceHolder()) ?>" value="<?php echo $employee_travel_records->attachment2->EditValue ?>"<?php echo $employee_travel_records->attachment2->editAttributes() ?>>
</span>
<?php echo $employee_travel_records->attachment2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_travel_records->attachment3->Visible) { // attachment3 ?>
	<div id="r_attachment3" class="form-group row">
		<label id="elh_employee_travel_records_attachment3" for="x_attachment3" class="<?php echo $employee_travel_records_add->LeftColumnClass ?>"><?php echo $employee_travel_records->attachment3->caption() ?><?php echo ($employee_travel_records->attachment3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_travel_records_add->RightColumnClass ?>"><div<?php echo $employee_travel_records->attachment3->cellAttributes() ?>>
<span id="el_employee_travel_records_attachment3">
<input type="text" data-table="employee_travel_records" data-field="x_attachment3" name="x_attachment3" id="x_attachment3" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_travel_records->attachment3->getPlaceHolder()) ?>" value="<?php echo $employee_travel_records->attachment3->EditValue ?>"<?php echo $employee_travel_records->attachment3->editAttributes() ?>>
</span>
<?php echo $employee_travel_records->attachment3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_travel_records->created->Visible) { // created ?>
	<div id="r_created" class="form-group row">
		<label id="elh_employee_travel_records_created" for="x_created" class="<?php echo $employee_travel_records_add->LeftColumnClass ?>"><?php echo $employee_travel_records->created->caption() ?><?php echo ($employee_travel_records->created->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_travel_records_add->RightColumnClass ?>"><div<?php echo $employee_travel_records->created->cellAttributes() ?>>
<span id="el_employee_travel_records_created">
<input type="text" data-table="employee_travel_records" data-field="x_created" name="x_created" id="x_created" placeholder="<?php echo HtmlEncode($employee_travel_records->created->getPlaceHolder()) ?>" value="<?php echo $employee_travel_records->created->EditValue ?>"<?php echo $employee_travel_records->created->editAttributes() ?>>
<?php if (!$employee_travel_records->created->ReadOnly && !$employee_travel_records->created->Disabled && !isset($employee_travel_records->created->EditAttrs["readonly"]) && !isset($employee_travel_records->created->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_travel_recordsadd", "x_created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee_travel_records->created->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_travel_records->updated->Visible) { // updated ?>
	<div id="r_updated" class="form-group row">
		<label id="elh_employee_travel_records_updated" for="x_updated" class="<?php echo $employee_travel_records_add->LeftColumnClass ?>"><?php echo $employee_travel_records->updated->caption() ?><?php echo ($employee_travel_records->updated->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_travel_records_add->RightColumnClass ?>"><div<?php echo $employee_travel_records->updated->cellAttributes() ?>>
<span id="el_employee_travel_records_updated">
<input type="text" data-table="employee_travel_records" data-field="x_updated" name="x_updated" id="x_updated" placeholder="<?php echo HtmlEncode($employee_travel_records->updated->getPlaceHolder()) ?>" value="<?php echo $employee_travel_records->updated->EditValue ?>"<?php echo $employee_travel_records->updated->editAttributes() ?>>
<?php if (!$employee_travel_records->updated->ReadOnly && !$employee_travel_records->updated->Disabled && !isset($employee_travel_records->updated->EditAttrs["readonly"]) && !isset($employee_travel_records->updated->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_travel_recordsadd", "x_updated", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee_travel_records->updated->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_travel_records->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_employee_travel_records_status" class="<?php echo $employee_travel_records_add->LeftColumnClass ?>"><?php echo $employee_travel_records->status->caption() ?><?php echo ($employee_travel_records->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_travel_records_add->RightColumnClass ?>"><div<?php echo $employee_travel_records->status->cellAttributes() ?>>
<span id="el_employee_travel_records_status">
<div id="tp_x_status" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_travel_records" data-field="x_status" data-value-separator="<?php echo $employee_travel_records->status->displayValueSeparatorAttribute() ?>" name="x_status" id="x_status" value="{value}"<?php echo $employee_travel_records->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_travel_records->status->radioButtonListHtml(FALSE, "x_status") ?>
</div></div>
</span>
<?php echo $employee_travel_records->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$employee_travel_records_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $employee_travel_records_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_travel_records_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$employee_travel_records_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_travel_records_add->terminate();
?>