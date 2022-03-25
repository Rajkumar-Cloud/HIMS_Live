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
$pres_quantity_edit = new pres_quantity_edit();

// Run the page
$pres_quantity_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_quantity_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpres_quantityedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpres_quantityedit = currentForm = new ew.Form("fpres_quantityedit", "edit");

	// Validate form
	fpres_quantityedit.validate = function() {
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
			<?php if ($pres_quantity_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_quantity_edit->id->caption(), $pres_quantity_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_quantity_edit->Quantity->Required) { ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_quantity_edit->Quantity->caption(), $pres_quantity_edit->Quantity->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_quantity_edit->Value->Required) { ?>
				elm = this.getElements("x" + infix + "_Value");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_quantity_edit->Value->caption(), $pres_quantity_edit->Value->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Value");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pres_quantity_edit->Value->errorMessage()) ?>");

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
	fpres_quantityedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpres_quantityedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpres_quantityedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pres_quantity_edit->showPageHeader(); ?>
<?php
$pres_quantity_edit->showMessage();
?>
<form name="fpres_quantityedit" id="fpres_quantityedit" class="<?php echo $pres_quantity_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_quantity">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pres_quantity_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($pres_quantity_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_pres_quantity_id" class="<?php echo $pres_quantity_edit->LeftColumnClass ?>"><?php echo $pres_quantity_edit->id->caption() ?><?php echo $pres_quantity_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_quantity_edit->RightColumnClass ?>"><div <?php echo $pres_quantity_edit->id->cellAttributes() ?>>
<span id="el_pres_quantity_id">
<span<?php echo $pres_quantity_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pres_quantity_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="pres_quantity" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($pres_quantity_edit->id->CurrentValue) ?>">
<?php echo $pres_quantity_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_quantity_edit->Quantity->Visible) { // Quantity ?>
	<div id="r_Quantity" class="form-group row">
		<label id="elh_pres_quantity_Quantity" for="x_Quantity" class="<?php echo $pres_quantity_edit->LeftColumnClass ?>"><?php echo $pres_quantity_edit->Quantity->caption() ?><?php echo $pres_quantity_edit->Quantity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_quantity_edit->RightColumnClass ?>"><div <?php echo $pres_quantity_edit->Quantity->cellAttributes() ?>>
<span id="el_pres_quantity_Quantity">
<input type="text" data-table="pres_quantity" data-field="x_Quantity" name="x_Quantity" id="x_Quantity" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_quantity_edit->Quantity->getPlaceHolder()) ?>" value="<?php echo $pres_quantity_edit->Quantity->EditValue ?>"<?php echo $pres_quantity_edit->Quantity->editAttributes() ?>>
</span>
<?php echo $pres_quantity_edit->Quantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_quantity_edit->Value->Visible) { // Value ?>
	<div id="r_Value" class="form-group row">
		<label id="elh_pres_quantity_Value" for="x_Value" class="<?php echo $pres_quantity_edit->LeftColumnClass ?>"><?php echo $pres_quantity_edit->Value->caption() ?><?php echo $pres_quantity_edit->Value->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_quantity_edit->RightColumnClass ?>"><div <?php echo $pres_quantity_edit->Value->cellAttributes() ?>>
<span id="el_pres_quantity_Value">
<input type="text" data-table="pres_quantity" data-field="x_Value" name="x_Value" id="x_Value" size="30" placeholder="<?php echo HtmlEncode($pres_quantity_edit->Value->getPlaceHolder()) ?>" value="<?php echo $pres_quantity_edit->Value->EditValue ?>"<?php echo $pres_quantity_edit->Value->editAttributes() ?>>
</span>
<?php echo $pres_quantity_edit->Value->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pres_quantity_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pres_quantity_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_quantity_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pres_quantity_edit->showPageFooter();
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
$pres_quantity_edit->terminate();
?>