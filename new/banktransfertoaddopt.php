<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
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
var fbanktransfertoaddopt, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "addopt";
	fbanktransfertoaddopt = currentForm = new ew.Form("fbanktransfertoaddopt", "addopt");

	// Validate form
	fbanktransfertoaddopt.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "confirm")
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
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $banktransferto_addopt->Name->caption(), $banktransferto_addopt->Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($banktransferto_addopt->Street_Address->Required) { ?>
				elm = this.getElements("x" + infix + "_Street_Address");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $banktransferto_addopt->Street_Address->caption(), $banktransferto_addopt->Street_Address->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($banktransferto_addopt->City->Required) { ?>
				elm = this.getElements("x" + infix + "_City");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $banktransferto_addopt->City->caption(), $banktransferto_addopt->City->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($banktransferto_addopt->State->Required) { ?>
				elm = this.getElements("x" + infix + "_State");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $banktransferto_addopt->State->caption(), $banktransferto_addopt->State->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($banktransferto_addopt->Zipcode->Required) { ?>
				elm = this.getElements("x" + infix + "_Zipcode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $banktransferto_addopt->Zipcode->caption(), $banktransferto_addopt->Zipcode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($banktransferto_addopt->Mobile_Number->Required) { ?>
				elm = this.getElements("x" + infix + "_Mobile_Number");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $banktransferto_addopt->Mobile_Number->caption(), $banktransferto_addopt->Mobile_Number->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($banktransferto_addopt->AccountNo->Required) { ?>
				elm = this.getElements("x" + infix + "_AccountNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $banktransferto_addopt->AccountNo->caption(), $banktransferto_addopt->AccountNo->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fbanktransfertoaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fbanktransfertoaddopt.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fbanktransfertoaddopt");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $banktransferto_addopt->showPageHeader(); ?>
<?php
$banktransferto_addopt->showMessage();
?>
<form name="fbanktransfertoaddopt" id="fbanktransfertoaddopt" class="ew-form ew-horizontal" action="<?php echo Config("API_URL") ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="<?php echo Config("API_ACTION_NAME") ?>" id="<?php echo Config("API_ACTION_NAME") ?>" value="<?php echo Config("API_ADD_ACTION") ?>">
<input type="hidden" name="<?php echo Config("API_OBJECT_NAME") ?>" id="<?php echo Config("API_OBJECT_NAME") ?>" value="<?php echo $banktransferto_addopt->TableVar ?>">
<input type="hidden" name="addopt" id="addopt" value="1">
<?php if ($banktransferto_addopt->Name->Visible) { // Name ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Name"><?php echo $banktransferto_addopt->Name->caption() ?><?php echo $banktransferto_addopt->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="banktransferto" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($banktransferto_addopt->Name->getPlaceHolder()) ?>" value="<?php echo $banktransferto_addopt->Name->EditValue ?>"<?php echo $banktransferto_addopt->Name->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($banktransferto_addopt->Street_Address->Visible) { // Street_Address ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Street_Address"><?php echo $banktransferto_addopt->Street_Address->caption() ?><?php echo $banktransferto_addopt->Street_Address->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="banktransferto" data-field="x_Street_Address" name="x_Street_Address" id="x_Street_Address" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($banktransferto_addopt->Street_Address->getPlaceHolder()) ?>" value="<?php echo $banktransferto_addopt->Street_Address->EditValue ?>"<?php echo $banktransferto_addopt->Street_Address->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($banktransferto_addopt->City->Visible) { // City ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_City"><?php echo $banktransferto_addopt->City->caption() ?><?php echo $banktransferto_addopt->City->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="banktransferto" data-field="x_City" name="x_City" id="x_City" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($banktransferto_addopt->City->getPlaceHolder()) ?>" value="<?php echo $banktransferto_addopt->City->EditValue ?>"<?php echo $banktransferto_addopt->City->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($banktransferto_addopt->State->Visible) { // State ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_State"><?php echo $banktransferto_addopt->State->caption() ?><?php echo $banktransferto_addopt->State->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="banktransferto" data-field="x_State" name="x_State" id="x_State" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($banktransferto_addopt->State->getPlaceHolder()) ?>" value="<?php echo $banktransferto_addopt->State->EditValue ?>"<?php echo $banktransferto_addopt->State->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($banktransferto_addopt->Zipcode->Visible) { // Zipcode ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Zipcode"><?php echo $banktransferto_addopt->Zipcode->caption() ?><?php echo $banktransferto_addopt->Zipcode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="banktransferto" data-field="x_Zipcode" name="x_Zipcode" id="x_Zipcode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($banktransferto_addopt->Zipcode->getPlaceHolder()) ?>" value="<?php echo $banktransferto_addopt->Zipcode->EditValue ?>"<?php echo $banktransferto_addopt->Zipcode->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($banktransferto_addopt->Mobile_Number->Visible) { // Mobile_Number ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Mobile_Number"><?php echo $banktransferto_addopt->Mobile_Number->caption() ?><?php echo $banktransferto_addopt->Mobile_Number->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="banktransferto" data-field="x_Mobile_Number" name="x_Mobile_Number" id="x_Mobile_Number" size="30" maxlength="12" placeholder="<?php echo HtmlEncode($banktransferto_addopt->Mobile_Number->getPlaceHolder()) ?>" value="<?php echo $banktransferto_addopt->Mobile_Number->EditValue ?>"<?php echo $banktransferto_addopt->Mobile_Number->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($banktransferto_addopt->AccountNo->Visible) { // AccountNo ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_AccountNo"><?php echo $banktransferto_addopt->AccountNo->caption() ?><?php echo $banktransferto_addopt->AccountNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="banktransferto" data-field="x_AccountNo" name="x_AccountNo" id="x_AccountNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($banktransferto_addopt->AccountNo->getPlaceHolder()) ?>" value="<?php echo $banktransferto_addopt->AccountNo->EditValue ?>"<?php echo $banktransferto_addopt->AccountNo->editAttributes() ?>>
</div>
	</div>
<?php } ?>
</form>
<?php
$banktransferto_addopt->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php
$banktransferto_addopt->terminate();
?>