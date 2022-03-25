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
var fivf_mas_art_cycleaddopt, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "addopt";
	fivf_mas_art_cycleaddopt = currentForm = new ew.Form("fivf_mas_art_cycleaddopt", "addopt");

	// Validate form
	fivf_mas_art_cycleaddopt.validate = function() {
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
			<?php if ($ivf_mas_art_cycle_addopt->ARTCYCLE->Required) { ?>
				elm = this.getElements("x" + infix + "_ARTCYCLE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_mas_art_cycle_addopt->ARTCYCLE->caption(), $ivf_mas_art_cycle_addopt->ARTCYCLE->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fivf_mas_art_cycleaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivf_mas_art_cycleaddopt.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fivf_mas_art_cycleaddopt");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_mas_art_cycle_addopt->showPageHeader(); ?>
<?php
$ivf_mas_art_cycle_addopt->showMessage();
?>
<form name="fivf_mas_art_cycleaddopt" id="fivf_mas_art_cycleaddopt" class="ew-form ew-horizontal" action="<?php echo Config("API_URL") ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="<?php echo Config("API_ACTION_NAME") ?>" id="<?php echo Config("API_ACTION_NAME") ?>" value="<?php echo Config("API_ADD_ACTION") ?>">
<input type="hidden" name="<?php echo Config("API_OBJECT_NAME") ?>" id="<?php echo Config("API_OBJECT_NAME") ?>" value="<?php echo $ivf_mas_art_cycle_addopt->TableVar ?>">
<input type="hidden" name="addopt" id="addopt" value="1">
<?php if ($ivf_mas_art_cycle_addopt->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_ARTCYCLE"><?php echo $ivf_mas_art_cycle_addopt->ARTCYCLE->caption() ?><?php echo $ivf_mas_art_cycle_addopt->ARTCYCLE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="ivf_mas_art_cycle" data-field="x_ARTCYCLE" name="x_ARTCYCLE" id="x_ARTCYCLE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_mas_art_cycle_addopt->ARTCYCLE->getPlaceHolder()) ?>" value="<?php echo $ivf_mas_art_cycle_addopt->ARTCYCLE->EditValue ?>"<?php echo $ivf_mas_art_cycle_addopt->ARTCYCLE->editAttributes() ?>>
</div>
	</div>
<?php } ?>
</form>
<?php
$ivf_mas_art_cycle_addopt->showPageFooter();
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
$ivf_mas_art_cycle_addopt->terminate();
?>