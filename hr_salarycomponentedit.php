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
$hr_salarycomponent_edit = new hr_salarycomponent_edit();

// Run the page
$hr_salarycomponent_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_salarycomponent_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fhr_salarycomponentedit = currentForm = new ew.Form("fhr_salarycomponentedit", "edit");

// Validate form
fhr_salarycomponentedit.validate = function() {
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
		<?php if ($hr_salarycomponent_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_salarycomponent->id->caption(), $hr_salarycomponent->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_salarycomponent_edit->name->Required) { ?>
			elm = this.getElements("x" + infix + "_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_salarycomponent->name->caption(), $hr_salarycomponent->name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_salarycomponent_edit->componentType->Required) { ?>
			elm = this.getElements("x" + infix + "_componentType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_salarycomponent->componentType->caption(), $hr_salarycomponent->componentType->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_componentType");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($hr_salarycomponent->componentType->errorMessage()) ?>");
		<?php if ($hr_salarycomponent_edit->details->Required) { ?>
			elm = this.getElements("x" + infix + "_details");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_salarycomponent->details->caption(), $hr_salarycomponent->details->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_salarycomponent_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_salarycomponent->HospID->caption(), $hr_salarycomponent->HospID->RequiredErrorMessage)) ?>");
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
fhr_salarycomponentedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_salarycomponentedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_salarycomponent_edit->showPageHeader(); ?>
<?php
$hr_salarycomponent_edit->showMessage();
?>
<form name="fhr_salarycomponentedit" id="fhr_salarycomponentedit" class="<?php echo $hr_salarycomponent_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_salarycomponent_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_salarycomponent_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_salarycomponent">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$hr_salarycomponent_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($hr_salarycomponent->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_hr_salarycomponent_id" class="<?php echo $hr_salarycomponent_edit->LeftColumnClass ?>"><?php echo $hr_salarycomponent->id->caption() ?><?php echo ($hr_salarycomponent->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_salarycomponent_edit->RightColumnClass ?>"><div<?php echo $hr_salarycomponent->id->cellAttributes() ?>>
<span id="el_hr_salarycomponent_id">
<span<?php echo $hr_salarycomponent->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($hr_salarycomponent->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="hr_salarycomponent" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($hr_salarycomponent->id->CurrentValue) ?>">
<?php echo $hr_salarycomponent->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_salarycomponent->name->Visible) { // name ?>
	<div id="r_name" class="form-group row">
		<label id="elh_hr_salarycomponent_name" for="x_name" class="<?php echo $hr_salarycomponent_edit->LeftColumnClass ?>"><?php echo $hr_salarycomponent->name->caption() ?><?php echo ($hr_salarycomponent->name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_salarycomponent_edit->RightColumnClass ?>"><div<?php echo $hr_salarycomponent->name->cellAttributes() ?>>
<span id="el_hr_salarycomponent_name">
<input type="text" data-table="hr_salarycomponent" data-field="x_name" name="x_name" id="x_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hr_salarycomponent->name->getPlaceHolder()) ?>" value="<?php echo $hr_salarycomponent->name->EditValue ?>"<?php echo $hr_salarycomponent->name->editAttributes() ?>>
</span>
<?php echo $hr_salarycomponent->name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_salarycomponent->componentType->Visible) { // componentType ?>
	<div id="r_componentType" class="form-group row">
		<label id="elh_hr_salarycomponent_componentType" for="x_componentType" class="<?php echo $hr_salarycomponent_edit->LeftColumnClass ?>"><?php echo $hr_salarycomponent->componentType->caption() ?><?php echo ($hr_salarycomponent->componentType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_salarycomponent_edit->RightColumnClass ?>"><div<?php echo $hr_salarycomponent->componentType->cellAttributes() ?>>
<span id="el_hr_salarycomponent_componentType">
<input type="text" data-table="hr_salarycomponent" data-field="x_componentType" name="x_componentType" id="x_componentType" size="30" placeholder="<?php echo HtmlEncode($hr_salarycomponent->componentType->getPlaceHolder()) ?>" value="<?php echo $hr_salarycomponent->componentType->EditValue ?>"<?php echo $hr_salarycomponent->componentType->editAttributes() ?>>
</span>
<?php echo $hr_salarycomponent->componentType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_salarycomponent->details->Visible) { // details ?>
	<div id="r_details" class="form-group row">
		<label id="elh_hr_salarycomponent_details" for="x_details" class="<?php echo $hr_salarycomponent_edit->LeftColumnClass ?>"><?php echo $hr_salarycomponent->details->caption() ?><?php echo ($hr_salarycomponent->details->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_salarycomponent_edit->RightColumnClass ?>"><div<?php echo $hr_salarycomponent->details->cellAttributes() ?>>
<span id="el_hr_salarycomponent_details">
<textarea data-table="hr_salarycomponent" data-field="x_details" name="x_details" id="x_details" cols="35" rows="4" placeholder="<?php echo HtmlEncode($hr_salarycomponent->details->getPlaceHolder()) ?>"<?php echo $hr_salarycomponent->details->editAttributes() ?>><?php echo $hr_salarycomponent->details->EditValue ?></textarea>
</span>
<?php echo $hr_salarycomponent->details->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$hr_salarycomponent_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $hr_salarycomponent_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_salarycomponent_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$hr_salarycomponent_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_salarycomponent_edit->terminate();
?>