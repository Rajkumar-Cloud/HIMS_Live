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
$employees_payroll_edit = new employees_payroll_edit();

// Run the page
$employees_payroll_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employees_payroll_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var femployees_payrolledit = currentForm = new ew.Form("femployees_payrolledit", "edit");

// Validate form
femployees_payrolledit.validate = function() {
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
		<?php if ($employees_payroll_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employees_payroll->id->caption(), $employees_payroll->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employees_payroll_edit->employee->Required) { ?>
			elm = this.getElements("x" + infix + "_employee");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employees_payroll->employee->caption(), $employees_payroll->employee->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_employee");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employees_payroll->employee->errorMessage()) ?>");
		<?php if ($employees_payroll_edit->pay_frequency->Required) { ?>
			elm = this.getElements("x" + infix + "_pay_frequency");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employees_payroll->pay_frequency->caption(), $employees_payroll->pay_frequency->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_pay_frequency");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employees_payroll->pay_frequency->errorMessage()) ?>");
		<?php if ($employees_payroll_edit->currency->Required) { ?>
			elm = this.getElements("x" + infix + "_currency");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employees_payroll->currency->caption(), $employees_payroll->currency->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_currency");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employees_payroll->currency->errorMessage()) ?>");
		<?php if ($employees_payroll_edit->deduction_exemptions->Required) { ?>
			elm = this.getElements("x" + infix + "_deduction_exemptions");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employees_payroll->deduction_exemptions->caption(), $employees_payroll->deduction_exemptions->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employees_payroll_edit->deduction_allowed->Required) { ?>
			elm = this.getElements("x" + infix + "_deduction_allowed");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employees_payroll->deduction_allowed->caption(), $employees_payroll->deduction_allowed->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employees_payroll_edit->deduction_group->Required) { ?>
			elm = this.getElements("x" + infix + "_deduction_group");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employees_payroll->deduction_group->caption(), $employees_payroll->deduction_group->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_deduction_group");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employees_payroll->deduction_group->errorMessage()) ?>");

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
femployees_payrolledit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployees_payrolledit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employees_payroll_edit->showPageHeader(); ?>
<?php
$employees_payroll_edit->showMessage();
?>
<form name="femployees_payrolledit" id="femployees_payrolledit" class="<?php echo $employees_payroll_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employees_payroll_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employees_payroll_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employees_payroll">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$employees_payroll_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($employees_payroll->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_employees_payroll_id" class="<?php echo $employees_payroll_edit->LeftColumnClass ?>"><?php echo $employees_payroll->id->caption() ?><?php echo ($employees_payroll->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employees_payroll_edit->RightColumnClass ?>"><div<?php echo $employees_payroll->id->cellAttributes() ?>>
<span id="el_employees_payroll_id">
<span<?php echo $employees_payroll->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employees_payroll->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="employees_payroll" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($employees_payroll->id->CurrentValue) ?>">
<?php echo $employees_payroll->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employees_payroll->employee->Visible) { // employee ?>
	<div id="r_employee" class="form-group row">
		<label id="elh_employees_payroll_employee" for="x_employee" class="<?php echo $employees_payroll_edit->LeftColumnClass ?>"><?php echo $employees_payroll->employee->caption() ?><?php echo ($employees_payroll->employee->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employees_payroll_edit->RightColumnClass ?>"><div<?php echo $employees_payroll->employee->cellAttributes() ?>>
<span id="el_employees_payroll_employee">
<input type="text" data-table="employees_payroll" data-field="x_employee" name="x_employee" id="x_employee" size="30" placeholder="<?php echo HtmlEncode($employees_payroll->employee->getPlaceHolder()) ?>" value="<?php echo $employees_payroll->employee->EditValue ?>"<?php echo $employees_payroll->employee->editAttributes() ?>>
</span>
<?php echo $employees_payroll->employee->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employees_payroll->pay_frequency->Visible) { // pay_frequency ?>
	<div id="r_pay_frequency" class="form-group row">
		<label id="elh_employees_payroll_pay_frequency" for="x_pay_frequency" class="<?php echo $employees_payroll_edit->LeftColumnClass ?>"><?php echo $employees_payroll->pay_frequency->caption() ?><?php echo ($employees_payroll->pay_frequency->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employees_payroll_edit->RightColumnClass ?>"><div<?php echo $employees_payroll->pay_frequency->cellAttributes() ?>>
<span id="el_employees_payroll_pay_frequency">
<input type="text" data-table="employees_payroll" data-field="x_pay_frequency" name="x_pay_frequency" id="x_pay_frequency" size="30" placeholder="<?php echo HtmlEncode($employees_payroll->pay_frequency->getPlaceHolder()) ?>" value="<?php echo $employees_payroll->pay_frequency->EditValue ?>"<?php echo $employees_payroll->pay_frequency->editAttributes() ?>>
</span>
<?php echo $employees_payroll->pay_frequency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employees_payroll->currency->Visible) { // currency ?>
	<div id="r_currency" class="form-group row">
		<label id="elh_employees_payroll_currency" for="x_currency" class="<?php echo $employees_payroll_edit->LeftColumnClass ?>"><?php echo $employees_payroll->currency->caption() ?><?php echo ($employees_payroll->currency->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employees_payroll_edit->RightColumnClass ?>"><div<?php echo $employees_payroll->currency->cellAttributes() ?>>
<span id="el_employees_payroll_currency">
<input type="text" data-table="employees_payroll" data-field="x_currency" name="x_currency" id="x_currency" size="30" placeholder="<?php echo HtmlEncode($employees_payroll->currency->getPlaceHolder()) ?>" value="<?php echo $employees_payroll->currency->EditValue ?>"<?php echo $employees_payroll->currency->editAttributes() ?>>
</span>
<?php echo $employees_payroll->currency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employees_payroll->deduction_exemptions->Visible) { // deduction_exemptions ?>
	<div id="r_deduction_exemptions" class="form-group row">
		<label id="elh_employees_payroll_deduction_exemptions" for="x_deduction_exemptions" class="<?php echo $employees_payroll_edit->LeftColumnClass ?>"><?php echo $employees_payroll->deduction_exemptions->caption() ?><?php echo ($employees_payroll->deduction_exemptions->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employees_payroll_edit->RightColumnClass ?>"><div<?php echo $employees_payroll->deduction_exemptions->cellAttributes() ?>>
<span id="el_employees_payroll_deduction_exemptions">
<input type="text" data-table="employees_payroll" data-field="x_deduction_exemptions" name="x_deduction_exemptions" id="x_deduction_exemptions" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($employees_payroll->deduction_exemptions->getPlaceHolder()) ?>" value="<?php echo $employees_payroll->deduction_exemptions->EditValue ?>"<?php echo $employees_payroll->deduction_exemptions->editAttributes() ?>>
</span>
<?php echo $employees_payroll->deduction_exemptions->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employees_payroll->deduction_allowed->Visible) { // deduction_allowed ?>
	<div id="r_deduction_allowed" class="form-group row">
		<label id="elh_employees_payroll_deduction_allowed" for="x_deduction_allowed" class="<?php echo $employees_payroll_edit->LeftColumnClass ?>"><?php echo $employees_payroll->deduction_allowed->caption() ?><?php echo ($employees_payroll->deduction_allowed->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employees_payroll_edit->RightColumnClass ?>"><div<?php echo $employees_payroll->deduction_allowed->cellAttributes() ?>>
<span id="el_employees_payroll_deduction_allowed">
<input type="text" data-table="employees_payroll" data-field="x_deduction_allowed" name="x_deduction_allowed" id="x_deduction_allowed" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($employees_payroll->deduction_allowed->getPlaceHolder()) ?>" value="<?php echo $employees_payroll->deduction_allowed->EditValue ?>"<?php echo $employees_payroll->deduction_allowed->editAttributes() ?>>
</span>
<?php echo $employees_payroll->deduction_allowed->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employees_payroll->deduction_group->Visible) { // deduction_group ?>
	<div id="r_deduction_group" class="form-group row">
		<label id="elh_employees_payroll_deduction_group" for="x_deduction_group" class="<?php echo $employees_payroll_edit->LeftColumnClass ?>"><?php echo $employees_payroll->deduction_group->caption() ?><?php echo ($employees_payroll->deduction_group->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employees_payroll_edit->RightColumnClass ?>"><div<?php echo $employees_payroll->deduction_group->cellAttributes() ?>>
<span id="el_employees_payroll_deduction_group">
<input type="text" data-table="employees_payroll" data-field="x_deduction_group" name="x_deduction_group" id="x_deduction_group" size="30" placeholder="<?php echo HtmlEncode($employees_payroll->deduction_group->getPlaceHolder()) ?>" value="<?php echo $employees_payroll->deduction_group->EditValue ?>"<?php echo $employees_payroll->deduction_group->editAttributes() ?>>
</span>
<?php echo $employees_payroll->deduction_group->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$employees_payroll_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $employees_payroll_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employees_payroll_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$employees_payroll_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employees_payroll_edit->terminate();
?>