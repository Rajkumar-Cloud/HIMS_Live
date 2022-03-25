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
$hr_courses_add = new hr_courses_add();

// Run the page
$hr_courses_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_courses_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fhr_coursesadd = currentForm = new ew.Form("fhr_coursesadd", "add");

// Validate form
fhr_coursesadd.validate = function() {
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
		<?php if ($hr_courses_add->code->Required) { ?>
			elm = this.getElements("x" + infix + "_code");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_courses->code->caption(), $hr_courses->code->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_courses_add->name->Required) { ?>
			elm = this.getElements("x" + infix + "_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_courses->name->caption(), $hr_courses->name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_courses_add->description->Required) { ?>
			elm = this.getElements("x" + infix + "_description");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_courses->description->caption(), $hr_courses->description->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_courses_add->coordinator->Required) { ?>
			elm = this.getElements("x" + infix + "_coordinator");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_courses->coordinator->caption(), $hr_courses->coordinator->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_coordinator");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($hr_courses->coordinator->errorMessage()) ?>");
		<?php if ($hr_courses_add->trainer->Required) { ?>
			elm = this.getElements("x" + infix + "_trainer");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_courses->trainer->caption(), $hr_courses->trainer->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_courses_add->trainer_info->Required) { ?>
			elm = this.getElements("x" + infix + "_trainer_info");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_courses->trainer_info->caption(), $hr_courses->trainer_info->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_courses_add->paymentType->Required) { ?>
			elm = this.getElements("x" + infix + "_paymentType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_courses->paymentType->caption(), $hr_courses->paymentType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_courses_add->currency->Required) { ?>
			elm = this.getElements("x" + infix + "_currency");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_courses->currency->caption(), $hr_courses->currency->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_courses_add->cost->Required) { ?>
			elm = this.getElements("x" + infix + "_cost");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_courses->cost->caption(), $hr_courses->cost->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_cost");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($hr_courses->cost->errorMessage()) ?>");
		<?php if ($hr_courses_add->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_courses->status->caption(), $hr_courses->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_courses_add->created->Required) { ?>
			elm = this.getElements("x" + infix + "_created");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_courses->created->caption(), $hr_courses->created->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_created");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($hr_courses->created->errorMessage()) ?>");
		<?php if ($hr_courses_add->updated->Required) { ?>
			elm = this.getElements("x" + infix + "_updated");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_courses->updated->caption(), $hr_courses->updated->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_updated");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($hr_courses->updated->errorMessage()) ?>");

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
fhr_coursesadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_coursesadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_coursesadd.lists["x_paymentType"] = <?php echo $hr_courses_add->paymentType->Lookup->toClientList() ?>;
fhr_coursesadd.lists["x_paymentType"].options = <?php echo JsonEncode($hr_courses_add->paymentType->options(FALSE, TRUE)) ?>;
fhr_coursesadd.lists["x_status"] = <?php echo $hr_courses_add->status->Lookup->toClientList() ?>;
fhr_coursesadd.lists["x_status"].options = <?php echo JsonEncode($hr_courses_add->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_courses_add->showPageHeader(); ?>
<?php
$hr_courses_add->showMessage();
?>
<form name="fhr_coursesadd" id="fhr_coursesadd" class="<?php echo $hr_courses_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_courses_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_courses_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_courses">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$hr_courses_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($hr_courses->code->Visible) { // code ?>
	<div id="r_code" class="form-group row">
		<label id="elh_hr_courses_code" for="x_code" class="<?php echo $hr_courses_add->LeftColumnClass ?>"><?php echo $hr_courses->code->caption() ?><?php echo ($hr_courses->code->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_courses_add->RightColumnClass ?>"><div<?php echo $hr_courses->code->cellAttributes() ?>>
<span id="el_hr_courses_code">
<textarea data-table="hr_courses" data-field="x_code" name="x_code" id="x_code" cols="35" rows="4" placeholder="<?php echo HtmlEncode($hr_courses->code->getPlaceHolder()) ?>"<?php echo $hr_courses->code->editAttributes() ?>><?php echo $hr_courses->code->EditValue ?></textarea>
</span>
<?php echo $hr_courses->code->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_courses->name->Visible) { // name ?>
	<div id="r_name" class="form-group row">
		<label id="elh_hr_courses_name" for="x_name" class="<?php echo $hr_courses_add->LeftColumnClass ?>"><?php echo $hr_courses->name->caption() ?><?php echo ($hr_courses->name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_courses_add->RightColumnClass ?>"><div<?php echo $hr_courses->name->cellAttributes() ?>>
<span id="el_hr_courses_name">
<textarea data-table="hr_courses" data-field="x_name" name="x_name" id="x_name" cols="35" rows="4" placeholder="<?php echo HtmlEncode($hr_courses->name->getPlaceHolder()) ?>"<?php echo $hr_courses->name->editAttributes() ?>><?php echo $hr_courses->name->EditValue ?></textarea>
</span>
<?php echo $hr_courses->name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_courses->description->Visible) { // description ?>
	<div id="r_description" class="form-group row">
		<label id="elh_hr_courses_description" for="x_description" class="<?php echo $hr_courses_add->LeftColumnClass ?>"><?php echo $hr_courses->description->caption() ?><?php echo ($hr_courses->description->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_courses_add->RightColumnClass ?>"><div<?php echo $hr_courses->description->cellAttributes() ?>>
<span id="el_hr_courses_description">
<textarea data-table="hr_courses" data-field="x_description" name="x_description" id="x_description" cols="35" rows="4" placeholder="<?php echo HtmlEncode($hr_courses->description->getPlaceHolder()) ?>"<?php echo $hr_courses->description->editAttributes() ?>><?php echo $hr_courses->description->EditValue ?></textarea>
</span>
<?php echo $hr_courses->description->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_courses->coordinator->Visible) { // coordinator ?>
	<div id="r_coordinator" class="form-group row">
		<label id="elh_hr_courses_coordinator" for="x_coordinator" class="<?php echo $hr_courses_add->LeftColumnClass ?>"><?php echo $hr_courses->coordinator->caption() ?><?php echo ($hr_courses->coordinator->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_courses_add->RightColumnClass ?>"><div<?php echo $hr_courses->coordinator->cellAttributes() ?>>
<span id="el_hr_courses_coordinator">
<input type="text" data-table="hr_courses" data-field="x_coordinator" name="x_coordinator" id="x_coordinator" size="30" placeholder="<?php echo HtmlEncode($hr_courses->coordinator->getPlaceHolder()) ?>" value="<?php echo $hr_courses->coordinator->EditValue ?>"<?php echo $hr_courses->coordinator->editAttributes() ?>>
</span>
<?php echo $hr_courses->coordinator->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_courses->trainer->Visible) { // trainer ?>
	<div id="r_trainer" class="form-group row">
		<label id="elh_hr_courses_trainer" for="x_trainer" class="<?php echo $hr_courses_add->LeftColumnClass ?>"><?php echo $hr_courses->trainer->caption() ?><?php echo ($hr_courses->trainer->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_courses_add->RightColumnClass ?>"><div<?php echo $hr_courses->trainer->cellAttributes() ?>>
<span id="el_hr_courses_trainer">
<textarea data-table="hr_courses" data-field="x_trainer" name="x_trainer" id="x_trainer" cols="35" rows="4" placeholder="<?php echo HtmlEncode($hr_courses->trainer->getPlaceHolder()) ?>"<?php echo $hr_courses->trainer->editAttributes() ?>><?php echo $hr_courses->trainer->EditValue ?></textarea>
</span>
<?php echo $hr_courses->trainer->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_courses->trainer_info->Visible) { // trainer_info ?>
	<div id="r_trainer_info" class="form-group row">
		<label id="elh_hr_courses_trainer_info" for="x_trainer_info" class="<?php echo $hr_courses_add->LeftColumnClass ?>"><?php echo $hr_courses->trainer_info->caption() ?><?php echo ($hr_courses->trainer_info->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_courses_add->RightColumnClass ?>"><div<?php echo $hr_courses->trainer_info->cellAttributes() ?>>
<span id="el_hr_courses_trainer_info">
<textarea data-table="hr_courses" data-field="x_trainer_info" name="x_trainer_info" id="x_trainer_info" cols="35" rows="4" placeholder="<?php echo HtmlEncode($hr_courses->trainer_info->getPlaceHolder()) ?>"<?php echo $hr_courses->trainer_info->editAttributes() ?>><?php echo $hr_courses->trainer_info->EditValue ?></textarea>
</span>
<?php echo $hr_courses->trainer_info->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_courses->paymentType->Visible) { // paymentType ?>
	<div id="r_paymentType" class="form-group row">
		<label id="elh_hr_courses_paymentType" class="<?php echo $hr_courses_add->LeftColumnClass ?>"><?php echo $hr_courses->paymentType->caption() ?><?php echo ($hr_courses->paymentType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_courses_add->RightColumnClass ?>"><div<?php echo $hr_courses->paymentType->cellAttributes() ?>>
<span id="el_hr_courses_paymentType">
<div id="tp_x_paymentType" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_courses" data-field="x_paymentType" data-value-separator="<?php echo $hr_courses->paymentType->displayValueSeparatorAttribute() ?>" name="x_paymentType" id="x_paymentType" value="{value}"<?php echo $hr_courses->paymentType->editAttributes() ?>></div>
<div id="dsl_x_paymentType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_courses->paymentType->radioButtonListHtml(FALSE, "x_paymentType") ?>
</div></div>
</span>
<?php echo $hr_courses->paymentType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_courses->currency->Visible) { // currency ?>
	<div id="r_currency" class="form-group row">
		<label id="elh_hr_courses_currency" for="x_currency" class="<?php echo $hr_courses_add->LeftColumnClass ?>"><?php echo $hr_courses->currency->caption() ?><?php echo ($hr_courses->currency->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_courses_add->RightColumnClass ?>"><div<?php echo $hr_courses->currency->cellAttributes() ?>>
<span id="el_hr_courses_currency">
<input type="text" data-table="hr_courses" data-field="x_currency" name="x_currency" id="x_currency" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($hr_courses->currency->getPlaceHolder()) ?>" value="<?php echo $hr_courses->currency->EditValue ?>"<?php echo $hr_courses->currency->editAttributes() ?>>
</span>
<?php echo $hr_courses->currency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_courses->cost->Visible) { // cost ?>
	<div id="r_cost" class="form-group row">
		<label id="elh_hr_courses_cost" for="x_cost" class="<?php echo $hr_courses_add->LeftColumnClass ?>"><?php echo $hr_courses->cost->caption() ?><?php echo ($hr_courses->cost->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_courses_add->RightColumnClass ?>"><div<?php echo $hr_courses->cost->cellAttributes() ?>>
<span id="el_hr_courses_cost">
<input type="text" data-table="hr_courses" data-field="x_cost" name="x_cost" id="x_cost" size="30" placeholder="<?php echo HtmlEncode($hr_courses->cost->getPlaceHolder()) ?>" value="<?php echo $hr_courses->cost->EditValue ?>"<?php echo $hr_courses->cost->editAttributes() ?>>
</span>
<?php echo $hr_courses->cost->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_courses->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_hr_courses_status" class="<?php echo $hr_courses_add->LeftColumnClass ?>"><?php echo $hr_courses->status->caption() ?><?php echo ($hr_courses->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_courses_add->RightColumnClass ?>"><div<?php echo $hr_courses->status->cellAttributes() ?>>
<span id="el_hr_courses_status">
<div id="tp_x_status" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_courses" data-field="x_status" data-value-separator="<?php echo $hr_courses->status->displayValueSeparatorAttribute() ?>" name="x_status" id="x_status" value="{value}"<?php echo $hr_courses->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_courses->status->radioButtonListHtml(FALSE, "x_status") ?>
</div></div>
</span>
<?php echo $hr_courses->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_courses->created->Visible) { // created ?>
	<div id="r_created" class="form-group row">
		<label id="elh_hr_courses_created" for="x_created" class="<?php echo $hr_courses_add->LeftColumnClass ?>"><?php echo $hr_courses->created->caption() ?><?php echo ($hr_courses->created->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_courses_add->RightColumnClass ?>"><div<?php echo $hr_courses->created->cellAttributes() ?>>
<span id="el_hr_courses_created">
<input type="text" data-table="hr_courses" data-field="x_created" name="x_created" id="x_created" placeholder="<?php echo HtmlEncode($hr_courses->created->getPlaceHolder()) ?>" value="<?php echo $hr_courses->created->EditValue ?>"<?php echo $hr_courses->created->editAttributes() ?>>
<?php if (!$hr_courses->created->ReadOnly && !$hr_courses->created->Disabled && !isset($hr_courses->created->EditAttrs["readonly"]) && !isset($hr_courses->created->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fhr_coursesadd", "x_created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $hr_courses->created->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_courses->updated->Visible) { // updated ?>
	<div id="r_updated" class="form-group row">
		<label id="elh_hr_courses_updated" for="x_updated" class="<?php echo $hr_courses_add->LeftColumnClass ?>"><?php echo $hr_courses->updated->caption() ?><?php echo ($hr_courses->updated->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_courses_add->RightColumnClass ?>"><div<?php echo $hr_courses->updated->cellAttributes() ?>>
<span id="el_hr_courses_updated">
<input type="text" data-table="hr_courses" data-field="x_updated" name="x_updated" id="x_updated" placeholder="<?php echo HtmlEncode($hr_courses->updated->getPlaceHolder()) ?>" value="<?php echo $hr_courses->updated->EditValue ?>"<?php echo $hr_courses->updated->editAttributes() ?>>
<?php if (!$hr_courses->updated->ReadOnly && !$hr_courses->updated->Disabled && !isset($hr_courses->updated->EditAttrs["readonly"]) && !isset($hr_courses->updated->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fhr_coursesadd", "x_updated", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $hr_courses->updated->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$hr_courses_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $hr_courses_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_courses_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$hr_courses_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_courses_add->terminate();
?>