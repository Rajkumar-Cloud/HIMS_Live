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
$employee_immigrationdocuments_edit = new employee_immigrationdocuments_edit();

// Run the page
$employee_immigrationdocuments_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_immigrationdocuments_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var femployee_immigrationdocumentsedit = currentForm = new ew.Form("femployee_immigrationdocumentsedit", "edit");

// Validate form
femployee_immigrationdocumentsedit.validate = function() {
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
		<?php if ($employee_immigrationdocuments_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_immigrationdocuments->id->caption(), $employee_immigrationdocuments->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_immigrationdocuments_edit->name->Required) { ?>
			elm = this.getElements("x" + infix + "_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_immigrationdocuments->name->caption(), $employee_immigrationdocuments->name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_immigrationdocuments_edit->details->Required) { ?>
			elm = this.getElements("x" + infix + "_details");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_immigrationdocuments->details->caption(), $employee_immigrationdocuments->details->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_immigrationdocuments_edit->required->Required) { ?>
			elm = this.getElements("x" + infix + "_required");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_immigrationdocuments->required->caption(), $employee_immigrationdocuments->required->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_immigrationdocuments_edit->alert_on_missing->Required) { ?>
			elm = this.getElements("x" + infix + "_alert_on_missing");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_immigrationdocuments->alert_on_missing->caption(), $employee_immigrationdocuments->alert_on_missing->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_immigrationdocuments_edit->alert_before_expiry->Required) { ?>
			elm = this.getElements("x" + infix + "_alert_before_expiry");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_immigrationdocuments->alert_before_expiry->caption(), $employee_immigrationdocuments->alert_before_expiry->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_immigrationdocuments_edit->alert_before_day_number->Required) { ?>
			elm = this.getElements("x" + infix + "_alert_before_day_number");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_immigrationdocuments->alert_before_day_number->caption(), $employee_immigrationdocuments->alert_before_day_number->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_alert_before_day_number");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_immigrationdocuments->alert_before_day_number->errorMessage()) ?>");
		<?php if ($employee_immigrationdocuments_edit->created->Required) { ?>
			elm = this.getElements("x" + infix + "_created");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_immigrationdocuments->created->caption(), $employee_immigrationdocuments->created->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_created");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_immigrationdocuments->created->errorMessage()) ?>");
		<?php if ($employee_immigrationdocuments_edit->updated->Required) { ?>
			elm = this.getElements("x" + infix + "_updated");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_immigrationdocuments->updated->caption(), $employee_immigrationdocuments->updated->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_updated");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_immigrationdocuments->updated->errorMessage()) ?>");

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
femployee_immigrationdocumentsedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_immigrationdocumentsedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_immigrationdocumentsedit.lists["x_required"] = <?php echo $employee_immigrationdocuments_edit->required->Lookup->toClientList() ?>;
femployee_immigrationdocumentsedit.lists["x_required"].options = <?php echo JsonEncode($employee_immigrationdocuments_edit->required->options(FALSE, TRUE)) ?>;
femployee_immigrationdocumentsedit.lists["x_alert_on_missing"] = <?php echo $employee_immigrationdocuments_edit->alert_on_missing->Lookup->toClientList() ?>;
femployee_immigrationdocumentsedit.lists["x_alert_on_missing"].options = <?php echo JsonEncode($employee_immigrationdocuments_edit->alert_on_missing->options(FALSE, TRUE)) ?>;
femployee_immigrationdocumentsedit.lists["x_alert_before_expiry"] = <?php echo $employee_immigrationdocuments_edit->alert_before_expiry->Lookup->toClientList() ?>;
femployee_immigrationdocumentsedit.lists["x_alert_before_expiry"].options = <?php echo JsonEncode($employee_immigrationdocuments_edit->alert_before_expiry->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_immigrationdocuments_edit->showPageHeader(); ?>
<?php
$employee_immigrationdocuments_edit->showMessage();
?>
<form name="femployee_immigrationdocumentsedit" id="femployee_immigrationdocumentsedit" class="<?php echo $employee_immigrationdocuments_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_immigrationdocuments_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_immigrationdocuments_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_immigrationdocuments">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$employee_immigrationdocuments_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($employee_immigrationdocuments->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_employee_immigrationdocuments_id" class="<?php echo $employee_immigrationdocuments_edit->LeftColumnClass ?>"><?php echo $employee_immigrationdocuments->id->caption() ?><?php echo ($employee_immigrationdocuments->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_immigrationdocuments_edit->RightColumnClass ?>"><div<?php echo $employee_immigrationdocuments->id->cellAttributes() ?>>
<span id="el_employee_immigrationdocuments_id">
<span<?php echo $employee_immigrationdocuments->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_immigrationdocuments->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_immigrationdocuments" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($employee_immigrationdocuments->id->CurrentValue) ?>">
<?php echo $employee_immigrationdocuments->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_immigrationdocuments->name->Visible) { // name ?>
	<div id="r_name" class="form-group row">
		<label id="elh_employee_immigrationdocuments_name" for="x_name" class="<?php echo $employee_immigrationdocuments_edit->LeftColumnClass ?>"><?php echo $employee_immigrationdocuments->name->caption() ?><?php echo ($employee_immigrationdocuments->name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_immigrationdocuments_edit->RightColumnClass ?>"><div<?php echo $employee_immigrationdocuments->name->cellAttributes() ?>>
<span id="el_employee_immigrationdocuments_name">
<input type="text" data-table="employee_immigrationdocuments" data-field="x_name" name="x_name" id="x_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_immigrationdocuments->name->getPlaceHolder()) ?>" value="<?php echo $employee_immigrationdocuments->name->EditValue ?>"<?php echo $employee_immigrationdocuments->name->editAttributes() ?>>
</span>
<?php echo $employee_immigrationdocuments->name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_immigrationdocuments->details->Visible) { // details ?>
	<div id="r_details" class="form-group row">
		<label id="elh_employee_immigrationdocuments_details" for="x_details" class="<?php echo $employee_immigrationdocuments_edit->LeftColumnClass ?>"><?php echo $employee_immigrationdocuments->details->caption() ?><?php echo ($employee_immigrationdocuments->details->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_immigrationdocuments_edit->RightColumnClass ?>"><div<?php echo $employee_immigrationdocuments->details->cellAttributes() ?>>
<span id="el_employee_immigrationdocuments_details">
<textarea data-table="employee_immigrationdocuments" data-field="x_details" name="x_details" id="x_details" cols="35" rows="4" placeholder="<?php echo HtmlEncode($employee_immigrationdocuments->details->getPlaceHolder()) ?>"<?php echo $employee_immigrationdocuments->details->editAttributes() ?>><?php echo $employee_immigrationdocuments->details->EditValue ?></textarea>
</span>
<?php echo $employee_immigrationdocuments->details->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_immigrationdocuments->required->Visible) { // required ?>
	<div id="r_required" class="form-group row">
		<label id="elh_employee_immigrationdocuments_required" class="<?php echo $employee_immigrationdocuments_edit->LeftColumnClass ?>"><?php echo $employee_immigrationdocuments->required->caption() ?><?php echo ($employee_immigrationdocuments->required->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_immigrationdocuments_edit->RightColumnClass ?>"><div<?php echo $employee_immigrationdocuments->required->cellAttributes() ?>>
<span id="el_employee_immigrationdocuments_required">
<div id="tp_x_required" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_immigrationdocuments" data-field="x_required" data-value-separator="<?php echo $employee_immigrationdocuments->required->displayValueSeparatorAttribute() ?>" name="x_required" id="x_required" value="{value}"<?php echo $employee_immigrationdocuments->required->editAttributes() ?>></div>
<div id="dsl_x_required" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_immigrationdocuments->required->radioButtonListHtml(FALSE, "x_required") ?>
</div></div>
</span>
<?php echo $employee_immigrationdocuments->required->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_immigrationdocuments->alert_on_missing->Visible) { // alert_on_missing ?>
	<div id="r_alert_on_missing" class="form-group row">
		<label id="elh_employee_immigrationdocuments_alert_on_missing" class="<?php echo $employee_immigrationdocuments_edit->LeftColumnClass ?>"><?php echo $employee_immigrationdocuments->alert_on_missing->caption() ?><?php echo ($employee_immigrationdocuments->alert_on_missing->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_immigrationdocuments_edit->RightColumnClass ?>"><div<?php echo $employee_immigrationdocuments->alert_on_missing->cellAttributes() ?>>
<span id="el_employee_immigrationdocuments_alert_on_missing">
<div id="tp_x_alert_on_missing" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_immigrationdocuments" data-field="x_alert_on_missing" data-value-separator="<?php echo $employee_immigrationdocuments->alert_on_missing->displayValueSeparatorAttribute() ?>" name="x_alert_on_missing" id="x_alert_on_missing" value="{value}"<?php echo $employee_immigrationdocuments->alert_on_missing->editAttributes() ?>></div>
<div id="dsl_x_alert_on_missing" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_immigrationdocuments->alert_on_missing->radioButtonListHtml(FALSE, "x_alert_on_missing") ?>
</div></div>
</span>
<?php echo $employee_immigrationdocuments->alert_on_missing->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_immigrationdocuments->alert_before_expiry->Visible) { // alert_before_expiry ?>
	<div id="r_alert_before_expiry" class="form-group row">
		<label id="elh_employee_immigrationdocuments_alert_before_expiry" class="<?php echo $employee_immigrationdocuments_edit->LeftColumnClass ?>"><?php echo $employee_immigrationdocuments->alert_before_expiry->caption() ?><?php echo ($employee_immigrationdocuments->alert_before_expiry->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_immigrationdocuments_edit->RightColumnClass ?>"><div<?php echo $employee_immigrationdocuments->alert_before_expiry->cellAttributes() ?>>
<span id="el_employee_immigrationdocuments_alert_before_expiry">
<div id="tp_x_alert_before_expiry" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_immigrationdocuments" data-field="x_alert_before_expiry" data-value-separator="<?php echo $employee_immigrationdocuments->alert_before_expiry->displayValueSeparatorAttribute() ?>" name="x_alert_before_expiry" id="x_alert_before_expiry" value="{value}"<?php echo $employee_immigrationdocuments->alert_before_expiry->editAttributes() ?>></div>
<div id="dsl_x_alert_before_expiry" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_immigrationdocuments->alert_before_expiry->radioButtonListHtml(FALSE, "x_alert_before_expiry") ?>
</div></div>
</span>
<?php echo $employee_immigrationdocuments->alert_before_expiry->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_immigrationdocuments->alert_before_day_number->Visible) { // alert_before_day_number ?>
	<div id="r_alert_before_day_number" class="form-group row">
		<label id="elh_employee_immigrationdocuments_alert_before_day_number" for="x_alert_before_day_number" class="<?php echo $employee_immigrationdocuments_edit->LeftColumnClass ?>"><?php echo $employee_immigrationdocuments->alert_before_day_number->caption() ?><?php echo ($employee_immigrationdocuments->alert_before_day_number->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_immigrationdocuments_edit->RightColumnClass ?>"><div<?php echo $employee_immigrationdocuments->alert_before_day_number->cellAttributes() ?>>
<span id="el_employee_immigrationdocuments_alert_before_day_number">
<input type="text" data-table="employee_immigrationdocuments" data-field="x_alert_before_day_number" name="x_alert_before_day_number" id="x_alert_before_day_number" size="30" placeholder="<?php echo HtmlEncode($employee_immigrationdocuments->alert_before_day_number->getPlaceHolder()) ?>" value="<?php echo $employee_immigrationdocuments->alert_before_day_number->EditValue ?>"<?php echo $employee_immigrationdocuments->alert_before_day_number->editAttributes() ?>>
</span>
<?php echo $employee_immigrationdocuments->alert_before_day_number->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_immigrationdocuments->created->Visible) { // created ?>
	<div id="r_created" class="form-group row">
		<label id="elh_employee_immigrationdocuments_created" for="x_created" class="<?php echo $employee_immigrationdocuments_edit->LeftColumnClass ?>"><?php echo $employee_immigrationdocuments->created->caption() ?><?php echo ($employee_immigrationdocuments->created->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_immigrationdocuments_edit->RightColumnClass ?>"><div<?php echo $employee_immigrationdocuments->created->cellAttributes() ?>>
<span id="el_employee_immigrationdocuments_created">
<input type="text" data-table="employee_immigrationdocuments" data-field="x_created" name="x_created" id="x_created" placeholder="<?php echo HtmlEncode($employee_immigrationdocuments->created->getPlaceHolder()) ?>" value="<?php echo $employee_immigrationdocuments->created->EditValue ?>"<?php echo $employee_immigrationdocuments->created->editAttributes() ?>>
<?php if (!$employee_immigrationdocuments->created->ReadOnly && !$employee_immigrationdocuments->created->Disabled && !isset($employee_immigrationdocuments->created->EditAttrs["readonly"]) && !isset($employee_immigrationdocuments->created->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_immigrationdocumentsedit", "x_created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee_immigrationdocuments->created->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_immigrationdocuments->updated->Visible) { // updated ?>
	<div id="r_updated" class="form-group row">
		<label id="elh_employee_immigrationdocuments_updated" for="x_updated" class="<?php echo $employee_immigrationdocuments_edit->LeftColumnClass ?>"><?php echo $employee_immigrationdocuments->updated->caption() ?><?php echo ($employee_immigrationdocuments->updated->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_immigrationdocuments_edit->RightColumnClass ?>"><div<?php echo $employee_immigrationdocuments->updated->cellAttributes() ?>>
<span id="el_employee_immigrationdocuments_updated">
<input type="text" data-table="employee_immigrationdocuments" data-field="x_updated" name="x_updated" id="x_updated" placeholder="<?php echo HtmlEncode($employee_immigrationdocuments->updated->getPlaceHolder()) ?>" value="<?php echo $employee_immigrationdocuments->updated->EditValue ?>"<?php echo $employee_immigrationdocuments->updated->editAttributes() ?>>
<?php if (!$employee_immigrationdocuments->updated->ReadOnly && !$employee_immigrationdocuments->updated->Disabled && !isset($employee_immigrationdocuments->updated->EditAttrs["readonly"]) && !isset($employee_immigrationdocuments->updated->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_immigrationdocumentsedit", "x_updated", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee_immigrationdocuments->updated->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$employee_immigrationdocuments_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $employee_immigrationdocuments_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_immigrationdocuments_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$employee_immigrationdocuments_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_immigrationdocuments_edit->terminate();
?>