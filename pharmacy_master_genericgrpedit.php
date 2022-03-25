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
$pharmacy_master_genericgrp_edit = new pharmacy_master_genericgrp_edit();

// Run the page
$pharmacy_master_genericgrp_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_master_genericgrp_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fpharmacy_master_genericgrpedit = currentForm = new ew.Form("fpharmacy_master_genericgrpedit", "edit");

// Validate form
fpharmacy_master_genericgrpedit.validate = function() {
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
		<?php if ($pharmacy_master_genericgrp_edit->GENNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_GENNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_master_genericgrp->GENNAME->caption(), $pharmacy_master_genericgrp->GENNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_master_genericgrp_edit->CODE->Required) { ?>
			elm = this.getElements("x" + infix + "_CODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_master_genericgrp->CODE->caption(), $pharmacy_master_genericgrp->CODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_master_genericgrp_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_master_genericgrp->id->caption(), $pharmacy_master_genericgrp->id->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
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

// Form_CustomValidate event
fpharmacy_master_genericgrpedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_master_genericgrpedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_master_genericgrp_edit->showPageHeader(); ?>
<?php
$pharmacy_master_genericgrp_edit->showMessage();
?>
<form name="fpharmacy_master_genericgrpedit" id="fpharmacy_master_genericgrpedit" class="<?php echo $pharmacy_master_genericgrp_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_master_genericgrp_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_master_genericgrp_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_master_genericgrp">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_master_genericgrp_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($pharmacy_master_genericgrp->GENNAME->Visible) { // GENNAME ?>
	<div id="r_GENNAME" class="form-group row">
		<label id="elh_pharmacy_master_genericgrp_GENNAME" for="x_GENNAME" class="<?php echo $pharmacy_master_genericgrp_edit->LeftColumnClass ?>"><?php echo $pharmacy_master_genericgrp->GENNAME->caption() ?><?php echo ($pharmacy_master_genericgrp->GENNAME->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_master_genericgrp_edit->RightColumnClass ?>"><div<?php echo $pharmacy_master_genericgrp->GENNAME->cellAttributes() ?>>
<span id="el_pharmacy_master_genericgrp_GENNAME">
<input type="text" data-table="pharmacy_master_genericgrp" data-field="x_GENNAME" name="x_GENNAME" id="x_GENNAME" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_master_genericgrp->GENNAME->getPlaceHolder()) ?>" value="<?php echo $pharmacy_master_genericgrp->GENNAME->EditValue ?>"<?php echo $pharmacy_master_genericgrp->GENNAME->editAttributes() ?>>
</span>
<?php echo $pharmacy_master_genericgrp->GENNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_master_genericgrp->CODE->Visible) { // CODE ?>
	<div id="r_CODE" class="form-group row">
		<label id="elh_pharmacy_master_genericgrp_CODE" for="x_CODE" class="<?php echo $pharmacy_master_genericgrp_edit->LeftColumnClass ?>"><?php echo $pharmacy_master_genericgrp->CODE->caption() ?><?php echo ($pharmacy_master_genericgrp->CODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_master_genericgrp_edit->RightColumnClass ?>"><div<?php echo $pharmacy_master_genericgrp->CODE->cellAttributes() ?>>
<span id="el_pharmacy_master_genericgrp_CODE">
<input type="text" data-table="pharmacy_master_genericgrp" data-field="x_CODE" name="x_CODE" id="x_CODE" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($pharmacy_master_genericgrp->CODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_master_genericgrp->CODE->EditValue ?>"<?php echo $pharmacy_master_genericgrp->CODE->editAttributes() ?>>
</span>
<?php echo $pharmacy_master_genericgrp->CODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_master_genericgrp->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_pharmacy_master_genericgrp_id" class="<?php echo $pharmacy_master_genericgrp_edit->LeftColumnClass ?>"><?php echo $pharmacy_master_genericgrp->id->caption() ?><?php echo ($pharmacy_master_genericgrp->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_master_genericgrp_edit->RightColumnClass ?>"><div<?php echo $pharmacy_master_genericgrp->id->cellAttributes() ?>>
<span id="el_pharmacy_master_genericgrp_id">
<span<?php echo $pharmacy_master_genericgrp->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_master_genericgrp->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_master_genericgrp" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($pharmacy_master_genericgrp->id->CurrentValue) ?>">
<?php echo $pharmacy_master_genericgrp->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pharmacy_master_genericgrp_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_master_genericgrp_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_master_genericgrp_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pharmacy_master_genericgrp_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_master_genericgrp_edit->terminate();
?>