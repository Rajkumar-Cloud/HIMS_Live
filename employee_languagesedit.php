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
$employee_languages_edit = new employee_languages_edit();

// Run the page
$employee_languages_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_languages_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var femployee_languagesedit = currentForm = new ew.Form("femployee_languagesedit", "edit");

// Validate form
femployee_languagesedit.validate = function() {
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
		<?php if ($employee_languages_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_languages->id->caption(), $employee_languages->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_languages_edit->language_id->Required) { ?>
			elm = this.getElements("x" + infix + "_language_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_languages->language_id->caption(), $employee_languages->language_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_language_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_languages->language_id->errorMessage()) ?>");
		<?php if ($employee_languages_edit->employee->Required) { ?>
			elm = this.getElements("x" + infix + "_employee");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_languages->employee->caption(), $employee_languages->employee->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_employee");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_languages->employee->errorMessage()) ?>");
		<?php if ($employee_languages_edit->reading->Required) { ?>
			elm = this.getElements("x" + infix + "_reading");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_languages->reading->caption(), $employee_languages->reading->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_languages_edit->speaking->Required) { ?>
			elm = this.getElements("x" + infix + "_speaking");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_languages->speaking->caption(), $employee_languages->speaking->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_languages_edit->writing->Required) { ?>
			elm = this.getElements("x" + infix + "_writing");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_languages->writing->caption(), $employee_languages->writing->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_languages_edit->understanding->Required) { ?>
			elm = this.getElements("x" + infix + "_understanding");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_languages->understanding->caption(), $employee_languages->understanding->RequiredErrorMessage)) ?>");
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
femployee_languagesedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_languagesedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_languagesedit.lists["x_reading"] = <?php echo $employee_languages_edit->reading->Lookup->toClientList() ?>;
femployee_languagesedit.lists["x_reading"].options = <?php echo JsonEncode($employee_languages_edit->reading->options(FALSE, TRUE)) ?>;
femployee_languagesedit.lists["x_speaking"] = <?php echo $employee_languages_edit->speaking->Lookup->toClientList() ?>;
femployee_languagesedit.lists["x_speaking"].options = <?php echo JsonEncode($employee_languages_edit->speaking->options(FALSE, TRUE)) ?>;
femployee_languagesedit.lists["x_writing"] = <?php echo $employee_languages_edit->writing->Lookup->toClientList() ?>;
femployee_languagesedit.lists["x_writing"].options = <?php echo JsonEncode($employee_languages_edit->writing->options(FALSE, TRUE)) ?>;
femployee_languagesedit.lists["x_understanding"] = <?php echo $employee_languages_edit->understanding->Lookup->toClientList() ?>;
femployee_languagesedit.lists["x_understanding"].options = <?php echo JsonEncode($employee_languages_edit->understanding->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_languages_edit->showPageHeader(); ?>
<?php
$employee_languages_edit->showMessage();
?>
<form name="femployee_languagesedit" id="femployee_languagesedit" class="<?php echo $employee_languages_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_languages_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_languages_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_languages">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$employee_languages_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($employee_languages->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_employee_languages_id" class="<?php echo $employee_languages_edit->LeftColumnClass ?>"><?php echo $employee_languages->id->caption() ?><?php echo ($employee_languages->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_languages_edit->RightColumnClass ?>"><div<?php echo $employee_languages->id->cellAttributes() ?>>
<span id="el_employee_languages_id">
<span<?php echo $employee_languages->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_languages->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_languages" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($employee_languages->id->CurrentValue) ?>">
<?php echo $employee_languages->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_languages->language_id->Visible) { // language_id ?>
	<div id="r_language_id" class="form-group row">
		<label id="elh_employee_languages_language_id" for="x_language_id" class="<?php echo $employee_languages_edit->LeftColumnClass ?>"><?php echo $employee_languages->language_id->caption() ?><?php echo ($employee_languages->language_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_languages_edit->RightColumnClass ?>"><div<?php echo $employee_languages->language_id->cellAttributes() ?>>
<span id="el_employee_languages_language_id">
<input type="text" data-table="employee_languages" data-field="x_language_id" name="x_language_id" id="x_language_id" size="30" placeholder="<?php echo HtmlEncode($employee_languages->language_id->getPlaceHolder()) ?>" value="<?php echo $employee_languages->language_id->EditValue ?>"<?php echo $employee_languages->language_id->editAttributes() ?>>
</span>
<?php echo $employee_languages->language_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_languages->employee->Visible) { // employee ?>
	<div id="r_employee" class="form-group row">
		<label id="elh_employee_languages_employee" for="x_employee" class="<?php echo $employee_languages_edit->LeftColumnClass ?>"><?php echo $employee_languages->employee->caption() ?><?php echo ($employee_languages->employee->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_languages_edit->RightColumnClass ?>"><div<?php echo $employee_languages->employee->cellAttributes() ?>>
<span id="el_employee_languages_employee">
<input type="text" data-table="employee_languages" data-field="x_employee" name="x_employee" id="x_employee" size="30" placeholder="<?php echo HtmlEncode($employee_languages->employee->getPlaceHolder()) ?>" value="<?php echo $employee_languages->employee->EditValue ?>"<?php echo $employee_languages->employee->editAttributes() ?>>
</span>
<?php echo $employee_languages->employee->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_languages->reading->Visible) { // reading ?>
	<div id="r_reading" class="form-group row">
		<label id="elh_employee_languages_reading" class="<?php echo $employee_languages_edit->LeftColumnClass ?>"><?php echo $employee_languages->reading->caption() ?><?php echo ($employee_languages->reading->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_languages_edit->RightColumnClass ?>"><div<?php echo $employee_languages->reading->cellAttributes() ?>>
<span id="el_employee_languages_reading">
<div id="tp_x_reading" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_languages" data-field="x_reading" data-value-separator="<?php echo $employee_languages->reading->displayValueSeparatorAttribute() ?>" name="x_reading" id="x_reading" value="{value}"<?php echo $employee_languages->reading->editAttributes() ?>></div>
<div id="dsl_x_reading" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_languages->reading->radioButtonListHtml(FALSE, "x_reading") ?>
</div></div>
</span>
<?php echo $employee_languages->reading->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_languages->speaking->Visible) { // speaking ?>
	<div id="r_speaking" class="form-group row">
		<label id="elh_employee_languages_speaking" class="<?php echo $employee_languages_edit->LeftColumnClass ?>"><?php echo $employee_languages->speaking->caption() ?><?php echo ($employee_languages->speaking->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_languages_edit->RightColumnClass ?>"><div<?php echo $employee_languages->speaking->cellAttributes() ?>>
<span id="el_employee_languages_speaking">
<div id="tp_x_speaking" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_languages" data-field="x_speaking" data-value-separator="<?php echo $employee_languages->speaking->displayValueSeparatorAttribute() ?>" name="x_speaking" id="x_speaking" value="{value}"<?php echo $employee_languages->speaking->editAttributes() ?>></div>
<div id="dsl_x_speaking" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_languages->speaking->radioButtonListHtml(FALSE, "x_speaking") ?>
</div></div>
</span>
<?php echo $employee_languages->speaking->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_languages->writing->Visible) { // writing ?>
	<div id="r_writing" class="form-group row">
		<label id="elh_employee_languages_writing" class="<?php echo $employee_languages_edit->LeftColumnClass ?>"><?php echo $employee_languages->writing->caption() ?><?php echo ($employee_languages->writing->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_languages_edit->RightColumnClass ?>"><div<?php echo $employee_languages->writing->cellAttributes() ?>>
<span id="el_employee_languages_writing">
<div id="tp_x_writing" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_languages" data-field="x_writing" data-value-separator="<?php echo $employee_languages->writing->displayValueSeparatorAttribute() ?>" name="x_writing" id="x_writing" value="{value}"<?php echo $employee_languages->writing->editAttributes() ?>></div>
<div id="dsl_x_writing" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_languages->writing->radioButtonListHtml(FALSE, "x_writing") ?>
</div></div>
</span>
<?php echo $employee_languages->writing->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_languages->understanding->Visible) { // understanding ?>
	<div id="r_understanding" class="form-group row">
		<label id="elh_employee_languages_understanding" class="<?php echo $employee_languages_edit->LeftColumnClass ?>"><?php echo $employee_languages->understanding->caption() ?><?php echo ($employee_languages->understanding->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_languages_edit->RightColumnClass ?>"><div<?php echo $employee_languages->understanding->cellAttributes() ?>>
<span id="el_employee_languages_understanding">
<div id="tp_x_understanding" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_languages" data-field="x_understanding" data-value-separator="<?php echo $employee_languages->understanding->displayValueSeparatorAttribute() ?>" name="x_understanding" id="x_understanding" value="{value}"<?php echo $employee_languages->understanding->editAttributes() ?>></div>
<div id="dsl_x_understanding" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_languages->understanding->radioButtonListHtml(FALSE, "x_understanding") ?>
</div></div>
</span>
<?php echo $employee_languages->understanding->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$employee_languages_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $employee_languages_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_languages_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$employee_languages_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_languages_edit->terminate();
?>