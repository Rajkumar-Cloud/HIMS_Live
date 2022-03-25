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
$employee_timesheets_add = new employee_timesheets_add();

// Run the page
$employee_timesheets_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_timesheets_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var femployee_timesheetsadd = currentForm = new ew.Form("femployee_timesheetsadd", "add");

// Validate form
femployee_timesheetsadd.validate = function() {
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
		<?php if ($employee_timesheets_add->employee->Required) { ?>
			elm = this.getElements("x" + infix + "_employee");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_timesheets->employee->caption(), $employee_timesheets->employee->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_employee");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_timesheets->employee->errorMessage()) ?>");
		<?php if ($employee_timesheets_add->date_start->Required) { ?>
			elm = this.getElements("x" + infix + "_date_start");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_timesheets->date_start->caption(), $employee_timesheets->date_start->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_date_start");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_timesheets->date_start->errorMessage()) ?>");
		<?php if ($employee_timesheets_add->date_end->Required) { ?>
			elm = this.getElements("x" + infix + "_date_end");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_timesheets->date_end->caption(), $employee_timesheets->date_end->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_date_end");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_timesheets->date_end->errorMessage()) ?>");
		<?php if ($employee_timesheets_add->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_timesheets->status->caption(), $employee_timesheets->status->RequiredErrorMessage)) ?>");
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
femployee_timesheetsadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_timesheetsadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_timesheetsadd.lists["x_status"] = <?php echo $employee_timesheets_add->status->Lookup->toClientList() ?>;
femployee_timesheetsadd.lists["x_status"].options = <?php echo JsonEncode($employee_timesheets_add->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_timesheets_add->showPageHeader(); ?>
<?php
$employee_timesheets_add->showMessage();
?>
<form name="femployee_timesheetsadd" id="femployee_timesheetsadd" class="<?php echo $employee_timesheets_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_timesheets_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_timesheets_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_timesheets">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$employee_timesheets_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($employee_timesheets->employee->Visible) { // employee ?>
	<div id="r_employee" class="form-group row">
		<label id="elh_employee_timesheets_employee" for="x_employee" class="<?php echo $employee_timesheets_add->LeftColumnClass ?>"><?php echo $employee_timesheets->employee->caption() ?><?php echo ($employee_timesheets->employee->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_timesheets_add->RightColumnClass ?>"><div<?php echo $employee_timesheets->employee->cellAttributes() ?>>
<span id="el_employee_timesheets_employee">
<input type="text" data-table="employee_timesheets" data-field="x_employee" name="x_employee" id="x_employee" size="30" placeholder="<?php echo HtmlEncode($employee_timesheets->employee->getPlaceHolder()) ?>" value="<?php echo $employee_timesheets->employee->EditValue ?>"<?php echo $employee_timesheets->employee->editAttributes() ?>>
</span>
<?php echo $employee_timesheets->employee->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_timesheets->date_start->Visible) { // date_start ?>
	<div id="r_date_start" class="form-group row">
		<label id="elh_employee_timesheets_date_start" for="x_date_start" class="<?php echo $employee_timesheets_add->LeftColumnClass ?>"><?php echo $employee_timesheets->date_start->caption() ?><?php echo ($employee_timesheets->date_start->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_timesheets_add->RightColumnClass ?>"><div<?php echo $employee_timesheets->date_start->cellAttributes() ?>>
<span id="el_employee_timesheets_date_start">
<input type="text" data-table="employee_timesheets" data-field="x_date_start" name="x_date_start" id="x_date_start" placeholder="<?php echo HtmlEncode($employee_timesheets->date_start->getPlaceHolder()) ?>" value="<?php echo $employee_timesheets->date_start->EditValue ?>"<?php echo $employee_timesheets->date_start->editAttributes() ?>>
<?php if (!$employee_timesheets->date_start->ReadOnly && !$employee_timesheets->date_start->Disabled && !isset($employee_timesheets->date_start->EditAttrs["readonly"]) && !isset($employee_timesheets->date_start->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_timesheetsadd", "x_date_start", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee_timesheets->date_start->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_timesheets->date_end->Visible) { // date_end ?>
	<div id="r_date_end" class="form-group row">
		<label id="elh_employee_timesheets_date_end" for="x_date_end" class="<?php echo $employee_timesheets_add->LeftColumnClass ?>"><?php echo $employee_timesheets->date_end->caption() ?><?php echo ($employee_timesheets->date_end->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_timesheets_add->RightColumnClass ?>"><div<?php echo $employee_timesheets->date_end->cellAttributes() ?>>
<span id="el_employee_timesheets_date_end">
<input type="text" data-table="employee_timesheets" data-field="x_date_end" name="x_date_end" id="x_date_end" placeholder="<?php echo HtmlEncode($employee_timesheets->date_end->getPlaceHolder()) ?>" value="<?php echo $employee_timesheets->date_end->EditValue ?>"<?php echo $employee_timesheets->date_end->editAttributes() ?>>
<?php if (!$employee_timesheets->date_end->ReadOnly && !$employee_timesheets->date_end->Disabled && !isset($employee_timesheets->date_end->EditAttrs["readonly"]) && !isset($employee_timesheets->date_end->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_timesheetsadd", "x_date_end", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee_timesheets->date_end->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_timesheets->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_employee_timesheets_status" class="<?php echo $employee_timesheets_add->LeftColumnClass ?>"><?php echo $employee_timesheets->status->caption() ?><?php echo ($employee_timesheets->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_timesheets_add->RightColumnClass ?>"><div<?php echo $employee_timesheets->status->cellAttributes() ?>>
<span id="el_employee_timesheets_status">
<div id="tp_x_status" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_timesheets" data-field="x_status" data-value-separator="<?php echo $employee_timesheets->status->displayValueSeparatorAttribute() ?>" name="x_status" id="x_status" value="{value}"<?php echo $employee_timesheets->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_timesheets->status->radioButtonListHtml(FALSE, "x_status") ?>
</div></div>
</span>
<?php echo $employee_timesheets->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$employee_timesheets_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $employee_timesheets_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_timesheets_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$employee_timesheets_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_timesheets_add->terminate();
?>