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
$employee_certifications_add = new employee_certifications_add();

// Run the page
$employee_certifications_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_certifications_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var femployee_certificationsadd = currentForm = new ew.Form("femployee_certificationsadd", "add");

// Validate form
femployee_certificationsadd.validate = function() {
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
		<?php if ($employee_certifications_add->certification_id->Required) { ?>
			elm = this.getElements("x" + infix + "_certification_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_certifications->certification_id->caption(), $employee_certifications->certification_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_certification_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_certifications->certification_id->errorMessage()) ?>");
		<?php if ($employee_certifications_add->employee->Required) { ?>
			elm = this.getElements("x" + infix + "_employee");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_certifications->employee->caption(), $employee_certifications->employee->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_employee");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_certifications->employee->errorMessage()) ?>");
		<?php if ($employee_certifications_add->institute->Required) { ?>
			elm = this.getElements("x" + infix + "_institute");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_certifications->institute->caption(), $employee_certifications->institute->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_certifications_add->date_start->Required) { ?>
			elm = this.getElements("x" + infix + "_date_start");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_certifications->date_start->caption(), $employee_certifications->date_start->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_date_start");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_certifications->date_start->errorMessage()) ?>");
		<?php if ($employee_certifications_add->date_end->Required) { ?>
			elm = this.getElements("x" + infix + "_date_end");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_certifications->date_end->caption(), $employee_certifications->date_end->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_date_end");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_certifications->date_end->errorMessage()) ?>");

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
femployee_certificationsadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_certificationsadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_certifications_add->showPageHeader(); ?>
<?php
$employee_certifications_add->showMessage();
?>
<form name="femployee_certificationsadd" id="femployee_certificationsadd" class="<?php echo $employee_certifications_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_certifications_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_certifications_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_certifications">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$employee_certifications_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($employee_certifications->certification_id->Visible) { // certification_id ?>
	<div id="r_certification_id" class="form-group row">
		<label id="elh_employee_certifications_certification_id" for="x_certification_id" class="<?php echo $employee_certifications_add->LeftColumnClass ?>"><?php echo $employee_certifications->certification_id->caption() ?><?php echo ($employee_certifications->certification_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_certifications_add->RightColumnClass ?>"><div<?php echo $employee_certifications->certification_id->cellAttributes() ?>>
<span id="el_employee_certifications_certification_id">
<input type="text" data-table="employee_certifications" data-field="x_certification_id" name="x_certification_id" id="x_certification_id" size="30" placeholder="<?php echo HtmlEncode($employee_certifications->certification_id->getPlaceHolder()) ?>" value="<?php echo $employee_certifications->certification_id->EditValue ?>"<?php echo $employee_certifications->certification_id->editAttributes() ?>>
</span>
<?php echo $employee_certifications->certification_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_certifications->employee->Visible) { // employee ?>
	<div id="r_employee" class="form-group row">
		<label id="elh_employee_certifications_employee" for="x_employee" class="<?php echo $employee_certifications_add->LeftColumnClass ?>"><?php echo $employee_certifications->employee->caption() ?><?php echo ($employee_certifications->employee->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_certifications_add->RightColumnClass ?>"><div<?php echo $employee_certifications->employee->cellAttributes() ?>>
<span id="el_employee_certifications_employee">
<input type="text" data-table="employee_certifications" data-field="x_employee" name="x_employee" id="x_employee" size="30" placeholder="<?php echo HtmlEncode($employee_certifications->employee->getPlaceHolder()) ?>" value="<?php echo $employee_certifications->employee->EditValue ?>"<?php echo $employee_certifications->employee->editAttributes() ?>>
</span>
<?php echo $employee_certifications->employee->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_certifications->institute->Visible) { // institute ?>
	<div id="r_institute" class="form-group row">
		<label id="elh_employee_certifications_institute" for="x_institute" class="<?php echo $employee_certifications_add->LeftColumnClass ?>"><?php echo $employee_certifications->institute->caption() ?><?php echo ($employee_certifications->institute->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_certifications_add->RightColumnClass ?>"><div<?php echo $employee_certifications->institute->cellAttributes() ?>>
<span id="el_employee_certifications_institute">
<textarea data-table="employee_certifications" data-field="x_institute" name="x_institute" id="x_institute" cols="35" rows="4" placeholder="<?php echo HtmlEncode($employee_certifications->institute->getPlaceHolder()) ?>"<?php echo $employee_certifications->institute->editAttributes() ?>><?php echo $employee_certifications->institute->EditValue ?></textarea>
</span>
<?php echo $employee_certifications->institute->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_certifications->date_start->Visible) { // date_start ?>
	<div id="r_date_start" class="form-group row">
		<label id="elh_employee_certifications_date_start" for="x_date_start" class="<?php echo $employee_certifications_add->LeftColumnClass ?>"><?php echo $employee_certifications->date_start->caption() ?><?php echo ($employee_certifications->date_start->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_certifications_add->RightColumnClass ?>"><div<?php echo $employee_certifications->date_start->cellAttributes() ?>>
<span id="el_employee_certifications_date_start">
<input type="text" data-table="employee_certifications" data-field="x_date_start" name="x_date_start" id="x_date_start" placeholder="<?php echo HtmlEncode($employee_certifications->date_start->getPlaceHolder()) ?>" value="<?php echo $employee_certifications->date_start->EditValue ?>"<?php echo $employee_certifications->date_start->editAttributes() ?>>
<?php if (!$employee_certifications->date_start->ReadOnly && !$employee_certifications->date_start->Disabled && !isset($employee_certifications->date_start->EditAttrs["readonly"]) && !isset($employee_certifications->date_start->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_certificationsadd", "x_date_start", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee_certifications->date_start->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_certifications->date_end->Visible) { // date_end ?>
	<div id="r_date_end" class="form-group row">
		<label id="elh_employee_certifications_date_end" for="x_date_end" class="<?php echo $employee_certifications_add->LeftColumnClass ?>"><?php echo $employee_certifications->date_end->caption() ?><?php echo ($employee_certifications->date_end->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_certifications_add->RightColumnClass ?>"><div<?php echo $employee_certifications->date_end->cellAttributes() ?>>
<span id="el_employee_certifications_date_end">
<input type="text" data-table="employee_certifications" data-field="x_date_end" name="x_date_end" id="x_date_end" placeholder="<?php echo HtmlEncode($employee_certifications->date_end->getPlaceHolder()) ?>" value="<?php echo $employee_certifications->date_end->EditValue ?>"<?php echo $employee_certifications->date_end->editAttributes() ?>>
<?php if (!$employee_certifications->date_end->ReadOnly && !$employee_certifications->date_end->Disabled && !isset($employee_certifications->date_end->EditAttrs["readonly"]) && !isset($employee_certifications->date_end->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_certificationsadd", "x_date_end", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee_certifications->date_end->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$employee_certifications_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $employee_certifications_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_certifications_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$employee_certifications_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_certifications_add->terminate();
?>