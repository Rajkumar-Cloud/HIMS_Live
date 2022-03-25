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
$pharmacy_master_genericgrp_add = new pharmacy_master_genericgrp_add();

// Run the page
$pharmacy_master_genericgrp_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_master_genericgrp_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpharmacy_master_genericgrpadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpharmacy_master_genericgrpadd = currentForm = new ew.Form("fpharmacy_master_genericgrpadd", "add");

	// Validate form
	fpharmacy_master_genericgrpadd.validate = function() {
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
			<?php if ($pharmacy_master_genericgrp_add->GENNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_GENNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_master_genericgrp_add->GENNAME->caption(), $pharmacy_master_genericgrp_add->GENNAME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_master_genericgrp_add->CODE->Required) { ?>
				elm = this.getElements("x" + infix + "_CODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_master_genericgrp_add->CODE->caption(), $pharmacy_master_genericgrp_add->CODE->RequiredErrorMessage)) ?>");
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
	fpharmacy_master_genericgrpadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_master_genericgrpadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpharmacy_master_genericgrpadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_master_genericgrp_add->showPageHeader(); ?>
<?php
$pharmacy_master_genericgrp_add->showMessage();
?>
<form name="fpharmacy_master_genericgrpadd" id="fpharmacy_master_genericgrpadd" class="<?php echo $pharmacy_master_genericgrp_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_master_genericgrp">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_master_genericgrp_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($pharmacy_master_genericgrp_add->GENNAME->Visible) { // GENNAME ?>
	<div id="r_GENNAME" class="form-group row">
		<label id="elh_pharmacy_master_genericgrp_GENNAME" for="x_GENNAME" class="<?php echo $pharmacy_master_genericgrp_add->LeftColumnClass ?>"><?php echo $pharmacy_master_genericgrp_add->GENNAME->caption() ?><?php echo $pharmacy_master_genericgrp_add->GENNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_master_genericgrp_add->RightColumnClass ?>"><div <?php echo $pharmacy_master_genericgrp_add->GENNAME->cellAttributes() ?>>
<span id="el_pharmacy_master_genericgrp_GENNAME">
<input type="text" data-table="pharmacy_master_genericgrp" data-field="x_GENNAME" name="x_GENNAME" id="x_GENNAME" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_master_genericgrp_add->GENNAME->getPlaceHolder()) ?>" value="<?php echo $pharmacy_master_genericgrp_add->GENNAME->EditValue ?>"<?php echo $pharmacy_master_genericgrp_add->GENNAME->editAttributes() ?>>
</span>
<?php echo $pharmacy_master_genericgrp_add->GENNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_master_genericgrp_add->CODE->Visible) { // CODE ?>
	<div id="r_CODE" class="form-group row">
		<label id="elh_pharmacy_master_genericgrp_CODE" for="x_CODE" class="<?php echo $pharmacy_master_genericgrp_add->LeftColumnClass ?>"><?php echo $pharmacy_master_genericgrp_add->CODE->caption() ?><?php echo $pharmacy_master_genericgrp_add->CODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_master_genericgrp_add->RightColumnClass ?>"><div <?php echo $pharmacy_master_genericgrp_add->CODE->cellAttributes() ?>>
<span id="el_pharmacy_master_genericgrp_CODE">
<input type="text" data-table="pharmacy_master_genericgrp" data-field="x_CODE" name="x_CODE" id="x_CODE" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($pharmacy_master_genericgrp_add->CODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_master_genericgrp_add->CODE->EditValue ?>"<?php echo $pharmacy_master_genericgrp_add->CODE->editAttributes() ?>>
</span>
<?php echo $pharmacy_master_genericgrp_add->CODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pharmacy_master_genericgrp_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_master_genericgrp_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_master_genericgrp_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pharmacy_master_genericgrp_add->showPageFooter();
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
$pharmacy_master_genericgrp_add->terminate();
?>