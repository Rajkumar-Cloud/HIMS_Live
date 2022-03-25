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
$mas_billing_department_addopt = new mas_billing_department_addopt();

// Run the page
$mas_billing_department_addopt->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_billing_department_addopt->Page_Render();
?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "addopt";
var fmas_billing_departmentaddopt = currentForm = new ew.Form("fmas_billing_departmentaddopt", "addopt");

// Validate form
fmas_billing_departmentaddopt.validate = function() {
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
		<?php if ($mas_billing_department_addopt->department->Required) { ?>
			elm = this.getElements("x" + infix + "_department");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_billing_department->department->caption(), $mas_billing_department->department->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
fmas_billing_departmentaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_billing_departmentaddopt.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $mas_billing_department_addopt->showPageHeader(); ?>
<?php
$mas_billing_department_addopt->showMessage();
?>
<form name="fmas_billing_departmentaddopt" id="fmas_billing_departmentaddopt" class="ew-form ew-horizontal" action="<?php echo API_URL ?>" method="post">
<?php //if ($mas_billing_department_addopt->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_billing_department_addopt->Token ?>">
<?php //} ?>
<input type="hidden" name="<?php echo API_ACTION_NAME ?>" id="<?php echo API_ACTION_NAME ?>" value="<?php echo API_ADD_ACTION ?>">
<input type="hidden" name="<?php echo API_OBJECT_NAME ?>" id="<?php echo API_OBJECT_NAME ?>" value="<?php echo $mas_billing_department_addopt->TableVar ?>">
<?php if ($mas_billing_department->department->Visible) { // department ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_department"><?php echo $mas_billing_department->department->caption() ?><?php echo ($mas_billing_department->department->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="mas_billing_department" data-field="x_department" name="x_department" id="x_department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_billing_department->department->getPlaceHolder()) ?>" value="<?php echo $mas_billing_department->department->EditValue ?>"<?php echo $mas_billing_department->department->editAttributes() ?>>
<?php echo $mas_billing_department->department->CustomMsg ?></div>
	</div>
<?php } ?>
</form>
<?php
$mas_billing_department_addopt->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php
$mas_billing_department_addopt->terminate();
?>