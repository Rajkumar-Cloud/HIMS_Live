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
$bankbranches_addopt = new bankbranches_addopt();

// Run the page
$bankbranches_addopt->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bankbranches_addopt->Page_Render();
?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "addopt";
var fbankbranchesaddopt = currentForm = new ew.Form("fbankbranchesaddopt", "addopt");

// Validate form
fbankbranchesaddopt.validate = function() {
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
		<?php if ($bankbranches_addopt->Branch_Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Branch_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bankbranches->Branch_Name->caption(), $bankbranches->Branch_Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($bankbranches_addopt->Street_Address->Required) { ?>
			elm = this.getElements("x" + infix + "_Street_Address");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bankbranches->Street_Address->caption(), $bankbranches->Street_Address->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($bankbranches_addopt->City->Required) { ?>
			elm = this.getElements("x" + infix + "_City");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bankbranches->City->caption(), $bankbranches->City->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($bankbranches_addopt->State->Required) { ?>
			elm = this.getElements("x" + infix + "_State");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bankbranches->State->caption(), $bankbranches->State->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($bankbranches_addopt->Zipcode->Required) { ?>
			elm = this.getElements("x" + infix + "_Zipcode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bankbranches->Zipcode->caption(), $bankbranches->Zipcode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($bankbranches_addopt->Phone_Number->Required) { ?>
			elm = this.getElements("x" + infix + "_Phone_Number");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bankbranches->Phone_Number->caption(), $bankbranches->Phone_Number->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($bankbranches_addopt->AccountNo->Required) { ?>
			elm = this.getElements("x" + infix + "_AccountNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bankbranches->AccountNo->caption(), $bankbranches->AccountNo->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
fbankbranchesaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fbankbranchesaddopt.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $bankbranches_addopt->showPageHeader(); ?>
<?php
$bankbranches_addopt->showMessage();
?>
<form name="fbankbranchesaddopt" id="fbankbranchesaddopt" class="ew-form ew-horizontal" action="<?php echo API_URL ?>" method="post">
<?php //if ($bankbranches_addopt->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $bankbranches_addopt->Token ?>">
<?php //} ?>
<input type="hidden" name="<?php echo API_ACTION_NAME ?>" id="<?php echo API_ACTION_NAME ?>" value="<?php echo API_ADD_ACTION ?>">
<input type="hidden" name="<?php echo API_OBJECT_NAME ?>" id="<?php echo API_OBJECT_NAME ?>" value="<?php echo $bankbranches_addopt->TableVar ?>">
<?php if ($bankbranches->Branch_Name->Visible) { // Branch_Name ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Branch_Name"><?php echo $bankbranches->Branch_Name->caption() ?><?php echo ($bankbranches->Branch_Name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="bankbranches" data-field="x_Branch_Name" name="x_Branch_Name" id="x_Branch_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($bankbranches->Branch_Name->getPlaceHolder()) ?>" value="<?php echo $bankbranches->Branch_Name->EditValue ?>"<?php echo $bankbranches->Branch_Name->editAttributes() ?>>
<?php echo $bankbranches->Branch_Name->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($bankbranches->Street_Address->Visible) { // Street_Address ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Street_Address"><?php echo $bankbranches->Street_Address->caption() ?><?php echo ($bankbranches->Street_Address->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="bankbranches" data-field="x_Street_Address" name="x_Street_Address" id="x_Street_Address" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bankbranches->Street_Address->getPlaceHolder()) ?>" value="<?php echo $bankbranches->Street_Address->EditValue ?>"<?php echo $bankbranches->Street_Address->editAttributes() ?>>
<?php echo $bankbranches->Street_Address->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($bankbranches->City->Visible) { // City ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_City"><?php echo $bankbranches->City->caption() ?><?php echo ($bankbranches->City->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="bankbranches" data-field="x_City" name="x_City" id="x_City" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($bankbranches->City->getPlaceHolder()) ?>" value="<?php echo $bankbranches->City->EditValue ?>"<?php echo $bankbranches->City->editAttributes() ?>>
<?php echo $bankbranches->City->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($bankbranches->State->Visible) { // State ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_State"><?php echo $bankbranches->State->caption() ?><?php echo ($bankbranches->State->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="bankbranches" data-field="x_State" name="x_State" id="x_State" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($bankbranches->State->getPlaceHolder()) ?>" value="<?php echo $bankbranches->State->EditValue ?>"<?php echo $bankbranches->State->editAttributes() ?>>
<?php echo $bankbranches->State->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($bankbranches->Zipcode->Visible) { // Zipcode ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Zipcode"><?php echo $bankbranches->Zipcode->caption() ?><?php echo ($bankbranches->Zipcode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="bankbranches" data-field="x_Zipcode" name="x_Zipcode" id="x_Zipcode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($bankbranches->Zipcode->getPlaceHolder()) ?>" value="<?php echo $bankbranches->Zipcode->EditValue ?>"<?php echo $bankbranches->Zipcode->editAttributes() ?>>
<?php echo $bankbranches->Zipcode->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($bankbranches->Phone_Number->Visible) { // Phone_Number ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Phone_Number"><?php echo $bankbranches->Phone_Number->caption() ?><?php echo ($bankbranches->Phone_Number->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="bankbranches" data-field="x_Phone_Number" name="x_Phone_Number" id="x_Phone_Number" size="30" maxlength="12" placeholder="<?php echo HtmlEncode($bankbranches->Phone_Number->getPlaceHolder()) ?>" value="<?php echo $bankbranches->Phone_Number->EditValue ?>"<?php echo $bankbranches->Phone_Number->editAttributes() ?>>
<?php echo $bankbranches->Phone_Number->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($bankbranches->AccountNo->Visible) { // AccountNo ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_AccountNo"><?php echo $bankbranches->AccountNo->caption() ?><?php echo ($bankbranches->AccountNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="bankbranches" data-field="x_AccountNo" name="x_AccountNo" id="x_AccountNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($bankbranches->AccountNo->getPlaceHolder()) ?>" value="<?php echo $bankbranches->AccountNo->EditValue ?>"<?php echo $bankbranches->AccountNo->editAttributes() ?>>
<?php echo $bankbranches->AccountNo->CustomMsg ?></div>
	</div>
<?php } ?>
</form>
<?php
$bankbranches_addopt->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php
$bankbranches_addopt->terminate();
?>