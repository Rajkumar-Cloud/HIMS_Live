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
$employee_emergency_contacts_edit = new employee_emergency_contacts_edit();

// Run the page
$employee_emergency_contacts_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_emergency_contacts_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var femployee_emergency_contactsedit = currentForm = new ew.Form("femployee_emergency_contactsedit", "edit");

// Validate form
femployee_emergency_contactsedit.validate = function() {
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
		<?php if ($employee_emergency_contacts_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_emergency_contacts->id->caption(), $employee_emergency_contacts->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_emergency_contacts_edit->employee->Required) { ?>
			elm = this.getElements("x" + infix + "_employee");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_emergency_contacts->employee->caption(), $employee_emergency_contacts->employee->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_employee");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_emergency_contacts->employee->errorMessage()) ?>");
		<?php if ($employee_emergency_contacts_edit->name->Required) { ?>
			elm = this.getElements("x" + infix + "_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_emergency_contacts->name->caption(), $employee_emergency_contacts->name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_emergency_contacts_edit->relationship->Required) { ?>
			elm = this.getElements("x" + infix + "_relationship");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_emergency_contacts->relationship->caption(), $employee_emergency_contacts->relationship->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_emergency_contacts_edit->home_phone->Required) { ?>
			elm = this.getElements("x" + infix + "_home_phone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_emergency_contacts->home_phone->caption(), $employee_emergency_contacts->home_phone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_emergency_contacts_edit->work_phone->Required) { ?>
			elm = this.getElements("x" + infix + "_work_phone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_emergency_contacts->work_phone->caption(), $employee_emergency_contacts->work_phone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_emergency_contacts_edit->mobile_phone->Required) { ?>
			elm = this.getElements("x" + infix + "_mobile_phone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_emergency_contacts->mobile_phone->caption(), $employee_emergency_contacts->mobile_phone->RequiredErrorMessage)) ?>");
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
femployee_emergency_contactsedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_emergency_contactsedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_emergency_contacts_edit->showPageHeader(); ?>
<?php
$employee_emergency_contacts_edit->showMessage();
?>
<form name="femployee_emergency_contactsedit" id="femployee_emergency_contactsedit" class="<?php echo $employee_emergency_contacts_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_emergency_contacts_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_emergency_contacts_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_emergency_contacts">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$employee_emergency_contacts_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($employee_emergency_contacts->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_employee_emergency_contacts_id" class="<?php echo $employee_emergency_contacts_edit->LeftColumnClass ?>"><?php echo $employee_emergency_contacts->id->caption() ?><?php echo ($employee_emergency_contacts->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_emergency_contacts_edit->RightColumnClass ?>"><div<?php echo $employee_emergency_contacts->id->cellAttributes() ?>>
<span id="el_employee_emergency_contacts_id">
<span<?php echo $employee_emergency_contacts->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_emergency_contacts->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_emergency_contacts" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($employee_emergency_contacts->id->CurrentValue) ?>">
<?php echo $employee_emergency_contacts->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_emergency_contacts->employee->Visible) { // employee ?>
	<div id="r_employee" class="form-group row">
		<label id="elh_employee_emergency_contacts_employee" for="x_employee" class="<?php echo $employee_emergency_contacts_edit->LeftColumnClass ?>"><?php echo $employee_emergency_contacts->employee->caption() ?><?php echo ($employee_emergency_contacts->employee->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_emergency_contacts_edit->RightColumnClass ?>"><div<?php echo $employee_emergency_contacts->employee->cellAttributes() ?>>
<span id="el_employee_emergency_contacts_employee">
<input type="text" data-table="employee_emergency_contacts" data-field="x_employee" name="x_employee" id="x_employee" size="30" placeholder="<?php echo HtmlEncode($employee_emergency_contacts->employee->getPlaceHolder()) ?>" value="<?php echo $employee_emergency_contacts->employee->EditValue ?>"<?php echo $employee_emergency_contacts->employee->editAttributes() ?>>
</span>
<?php echo $employee_emergency_contacts->employee->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_emergency_contacts->name->Visible) { // name ?>
	<div id="r_name" class="form-group row">
		<label id="elh_employee_emergency_contacts_name" for="x_name" class="<?php echo $employee_emergency_contacts_edit->LeftColumnClass ?>"><?php echo $employee_emergency_contacts->name->caption() ?><?php echo ($employee_emergency_contacts->name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_emergency_contacts_edit->RightColumnClass ?>"><div<?php echo $employee_emergency_contacts->name->cellAttributes() ?>>
<span id="el_employee_emergency_contacts_name">
<input type="text" data-table="employee_emergency_contacts" data-field="x_name" name="x_name" id="x_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_emergency_contacts->name->getPlaceHolder()) ?>" value="<?php echo $employee_emergency_contacts->name->EditValue ?>"<?php echo $employee_emergency_contacts->name->editAttributes() ?>>
</span>
<?php echo $employee_emergency_contacts->name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_emergency_contacts->relationship->Visible) { // relationship ?>
	<div id="r_relationship" class="form-group row">
		<label id="elh_employee_emergency_contacts_relationship" for="x_relationship" class="<?php echo $employee_emergency_contacts_edit->LeftColumnClass ?>"><?php echo $employee_emergency_contacts->relationship->caption() ?><?php echo ($employee_emergency_contacts->relationship->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_emergency_contacts_edit->RightColumnClass ?>"><div<?php echo $employee_emergency_contacts->relationship->cellAttributes() ?>>
<span id="el_employee_emergency_contacts_relationship">
<input type="text" data-table="employee_emergency_contacts" data-field="x_relationship" name="x_relationship" id="x_relationship" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_emergency_contacts->relationship->getPlaceHolder()) ?>" value="<?php echo $employee_emergency_contacts->relationship->EditValue ?>"<?php echo $employee_emergency_contacts->relationship->editAttributes() ?>>
</span>
<?php echo $employee_emergency_contacts->relationship->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_emergency_contacts->home_phone->Visible) { // home_phone ?>
	<div id="r_home_phone" class="form-group row">
		<label id="elh_employee_emergency_contacts_home_phone" for="x_home_phone" class="<?php echo $employee_emergency_contacts_edit->LeftColumnClass ?>"><?php echo $employee_emergency_contacts->home_phone->caption() ?><?php echo ($employee_emergency_contacts->home_phone->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_emergency_contacts_edit->RightColumnClass ?>"><div<?php echo $employee_emergency_contacts->home_phone->cellAttributes() ?>>
<span id="el_employee_emergency_contacts_home_phone">
<input type="text" data-table="employee_emergency_contacts" data-field="x_home_phone" name="x_home_phone" id="x_home_phone" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($employee_emergency_contacts->home_phone->getPlaceHolder()) ?>" value="<?php echo $employee_emergency_contacts->home_phone->EditValue ?>"<?php echo $employee_emergency_contacts->home_phone->editAttributes() ?>>
</span>
<?php echo $employee_emergency_contacts->home_phone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_emergency_contacts->work_phone->Visible) { // work_phone ?>
	<div id="r_work_phone" class="form-group row">
		<label id="elh_employee_emergency_contacts_work_phone" for="x_work_phone" class="<?php echo $employee_emergency_contacts_edit->LeftColumnClass ?>"><?php echo $employee_emergency_contacts->work_phone->caption() ?><?php echo ($employee_emergency_contacts->work_phone->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_emergency_contacts_edit->RightColumnClass ?>"><div<?php echo $employee_emergency_contacts->work_phone->cellAttributes() ?>>
<span id="el_employee_emergency_contacts_work_phone">
<input type="text" data-table="employee_emergency_contacts" data-field="x_work_phone" name="x_work_phone" id="x_work_phone" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($employee_emergency_contacts->work_phone->getPlaceHolder()) ?>" value="<?php echo $employee_emergency_contacts->work_phone->EditValue ?>"<?php echo $employee_emergency_contacts->work_phone->editAttributes() ?>>
</span>
<?php echo $employee_emergency_contacts->work_phone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_emergency_contacts->mobile_phone->Visible) { // mobile_phone ?>
	<div id="r_mobile_phone" class="form-group row">
		<label id="elh_employee_emergency_contacts_mobile_phone" for="x_mobile_phone" class="<?php echo $employee_emergency_contacts_edit->LeftColumnClass ?>"><?php echo $employee_emergency_contacts->mobile_phone->caption() ?><?php echo ($employee_emergency_contacts->mobile_phone->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_emergency_contacts_edit->RightColumnClass ?>"><div<?php echo $employee_emergency_contacts->mobile_phone->cellAttributes() ?>>
<span id="el_employee_emergency_contacts_mobile_phone">
<input type="text" data-table="employee_emergency_contacts" data-field="x_mobile_phone" name="x_mobile_phone" id="x_mobile_phone" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($employee_emergency_contacts->mobile_phone->getPlaceHolder()) ?>" value="<?php echo $employee_emergency_contacts->mobile_phone->EditValue ?>"<?php echo $employee_emergency_contacts->mobile_phone->editAttributes() ?>>
</span>
<?php echo $employee_emergency_contacts->mobile_phone->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$employee_emergency_contacts_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $employee_emergency_contacts_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_emergency_contacts_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$employee_emergency_contacts_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_emergency_contacts_edit->terminate();
?>