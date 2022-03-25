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
$employee_skills_edit = new employee_skills_edit();

// Run the page
$employee_skills_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_skills_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var femployee_skillsedit = currentForm = new ew.Form("femployee_skillsedit", "edit");

// Validate form
femployee_skillsedit.validate = function() {
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
		<?php if ($employee_skills_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_skills->id->caption(), $employee_skills->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_skills_edit->skill_id->Required) { ?>
			elm = this.getElements("x" + infix + "_skill_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_skills->skill_id->caption(), $employee_skills->skill_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_skill_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_skills->skill_id->errorMessage()) ?>");
		<?php if ($employee_skills_edit->employee->Required) { ?>
			elm = this.getElements("x" + infix + "_employee");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_skills->employee->caption(), $employee_skills->employee->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_employee");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_skills->employee->errorMessage()) ?>");
		<?php if ($employee_skills_edit->details->Required) { ?>
			elm = this.getElements("x" + infix + "_details");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_skills->details->caption(), $employee_skills->details->RequiredErrorMessage)) ?>");
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
femployee_skillsedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_skillsedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_skills_edit->showPageHeader(); ?>
<?php
$employee_skills_edit->showMessage();
?>
<form name="femployee_skillsedit" id="femployee_skillsedit" class="<?php echo $employee_skills_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_skills_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_skills_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_skills">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$employee_skills_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($employee_skills->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_employee_skills_id" class="<?php echo $employee_skills_edit->LeftColumnClass ?>"><?php echo $employee_skills->id->caption() ?><?php echo ($employee_skills->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_skills_edit->RightColumnClass ?>"><div<?php echo $employee_skills->id->cellAttributes() ?>>
<span id="el_employee_skills_id">
<span<?php echo $employee_skills->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_skills->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_skills" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($employee_skills->id->CurrentValue) ?>">
<?php echo $employee_skills->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_skills->skill_id->Visible) { // skill_id ?>
	<div id="r_skill_id" class="form-group row">
		<label id="elh_employee_skills_skill_id" for="x_skill_id" class="<?php echo $employee_skills_edit->LeftColumnClass ?>"><?php echo $employee_skills->skill_id->caption() ?><?php echo ($employee_skills->skill_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_skills_edit->RightColumnClass ?>"><div<?php echo $employee_skills->skill_id->cellAttributes() ?>>
<span id="el_employee_skills_skill_id">
<input type="text" data-table="employee_skills" data-field="x_skill_id" name="x_skill_id" id="x_skill_id" size="30" placeholder="<?php echo HtmlEncode($employee_skills->skill_id->getPlaceHolder()) ?>" value="<?php echo $employee_skills->skill_id->EditValue ?>"<?php echo $employee_skills->skill_id->editAttributes() ?>>
</span>
<?php echo $employee_skills->skill_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_skills->employee->Visible) { // employee ?>
	<div id="r_employee" class="form-group row">
		<label id="elh_employee_skills_employee" for="x_employee" class="<?php echo $employee_skills_edit->LeftColumnClass ?>"><?php echo $employee_skills->employee->caption() ?><?php echo ($employee_skills->employee->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_skills_edit->RightColumnClass ?>"><div<?php echo $employee_skills->employee->cellAttributes() ?>>
<span id="el_employee_skills_employee">
<input type="text" data-table="employee_skills" data-field="x_employee" name="x_employee" id="x_employee" size="30" placeholder="<?php echo HtmlEncode($employee_skills->employee->getPlaceHolder()) ?>" value="<?php echo $employee_skills->employee->EditValue ?>"<?php echo $employee_skills->employee->editAttributes() ?>>
</span>
<?php echo $employee_skills->employee->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_skills->details->Visible) { // details ?>
	<div id="r_details" class="form-group row">
		<label id="elh_employee_skills_details" for="x_details" class="<?php echo $employee_skills_edit->LeftColumnClass ?>"><?php echo $employee_skills->details->caption() ?><?php echo ($employee_skills->details->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_skills_edit->RightColumnClass ?>"><div<?php echo $employee_skills->details->cellAttributes() ?>>
<span id="el_employee_skills_details">
<textarea data-table="employee_skills" data-field="x_details" name="x_details" id="x_details" cols="35" rows="4" placeholder="<?php echo HtmlEncode($employee_skills->details->getPlaceHolder()) ?>"<?php echo $employee_skills->details->editAttributes() ?>><?php echo $employee_skills->details->EditValue ?></textarea>
</span>
<?php echo $employee_skills->details->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$employee_skills_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $employee_skills_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_skills_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$employee_skills_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_skills_edit->terminate();
?>