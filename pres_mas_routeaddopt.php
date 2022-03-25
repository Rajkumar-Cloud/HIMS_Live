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
$pres_mas_route_addopt = new pres_mas_route_addopt();

// Run the page
$pres_mas_route_addopt->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_mas_route_addopt->Page_Render();
?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "addopt";
var fpres_mas_routeaddopt = currentForm = new ew.Form("fpres_mas_routeaddopt", "addopt");

// Validate form
fpres_mas_routeaddopt.validate = function() {
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
		<?php if ($pres_mas_route_addopt->_Route->Required) { ?>
			elm = this.getElements("x" + infix + "__Route");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_mas_route->_Route->caption(), $pres_mas_route->_Route->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
fpres_mas_routeaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_mas_routeaddopt.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pres_mas_route_addopt->showPageHeader(); ?>
<?php
$pres_mas_route_addopt->showMessage();
?>
<form name="fpres_mas_routeaddopt" id="fpres_mas_routeaddopt" class="ew-form ew-horizontal" action="<?php echo API_URL ?>" method="post">
<?php //if ($pres_mas_route_addopt->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_mas_route_addopt->Token ?>">
<?php //} ?>
<input type="hidden" name="<?php echo API_ACTION_NAME ?>" id="<?php echo API_ACTION_NAME ?>" value="<?php echo API_ADD_ACTION ?>">
<input type="hidden" name="<?php echo API_OBJECT_NAME ?>" id="<?php echo API_OBJECT_NAME ?>" value="<?php echo $pres_mas_route_addopt->TableVar ?>">
<?php if ($pres_mas_route->_Route->Visible) { // Route ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x__Route"><?php echo $pres_mas_route->_Route->caption() ?><?php echo ($pres_mas_route->_Route->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pres_mas_route" data-field="x__Route" name="x__Route" id="x__Route" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pres_mas_route->_Route->getPlaceHolder()) ?>" value="<?php echo $pres_mas_route->_Route->EditValue ?>"<?php echo $pres_mas_route->_Route->editAttributes() ?>>
<?php echo $pres_mas_route->_Route->CustomMsg ?></div>
	</div>
<?php } ?>
</form>
<?php
$pres_mas_route_addopt->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php
$pres_mas_route_addopt->terminate();
?>