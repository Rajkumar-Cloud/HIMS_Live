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
$ivf_semenan_medication_addopt = new ivf_semenan_medication_addopt();

// Run the page
$ivf_semenan_medication_addopt->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_semenan_medication_addopt->Page_Render();
?>
<script>
var fivf_semenan_medicationaddopt, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "addopt";
	fivf_semenan_medicationaddopt = currentForm = new ew.Form("fivf_semenan_medicationaddopt", "addopt");

	// Validate form
	fivf_semenan_medicationaddopt.validate = function() {
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
			<?php if ($ivf_semenan_medication_addopt->Medication->Required) { ?>
				elm = this.getElements("x" + infix + "_Medication");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenan_medication_addopt->Medication->caption(), $ivf_semenan_medication_addopt->Medication->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fivf_semenan_medicationaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivf_semenan_medicationaddopt.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fivf_semenan_medicationaddopt");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_semenan_medication_addopt->showPageHeader(); ?>
<?php
$ivf_semenan_medication_addopt->showMessage();
?>
<form name="fivf_semenan_medicationaddopt" id="fivf_semenan_medicationaddopt" class="ew-form ew-horizontal" action="<?php echo Config("API_URL") ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="<?php echo Config("API_ACTION_NAME") ?>" id="<?php echo Config("API_ACTION_NAME") ?>" value="<?php echo Config("API_ADD_ACTION") ?>">
<input type="hidden" name="<?php echo Config("API_OBJECT_NAME") ?>" id="<?php echo Config("API_OBJECT_NAME") ?>" value="<?php echo $ivf_semenan_medication_addopt->TableVar ?>">
<input type="hidden" name="addopt" id="addopt" value="1">
<?php if ($ivf_semenan_medication_addopt->Medication->Visible) { // Medication ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Medication"><?php echo $ivf_semenan_medication_addopt->Medication->caption() ?><?php echo $ivf_semenan_medication_addopt->Medication->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="ivf_semenan_medication" data-field="x_Medication" name="x_Medication" id="x_Medication" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenan_medication_addopt->Medication->getPlaceHolder()) ?>" value="<?php echo $ivf_semenan_medication_addopt->Medication->EditValue ?>"<?php echo $ivf_semenan_medication_addopt->Medication->editAttributes() ?>>
</div>
	</div>
<?php } ?>
</form>
<?php
$ivf_semenan_medication_addopt->showPageFooter();
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
$ivf_semenan_medication_addopt->terminate();
?>