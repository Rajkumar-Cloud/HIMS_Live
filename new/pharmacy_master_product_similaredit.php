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
<?php include_once "header.php"; ?>
<script>
var fpharmacy_master_product_similaredit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpharmacy_master_product_similaredit = currentForm = new ew.Form("fpharmacy_master_product_similaredit", "edit");

	// Validate form
	fpharmacy_master_product_similaredit.validate = function() {
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
			<?php if ($pharmacy_master_product_similar_edit->PRC->Required) { ?>
				elm = this.getElements("x" + infix + "_PRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_master_product_similar_edit->PRC->caption(), $pharmacy_master_product_similar_edit->PRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_master_product_similar_edit->MAINPRC->Required) { ?>
				elm = this.getElements("x" + infix + "_MAINPRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_master_product_similar_edit->MAINPRC->caption(), $pharmacy_master_product_similar_edit->MAINPRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_master_product_similar_edit->PRTYPE->Required) { ?>
				elm = this.getElements("x" + infix + "_PRTYPE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_master_product_similar_edit->PRTYPE->caption(), $pharmacy_master_product_similar_edit->PRTYPE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_master_product_similar_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_master_product_similar_edit->id->caption(), $pharmacy_master_product_similar_edit->id->RequiredErrorMessage)) ?>");
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
	fpharmacy_master_product_similaredit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_master_product_similaredit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpharmacy_master_product_similaredit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_master_product_similar_edit->showPageHeader(); ?>
<?php
$pharmacy_master_product_similar_edit->showMessage();
?>
<form name="fpharmacy_master_product_similaredit" id="fpharmacy_master_product_similaredit" class="<?php echo $pharmacy_master_product_similar_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_master_product_similar">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_master_product_similar_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($pharmacy_master_product_similar_edit->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label id="elh_pharmacy_master_product_similar_PRC" for="x_PRC" class="<?php echo $pharmacy_master_product_similar_edit->LeftColumnClass ?>"><?php echo $pharmacy_master_product_similar_edit->PRC->caption() ?><?php echo $pharmacy_master_product_similar_edit->PRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_master_product_similar_edit->RightColumnClass ?>"><div <?php echo $pharmacy_master_product_similar_edit->PRC->cellAttributes() ?>>
<span id="el_pharmacy_master_product_similar_PRC">
<input type="text" data-table="pharmacy_master_product_similar" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_master_product_similar_edit->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_master_product_similar_edit->PRC->EditValue ?>"<?php echo $pharmacy_master_product_similar_edit->PRC->editAttributes() ?>>
</span>
<?php echo $pharmacy_master_product_similar_edit->PRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_master_product_similar_edit->MAINPRC->Visible) { // MAINPRC ?>
	<div id="r_MAINPRC" class="form-group row">
		<label id="elh_pharmacy_master_product_similar_MAINPRC" for="x_MAINPRC" class="<?php echo $pharmacy_master_product_similar_edit->LeftColumnClass ?>"><?php echo $pharmacy_master_product_similar_edit->MAINPRC->caption() ?><?php echo $pharmacy_master_product_similar_edit->MAINPRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_master_product_similar_edit->RightColumnClass ?>"><div <?php echo $pharmacy_master_product_similar_edit->MAINPRC->cellAttributes() ?>>
<span id="el_pharmacy_master_product_similar_MAINPRC">
<input type="text" data-table="pharmacy_master_product_similar" data-field="x_MAINPRC" name="x_MAINPRC" id="x_MAINPRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_master_product_similar_edit->MAINPRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_master_product_similar_edit->MAINPRC->EditValue ?>"<?php echo $pharmacy_master_product_similar_edit->MAINPRC->editAttributes() ?>>
</span>
<?php echo $pharmacy_master_product_similar_edit->MAINPRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_master_product_similar_edit->PRTYPE->Visible) { // PRTYPE ?>
	<div id="r_PRTYPE" class="form-group row">
		<label id="elh_pharmacy_master_product_similar_PRTYPE" for="x_PRTYPE" class="<?php echo $pharmacy_master_product_similar_edit->LeftColumnClass ?>"><?php echo $pharmacy_master_product_similar_edit->PRTYPE->caption() ?><?php echo $pharmacy_master_product_similar_edit->PRTYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_master_product_similar_edit->RightColumnClass ?>"><div <?php echo $pharmacy_master_product_similar_edit->PRTYPE->cellAttributes() ?>>
<span id="el_pharmacy_master_product_similar_PRTYPE">
<input type="text" data-table="pharmacy_master_product_similar" data-field="x_PRTYPE" name="x_PRTYPE" id="x_PRTYPE" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_master_product_similar_edit->PRTYPE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_master_product_similar_edit->PRTYPE->EditValue ?>"<?php echo $pharmacy_master_product_similar_edit->PRTYPE->editAttributes() ?>>
</span>
<?php echo $pharmacy_master_product_similar_edit->PRTYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_master_product_similar_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_pharmacy_master_product_similar_id" class="<?php echo $pharmacy_master_product_similar_edit->LeftColumnClass ?>"><?php echo $pharmacy_master_product_similar_edit->id->caption() ?><?php echo $pharmacy_master_product_similar_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_master_product_similar_edit->RightColumnClass ?>"><div <?php echo $pharmacy_master_product_similar_edit->id->cellAttributes() ?>>
<span id="el_pharmacy_master_product_similar_id">
<span<?php echo $pharmacy_master_product_similar_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_master_product_similar_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_master_product_similar" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($pharmacy_master_product_similar_edit->id->CurrentValue) ?>">
<?php echo $pharmacy_master_product_similar_edit->id->CustomMsg ?></div></div>
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
$pharmacy_master_product_similar_edit->terminate();
?>