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
$employee_company_loans_add = new employee_company_loans_add();

// Run the page
$employee_company_loans_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_company_loans_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var femployee_company_loansadd = currentForm = new ew.Form("femployee_company_loansadd", "add");

// Validate form
femployee_company_loansadd.validate = function() {
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
		<?php if ($employee_company_loans_add->employee->Required) { ?>
			elm = this.getElements("x" + infix + "_employee");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_company_loans->employee->caption(), $employee_company_loans->employee->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_employee");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_company_loans->employee->errorMessage()) ?>");
		<?php if ($employee_company_loans_add->loan->Required) { ?>
			elm = this.getElements("x" + infix + "_loan");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_company_loans->loan->caption(), $employee_company_loans->loan->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_loan");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_company_loans->loan->errorMessage()) ?>");
		<?php if ($employee_company_loans_add->start_date->Required) { ?>
			elm = this.getElements("x" + infix + "_start_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_company_loans->start_date->caption(), $employee_company_loans->start_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_start_date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_company_loans->start_date->errorMessage()) ?>");
		<?php if ($employee_company_loans_add->last_installment_date->Required) { ?>
			elm = this.getElements("x" + infix + "_last_installment_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_company_loans->last_installment_date->caption(), $employee_company_loans->last_installment_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_last_installment_date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_company_loans->last_installment_date->errorMessage()) ?>");
		<?php if ($employee_company_loans_add->period_months->Required) { ?>
			elm = this.getElements("x" + infix + "_period_months");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_company_loans->period_months->caption(), $employee_company_loans->period_months->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_period_months");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_company_loans->period_months->errorMessage()) ?>");
		<?php if ($employee_company_loans_add->currency->Required) { ?>
			elm = this.getElements("x" + infix + "_currency");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_company_loans->currency->caption(), $employee_company_loans->currency->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_currency");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_company_loans->currency->errorMessage()) ?>");
		<?php if ($employee_company_loans_add->amount->Required) { ?>
			elm = this.getElements("x" + infix + "_amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_company_loans->amount->caption(), $employee_company_loans->amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_company_loans->amount->errorMessage()) ?>");
		<?php if ($employee_company_loans_add->monthly_installment->Required) { ?>
			elm = this.getElements("x" + infix + "_monthly_installment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_company_loans->monthly_installment->caption(), $employee_company_loans->monthly_installment->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_monthly_installment");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_company_loans->monthly_installment->errorMessage()) ?>");
		<?php if ($employee_company_loans_add->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_company_loans->status->caption(), $employee_company_loans->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_company_loans_add->details->Required) { ?>
			elm = this.getElements("x" + infix + "_details");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_company_loans->details->caption(), $employee_company_loans->details->RequiredErrorMessage)) ?>");
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
femployee_company_loansadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_company_loansadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_company_loansadd.lists["x_status"] = <?php echo $employee_company_loans_add->status->Lookup->toClientList() ?>;
femployee_company_loansadd.lists["x_status"].options = <?php echo JsonEncode($employee_company_loans_add->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_company_loans_add->showPageHeader(); ?>
<?php
$employee_company_loans_add->showMessage();
?>
<form name="femployee_company_loansadd" id="femployee_company_loansadd" class="<?php echo $employee_company_loans_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_company_loans_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_company_loans_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_company_loans">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$employee_company_loans_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($employee_company_loans->employee->Visible) { // employee ?>
	<div id="r_employee" class="form-group row">
		<label id="elh_employee_company_loans_employee" for="x_employee" class="<?php echo $employee_company_loans_add->LeftColumnClass ?>"><?php echo $employee_company_loans->employee->caption() ?><?php echo ($employee_company_loans->employee->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_company_loans_add->RightColumnClass ?>"><div<?php echo $employee_company_loans->employee->cellAttributes() ?>>
<span id="el_employee_company_loans_employee">
<input type="text" data-table="employee_company_loans" data-field="x_employee" name="x_employee" id="x_employee" size="30" placeholder="<?php echo HtmlEncode($employee_company_loans->employee->getPlaceHolder()) ?>" value="<?php echo $employee_company_loans->employee->EditValue ?>"<?php echo $employee_company_loans->employee->editAttributes() ?>>
</span>
<?php echo $employee_company_loans->employee->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_company_loans->loan->Visible) { // loan ?>
	<div id="r_loan" class="form-group row">
		<label id="elh_employee_company_loans_loan" for="x_loan" class="<?php echo $employee_company_loans_add->LeftColumnClass ?>"><?php echo $employee_company_loans->loan->caption() ?><?php echo ($employee_company_loans->loan->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_company_loans_add->RightColumnClass ?>"><div<?php echo $employee_company_loans->loan->cellAttributes() ?>>
<span id="el_employee_company_loans_loan">
<input type="text" data-table="employee_company_loans" data-field="x_loan" name="x_loan" id="x_loan" size="30" placeholder="<?php echo HtmlEncode($employee_company_loans->loan->getPlaceHolder()) ?>" value="<?php echo $employee_company_loans->loan->EditValue ?>"<?php echo $employee_company_loans->loan->editAttributes() ?>>
</span>
<?php echo $employee_company_loans->loan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_company_loans->start_date->Visible) { // start_date ?>
	<div id="r_start_date" class="form-group row">
		<label id="elh_employee_company_loans_start_date" for="x_start_date" class="<?php echo $employee_company_loans_add->LeftColumnClass ?>"><?php echo $employee_company_loans->start_date->caption() ?><?php echo ($employee_company_loans->start_date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_company_loans_add->RightColumnClass ?>"><div<?php echo $employee_company_loans->start_date->cellAttributes() ?>>
<span id="el_employee_company_loans_start_date">
<input type="text" data-table="employee_company_loans" data-field="x_start_date" name="x_start_date" id="x_start_date" placeholder="<?php echo HtmlEncode($employee_company_loans->start_date->getPlaceHolder()) ?>" value="<?php echo $employee_company_loans->start_date->EditValue ?>"<?php echo $employee_company_loans->start_date->editAttributes() ?>>
<?php if (!$employee_company_loans->start_date->ReadOnly && !$employee_company_loans->start_date->Disabled && !isset($employee_company_loans->start_date->EditAttrs["readonly"]) && !isset($employee_company_loans->start_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_company_loansadd", "x_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee_company_loans->start_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_company_loans->last_installment_date->Visible) { // last_installment_date ?>
	<div id="r_last_installment_date" class="form-group row">
		<label id="elh_employee_company_loans_last_installment_date" for="x_last_installment_date" class="<?php echo $employee_company_loans_add->LeftColumnClass ?>"><?php echo $employee_company_loans->last_installment_date->caption() ?><?php echo ($employee_company_loans->last_installment_date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_company_loans_add->RightColumnClass ?>"><div<?php echo $employee_company_loans->last_installment_date->cellAttributes() ?>>
<span id="el_employee_company_loans_last_installment_date">
<input type="text" data-table="employee_company_loans" data-field="x_last_installment_date" name="x_last_installment_date" id="x_last_installment_date" placeholder="<?php echo HtmlEncode($employee_company_loans->last_installment_date->getPlaceHolder()) ?>" value="<?php echo $employee_company_loans->last_installment_date->EditValue ?>"<?php echo $employee_company_loans->last_installment_date->editAttributes() ?>>
<?php if (!$employee_company_loans->last_installment_date->ReadOnly && !$employee_company_loans->last_installment_date->Disabled && !isset($employee_company_loans->last_installment_date->EditAttrs["readonly"]) && !isset($employee_company_loans->last_installment_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_company_loansadd", "x_last_installment_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee_company_loans->last_installment_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_company_loans->period_months->Visible) { // period_months ?>
	<div id="r_period_months" class="form-group row">
		<label id="elh_employee_company_loans_period_months" for="x_period_months" class="<?php echo $employee_company_loans_add->LeftColumnClass ?>"><?php echo $employee_company_loans->period_months->caption() ?><?php echo ($employee_company_loans->period_months->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_company_loans_add->RightColumnClass ?>"><div<?php echo $employee_company_loans->period_months->cellAttributes() ?>>
<span id="el_employee_company_loans_period_months">
<input type="text" data-table="employee_company_loans" data-field="x_period_months" name="x_period_months" id="x_period_months" size="30" placeholder="<?php echo HtmlEncode($employee_company_loans->period_months->getPlaceHolder()) ?>" value="<?php echo $employee_company_loans->period_months->EditValue ?>"<?php echo $employee_company_loans->period_months->editAttributes() ?>>
</span>
<?php echo $employee_company_loans->period_months->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_company_loans->currency->Visible) { // currency ?>
	<div id="r_currency" class="form-group row">
		<label id="elh_employee_company_loans_currency" for="x_currency" class="<?php echo $employee_company_loans_add->LeftColumnClass ?>"><?php echo $employee_company_loans->currency->caption() ?><?php echo ($employee_company_loans->currency->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_company_loans_add->RightColumnClass ?>"><div<?php echo $employee_company_loans->currency->cellAttributes() ?>>
<span id="el_employee_company_loans_currency">
<input type="text" data-table="employee_company_loans" data-field="x_currency" name="x_currency" id="x_currency" size="30" placeholder="<?php echo HtmlEncode($employee_company_loans->currency->getPlaceHolder()) ?>" value="<?php echo $employee_company_loans->currency->EditValue ?>"<?php echo $employee_company_loans->currency->editAttributes() ?>>
</span>
<?php echo $employee_company_loans->currency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_company_loans->amount->Visible) { // amount ?>
	<div id="r_amount" class="form-group row">
		<label id="elh_employee_company_loans_amount" for="x_amount" class="<?php echo $employee_company_loans_add->LeftColumnClass ?>"><?php echo $employee_company_loans->amount->caption() ?><?php echo ($employee_company_loans->amount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_company_loans_add->RightColumnClass ?>"><div<?php echo $employee_company_loans->amount->cellAttributes() ?>>
<span id="el_employee_company_loans_amount">
<input type="text" data-table="employee_company_loans" data-field="x_amount" name="x_amount" id="x_amount" size="30" placeholder="<?php echo HtmlEncode($employee_company_loans->amount->getPlaceHolder()) ?>" value="<?php echo $employee_company_loans->amount->EditValue ?>"<?php echo $employee_company_loans->amount->editAttributes() ?>>
</span>
<?php echo $employee_company_loans->amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_company_loans->monthly_installment->Visible) { // monthly_installment ?>
	<div id="r_monthly_installment" class="form-group row">
		<label id="elh_employee_company_loans_monthly_installment" for="x_monthly_installment" class="<?php echo $employee_company_loans_add->LeftColumnClass ?>"><?php echo $employee_company_loans->monthly_installment->caption() ?><?php echo ($employee_company_loans->monthly_installment->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_company_loans_add->RightColumnClass ?>"><div<?php echo $employee_company_loans->monthly_installment->cellAttributes() ?>>
<span id="el_employee_company_loans_monthly_installment">
<input type="text" data-table="employee_company_loans" data-field="x_monthly_installment" name="x_monthly_installment" id="x_monthly_installment" size="30" placeholder="<?php echo HtmlEncode($employee_company_loans->monthly_installment->getPlaceHolder()) ?>" value="<?php echo $employee_company_loans->monthly_installment->EditValue ?>"<?php echo $employee_company_loans->monthly_installment->editAttributes() ?>>
</span>
<?php echo $employee_company_loans->monthly_installment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_company_loans->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_employee_company_loans_status" class="<?php echo $employee_company_loans_add->LeftColumnClass ?>"><?php echo $employee_company_loans->status->caption() ?><?php echo ($employee_company_loans->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_company_loans_add->RightColumnClass ?>"><div<?php echo $employee_company_loans->status->cellAttributes() ?>>
<span id="el_employee_company_loans_status">
<div id="tp_x_status" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_company_loans" data-field="x_status" data-value-separator="<?php echo $employee_company_loans->status->displayValueSeparatorAttribute() ?>" name="x_status" id="x_status" value="{value}"<?php echo $employee_company_loans->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_company_loans->status->radioButtonListHtml(FALSE, "x_status") ?>
</div></div>
</span>
<?php echo $employee_company_loans->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_company_loans->details->Visible) { // details ?>
	<div id="r_details" class="form-group row">
		<label id="elh_employee_company_loans_details" for="x_details" class="<?php echo $employee_company_loans_add->LeftColumnClass ?>"><?php echo $employee_company_loans->details->caption() ?><?php echo ($employee_company_loans->details->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_company_loans_add->RightColumnClass ?>"><div<?php echo $employee_company_loans->details->cellAttributes() ?>>
<span id="el_employee_company_loans_details">
<textarea data-table="employee_company_loans" data-field="x_details" name="x_details" id="x_details" cols="35" rows="4" placeholder="<?php echo HtmlEncode($employee_company_loans->details->getPlaceHolder()) ?>"<?php echo $employee_company_loans->details->editAttributes() ?>><?php echo $employee_company_loans->details->EditValue ?></textarea>
</span>
<?php echo $employee_company_loans->details->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$employee_company_loans_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $employee_company_loans_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_company_loans_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$employee_company_loans_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_company_loans_add->terminate();
?>