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

// Form object
currentPageID = ew.PAGE_ID = "addopt";
var fivf_agencyaddopt = currentForm = new ew.Form("fivf_agencyaddopt", "addopt");

// Validate form
fivf_agencyaddopt.validate = function() {
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
		<?php if ($ivf_agency_addopt->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_agency->Name->caption(), $ivf_agency->Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_agency_addopt->Street->Required) { ?>
			elm = this.getElements("x" + infix + "_Street");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_agency->Street->caption(), $ivf_agency->Street->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_agency_addopt->Town->Required) { ?>
			elm = this.getElements("x" + infix + "_Town");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_agency->Town->caption(), $ivf_agency->Town->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_agency_addopt->State->Required) { ?>
			elm = this.getElements("x" + infix + "_State");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_agency->State->caption(), $ivf_agency->State->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_agency_addopt->Pin->Required) { ?>
			elm = this.getElements("x" + infix + "_Pin");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_agency->Pin->caption(), $ivf_agency->Pin->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
fivf_agencyaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_agencyaddopt.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_agency_addopt->showPageHeader(); ?>
<?php
$ivf_agency_addopt->showMessage();
?>
<form name="fivf_agencyaddopt" id="fivf_agencyaddopt" class="ew-form ew-horizontal" action="<?php echo API_URL ?>" method="post">
<?php //if ($ivf_agency_addopt->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_agency_addopt->Token ?>">
<?php //} ?>
<input type="hidden" name="<?php echo API_ACTION_NAME ?>" id="<?php echo API_ACTION_NAME ?>" value="<?php echo API_ADD_ACTION ?>">
<input type="hidden" name="<?php echo API_OBJECT_NAME ?>" id="<?php echo API_OBJECT_NAME ?>" value="<?php echo $ivf_agency_addopt->TableVar ?>">
<?php if ($ivf_agency->Name->Visible) { // Name ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Name"><?php echo $ivf_agency->Name->caption() ?><?php echo ($ivf_agency->Name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="ivf_agency" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_agency->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_agency->Name->EditValue ?>"<?php echo $ivf_agency->Name->editAttributes() ?>>
<?php echo $ivf_agency->Name->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($ivf_agency->Street->Visible) { // Street ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Street"><?php echo $ivf_agency->Street->caption() ?><?php echo ($ivf_agency->Street->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="ivf_agency" data-field="x_Street" name="x_Street" id="x_Street" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_agency->Street->getPlaceHolder()) ?>" value="<?php echo $ivf_agency->Street->EditValue ?>"<?php echo $ivf_agency->Street->editAttributes() ?>>
<?php echo $ivf_agency->Street->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($ivf_agency->Town->Visible) { // Town ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Town"><?php echo $ivf_agency->Town->caption() ?><?php echo ($ivf_agency->Town->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="ivf_agency" data-field="x_Town" name="x_Town" id="x_Town" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_agency->Town->getPlaceHolder()) ?>" value="<?php echo $ivf_agency->Town->EditValue ?>"<?php echo $ivf_agency->Town->editAttributes() ?>>
<?php echo $ivf_agency->Town->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($ivf_agency->State->Visible) { // State ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_State"><?php echo $ivf_agency->State->caption() ?><?php echo ($ivf_agency->State->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="ivf_agency" data-field="x_State" name="x_State" id="x_State" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_agency->State->getPlaceHolder()) ?>" value="<?php echo $ivf_agency->State->EditValue ?>"<?php echo $ivf_agency->State->editAttributes() ?>>
<?php echo $ivf_agency->State->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($ivf_agency->Pin->Visible) { // Pin ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Pin"><?php echo $ivf_agency->Pin->caption() ?><?php echo ($ivf_agency->Pin->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="ivf_agency" data-field="x_Pin" name="x_Pin" id="x_Pin" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_agency->Pin->getPlaceHolder()) ?>" value="<?php echo $ivf_agency->Pin->EditValue ?>"<?php echo $ivf_agency->Pin->editAttributes() ?>>
<?php echo $ivf_agency->Pin->CustomMsg ?></div>
	</div>
<?php } ?>
</form>
<?php
$ivf_agency_addopt->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php
$ivf_agency_addopt->terminate();
?>