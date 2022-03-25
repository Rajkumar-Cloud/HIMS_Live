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
$employee_leaves_add = new employee_leaves_add();

// Run the page
$employee_leaves_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_leaves_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var femployee_leavesadd = currentForm = new ew.Form("femployee_leavesadd", "add");

// Validate form
femployee_leavesadd.validate = function() {
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
		<?php if ($employee_leaves_add->employee->Required) { ?>
			elm = this.getElements("x" + infix + "_employee");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_leaves->employee->caption(), $employee_leaves->employee->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_employee");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_leaves->employee->errorMessage()) ?>");
		<?php if ($employee_leaves_add->leave_type->Required) { ?>
			elm = this.getElements("x" + infix + "_leave_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_leaves->leave_type->caption(), $employee_leaves->leave_type->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_leave_type");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_leaves->leave_type->errorMessage()) ?>");
		<?php if ($employee_leaves_add->leave_period->Required) { ?>
			elm = this.getElements("x" + infix + "_leave_period");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_leaves->leave_period->caption(), $employee_leaves->leave_period->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_leave_period");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_leaves->leave_period->errorMessage()) ?>");
		<?php if ($employee_leaves_add->date_start->Required) { ?>
			elm = this.getElements("x" + infix + "_date_start");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_leaves->date_start->caption(), $employee_leaves->date_start->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_date_start");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_leaves->date_start->errorMessage()) ?>");
		<?php if ($employee_leaves_add->date_end->Required) { ?>
			elm = this.getElements("x" + infix + "_date_end");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_leaves->date_end->caption(), $employee_leaves->date_end->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_date_end");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_leaves->date_end->errorMessage()) ?>");
		<?php if ($employee_leaves_add->details->Required) { ?>
			elm = this.getElements("x" + infix + "_details");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_leaves->details->caption(), $employee_leaves->details->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_leaves_add->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_leaves->status->caption(), $employee_leaves->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_leaves_add->attachment->Required) { ?>
			elm = this.getElements("x" + infix + "_attachment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_leaves->attachment->caption(), $employee_leaves->attachment->RequiredErrorMessage)) ?>");
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
femployee_leavesadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_leavesadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_leavesadd.lists["x_status"] = <?php echo $employee_leaves_add->status->Lookup->toClientList() ?>;
femployee_leavesadd.lists["x_status"].options = <?php echo JsonEncode($employee_leaves_add->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_leaves_add->showPageHeader(); ?>
<?php
$employee_leaves_add->showMessage();
?>
<form name="femployee_leavesadd" id="femployee_leavesadd" class="<?php echo $employee_leaves_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_leaves_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_leaves_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_leaves">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$employee_leaves_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($employee_leaves->employee->Visible) { // employee ?>
	<div id="r_employee" class="form-group row">
		<label id="elh_employee_leaves_employee" for="x_employee" class="<?php echo $employee_leaves_add->LeftColumnClass ?>"><?php echo $employee_leaves->employee->caption() ?><?php echo ($employee_leaves->employee->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_leaves_add->RightColumnClass ?>"><div<?php echo $employee_leaves->employee->cellAttributes() ?>>
<span id="el_employee_leaves_employee">
<input type="text" data-table="employee_leaves" data-field="x_employee" name="x_employee" id="x_employee" size="30" placeholder="<?php echo HtmlEncode($employee_leaves->employee->getPlaceHolder()) ?>" value="<?php echo $employee_leaves->employee->EditValue ?>"<?php echo $employee_leaves->employee->editAttributes() ?>>
</span>
<?php echo $employee_leaves->employee->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_leaves->leave_type->Visible) { // leave_type ?>
	<div id="r_leave_type" class="form-group row">
		<label id="elh_employee_leaves_leave_type" for="x_leave_type" class="<?php echo $employee_leaves_add->LeftColumnClass ?>"><?php echo $employee_leaves->leave_type->caption() ?><?php echo ($employee_leaves->leave_type->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_leaves_add->RightColumnClass ?>"><div<?php echo $employee_leaves->leave_type->cellAttributes() ?>>
<span id="el_employee_leaves_leave_type">
<input type="text" data-table="employee_leaves" data-field="x_leave_type" name="x_leave_type" id="x_leave_type" size="30" placeholder="<?php echo HtmlEncode($employee_leaves->leave_type->getPlaceHolder()) ?>" value="<?php echo $employee_leaves->leave_type->EditValue ?>"<?php echo $employee_leaves->leave_type->editAttributes() ?>>
</span>
<?php echo $employee_leaves->leave_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_leaves->leave_period->Visible) { // leave_period ?>
	<div id="r_leave_period" class="form-group row">
		<label id="elh_employee_leaves_leave_period" for="x_leave_period" class="<?php echo $employee_leaves_add->LeftColumnClass ?>"><?php echo $employee_leaves->leave_period->caption() ?><?php echo ($employee_leaves->leave_period->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_leaves_add->RightColumnClass ?>"><div<?php echo $employee_leaves->leave_period->cellAttributes() ?>>
<span id="el_employee_leaves_leave_period">
<input type="text" data-table="employee_leaves" data-field="x_leave_period" name="x_leave_period" id="x_leave_period" size="30" placeholder="<?php echo HtmlEncode($employee_leaves->leave_period->getPlaceHolder()) ?>" value="<?php echo $employee_leaves->leave_period->EditValue ?>"<?php echo $employee_leaves->leave_period->editAttributes() ?>>
</span>
<?php echo $employee_leaves->leave_period->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_leaves->date_start->Visible) { // date_start ?>
	<div id="r_date_start" class="form-group row">
		<label id="elh_employee_leaves_date_start" for="x_date_start" class="<?php echo $employee_leaves_add->LeftColumnClass ?>"><?php echo $employee_leaves->date_start->caption() ?><?php echo ($employee_leaves->date_start->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_leaves_add->RightColumnClass ?>"><div<?php echo $employee_leaves->date_start->cellAttributes() ?>>
<span id="el_employee_leaves_date_start">
<input type="text" data-table="employee_leaves" data-field="x_date_start" name="x_date_start" id="x_date_start" placeholder="<?php echo HtmlEncode($employee_leaves->date_start->getPlaceHolder()) ?>" value="<?php echo $employee_leaves->date_start->EditValue ?>"<?php echo $employee_leaves->date_start->editAttributes() ?>>
<?php if (!$employee_leaves->date_start->ReadOnly && !$employee_leaves->date_start->Disabled && !isset($employee_leaves->date_start->EditAttrs["readonly"]) && !isset($employee_leaves->date_start->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_leavesadd", "x_date_start", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee_leaves->date_start->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_leaves->date_end->Visible) { // date_end ?>
	<div id="r_date_end" class="form-group row">
		<label id="elh_employee_leaves_date_end" for="x_date_end" class="<?php echo $employee_leaves_add->LeftColumnClass ?>"><?php echo $employee_leaves->date_end->caption() ?><?php echo ($employee_leaves->date_end->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_leaves_add->RightColumnClass ?>"><div<?php echo $employee_leaves->date_end->cellAttributes() ?>>
<span id="el_employee_leaves_date_end">
<input type="text" data-table="employee_leaves" data-field="x_date_end" name="x_date_end" id="x_date_end" placeholder="<?php echo HtmlEncode($employee_leaves->date_end->getPlaceHolder()) ?>" value="<?php echo $employee_leaves->date_end->EditValue ?>"<?php echo $employee_leaves->date_end->editAttributes() ?>>
<?php if (!$employee_leaves->date_end->ReadOnly && !$employee_leaves->date_end->Disabled && !isset($employee_leaves->date_end->EditAttrs["readonly"]) && !isset($employee_leaves->date_end->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_leavesadd", "x_date_end", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee_leaves->date_end->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_leaves->details->Visible) { // details ?>
	<div id="r_details" class="form-group row">
		<label id="elh_employee_leaves_details" for="x_details" class="<?php echo $employee_leaves_add->LeftColumnClass ?>"><?php echo $employee_leaves->details->caption() ?><?php echo ($employee_leaves->details->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_leaves_add->RightColumnClass ?>"><div<?php echo $employee_leaves->details->cellAttributes() ?>>
<span id="el_employee_leaves_details">
<textarea data-table="employee_leaves" data-field="x_details" name="x_details" id="x_details" cols="35" rows="4" placeholder="<?php echo HtmlEncode($employee_leaves->details->getPlaceHolder()) ?>"<?php echo $employee_leaves->details->editAttributes() ?>><?php echo $employee_leaves->details->EditValue ?></textarea>
</span>
<?php echo $employee_leaves->details->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_leaves->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_employee_leaves_status" class="<?php echo $employee_leaves_add->LeftColumnClass ?>"><?php echo $employee_leaves->status->caption() ?><?php echo ($employee_leaves->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_leaves_add->RightColumnClass ?>"><div<?php echo $employee_leaves->status->cellAttributes() ?>>
<span id="el_employee_leaves_status">
<div id="tp_x_status" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_leaves" data-field="x_status" data-value-separator="<?php echo $employee_leaves->status->displayValueSeparatorAttribute() ?>" name="x_status" id="x_status" value="{value}"<?php echo $employee_leaves->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_leaves->status->radioButtonListHtml(FALSE, "x_status") ?>
</div></div>
</span>
<?php echo $employee_leaves->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_leaves->attachment->Visible) { // attachment ?>
	<div id="r_attachment" class="form-group row">
		<label id="elh_employee_leaves_attachment" for="x_attachment" class="<?php echo $employee_leaves_add->LeftColumnClass ?>"><?php echo $employee_leaves->attachment->caption() ?><?php echo ($employee_leaves->attachment->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_leaves_add->RightColumnClass ?>"><div<?php echo $employee_leaves->attachment->cellAttributes() ?>>
<span id="el_employee_leaves_attachment">
<input type="text" data-table="employee_leaves" data-field="x_attachment" name="x_attachment" id="x_attachment" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_leaves->attachment->getPlaceHolder()) ?>" value="<?php echo $employee_leaves->attachment->EditValue ?>"<?php echo $employee_leaves->attachment->editAttributes() ?>>
</span>
<?php echo $employee_leaves->attachment->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$employee_leaves_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $employee_leaves_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_leaves_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$employee_leaves_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_leaves_add->terminate();
?>