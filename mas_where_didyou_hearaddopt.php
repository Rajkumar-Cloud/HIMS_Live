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
$mas_where_didyou_hear_addopt = new mas_where_didyou_hear_addopt();

// Run the page
$mas_where_didyou_hear_addopt->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_where_didyou_hear_addopt->Page_Render();
?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "addopt";
var fmas_where_didyou_hearaddopt = currentForm = new ew.Form("fmas_where_didyou_hearaddopt", "addopt");

// Validate form
fmas_where_didyou_hearaddopt.validate = function() {
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
		<?php if ($mas_where_didyou_hear_addopt->Job->Required) { ?>
			elm = this.getElements("x" + infix + "_Job");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_where_didyou_hear->Job->caption(), $mas_where_didyou_hear->Job->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
fmas_where_didyou_hearaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_where_didyou_hearaddopt.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $mas_where_didyou_hear_addopt->showPageHeader(); ?>
<?php
$mas_where_didyou_hear_addopt->showMessage();
?>
<form name="fmas_where_didyou_hearaddopt" id="fmas_where_didyou_hearaddopt" class="ew-form ew-horizontal" action="<?php echo API_URL ?>" method="post">
<?php //if ($mas_where_didyou_hear_addopt->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_where_didyou_hear_addopt->Token ?>">
<?php //} ?>
<input type="hidden" name="<?php echo API_ACTION_NAME ?>" id="<?php echo API_ACTION_NAME ?>" value="<?php echo API_ADD_ACTION ?>">
<input type="hidden" name="<?php echo API_OBJECT_NAME ?>" id="<?php echo API_OBJECT_NAME ?>" value="<?php echo $mas_where_didyou_hear_addopt->TableVar ?>">
<?php if ($mas_where_didyou_hear->Job->Visible) { // Job ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Job"><?php echo $mas_where_didyou_hear->Job->caption() ?><?php echo ($mas_where_didyou_hear->Job->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="mas_where_didyou_hear" data-field="x_Job" name="x_Job" id="x_Job" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_where_didyou_hear->Job->getPlaceHolder()) ?>" value="<?php echo $mas_where_didyou_hear->Job->EditValue ?>"<?php echo $mas_where_didyou_hear->Job->editAttributes() ?>>
<?php echo $mas_where_didyou_hear->Job->CustomMsg ?></div>
	</div>
<?php } ?>
</form>
<?php
$mas_where_didyou_hear_addopt->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php
$mas_where_didyou_hear_addopt->terminate();
?>