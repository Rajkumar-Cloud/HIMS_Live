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
$banktransferto_addopt = new banktransferto_addopt();

// Run the page
$banktransferto_addopt->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$banktransferto_addopt->Page_Render();
?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "addopt";
var fbanktransfertoaddopt = currentForm = new ew.Form("fbanktransfertoaddopt", "addopt");

// Validate form
fbanktransfertoaddopt.validate = function() {
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
		<?php if ($banktransferto_addopt->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $banktransferto->Name->caption(), $banktransferto->Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($banktransferto_addopt->Street_Address->Required) { ?>
			elm = this.getElements("x" + infix + "_Street_Address");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $banktransferto->Street_Address->caption(), $banktransferto->Street_Address->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($banktransferto_addopt->City->Required) { ?>
			elm = this.getElements("x" + infix + "_City");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $banktransferto->City->caption(), $banktransferto->City->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($banktransferto_addopt->State->Required) { ?>
			elm = this.getElements("x" + infix + "_State");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $banktransferto->State->caption(), $banktransferto->State->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($banktransferto_addopt->Zipcode->Required) { ?>
			elm = this.getElements("x" + infix + "_Zipcode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $banktransferto->Zipcode->caption(), $banktransferto->Zipcode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($banktransferto_addopt->Mobile_Number->Required) { ?>
			elm = this.getElements("x" + infix + "_Mobile_Number");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $banktransferto->Mobile_Number->caption(), $banktransferto->Mobile_Number->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($banktransferto_addopt->AccountNo->Required) { ?>
			elm = this.getElements("x" + infix + "_AccountNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $banktransferto->AccountNo->caption(), $banktransferto->AccountNo->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
fbanktransfertoaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fbanktransfertoaddopt.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $banktransferto_addopt->showPageHeader(); ?>
<?php
$banktransferto_addopt->showMessage();
?>
<form name="fbanktransfertoaddopt" id="fbanktransfertoaddopt" class="ew-form ew-horizontal" action="<?php echo API_URL ?>" method="post">
<?php //if ($banktransferto_addopt->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $banktransferto_addopt->Token ?>">
<?php //} ?>
<input type="hidden" name="<?php echo API_ACTION_NAME ?>" id="<?php echo API_ACTION_NAME ?>" value="<?php echo API_ADD_ACTION ?>">
<input type="hidden" name="<?php echo API_OBJECT_NAME ?>" id="<?php echo API_OBJECT_NAME ?>" value="<?php echo $banktransferto_addopt->TableVar ?>">
<?php if ($banktransferto->Name->Visible) { // Name ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Name"><?php echo $banktransferto->Name->caption() ?><?php echo ($banktransferto->Name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="banktransferto" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($banktransferto->Name->getPlaceHolder()) ?>" value="<?php echo $banktransferto->Name->EditValue ?>"<?php echo $banktransferto->Name->editAttributes() ?>>
<?php echo $banktransferto->Name->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($banktransferto->Street_Address->Visible) { // Street_Address ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Street_Address"><?php echo $banktransferto->Street_Address->caption() ?><?php echo ($banktransferto->Street_Address->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="banktransferto" data-field="x_Street_Address" name="x_Street_Address" id="x_Street_Address" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($banktransferto->Street_Address->getPlaceHolder()) ?>" value="<?php echo $banktransferto->Street_Address->EditValue ?>"<?php echo $banktransferto->Street_Address->editAttributes() ?>>
<?php echo $banktransferto->Street_Address->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($banktransferto->City->Visible) { // City ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_City"><?php echo $banktransferto->City->caption() ?><?php echo ($banktransferto->City->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="banktransferto" data-field="x_City" name="x_City" id="x_City" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($banktransferto->City->getPlaceHolder()) ?>" value="<?php echo $banktransferto->City->EditValue ?>"<?php echo $banktransferto->City->editAttributes() ?>>
<?php echo $banktransferto->City->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($banktransferto->State->Visible) { // State ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_State"><?php echo $banktransferto->State->caption() ?><?php echo ($banktransferto->State->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="banktransferto" data-field="x_State" name="x_State" id="x_State" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($banktransferto->State->getPlaceHolder()) ?>" value="<?php echo $banktransferto->State->EditValue ?>"<?php echo $banktransferto->State->editAttributes() ?>>
<?php echo $banktransferto->State->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($banktransferto->Zipcode->Visible) { // Zipcode ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Zipcode"><?php echo $banktransferto->Zipcode->caption() ?><?php echo ($banktransferto->Zipcode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="banktransferto" data-field="x_Zipcode" name="x_Zipcode" id="x_Zipcode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($banktransferto->Zipcode->getPlaceHolder()) ?>" value="<?php echo $banktransferto->Zipcode->EditValue ?>"<?php echo $banktransferto->Zipcode->editAttributes() ?>>
<?php echo $banktransferto->Zipcode->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($banktransferto->Mobile_Number->Visible) { // Mobile_Number ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Mobile_Number"><?php echo $banktransferto->Mobile_Number->caption() ?><?php echo ($banktransferto->Mobile_Number->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="banktransferto" data-field="x_Mobile_Number" name="x_Mobile_Number" id="x_Mobile_Number" size="30" maxlength="12" placeholder="<?php echo HtmlEncode($banktransferto->Mobile_Number->getPlaceHolder()) ?>" value="<?php echo $banktransferto->Mobile_Number->EditValue ?>"<?php echo $banktransferto->Mobile_Number->editAttributes() ?>>
<?php echo $banktransferto->Mobile_Number->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($banktransferto->AccountNo->Visible) { // AccountNo ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_AccountNo"><?php echo $banktransferto->AccountNo->caption() ?><?php echo ($banktransferto->AccountNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="banktransferto" data-field="x_AccountNo" name="x_AccountNo" id="x_AccountNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($banktransferto->AccountNo->getPlaceHolder()) ?>" value="<?php echo $banktransferto->AccountNo->EditValue ?>"<?php echo $banktransferto->AccountNo->editAttributes() ?>>
<?php echo $banktransferto->AccountNo->CustomMsg ?></div>
	</div>
<?php } ?>
</form>
<?php
$banktransferto_addopt->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php
$banktransferto_addopt->terminate();
?>