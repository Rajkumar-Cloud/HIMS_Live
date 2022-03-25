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
$employee_attendance_add = new employee_attendance_add();

// Run the page
$employee_attendance_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_attendance_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var femployee_attendanceadd = currentForm = new ew.Form("femployee_attendanceadd", "add");

// Validate form
femployee_attendanceadd.validate = function() {
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
		<?php if ($employee_attendance_add->employee->Required) { ?>
			elm = this.getElements("x" + infix + "_employee");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_attendance->employee->caption(), $employee_attendance->employee->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_employee");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_attendance->employee->errorMessage()) ?>");
		<?php if ($employee_attendance_add->in_time->Required) { ?>
			elm = this.getElements("x" + infix + "_in_time");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_attendance->in_time->caption(), $employee_attendance->in_time->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_in_time");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_attendance->in_time->errorMessage()) ?>");
		<?php if ($employee_attendance_add->out_time->Required) { ?>
			elm = this.getElements("x" + infix + "_out_time");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_attendance->out_time->caption(), $employee_attendance->out_time->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_out_time");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_attendance->out_time->errorMessage()) ?>");
		<?php if ($employee_attendance_add->note->Required) { ?>
			elm = this.getElements("x" + infix + "_note");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_attendance->note->caption(), $employee_attendance->note->RequiredErrorMessage)) ?>");
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
femployee_attendanceadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_attendanceadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_attendance_add->showPageHeader(); ?>
<?php
$employee_attendance_add->showMessage();
?>
<form name="femployee_attendanceadd" id="femployee_attendanceadd" class="<?php echo $employee_attendance_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_attendance_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_attendance_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_attendance">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$employee_attendance_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($employee_attendance->employee->Visible) { // employee ?>
	<div id="r_employee" class="form-group row">
		<label id="elh_employee_attendance_employee" for="x_employee" class="<?php echo $employee_attendance_add->LeftColumnClass ?>"><?php echo $employee_attendance->employee->caption() ?><?php echo ($employee_attendance->employee->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_attendance_add->RightColumnClass ?>"><div<?php echo $employee_attendance->employee->cellAttributes() ?>>
<span id="el_employee_attendance_employee">
<input type="text" data-table="employee_attendance" data-field="x_employee" name="x_employee" id="x_employee" size="30" placeholder="<?php echo HtmlEncode($employee_attendance->employee->getPlaceHolder()) ?>" value="<?php echo $employee_attendance->employee->EditValue ?>"<?php echo $employee_attendance->employee->editAttributes() ?>>
</span>
<?php echo $employee_attendance->employee->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_attendance->in_time->Visible) { // in_time ?>
	<div id="r_in_time" class="form-group row">
		<label id="elh_employee_attendance_in_time" for="x_in_time" class="<?php echo $employee_attendance_add->LeftColumnClass ?>"><?php echo $employee_attendance->in_time->caption() ?><?php echo ($employee_attendance->in_time->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_attendance_add->RightColumnClass ?>"><div<?php echo $employee_attendance->in_time->cellAttributes() ?>>
<span id="el_employee_attendance_in_time">
<input type="text" data-table="employee_attendance" data-field="x_in_time" name="x_in_time" id="x_in_time" placeholder="<?php echo HtmlEncode($employee_attendance->in_time->getPlaceHolder()) ?>" value="<?php echo $employee_attendance->in_time->EditValue ?>"<?php echo $employee_attendance->in_time->editAttributes() ?>>
<?php if (!$employee_attendance->in_time->ReadOnly && !$employee_attendance->in_time->Disabled && !isset($employee_attendance->in_time->EditAttrs["readonly"]) && !isset($employee_attendance->in_time->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_attendanceadd", "x_in_time", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee_attendance->in_time->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_attendance->out_time->Visible) { // out_time ?>
	<div id="r_out_time" class="form-group row">
		<label id="elh_employee_attendance_out_time" for="x_out_time" class="<?php echo $employee_attendance_add->LeftColumnClass ?>"><?php echo $employee_attendance->out_time->caption() ?><?php echo ($employee_attendance->out_time->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_attendance_add->RightColumnClass ?>"><div<?php echo $employee_attendance->out_time->cellAttributes() ?>>
<span id="el_employee_attendance_out_time">
<input type="text" data-table="employee_attendance" data-field="x_out_time" name="x_out_time" id="x_out_time" placeholder="<?php echo HtmlEncode($employee_attendance->out_time->getPlaceHolder()) ?>" value="<?php echo $employee_attendance->out_time->EditValue ?>"<?php echo $employee_attendance->out_time->editAttributes() ?>>
<?php if (!$employee_attendance->out_time->ReadOnly && !$employee_attendance->out_time->Disabled && !isset($employee_attendance->out_time->EditAttrs["readonly"]) && !isset($employee_attendance->out_time->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_attendanceadd", "x_out_time", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee_attendance->out_time->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_attendance->note->Visible) { // note ?>
	<div id="r_note" class="form-group row">
		<label id="elh_employee_attendance_note" for="x_note" class="<?php echo $employee_attendance_add->LeftColumnClass ?>"><?php echo $employee_attendance->note->caption() ?><?php echo ($employee_attendance->note->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_attendance_add->RightColumnClass ?>"><div<?php echo $employee_attendance->note->cellAttributes() ?>>
<span id="el_employee_attendance_note">
<textarea data-table="employee_attendance" data-field="x_note" name="x_note" id="x_note" cols="35" rows="4" placeholder="<?php echo HtmlEncode($employee_attendance->note->getPlaceHolder()) ?>"<?php echo $employee_attendance->note->editAttributes() ?>><?php echo $employee_attendance->note->EditValue ?></textarea>
</span>
<?php echo $employee_attendance->note->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$employee_attendance_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $employee_attendance_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_attendance_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$employee_attendance_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_attendance_add->terminate();
?>