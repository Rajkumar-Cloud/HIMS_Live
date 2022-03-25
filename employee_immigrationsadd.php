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
$employee_immigrations_add = new employee_immigrations_add();

// Run the page
$employee_immigrations_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_immigrations_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var femployee_immigrationsadd = currentForm = new ew.Form("femployee_immigrationsadd", "add");

// Validate form
femployee_immigrationsadd.validate = function() {
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
		<?php if ($employee_immigrations_add->employee->Required) { ?>
			elm = this.getElements("x" + infix + "_employee");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_immigrations->employee->caption(), $employee_immigrations->employee->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_employee");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_immigrations->employee->errorMessage()) ?>");
		<?php if ($employee_immigrations_add->document->Required) { ?>
			elm = this.getElements("x" + infix + "_document");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_immigrations->document->caption(), $employee_immigrations->document->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_document");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_immigrations->document->errorMessage()) ?>");
		<?php if ($employee_immigrations_add->documentname->Required) { ?>
			elm = this.getElements("x" + infix + "_documentname");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_immigrations->documentname->caption(), $employee_immigrations->documentname->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_immigrations_add->valid_until->Required) { ?>
			elm = this.getElements("x" + infix + "_valid_until");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_immigrations->valid_until->caption(), $employee_immigrations->valid_until->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_valid_until");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_immigrations->valid_until->errorMessage()) ?>");
		<?php if ($employee_immigrations_add->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_immigrations->status->caption(), $employee_immigrations->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_immigrations_add->details->Required) { ?>
			elm = this.getElements("x" + infix + "_details");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_immigrations->details->caption(), $employee_immigrations->details->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_immigrations_add->attachment1->Required) { ?>
			elm = this.getElements("x" + infix + "_attachment1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_immigrations->attachment1->caption(), $employee_immigrations->attachment1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_immigrations_add->attachment2->Required) { ?>
			elm = this.getElements("x" + infix + "_attachment2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_immigrations->attachment2->caption(), $employee_immigrations->attachment2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_immigrations_add->attachment3->Required) { ?>
			elm = this.getElements("x" + infix + "_attachment3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_immigrations->attachment3->caption(), $employee_immigrations->attachment3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_immigrations_add->created->Required) { ?>
			elm = this.getElements("x" + infix + "_created");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_immigrations->created->caption(), $employee_immigrations->created->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_created");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_immigrations->created->errorMessage()) ?>");
		<?php if ($employee_immigrations_add->updated->Required) { ?>
			elm = this.getElements("x" + infix + "_updated");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_immigrations->updated->caption(), $employee_immigrations->updated->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_updated");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_immigrations->updated->errorMessage()) ?>");

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
femployee_immigrationsadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_immigrationsadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_immigrationsadd.lists["x_status"] = <?php echo $employee_immigrations_add->status->Lookup->toClientList() ?>;
femployee_immigrationsadd.lists["x_status"].options = <?php echo JsonEncode($employee_immigrations_add->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_immigrations_add->showPageHeader(); ?>
<?php
$employee_immigrations_add->showMessage();
?>
<form name="femployee_immigrationsadd" id="femployee_immigrationsadd" class="<?php echo $employee_immigrations_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_immigrations_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_immigrations_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_immigrations">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$employee_immigrations_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($employee_immigrations->employee->Visible) { // employee ?>
	<div id="r_employee" class="form-group row">
		<label id="elh_employee_immigrations_employee" for="x_employee" class="<?php echo $employee_immigrations_add->LeftColumnClass ?>"><?php echo $employee_immigrations->employee->caption() ?><?php echo ($employee_immigrations->employee->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_immigrations_add->RightColumnClass ?>"><div<?php echo $employee_immigrations->employee->cellAttributes() ?>>
<span id="el_employee_immigrations_employee">
<input type="text" data-table="employee_immigrations" data-field="x_employee" name="x_employee" id="x_employee" size="30" placeholder="<?php echo HtmlEncode($employee_immigrations->employee->getPlaceHolder()) ?>" value="<?php echo $employee_immigrations->employee->EditValue ?>"<?php echo $employee_immigrations->employee->editAttributes() ?>>
</span>
<?php echo $employee_immigrations->employee->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_immigrations->document->Visible) { // document ?>
	<div id="r_document" class="form-group row">
		<label id="elh_employee_immigrations_document" for="x_document" class="<?php echo $employee_immigrations_add->LeftColumnClass ?>"><?php echo $employee_immigrations->document->caption() ?><?php echo ($employee_immigrations->document->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_immigrations_add->RightColumnClass ?>"><div<?php echo $employee_immigrations->document->cellAttributes() ?>>
<span id="el_employee_immigrations_document">
<input type="text" data-table="employee_immigrations" data-field="x_document" name="x_document" id="x_document" size="30" placeholder="<?php echo HtmlEncode($employee_immigrations->document->getPlaceHolder()) ?>" value="<?php echo $employee_immigrations->document->EditValue ?>"<?php echo $employee_immigrations->document->editAttributes() ?>>
</span>
<?php echo $employee_immigrations->document->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_immigrations->documentname->Visible) { // documentname ?>
	<div id="r_documentname" class="form-group row">
		<label id="elh_employee_immigrations_documentname" for="x_documentname" class="<?php echo $employee_immigrations_add->LeftColumnClass ?>"><?php echo $employee_immigrations->documentname->caption() ?><?php echo ($employee_immigrations->documentname->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_immigrations_add->RightColumnClass ?>"><div<?php echo $employee_immigrations->documentname->cellAttributes() ?>>
<span id="el_employee_immigrations_documentname">
<input type="text" data-table="employee_immigrations" data-field="x_documentname" name="x_documentname" id="x_documentname" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($employee_immigrations->documentname->getPlaceHolder()) ?>" value="<?php echo $employee_immigrations->documentname->EditValue ?>"<?php echo $employee_immigrations->documentname->editAttributes() ?>>
</span>
<?php echo $employee_immigrations->documentname->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_immigrations->valid_until->Visible) { // valid_until ?>
	<div id="r_valid_until" class="form-group row">
		<label id="elh_employee_immigrations_valid_until" for="x_valid_until" class="<?php echo $employee_immigrations_add->LeftColumnClass ?>"><?php echo $employee_immigrations->valid_until->caption() ?><?php echo ($employee_immigrations->valid_until->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_immigrations_add->RightColumnClass ?>"><div<?php echo $employee_immigrations->valid_until->cellAttributes() ?>>
<span id="el_employee_immigrations_valid_until">
<input type="text" data-table="employee_immigrations" data-field="x_valid_until" name="x_valid_until" id="x_valid_until" placeholder="<?php echo HtmlEncode($employee_immigrations->valid_until->getPlaceHolder()) ?>" value="<?php echo $employee_immigrations->valid_until->EditValue ?>"<?php echo $employee_immigrations->valid_until->editAttributes() ?>>
<?php if (!$employee_immigrations->valid_until->ReadOnly && !$employee_immigrations->valid_until->Disabled && !isset($employee_immigrations->valid_until->EditAttrs["readonly"]) && !isset($employee_immigrations->valid_until->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_immigrationsadd", "x_valid_until", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee_immigrations->valid_until->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_immigrations->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_employee_immigrations_status" class="<?php echo $employee_immigrations_add->LeftColumnClass ?>"><?php echo $employee_immigrations->status->caption() ?><?php echo ($employee_immigrations->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_immigrations_add->RightColumnClass ?>"><div<?php echo $employee_immigrations->status->cellAttributes() ?>>
<span id="el_employee_immigrations_status">
<div id="tp_x_status" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_immigrations" data-field="x_status" data-value-separator="<?php echo $employee_immigrations->status->displayValueSeparatorAttribute() ?>" name="x_status" id="x_status" value="{value}"<?php echo $employee_immigrations->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_immigrations->status->radioButtonListHtml(FALSE, "x_status") ?>
</div></div>
</span>
<?php echo $employee_immigrations->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_immigrations->details->Visible) { // details ?>
	<div id="r_details" class="form-group row">
		<label id="elh_employee_immigrations_details" for="x_details" class="<?php echo $employee_immigrations_add->LeftColumnClass ?>"><?php echo $employee_immigrations->details->caption() ?><?php echo ($employee_immigrations->details->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_immigrations_add->RightColumnClass ?>"><div<?php echo $employee_immigrations->details->cellAttributes() ?>>
<span id="el_employee_immigrations_details">
<textarea data-table="employee_immigrations" data-field="x_details" name="x_details" id="x_details" cols="35" rows="4" placeholder="<?php echo HtmlEncode($employee_immigrations->details->getPlaceHolder()) ?>"<?php echo $employee_immigrations->details->editAttributes() ?>><?php echo $employee_immigrations->details->EditValue ?></textarea>
</span>
<?php echo $employee_immigrations->details->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_immigrations->attachment1->Visible) { // attachment1 ?>
	<div id="r_attachment1" class="form-group row">
		<label id="elh_employee_immigrations_attachment1" for="x_attachment1" class="<?php echo $employee_immigrations_add->LeftColumnClass ?>"><?php echo $employee_immigrations->attachment1->caption() ?><?php echo ($employee_immigrations->attachment1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_immigrations_add->RightColumnClass ?>"><div<?php echo $employee_immigrations->attachment1->cellAttributes() ?>>
<span id="el_employee_immigrations_attachment1">
<input type="text" data-table="employee_immigrations" data-field="x_attachment1" name="x_attachment1" id="x_attachment1" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_immigrations->attachment1->getPlaceHolder()) ?>" value="<?php echo $employee_immigrations->attachment1->EditValue ?>"<?php echo $employee_immigrations->attachment1->editAttributes() ?>>
</span>
<?php echo $employee_immigrations->attachment1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_immigrations->attachment2->Visible) { // attachment2 ?>
	<div id="r_attachment2" class="form-group row">
		<label id="elh_employee_immigrations_attachment2" for="x_attachment2" class="<?php echo $employee_immigrations_add->LeftColumnClass ?>"><?php echo $employee_immigrations->attachment2->caption() ?><?php echo ($employee_immigrations->attachment2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_immigrations_add->RightColumnClass ?>"><div<?php echo $employee_immigrations->attachment2->cellAttributes() ?>>
<span id="el_employee_immigrations_attachment2">
<input type="text" data-table="employee_immigrations" data-field="x_attachment2" name="x_attachment2" id="x_attachment2" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_immigrations->attachment2->getPlaceHolder()) ?>" value="<?php echo $employee_immigrations->attachment2->EditValue ?>"<?php echo $employee_immigrations->attachment2->editAttributes() ?>>
</span>
<?php echo $employee_immigrations->attachment2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_immigrations->attachment3->Visible) { // attachment3 ?>
	<div id="r_attachment3" class="form-group row">
		<label id="elh_employee_immigrations_attachment3" for="x_attachment3" class="<?php echo $employee_immigrations_add->LeftColumnClass ?>"><?php echo $employee_immigrations->attachment3->caption() ?><?php echo ($employee_immigrations->attachment3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_immigrations_add->RightColumnClass ?>"><div<?php echo $employee_immigrations->attachment3->cellAttributes() ?>>
<span id="el_employee_immigrations_attachment3">
<input type="text" data-table="employee_immigrations" data-field="x_attachment3" name="x_attachment3" id="x_attachment3" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_immigrations->attachment3->getPlaceHolder()) ?>" value="<?php echo $employee_immigrations->attachment3->EditValue ?>"<?php echo $employee_immigrations->attachment3->editAttributes() ?>>
</span>
<?php echo $employee_immigrations->attachment3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_immigrations->created->Visible) { // created ?>
	<div id="r_created" class="form-group row">
		<label id="elh_employee_immigrations_created" for="x_created" class="<?php echo $employee_immigrations_add->LeftColumnClass ?>"><?php echo $employee_immigrations->created->caption() ?><?php echo ($employee_immigrations->created->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_immigrations_add->RightColumnClass ?>"><div<?php echo $employee_immigrations->created->cellAttributes() ?>>
<span id="el_employee_immigrations_created">
<input type="text" data-table="employee_immigrations" data-field="x_created" name="x_created" id="x_created" placeholder="<?php echo HtmlEncode($employee_immigrations->created->getPlaceHolder()) ?>" value="<?php echo $employee_immigrations->created->EditValue ?>"<?php echo $employee_immigrations->created->editAttributes() ?>>
<?php if (!$employee_immigrations->created->ReadOnly && !$employee_immigrations->created->Disabled && !isset($employee_immigrations->created->EditAttrs["readonly"]) && !isset($employee_immigrations->created->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_immigrationsadd", "x_created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee_immigrations->created->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_immigrations->updated->Visible) { // updated ?>
	<div id="r_updated" class="form-group row">
		<label id="elh_employee_immigrations_updated" for="x_updated" class="<?php echo $employee_immigrations_add->LeftColumnClass ?>"><?php echo $employee_immigrations->updated->caption() ?><?php echo ($employee_immigrations->updated->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_immigrations_add->RightColumnClass ?>"><div<?php echo $employee_immigrations->updated->cellAttributes() ?>>
<span id="el_employee_immigrations_updated">
<input type="text" data-table="employee_immigrations" data-field="x_updated" name="x_updated" id="x_updated" placeholder="<?php echo HtmlEncode($employee_immigrations->updated->getPlaceHolder()) ?>" value="<?php echo $employee_immigrations->updated->EditValue ?>"<?php echo $employee_immigrations->updated->editAttributes() ?>>
<?php if (!$employee_immigrations->updated->ReadOnly && !$employee_immigrations->updated->Disabled && !isset($employee_immigrations->updated->EditAttrs["readonly"]) && !isset($employee_immigrations->updated->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_immigrationsadd", "x_updated", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee_immigrations->updated->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$employee_immigrations_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $employee_immigrations_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_immigrations_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$employee_immigrations_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_immigrations_add->terminate();
?>