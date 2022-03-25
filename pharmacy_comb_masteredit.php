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
$pharmacy_comb_master_edit = new pharmacy_comb_master_edit();

// Run the page
$pharmacy_comb_master_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_comb_master_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fpharmacy_comb_masteredit = currentForm = new ew.Form("fpharmacy_comb_masteredit", "edit");

// Validate form
fpharmacy_comb_masteredit.validate = function() {
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
		<?php if ($pharmacy_comb_master_edit->CODE->Required) { ?>
			elm = this.getElements("x" + infix + "_CODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_comb_master->CODE->caption(), $pharmacy_comb_master->CODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_comb_master_edit->NAME->Required) { ?>
			elm = this.getElements("x" + infix + "_NAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_comb_master->NAME->caption(), $pharmacy_comb_master->NAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_comb_master_edit->GRPCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_GRPCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_comb_master->GRPCODE->caption(), $pharmacy_comb_master->GRPCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_comb_master_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_comb_master->id->caption(), $pharmacy_comb_master->id->RequiredErrorMessage)) ?>");
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
fpharmacy_comb_masteredit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_comb_masteredit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_comb_masteredit.lists["x_GRPCODE"] = <?php echo $pharmacy_comb_master_edit->GRPCODE->Lookup->toClientList() ?>;
fpharmacy_comb_masteredit.lists["x_GRPCODE"].options = <?php echo JsonEncode($pharmacy_comb_master_edit->GRPCODE->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_comb_master_edit->showPageHeader(); ?>
<?php
$pharmacy_comb_master_edit->showMessage();
?>
<form name="fpharmacy_comb_masteredit" id="fpharmacy_comb_masteredit" class="<?php echo $pharmacy_comb_master_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_comb_master_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_comb_master_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_comb_master">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_comb_master_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($pharmacy_comb_master->CODE->Visible) { // CODE ?>
	<div id="r_CODE" class="form-group row">
		<label id="elh_pharmacy_comb_master_CODE" for="x_CODE" class="<?php echo $pharmacy_comb_master_edit->LeftColumnClass ?>"><?php echo $pharmacy_comb_master->CODE->caption() ?><?php echo ($pharmacy_comb_master->CODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_comb_master_edit->RightColumnClass ?>"><div<?php echo $pharmacy_comb_master->CODE->cellAttributes() ?>>
<span id="el_pharmacy_comb_master_CODE">
<input type="text" data-table="pharmacy_comb_master" data-field="x_CODE" name="x_CODE" id="x_CODE" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($pharmacy_comb_master->CODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_comb_master->CODE->EditValue ?>"<?php echo $pharmacy_comb_master->CODE->editAttributes() ?>>
</span>
<?php echo $pharmacy_comb_master->CODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_comb_master->NAME->Visible) { // NAME ?>
	<div id="r_NAME" class="form-group row">
		<label id="elh_pharmacy_comb_master_NAME" for="x_NAME" class="<?php echo $pharmacy_comb_master_edit->LeftColumnClass ?>"><?php echo $pharmacy_comb_master->NAME->caption() ?><?php echo ($pharmacy_comb_master->NAME->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_comb_master_edit->RightColumnClass ?>"><div<?php echo $pharmacy_comb_master->NAME->cellAttributes() ?>>
<span id="el_pharmacy_comb_master_NAME">
<input type="text" data-table="pharmacy_comb_master" data-field="x_NAME" name="x_NAME" id="x_NAME" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_comb_master->NAME->getPlaceHolder()) ?>" value="<?php echo $pharmacy_comb_master->NAME->EditValue ?>"<?php echo $pharmacy_comb_master->NAME->editAttributes() ?>>
</span>
<?php echo $pharmacy_comb_master->NAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_comb_master->GRPCODE->Visible) { // GRPCODE ?>
	<div id="r_GRPCODE" class="form-group row">
		<label id="elh_pharmacy_comb_master_GRPCODE" for="x_GRPCODE" class="<?php echo $pharmacy_comb_master_edit->LeftColumnClass ?>"><?php echo $pharmacy_comb_master->GRPCODE->caption() ?><?php echo ($pharmacy_comb_master->GRPCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_comb_master_edit->RightColumnClass ?>"><div<?php echo $pharmacy_comb_master->GRPCODE->cellAttributes() ?>>
<span id="el_pharmacy_comb_master_GRPCODE">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_GRPCODE"><?php echo strval($pharmacy_comb_master->GRPCODE->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_comb_master->GRPCODE->ViewValue) : $pharmacy_comb_master->GRPCODE->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_comb_master->GRPCODE->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_comb_master->GRPCODE->ReadOnly || $pharmacy_comb_master->GRPCODE->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_GRPCODE',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_comb_master->GRPCODE->Lookup->getParamTag("p_x_GRPCODE") ?>
<input type="hidden" data-table="pharmacy_comb_master" data-field="x_GRPCODE" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_comb_master->GRPCODE->displayValueSeparatorAttribute() ?>" name="x_GRPCODE" id="x_GRPCODE" value="<?php echo $pharmacy_comb_master->GRPCODE->CurrentValue ?>"<?php echo $pharmacy_comb_master->GRPCODE->editAttributes() ?>>
</span>
<?php echo $pharmacy_comb_master->GRPCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_comb_master->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_pharmacy_comb_master_id" class="<?php echo $pharmacy_comb_master_edit->LeftColumnClass ?>"><?php echo $pharmacy_comb_master->id->caption() ?><?php echo ($pharmacy_comb_master->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_comb_master_edit->RightColumnClass ?>"><div<?php echo $pharmacy_comb_master->id->cellAttributes() ?>>
<span id="el_pharmacy_comb_master_id">
<span<?php echo $pharmacy_comb_master->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_comb_master->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_comb_master" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($pharmacy_comb_master->id->CurrentValue) ?>">
<?php echo $pharmacy_comb_master->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pharmacy_comb_master_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_comb_master_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_comb_master_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pharmacy_comb_master_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_comb_master_edit->terminate();
?>