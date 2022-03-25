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
$pres_quantity_add = new pres_quantity_add();

// Run the page
$pres_quantity_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_quantity_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpres_quantityadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpres_quantityadd = currentForm = new ew.Form("fpres_quantityadd", "add");

	// Validate form
	fpres_quantityadd.validate = function() {
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
			<?php if ($pres_quantity_add->Quantity->Required) { ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_quantity_add->Quantity->caption(), $pres_quantity_add->Quantity->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_quantity_add->Value->Required) { ?>
				elm = this.getElements("x" + infix + "_Value");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_quantity_add->Value->caption(), $pres_quantity_add->Value->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Value");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pres_quantity_add->Value->errorMessage()) ?>");

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
	fpres_quantityadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpres_quantityadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpres_quantityadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pres_quantity_add->showPageHeader(); ?>
<?php
$pres_quantity_add->showMessage();
?>
<form name="fpres_quantityadd" id="fpres_quantityadd" class="<?php echo $pres_quantity_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_quantity">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$pres_quantity_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($pres_quantity_add->Quantity->Visible) { // Quantity ?>
	<div id="r_Quantity" class="form-group row">
		<label id="elh_pres_quantity_Quantity" for="x_Quantity" class="<?php echo $pres_quantity_add->LeftColumnClass ?>"><?php echo $pres_quantity_add->Quantity->caption() ?><?php echo $pres_quantity_add->Quantity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_quantity_add->RightColumnClass ?>"><div <?php echo $pres_quantity_add->Quantity->cellAttributes() ?>>
<span id="el_pres_quantity_Quantity">
<input type="text" data-table="pres_quantity" data-field="x_Quantity" name="x_Quantity" id="x_Quantity" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_quantity_add->Quantity->getPlaceHolder()) ?>" value="<?php echo $pres_quantity_add->Quantity->EditValue ?>"<?php echo $pres_quantity_add->Quantity->editAttributes() ?>>
</span>
<?php echo $pres_quantity_add->Quantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_quantity_add->Value->Visible) { // Value ?>
	<div id="r_Value" class="form-group row">
		<label id="elh_pres_quantity_Value" for="x_Value" class="<?php echo $pres_quantity_add->LeftColumnClass ?>"><?php echo $pres_quantity_add->Value->caption() ?><?php echo $pres_quantity_add->Value->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_quantity_add->RightColumnClass ?>"><div <?php echo $pres_quantity_add->Value->cellAttributes() ?>>
<span id="el_pres_quantity_Value">
<input type="text" data-table="pres_quantity" data-field="x_Value" name="x_Value" id="x_Value" size="30" placeholder="<?php echo HtmlEncode($pres_quantity_add->Value->getPlaceHolder()) ?>" value="<?php echo $pres_quantity_add->Value->EditValue ?>"<?php echo $pres_quantity_add->Value->editAttributes() ?>>
</span>
<?php echo $pres_quantity_add->Value->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pres_quantity_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pres_quantity_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_quantity_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pres_quantity_add->showPageFooter();
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
$pres_quantity_add->terminate();
?>