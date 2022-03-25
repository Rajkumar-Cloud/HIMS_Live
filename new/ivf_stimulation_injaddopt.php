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
$ivf_stimulation_inj_addopt = new ivf_stimulation_inj_addopt();

// Run the page
$ivf_stimulation_inj_addopt->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_stimulation_inj_addopt->Page_Render();
?>
<script>
var fivf_stimulation_injaddopt, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "addopt";
	fivf_stimulation_injaddopt = currentForm = new ew.Form("fivf_stimulation_injaddopt", "addopt");

	// Validate form
	fivf_stimulation_injaddopt.validate = function() {
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
			<?php if ($ivf_stimulation_inj_addopt->Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_inj_addopt->Name->caption(), $ivf_stimulation_inj_addopt->Name->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fivf_stimulation_injaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivf_stimulation_injaddopt.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fivf_stimulation_injaddopt");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_stimulation_inj_addopt->showPageHeader(); ?>
<?php
$ivf_stimulation_inj_addopt->showMessage();
?>
<form name="fivf_stimulation_injaddopt" id="fivf_stimulation_injaddopt" class="ew-form ew-horizontal" action="<?php echo Config("API_URL") ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="<?php echo Config("API_ACTION_NAME") ?>" id="<?php echo Config("API_ACTION_NAME") ?>" value="<?php echo Config("API_ADD_ACTION") ?>">
<input type="hidden" name="<?php echo Config("API_OBJECT_NAME") ?>" id="<?php echo Config("API_OBJECT_NAME") ?>" value="<?php echo $ivf_stimulation_inj_addopt->TableVar ?>">
<input type="hidden" name="addopt" id="addopt" value="1">
<?php if ($ivf_stimulation_inj_addopt->Name->Visible) { // Name ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Name"><?php echo $ivf_stimulation_inj_addopt->Name->caption() ?><?php echo $ivf_stimulation_inj_addopt->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="ivf_stimulation_inj" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="115" placeholder="<?php echo HtmlEncode($ivf_stimulation_inj_addopt->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_inj_addopt->Name->EditValue ?>"<?php echo $ivf_stimulation_inj_addopt->Name->editAttributes() ?>>
</div>
	</div>
<?php } ?>
</form>
<?php
$ivf_stimulation_inj_addopt->showPageFooter();
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
$ivf_stimulation_inj_addopt->terminate();
?>