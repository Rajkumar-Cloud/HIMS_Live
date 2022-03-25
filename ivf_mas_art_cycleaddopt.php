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
$ivf_mas_art_cycle_addopt = new ivf_mas_art_cycle_addopt();

// Run the page
$ivf_mas_art_cycle_addopt->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_mas_art_cycle_addopt->Page_Render();
?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "addopt";
var fivf_mas_art_cycleaddopt = currentForm = new ew.Form("fivf_mas_art_cycleaddopt", "addopt");

// Validate form
fivf_mas_art_cycleaddopt.validate = function() {
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
		<?php if ($ivf_mas_art_cycle_addopt->ARTCYCLE->Required) { ?>
			elm = this.getElements("x" + infix + "_ARTCYCLE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_mas_art_cycle->ARTCYCLE->caption(), $ivf_mas_art_cycle->ARTCYCLE->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
fivf_mas_art_cycleaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_mas_art_cycleaddopt.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_mas_art_cycle_addopt->showPageHeader(); ?>
<?php
$ivf_mas_art_cycle_addopt->showMessage();
?>
<form name="fivf_mas_art_cycleaddopt" id="fivf_mas_art_cycleaddopt" class="ew-form ew-horizontal" action="<?php echo API_URL ?>" method="post">
<?php //if ($ivf_mas_art_cycle_addopt->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_mas_art_cycle_addopt->Token ?>">
<?php //} ?>
<input type="hidden" name="<?php echo API_ACTION_NAME ?>" id="<?php echo API_ACTION_NAME ?>" value="<?php echo API_ADD_ACTION ?>">
<input type="hidden" name="<?php echo API_OBJECT_NAME ?>" id="<?php echo API_OBJECT_NAME ?>" value="<?php echo $ivf_mas_art_cycle_addopt->TableVar ?>">
<?php if ($ivf_mas_art_cycle->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_ARTCYCLE"><?php echo $ivf_mas_art_cycle->ARTCYCLE->caption() ?><?php echo ($ivf_mas_art_cycle->ARTCYCLE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="ivf_mas_art_cycle" data-field="x_ARTCYCLE" name="x_ARTCYCLE" id="x_ARTCYCLE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_mas_art_cycle->ARTCYCLE->getPlaceHolder()) ?>" value="<?php echo $ivf_mas_art_cycle->ARTCYCLE->EditValue ?>"<?php echo $ivf_mas_art_cycle->ARTCYCLE->editAttributes() ?>>
<?php echo $ivf_mas_art_cycle->ARTCYCLE->CustomMsg ?></div>
	</div>
<?php } ?>
</form>
<?php
$ivf_mas_art_cycle_addopt->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php
$ivf_mas_art_cycle_addopt->terminate();
?>