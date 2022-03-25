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
$lab_unit_mast_addopt = new lab_unit_mast_addopt();

// Run the page
$lab_unit_mast_addopt->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_unit_mast_addopt->Page_Render();
?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "addopt";
var flab_unit_mastaddopt = currentForm = new ew.Form("flab_unit_mastaddopt", "addopt");

// Validate form
flab_unit_mastaddopt.validate = function() {
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
		<?php if ($lab_unit_mast_addopt->Code->Required) { ?>
			elm = this.getElements("x" + infix + "_Code");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_unit_mast->Code->caption(), $lab_unit_mast->Code->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_unit_mast_addopt->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_unit_mast->Name->caption(), $lab_unit_mast->Name->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
flab_unit_mastaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_unit_mastaddopt.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $lab_unit_mast_addopt->showPageHeader(); ?>
<?php
$lab_unit_mast_addopt->showMessage();
?>
<form name="flab_unit_mastaddopt" id="flab_unit_mastaddopt" class="ew-form ew-horizontal" action="<?php echo API_URL ?>" method="post">
<?php //if ($lab_unit_mast_addopt->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_unit_mast_addopt->Token ?>">
<?php //} ?>
<input type="hidden" name="<?php echo API_ACTION_NAME ?>" id="<?php echo API_ACTION_NAME ?>" value="<?php echo API_ADD_ACTION ?>">
<input type="hidden" name="<?php echo API_OBJECT_NAME ?>" id="<?php echo API_OBJECT_NAME ?>" value="<?php echo $lab_unit_mast_addopt->TableVar ?>">
<?php if ($lab_unit_mast->Code->Visible) { // Code ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Code"><?php echo $lab_unit_mast->Code->caption() ?><?php echo ($lab_unit_mast->Code->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="lab_unit_mast" data-field="x_Code" name="x_Code" id="x_Code" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_unit_mast->Code->getPlaceHolder()) ?>" value="<?php echo $lab_unit_mast->Code->EditValue ?>"<?php echo $lab_unit_mast->Code->editAttributes() ?>>
<?php echo $lab_unit_mast->Code->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($lab_unit_mast->Name->Visible) { // Name ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Name"><?php echo $lab_unit_mast->Name->caption() ?><?php echo ($lab_unit_mast->Name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="lab_unit_mast" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_unit_mast->Name->getPlaceHolder()) ?>" value="<?php echo $lab_unit_mast->Name->EditValue ?>"<?php echo $lab_unit_mast->Name->editAttributes() ?>>
<?php echo $lab_unit_mast->Name->CustomMsg ?></div>
	</div>
<?php } ?>
</form>
<?php
$lab_unit_mast_addopt->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php
$lab_unit_mast_addopt->terminate();
?>