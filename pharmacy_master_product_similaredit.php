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
$pharmacy_master_product_similar_edit = new pharmacy_master_product_similar_edit();

// Run the page
$pharmacy_master_product_similar_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_master_product_similar_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fpharmacy_master_product_similaredit = currentForm = new ew.Form("fpharmacy_master_product_similaredit", "edit");

// Validate form
fpharmacy_master_product_similaredit.validate = function() {
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
		<?php if ($pharmacy_master_product_similar_edit->PRC->Required) { ?>
			elm = this.getElements("x" + infix + "_PRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_master_product_similar->PRC->caption(), $pharmacy_master_product_similar->PRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_master_product_similar_edit->MAINPRC->Required) { ?>
			elm = this.getElements("x" + infix + "_MAINPRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_master_product_similar->MAINPRC->caption(), $pharmacy_master_product_similar->MAINPRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_master_product_similar_edit->PRTYPE->Required) { ?>
			elm = this.getElements("x" + infix + "_PRTYPE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_master_product_similar->PRTYPE->caption(), $pharmacy_master_product_similar->PRTYPE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_master_product_similar_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_master_product_similar->id->caption(), $pharmacy_master_product_similar->id->RequiredErrorMessage)) ?>");
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
fpharmacy_master_product_similaredit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_master_product_similaredit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_master_product_similar_edit->showPageHeader(); ?>
<?php
$pharmacy_master_product_similar_edit->showMessage();
?>
<form name="fpharmacy_master_product_similaredit" id="fpharmacy_master_product_similaredit" class="<?php echo $pharmacy_master_product_similar_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_master_product_similar_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_master_product_similar_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_master_product_similar">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_master_product_similar_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($pharmacy_master_product_similar->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label id="elh_pharmacy_master_product_similar_PRC" for="x_PRC" class="<?php echo $pharmacy_master_product_similar_edit->LeftColumnClass ?>"><?php echo $pharmacy_master_product_similar->PRC->caption() ?><?php echo ($pharmacy_master_product_similar->PRC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_master_product_similar_edit->RightColumnClass ?>"><div<?php echo $pharmacy_master_product_similar->PRC->cellAttributes() ?>>
<span id="el_pharmacy_master_product_similar_PRC">
<input type="text" data-table="pharmacy_master_product_similar" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_master_product_similar->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_master_product_similar->PRC->EditValue ?>"<?php echo $pharmacy_master_product_similar->PRC->editAttributes() ?>>
</span>
<?php echo $pharmacy_master_product_similar->PRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_master_product_similar->MAINPRC->Visible) { // MAINPRC ?>
	<div id="r_MAINPRC" class="form-group row">
		<label id="elh_pharmacy_master_product_similar_MAINPRC" for="x_MAINPRC" class="<?php echo $pharmacy_master_product_similar_edit->LeftColumnClass ?>"><?php echo $pharmacy_master_product_similar->MAINPRC->caption() ?><?php echo ($pharmacy_master_product_similar->MAINPRC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_master_product_similar_edit->RightColumnClass ?>"><div<?php echo $pharmacy_master_product_similar->MAINPRC->cellAttributes() ?>>
<span id="el_pharmacy_master_product_similar_MAINPRC">
<input type="text" data-table="pharmacy_master_product_similar" data-field="x_MAINPRC" name="x_MAINPRC" id="x_MAINPRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_master_product_similar->MAINPRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_master_product_similar->MAINPRC->EditValue ?>"<?php echo $pharmacy_master_product_similar->MAINPRC->editAttributes() ?>>
</span>
<?php echo $pharmacy_master_product_similar->MAINPRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_master_product_similar->PRTYPE->Visible) { // PRTYPE ?>
	<div id="r_PRTYPE" class="form-group row">
		<label id="elh_pharmacy_master_product_similar_PRTYPE" for="x_PRTYPE" class="<?php echo $pharmacy_master_product_similar_edit->LeftColumnClass ?>"><?php echo $pharmacy_master_product_similar->PRTYPE->caption() ?><?php echo ($pharmacy_master_product_similar->PRTYPE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_master_product_similar_edit->RightColumnClass ?>"><div<?php echo $pharmacy_master_product_similar->PRTYPE->cellAttributes() ?>>
<span id="el_pharmacy_master_product_similar_PRTYPE">
<input type="text" data-table="pharmacy_master_product_similar" data-field="x_PRTYPE" name="x_PRTYPE" id="x_PRTYPE" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_master_product_similar->PRTYPE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_master_product_similar->PRTYPE->EditValue ?>"<?php echo $pharmacy_master_product_similar->PRTYPE->editAttributes() ?>>
</span>
<?php echo $pharmacy_master_product_similar->PRTYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_master_product_similar->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_pharmacy_master_product_similar_id" class="<?php echo $pharmacy_master_product_similar_edit->LeftColumnClass ?>"><?php echo $pharmacy_master_product_similar->id->caption() ?><?php echo ($pharmacy_master_product_similar->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_master_product_similar_edit->RightColumnClass ?>"><div<?php echo $pharmacy_master_product_similar->id->cellAttributes() ?>>
<span id="el_pharmacy_master_product_similar_id">
<span<?php echo $pharmacy_master_product_similar->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_master_product_similar->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_master_product_similar" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($pharmacy_master_product_similar->id->CurrentValue) ?>">
<?php echo $pharmacy_master_product_similar->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pharmacy_master_product_similar_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_master_product_similar_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_master_product_similar_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pharmacy_master_product_similar_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_master_product_similar_edit->terminate();
?>