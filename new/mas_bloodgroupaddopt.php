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
$mas_bloodgroup_addopt = new mas_bloodgroup_addopt();

// Run the page
$mas_bloodgroup_addopt->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_bloodgroup_addopt->Page_Render();
?>
<script>
var fmas_bloodgroupaddopt, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "addopt";
	fmas_bloodgroupaddopt = currentForm = new ew.Form("fmas_bloodgroupaddopt", "addopt");

	// Validate form
	fmas_bloodgroupaddopt.validate = function() {
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
			<?php if ($mas_bloodgroup_addopt->BloodGroup->Required) { ?>
				elm = this.getElements("x" + infix + "_BloodGroup");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_bloodgroup_addopt->BloodGroup->caption(), $mas_bloodgroup_addopt->BloodGroup->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fmas_bloodgroupaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmas_bloodgroupaddopt.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fmas_bloodgroupaddopt");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $mas_bloodgroup_addopt->showPageHeader(); ?>
<?php
$mas_bloodgroup_addopt->showMessage();
?>
<form name="fmas_bloodgroupaddopt" id="fmas_bloodgroupaddopt" class="ew-form ew-horizontal" action="<?php echo Config("API_URL") ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="<?php echo Config("API_ACTION_NAME") ?>" id="<?php echo Config("API_ACTION_NAME") ?>" value="<?php echo Config("API_ADD_ACTION") ?>">
<input type="hidden" name="<?php echo Config("API_OBJECT_NAME") ?>" id="<?php echo Config("API_OBJECT_NAME") ?>" value="<?php echo $mas_bloodgroup_addopt->TableVar ?>">
<input type="hidden" name="addopt" id="addopt" value="1">
<?php if ($mas_bloodgroup_addopt->BloodGroup->Visible) { // BloodGroup ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_BloodGroup"><?php echo $mas_bloodgroup_addopt->BloodGroup->caption() ?><?php echo $mas_bloodgroup_addopt->BloodGroup->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="mas_bloodgroup" data-field="x_BloodGroup" name="x_BloodGroup" id="x_BloodGroup" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_bloodgroup_addopt->BloodGroup->getPlaceHolder()) ?>" value="<?php echo $mas_bloodgroup_addopt->BloodGroup->EditValue ?>"<?php echo $mas_bloodgroup_addopt->BloodGroup->editAttributes() ?>>
</div>
	</div>
<?php } ?>
</form>
<?php
$mas_bloodgroup_addopt->showPageFooter();
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
$mas_bloodgroup_addopt->terminate();
?>