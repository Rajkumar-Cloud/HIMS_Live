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
$employee_salary_add = new employee_salary_add();

// Run the page
$employee_salary_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_salary_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var femployee_salaryadd = currentForm = new ew.Form("femployee_salaryadd", "add");

// Validate form
femployee_salaryadd.validate = function() {
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
		<?php if ($employee_salary_add->employee->Required) { ?>
			elm = this.getElements("x" + infix + "_employee");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_salary->employee->caption(), $employee_salary->employee->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_employee");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_salary->employee->errorMessage()) ?>");
		<?php if ($employee_salary_add->component->Required) { ?>
			elm = this.getElements("x" + infix + "_component");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_salary->component->caption(), $employee_salary->component->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_component");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_salary->component->errorMessage()) ?>");
		<?php if ($employee_salary_add->pay_frequency->Required) { ?>
			elm = this.getElements("x" + infix + "_pay_frequency");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_salary->pay_frequency->caption(), $employee_salary->pay_frequency->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_salary_add->currency->Required) { ?>
			elm = this.getElements("x" + infix + "_currency");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_salary->currency->caption(), $employee_salary->currency->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_currency");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_salary->currency->errorMessage()) ?>");
		<?php if ($employee_salary_add->amount->Required) { ?>
			elm = this.getElements("x" + infix + "_amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_salary->amount->caption(), $employee_salary->amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_salary->amount->errorMessage()) ?>");
		<?php if ($employee_salary_add->details->Required) { ?>
			elm = this.getElements("x" + infix + "_details");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_salary->details->caption(), $employee_salary->details->RequiredErrorMessage)) ?>");
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
femployee_salaryadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_salaryadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_salaryadd.lists["x_pay_frequency"] = <?php echo $employee_salary_add->pay_frequency->Lookup->toClientList() ?>;
femployee_salaryadd.lists["x_pay_frequency"].options = <?php echo JsonEncode($employee_salary_add->pay_frequency->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_salary_add->showPageHeader(); ?>
<?php
$employee_salary_add->showMessage();
?>
<form name="femployee_salaryadd" id="femployee_salaryadd" class="<?php echo $employee_salary_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_salary_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_salary_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_salary">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$employee_salary_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($employee_salary->employee->Visible) { // employee ?>
	<div id="r_employee" class="form-group row">
		<label id="elh_employee_salary_employee" for="x_employee" class="<?php echo $employee_salary_add->LeftColumnClass ?>"><?php echo $employee_salary->employee->caption() ?><?php echo ($employee_salary->employee->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_salary_add->RightColumnClass ?>"><div<?php echo $employee_salary->employee->cellAttributes() ?>>
<span id="el_employee_salary_employee">
<input type="text" data-table="employee_salary" data-field="x_employee" name="x_employee" id="x_employee" size="30" placeholder="<?php echo HtmlEncode($employee_salary->employee->getPlaceHolder()) ?>" value="<?php echo $employee_salary->employee->EditValue ?>"<?php echo $employee_salary->employee->editAttributes() ?>>
</span>
<?php echo $employee_salary->employee->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_salary->component->Visible) { // component ?>
	<div id="r_component" class="form-group row">
		<label id="elh_employee_salary_component" for="x_component" class="<?php echo $employee_salary_add->LeftColumnClass ?>"><?php echo $employee_salary->component->caption() ?><?php echo ($employee_salary->component->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_salary_add->RightColumnClass ?>"><div<?php echo $employee_salary->component->cellAttributes() ?>>
<span id="el_employee_salary_component">
<input type="text" data-table="employee_salary" data-field="x_component" name="x_component" id="x_component" size="30" placeholder="<?php echo HtmlEncode($employee_salary->component->getPlaceHolder()) ?>" value="<?php echo $employee_salary->component->EditValue ?>"<?php echo $employee_salary->component->editAttributes() ?>>
</span>
<?php echo $employee_salary->component->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_salary->pay_frequency->Visible) { // pay_frequency ?>
	<div id="r_pay_frequency" class="form-group row">
		<label id="elh_employee_salary_pay_frequency" class="<?php echo $employee_salary_add->LeftColumnClass ?>"><?php echo $employee_salary->pay_frequency->caption() ?><?php echo ($employee_salary->pay_frequency->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_salary_add->RightColumnClass ?>"><div<?php echo $employee_salary->pay_frequency->cellAttributes() ?>>
<span id="el_employee_salary_pay_frequency">
<div id="tp_x_pay_frequency" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_salary" data-field="x_pay_frequency" data-value-separator="<?php echo $employee_salary->pay_frequency->displayValueSeparatorAttribute() ?>" name="x_pay_frequency" id="x_pay_frequency" value="{value}"<?php echo $employee_salary->pay_frequency->editAttributes() ?>></div>
<div id="dsl_x_pay_frequency" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_salary->pay_frequency->radioButtonListHtml(FALSE, "x_pay_frequency") ?>
</div></div>
</span>
<?php echo $employee_salary->pay_frequency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_salary->currency->Visible) { // currency ?>
	<div id="r_currency" class="form-group row">
		<label id="elh_employee_salary_currency" for="x_currency" class="<?php echo $employee_salary_add->LeftColumnClass ?>"><?php echo $employee_salary->currency->caption() ?><?php echo ($employee_salary->currency->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_salary_add->RightColumnClass ?>"><div<?php echo $employee_salary->currency->cellAttributes() ?>>
<span id="el_employee_salary_currency">
<input type="text" data-table="employee_salary" data-field="x_currency" name="x_currency" id="x_currency" size="30" placeholder="<?php echo HtmlEncode($employee_salary->currency->getPlaceHolder()) ?>" value="<?php echo $employee_salary->currency->EditValue ?>"<?php echo $employee_salary->currency->editAttributes() ?>>
</span>
<?php echo $employee_salary->currency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_salary->amount->Visible) { // amount ?>
	<div id="r_amount" class="form-group row">
		<label id="elh_employee_salary_amount" for="x_amount" class="<?php echo $employee_salary_add->LeftColumnClass ?>"><?php echo $employee_salary->amount->caption() ?><?php echo ($employee_salary->amount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_salary_add->RightColumnClass ?>"><div<?php echo $employee_salary->amount->cellAttributes() ?>>
<span id="el_employee_salary_amount">
<input type="text" data-table="employee_salary" data-field="x_amount" name="x_amount" id="x_amount" size="30" placeholder="<?php echo HtmlEncode($employee_salary->amount->getPlaceHolder()) ?>" value="<?php echo $employee_salary->amount->EditValue ?>"<?php echo $employee_salary->amount->editAttributes() ?>>
</span>
<?php echo $employee_salary->amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_salary->details->Visible) { // details ?>
	<div id="r_details" class="form-group row">
		<label id="elh_employee_salary_details" for="x_details" class="<?php echo $employee_salary_add->LeftColumnClass ?>"><?php echo $employee_salary->details->caption() ?><?php echo ($employee_salary->details->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_salary_add->RightColumnClass ?>"><div<?php echo $employee_salary->details->cellAttributes() ?>>
<span id="el_employee_salary_details">
<textarea data-table="employee_salary" data-field="x_details" name="x_details" id="x_details" cols="35" rows="4" placeholder="<?php echo HtmlEncode($employee_salary->details->getPlaceHolder()) ?>"<?php echo $employee_salary->details->editAttributes() ?>><?php echo $employee_salary->details->EditValue ?></textarea>
</span>
<?php echo $employee_salary->details->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$employee_salary_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $employee_salary_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_salary_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$employee_salary_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_salary_add->terminate();
?>