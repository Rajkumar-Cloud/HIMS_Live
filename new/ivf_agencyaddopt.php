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
$ivf_agency_addopt = new ivf_agency_addopt();

// Run the page
$ivf_agency_addopt->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_agency_addopt->Page_Render();
?>
<script>
var fivf_agencyaddopt, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "addopt";
	fivf_agencyaddopt = currentForm = new ew.Form("fivf_agencyaddopt", "addopt");

	// Validate form
	fivf_agencyaddopt.validate = function() {
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
			<?php if ($ivf_agency_addopt->Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_agency_addopt->Name->caption(), $ivf_agency_addopt->Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_agency_addopt->Street->Required) { ?>
				elm = this.getElements("x" + infix + "_Street");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_agency_addopt->Street->caption(), $ivf_agency_addopt->Street->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_agency_addopt->Town->Required) { ?>
				elm = this.getElements("x" + infix + "_Town");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_agency_addopt->Town->caption(), $ivf_agency_addopt->Town->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_agency_addopt->State->Required) { ?>
				elm = this.getElements("x" + infix + "_State");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_agency_addopt->State->caption(), $ivf_agency_addopt->State->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_agency_addopt->Pin->Required) { ?>
				elm = this.getElements("x" + infix + "_Pin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_agency_addopt->Pin->caption(), $ivf_agency_addopt->Pin->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fivf_agencyaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivf_agencyaddopt.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fivf_agencyaddopt");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_agency_addopt->showPageHeader(); ?>
<?php
$ivf_agency_addopt->showMessage();
?>
<form name="fivf_agencyaddopt" id="fivf_agencyaddopt" class="ew-form ew-horizontal" action="<?php echo Config("API_URL") ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="<?php echo Config("API_ACTION_NAME") ?>" id="<?php echo Config("API_ACTION_NAME") ?>" value="<?php echo Config("API_ADD_ACTION") ?>">
<input type="hidden" name="<?php echo Config("API_OBJECT_NAME") ?>" id="<?php echo Config("API_OBJECT_NAME") ?>" value="<?php echo $ivf_agency_addopt->TableVar ?>">
<input type="hidden" name="addopt" id="addopt" value="1">
<?php if ($ivf_agency_addopt->Name->Visible) { // Name ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Name"><?php echo $ivf_agency_addopt->Name->caption() ?><?php echo $ivf_agency_addopt->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="ivf_agency" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_agency_addopt->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_agency_addopt->Name->EditValue ?>"<?php echo $ivf_agency_addopt->Name->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($ivf_agency_addopt->Street->Visible) { // Street ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Street"><?php echo $ivf_agency_addopt->Street->caption() ?><?php echo $ivf_agency_addopt->Street->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="ivf_agency" data-field="x_Street" name="x_Street" id="x_Street" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_agency_addopt->Street->getPlaceHolder()) ?>" value="<?php echo $ivf_agency_addopt->Street->EditValue ?>"<?php echo $ivf_agency_addopt->Street->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($ivf_agency_addopt->Town->Visible) { // Town ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Town"><?php echo $ivf_agency_addopt->Town->caption() ?><?php echo $ivf_agency_addopt->Town->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="ivf_agency" data-field="x_Town" name="x_Town" id="x_Town" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_agency_addopt->Town->getPlaceHolder()) ?>" value="<?php echo $ivf_agency_addopt->Town->EditValue ?>"<?php echo $ivf_agency_addopt->Town->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($ivf_agency_addopt->State->Visible) { // State ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_State"><?php echo $ivf_agency_addopt->State->caption() ?><?php echo $ivf_agency_addopt->State->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="ivf_agency" data-field="x_State" name="x_State" id="x_State" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_agency_addopt->State->getPlaceHolder()) ?>" value="<?php echo $ivf_agency_addopt->State->EditValue ?>"<?php echo $ivf_agency_addopt->State->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($ivf_agency_addopt->Pin->Visible) { // Pin ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Pin"><?php echo $ivf_agency_addopt->Pin->caption() ?><?php echo $ivf_agency_addopt->Pin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="ivf_agency" data-field="x_Pin" name="x_Pin" id="x_Pin" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_agency_addopt->Pin->getPlaceHolder()) ?>" value="<?php echo $ivf_agency_addopt->Pin->EditValue ?>"<?php echo $ivf_agency_addopt->Pin->editAttributes() ?>>
</div>
	</div>
<?php } ?>
</form>
<?php
$ivf_agency_addopt->showPageFooter();
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
$ivf_agency_addopt->terminate();
?>