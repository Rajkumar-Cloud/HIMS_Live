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
$lab_mas_sampletype_addopt = new lab_mas_sampletype_addopt();

// Run the page
$lab_mas_sampletype_addopt->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_mas_sampletype_addopt->Page_Render();
?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "addopt";
var flab_mas_sampletypeaddopt = currentForm = new ew.Form("flab_mas_sampletypeaddopt", "addopt");

// Validate form
flab_mas_sampletypeaddopt.validate = function() {
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
		<?php if ($lab_mas_sampletype_addopt->CATEGORY->Required) { ?>
			elm = this.getElements("x" + infix + "_CATEGORY");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_mas_sampletype->CATEGORY->caption(), $lab_mas_sampletype->CATEGORY->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
flab_mas_sampletypeaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_mas_sampletypeaddopt.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $lab_mas_sampletype_addopt->showPageHeader(); ?>
<?php
$lab_mas_sampletype_addopt->showMessage();
?>
<form name="flab_mas_sampletypeaddopt" id="flab_mas_sampletypeaddopt" class="ew-form ew-horizontal" action="<?php echo API_URL ?>" method="post">
<?php //if ($lab_mas_sampletype_addopt->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_mas_sampletype_addopt->Token ?>">
<?php //} ?>
<input type="hidden" name="<?php echo API_ACTION_NAME ?>" id="<?php echo API_ACTION_NAME ?>" value="<?php echo API_ADD_ACTION ?>">
<input type="hidden" name="<?php echo API_OBJECT_NAME ?>" id="<?php echo API_OBJECT_NAME ?>" value="<?php echo $lab_mas_sampletype_addopt->TableVar ?>">
<?php if ($lab_mas_sampletype->CATEGORY->Visible) { // CATEGORY ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_CATEGORY"><?php echo $lab_mas_sampletype->CATEGORY->caption() ?><?php echo ($lab_mas_sampletype->CATEGORY->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="lab_mas_sampletype" data-field="x_CATEGORY" name="x_CATEGORY" id="x_CATEGORY" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($lab_mas_sampletype->CATEGORY->getPlaceHolder()) ?>" value="<?php echo $lab_mas_sampletype->CATEGORY->EditValue ?>"<?php echo $lab_mas_sampletype->CATEGORY->editAttributes() ?>>
<?php echo $lab_mas_sampletype->CATEGORY->CustomMsg ?></div>
	</div>
<?php } ?>
</form>
<?php
$lab_mas_sampletype_addopt->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php
$lab_mas_sampletype_addopt->terminate();
?>