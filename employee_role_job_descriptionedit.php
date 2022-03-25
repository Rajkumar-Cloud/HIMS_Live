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
$employee_role_job_description_edit = new employee_role_job_description_edit();

// Run the page
$employee_role_job_description_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_role_job_description_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var femployee_role_job_descriptionedit = currentForm = new ew.Form("femployee_role_job_descriptionedit", "edit");

// Validate form
femployee_role_job_descriptionedit.validate = function() {
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
		<?php if ($employee_role_job_description_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_role_job_description->id->caption(), $employee_role_job_description->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_role_job_description_edit->role->Required) { ?>
			elm = this.getElements("x" + infix + "_role");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_role_job_description->role->caption(), $employee_role_job_description->role->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_role_job_description_edit->job_description->Required) { ?>
			elm = this.getElements("x" + infix + "_job_description");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_role_job_description->job_description->caption(), $employee_role_job_description->job_description->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_role_job_description_edit->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_role_job_description->status->caption(), $employee_role_job_description->status->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_role_job_description->status->errorMessage()) ?>");
		<?php if ($employee_role_job_description_edit->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_role_job_description->createdby->caption(), $employee_role_job_description->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_role_job_description->createdby->errorMessage()) ?>");
		<?php if ($employee_role_job_description_edit->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_role_job_description->createddatetime->caption(), $employee_role_job_description->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_role_job_description->createddatetime->errorMessage()) ?>");
		<?php if ($employee_role_job_description_edit->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_role_job_description->modifiedby->caption(), $employee_role_job_description->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_role_job_description->modifiedby->errorMessage()) ?>");
		<?php if ($employee_role_job_description_edit->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_role_job_description->modifieddatetime->caption(), $employee_role_job_description->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_role_job_description->modifieddatetime->errorMessage()) ?>");

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
femployee_role_job_descriptionedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_role_job_descriptionedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_role_job_description_edit->showPageHeader(); ?>
<?php
$employee_role_job_description_edit->showMessage();
?>
<form name="femployee_role_job_descriptionedit" id="femployee_role_job_descriptionedit" class="<?php echo $employee_role_job_description_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_role_job_description_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_role_job_description_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_role_job_description">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$employee_role_job_description_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($employee_role_job_description->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_employee_role_job_description_id" class="<?php echo $employee_role_job_description_edit->LeftColumnClass ?>"><?php echo $employee_role_job_description->id->caption() ?><?php echo ($employee_role_job_description->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_role_job_description_edit->RightColumnClass ?>"><div<?php echo $employee_role_job_description->id->cellAttributes() ?>>
<span id="el_employee_role_job_description_id">
<span<?php echo $employee_role_job_description->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_role_job_description->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_role_job_description" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($employee_role_job_description->id->CurrentValue) ?>">
<?php echo $employee_role_job_description->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_role_job_description->role->Visible) { // role ?>
	<div id="r_role" class="form-group row">
		<label id="elh_employee_role_job_description_role" for="x_role" class="<?php echo $employee_role_job_description_edit->LeftColumnClass ?>"><?php echo $employee_role_job_description->role->caption() ?><?php echo ($employee_role_job_description->role->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_role_job_description_edit->RightColumnClass ?>"><div<?php echo $employee_role_job_description->role->cellAttributes() ?>>
<span id="el_employee_role_job_description_role">
<input type="text" data-table="employee_role_job_description" data-field="x_role" name="x_role" id="x_role" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_role_job_description->role->getPlaceHolder()) ?>" value="<?php echo $employee_role_job_description->role->EditValue ?>"<?php echo $employee_role_job_description->role->editAttributes() ?>>
</span>
<?php echo $employee_role_job_description->role->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_role_job_description->job_description->Visible) { // job_description ?>
	<div id="r_job_description" class="form-group row">
		<label id="elh_employee_role_job_description_job_description" for="x_job_description" class="<?php echo $employee_role_job_description_edit->LeftColumnClass ?>"><?php echo $employee_role_job_description->job_description->caption() ?><?php echo ($employee_role_job_description->job_description->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_role_job_description_edit->RightColumnClass ?>"><div<?php echo $employee_role_job_description->job_description->cellAttributes() ?>>
<span id="el_employee_role_job_description_job_description">
<input type="text" data-table="employee_role_job_description" data-field="x_job_description" name="x_job_description" id="x_job_description" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_role_job_description->job_description->getPlaceHolder()) ?>" value="<?php echo $employee_role_job_description->job_description->EditValue ?>"<?php echo $employee_role_job_description->job_description->editAttributes() ?>>
</span>
<?php echo $employee_role_job_description->job_description->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_role_job_description->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_employee_role_job_description_status" for="x_status" class="<?php echo $employee_role_job_description_edit->LeftColumnClass ?>"><?php echo $employee_role_job_description->status->caption() ?><?php echo ($employee_role_job_description->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_role_job_description_edit->RightColumnClass ?>"><div<?php echo $employee_role_job_description->status->cellAttributes() ?>>
<span id="el_employee_role_job_description_status">
<input type="text" data-table="employee_role_job_description" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?php echo HtmlEncode($employee_role_job_description->status->getPlaceHolder()) ?>" value="<?php echo $employee_role_job_description->status->EditValue ?>"<?php echo $employee_role_job_description->status->editAttributes() ?>>
</span>
<?php echo $employee_role_job_description->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_role_job_description->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label id="elh_employee_role_job_description_createdby" for="x_createdby" class="<?php echo $employee_role_job_description_edit->LeftColumnClass ?>"><?php echo $employee_role_job_description->createdby->caption() ?><?php echo ($employee_role_job_description->createdby->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_role_job_description_edit->RightColumnClass ?>"><div<?php echo $employee_role_job_description->createdby->cellAttributes() ?>>
<span id="el_employee_role_job_description_createdby">
<input type="text" data-table="employee_role_job_description" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?php echo HtmlEncode($employee_role_job_description->createdby->getPlaceHolder()) ?>" value="<?php echo $employee_role_job_description->createdby->EditValue ?>"<?php echo $employee_role_job_description->createdby->editAttributes() ?>>
</span>
<?php echo $employee_role_job_description->createdby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_role_job_description->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label id="elh_employee_role_job_description_createddatetime" for="x_createddatetime" class="<?php echo $employee_role_job_description_edit->LeftColumnClass ?>"><?php echo $employee_role_job_description->createddatetime->caption() ?><?php echo ($employee_role_job_description->createddatetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_role_job_description_edit->RightColumnClass ?>"><div<?php echo $employee_role_job_description->createddatetime->cellAttributes() ?>>
<span id="el_employee_role_job_description_createddatetime">
<input type="text" data-table="employee_role_job_description" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($employee_role_job_description->createddatetime->getPlaceHolder()) ?>" value="<?php echo $employee_role_job_description->createddatetime->EditValue ?>"<?php echo $employee_role_job_description->createddatetime->editAttributes() ?>>
<?php if (!$employee_role_job_description->createddatetime->ReadOnly && !$employee_role_job_description->createddatetime->Disabled && !isset($employee_role_job_description->createddatetime->EditAttrs["readonly"]) && !isset($employee_role_job_description->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_role_job_descriptionedit", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee_role_job_description->createddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_role_job_description->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label id="elh_employee_role_job_description_modifiedby" for="x_modifiedby" class="<?php echo $employee_role_job_description_edit->LeftColumnClass ?>"><?php echo $employee_role_job_description->modifiedby->caption() ?><?php echo ($employee_role_job_description->modifiedby->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_role_job_description_edit->RightColumnClass ?>"><div<?php echo $employee_role_job_description->modifiedby->cellAttributes() ?>>
<span id="el_employee_role_job_description_modifiedby">
<input type="text" data-table="employee_role_job_description" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?php echo HtmlEncode($employee_role_job_description->modifiedby->getPlaceHolder()) ?>" value="<?php echo $employee_role_job_description->modifiedby->EditValue ?>"<?php echo $employee_role_job_description->modifiedby->editAttributes() ?>>
</span>
<?php echo $employee_role_job_description->modifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_role_job_description->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label id="elh_employee_role_job_description_modifieddatetime" for="x_modifieddatetime" class="<?php echo $employee_role_job_description_edit->LeftColumnClass ?>"><?php echo $employee_role_job_description->modifieddatetime->caption() ?><?php echo ($employee_role_job_description->modifieddatetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_role_job_description_edit->RightColumnClass ?>"><div<?php echo $employee_role_job_description->modifieddatetime->cellAttributes() ?>>
<span id="el_employee_role_job_description_modifieddatetime">
<input type="text" data-table="employee_role_job_description" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($employee_role_job_description->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $employee_role_job_description->modifieddatetime->EditValue ?>"<?php echo $employee_role_job_description->modifieddatetime->editAttributes() ?>>
<?php if (!$employee_role_job_description->modifieddatetime->ReadOnly && !$employee_role_job_description->modifieddatetime->Disabled && !isset($employee_role_job_description->modifieddatetime->EditAttrs["readonly"]) && !isset($employee_role_job_description->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_role_job_descriptionedit", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee_role_job_description->modifieddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$employee_role_job_description_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $employee_role_job_description_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_role_job_description_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$employee_role_job_description_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_role_job_description_edit->terminate();
?>