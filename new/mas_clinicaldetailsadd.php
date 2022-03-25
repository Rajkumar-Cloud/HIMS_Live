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
$mas_clinicaldetails_add = new mas_clinicaldetails_add();

// Run the page
$mas_clinicaldetails_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_clinicaldetails_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmas_clinicaldetailsadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fmas_clinicaldetailsadd = currentForm = new ew.Form("fmas_clinicaldetailsadd", "add");

	// Validate form
	fmas_clinicaldetailsadd.validate = function() {
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
			<?php if ($mas_clinicaldetails_add->ClinicalDetails->Required) { ?>
				elm = this.getElements("x" + infix + "_ClinicalDetails");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_clinicaldetails_add->ClinicalDetails->caption(), $mas_clinicaldetails_add->ClinicalDetails->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}

		// Process detail forms
		var dfs = $fobj.find("input[name='detailpage']").get();
		for (var i = 0; i < dfs.length; i++) {
			var df = dfs[i], val = df.value;
			if (val && ew.forms[val])
				if (!ew.forms[val].validate())
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fmas_clinicaldetailsadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmas_clinicaldetailsadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fmas_clinicaldetailsadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $mas_clinicaldetails_add->showPageHeader(); ?>
<?php
$mas_clinicaldetails_add->showMessage();
?>
<form name="fmas_clinicaldetailsadd" id="fmas_clinicaldetailsadd" class="<?php echo $mas_clinicaldetails_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_clinicaldetails">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$mas_clinicaldetails_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($mas_clinicaldetails_add->ClinicalDetails->Visible) { // ClinicalDetails ?>
	<div id="r_ClinicalDetails" class="form-group row">
		<label id="elh_mas_clinicaldetails_ClinicalDetails" for="x_ClinicalDetails" class="<?php echo $mas_clinicaldetails_add->LeftColumnClass ?>"><?php echo $mas_clinicaldetails_add->ClinicalDetails->caption() ?><?php echo $mas_clinicaldetails_add->ClinicalDetails->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_clinicaldetails_add->RightColumnClass ?>"><div <?php echo $mas_clinicaldetails_add->ClinicalDetails->cellAttributes() ?>>
<span id="el_mas_clinicaldetails_ClinicalDetails">
<input type="text" data-table="mas_clinicaldetails" data-field="x_ClinicalDetails" name="x_ClinicalDetails" id="x_ClinicalDetails" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_clinicaldetails_add->ClinicalDetails->getPlaceHolder()) ?>" value="<?php echo $mas_clinicaldetails_add->ClinicalDetails->EditValue ?>"<?php echo $mas_clinicaldetails_add->ClinicalDetails->editAttributes() ?>>
</span>
<?php echo $mas_clinicaldetails_add->ClinicalDetails->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$mas_clinicaldetails_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $mas_clinicaldetails_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_clinicaldetails_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$mas_clinicaldetails_add->showPageFooter();
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
<?php include_once "footer.php"; ?>
<?php
$mas_clinicaldetails_add->terminate();
?>