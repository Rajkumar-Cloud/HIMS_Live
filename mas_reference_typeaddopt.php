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
$mas_reference_type_addopt = new mas_reference_type_addopt();

// Run the page
$mas_reference_type_addopt->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_reference_type_addopt->Page_Render();
?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "addopt";
var fmas_reference_typeaddopt = currentForm = new ew.Form("fmas_reference_typeaddopt", "addopt");

// Validate form
fmas_reference_typeaddopt.validate = function() {
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
		<?php if ($mas_reference_type_addopt->reference->Required) { ?>
			elm = this.getElements("x" + infix + "_reference");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_reference_type->reference->caption(), $mas_reference_type->reference->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_reference_type_addopt->ReferMobileNo->Required) { ?>
			elm = this.getElements("x" + infix + "_ReferMobileNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_reference_type->ReferMobileNo->caption(), $mas_reference_type->ReferMobileNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_reference_type_addopt->ReferClinicname->Required) { ?>
			elm = this.getElements("x" + infix + "_ReferClinicname");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_reference_type->ReferClinicname->caption(), $mas_reference_type->ReferClinicname->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_reference_type_addopt->ReferCity->Required) { ?>
			elm = this.getElements("x" + infix + "_ReferCity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_reference_type->ReferCity->caption(), $mas_reference_type->ReferCity->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_reference_type_addopt->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_reference_type->HospID->caption(), $mas_reference_type->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($mas_reference_type->HospID->errorMessage()) ?>");
		<?php if ($mas_reference_type_addopt->_email->Required) { ?>
			elm = this.getElements("x" + infix + "__email");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_reference_type->_email->caption(), $mas_reference_type->_email->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_reference_type_addopt->whatapp->Required) { ?>
			elm = this.getElements("x" + infix + "_whatapp");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_reference_type->whatapp->caption(), $mas_reference_type->whatapp->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
fmas_reference_typeaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_reference_typeaddopt.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $mas_reference_type_addopt->showPageHeader(); ?>
<?php
$mas_reference_type_addopt->showMessage();
?>
<form name="fmas_reference_typeaddopt" id="fmas_reference_typeaddopt" class="ew-form ew-horizontal" action="<?php echo API_URL ?>" method="post">
<?php //if ($mas_reference_type_addopt->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_reference_type_addopt->Token ?>">
<?php //} ?>
<input type="hidden" name="<?php echo API_ACTION_NAME ?>" id="<?php echo API_ACTION_NAME ?>" value="<?php echo API_ADD_ACTION ?>">
<input type="hidden" name="<?php echo API_OBJECT_NAME ?>" id="<?php echo API_OBJECT_NAME ?>" value="<?php echo $mas_reference_type_addopt->TableVar ?>">
<?php if ($mas_reference_type->reference->Visible) { // reference ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_reference"><?php echo $mas_reference_type->reference->caption() ?><?php echo ($mas_reference_type->reference->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="mas_reference_type" data-field="x_reference" name="x_reference" id="x_reference" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_reference_type->reference->getPlaceHolder()) ?>" value="<?php echo $mas_reference_type->reference->EditValue ?>"<?php echo $mas_reference_type->reference->editAttributes() ?>>
<?php echo $mas_reference_type->reference->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($mas_reference_type->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_ReferMobileNo"><?php echo $mas_reference_type->ReferMobileNo->caption() ?><?php echo ($mas_reference_type->ReferMobileNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="mas_reference_type" data-field="x_ReferMobileNo" name="x_ReferMobileNo" id="x_ReferMobileNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_reference_type->ReferMobileNo->getPlaceHolder()) ?>" value="<?php echo $mas_reference_type->ReferMobileNo->EditValue ?>"<?php echo $mas_reference_type->ReferMobileNo->editAttributes() ?>>
<?php echo $mas_reference_type->ReferMobileNo->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($mas_reference_type->ReferClinicname->Visible) { // ReferClinicname ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_ReferClinicname"><?php echo $mas_reference_type->ReferClinicname->caption() ?><?php echo ($mas_reference_type->ReferClinicname->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="mas_reference_type" data-field="x_ReferClinicname" name="x_ReferClinicname" id="x_ReferClinicname" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_reference_type->ReferClinicname->getPlaceHolder()) ?>" value="<?php echo $mas_reference_type->ReferClinicname->EditValue ?>"<?php echo $mas_reference_type->ReferClinicname->editAttributes() ?>>
<?php echo $mas_reference_type->ReferClinicname->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($mas_reference_type->ReferCity->Visible) { // ReferCity ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_ReferCity"><?php echo $mas_reference_type->ReferCity->caption() ?><?php echo ($mas_reference_type->ReferCity->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="mas_reference_type" data-field="x_ReferCity" name="x_ReferCity" id="x_ReferCity" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_reference_type->ReferCity->getPlaceHolder()) ?>" value="<?php echo $mas_reference_type->ReferCity->EditValue ?>"<?php echo $mas_reference_type->ReferCity->editAttributes() ?>>
<?php echo $mas_reference_type->ReferCity->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($mas_reference_type->HospID->Visible) { // HospID ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_HospID"><?php echo $mas_reference_type->HospID->caption() ?><?php echo ($mas_reference_type->HospID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="mas_reference_type" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($mas_reference_type->HospID->getPlaceHolder()) ?>" value="<?php echo $mas_reference_type->HospID->EditValue ?>"<?php echo $mas_reference_type->HospID->editAttributes() ?>>
<?php echo $mas_reference_type->HospID->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($mas_reference_type->_email->Visible) { // email ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x__email"><?php echo $mas_reference_type->_email->caption() ?><?php echo ($mas_reference_type->_email->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="mas_reference_type" data-field="x__email" name="x__email" id="x__email" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_reference_type->_email->getPlaceHolder()) ?>" value="<?php echo $mas_reference_type->_email->EditValue ?>"<?php echo $mas_reference_type->_email->editAttributes() ?>>
<?php echo $mas_reference_type->_email->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($mas_reference_type->whatapp->Visible) { // whatapp ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_whatapp"><?php echo $mas_reference_type->whatapp->caption() ?><?php echo ($mas_reference_type->whatapp->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="mas_reference_type" data-field="x_whatapp" name="x_whatapp" id="x_whatapp" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_reference_type->whatapp->getPlaceHolder()) ?>" value="<?php echo $mas_reference_type->whatapp->EditValue ?>"<?php echo $mas_reference_type->whatapp->editAttributes() ?>>
<?php echo $mas_reference_type->whatapp->CustomMsg ?></div>
	</div>
<?php } ?>
</form>
<?php
$mas_reference_type_addopt->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php
$mas_reference_type_addopt->terminate();
?>