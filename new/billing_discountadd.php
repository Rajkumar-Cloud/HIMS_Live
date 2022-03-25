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
$billing_discount_add = new billing_discount_add();

// Run the page
$billing_discount_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$billing_discount_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fbilling_discountadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fbilling_discountadd = currentForm = new ew.Form("fbilling_discountadd", "add");

	// Validate form
	fbilling_discountadd.validate = function() {
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
			<?php if ($billing_discount_add->Particulars->Required) { ?>
				elm = this.getElements("x" + infix + "_Particulars");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_discount_add->Particulars->caption(), $billing_discount_add->Particulars->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_discount_add->Procedure->Required) { ?>
				elm = this.getElements("x" + infix + "_Procedure");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_discount_add->Procedure->caption(), $billing_discount_add->Procedure->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Procedure");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($billing_discount_add->Procedure->errorMessage()) ?>");
			<?php if ($billing_discount_add->Pharmacy->Required) { ?>
				elm = this.getElements("x" + infix + "_Pharmacy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_discount_add->Pharmacy->caption(), $billing_discount_add->Pharmacy->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Pharmacy");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($billing_discount_add->Pharmacy->errorMessage()) ?>");
			<?php if ($billing_discount_add->Investication->Required) { ?>
				elm = this.getElements("x" + infix + "_Investication");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_discount_add->Investication->caption(), $billing_discount_add->Investication->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Investication");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($billing_discount_add->Investication->errorMessage()) ?>");

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
	fbilling_discountadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fbilling_discountadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fbilling_discountadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $billing_discount_add->showPageHeader(); ?>
<?php
$billing_discount_add->showMessage();
?>
<form name="fbilling_discountadd" id="fbilling_discountadd" class="<?php echo $billing_discount_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="billing_discount">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$billing_discount_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($billing_discount_add->Particulars->Visible) { // Particulars ?>
	<div id="r_Particulars" class="form-group row">
		<label id="elh_billing_discount_Particulars" for="x_Particulars" class="<?php echo $billing_discount_add->LeftColumnClass ?>"><?php echo $billing_discount_add->Particulars->caption() ?><?php echo $billing_discount_add->Particulars->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $billing_discount_add->RightColumnClass ?>"><div <?php echo $billing_discount_add->Particulars->cellAttributes() ?>>
<span id="el_billing_discount_Particulars">
<input type="text" data-table="billing_discount" data-field="x_Particulars" name="x_Particulars" id="x_Particulars" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_discount_add->Particulars->getPlaceHolder()) ?>" value="<?php echo $billing_discount_add->Particulars->EditValue ?>"<?php echo $billing_discount_add->Particulars->editAttributes() ?>>
</span>
<?php echo $billing_discount_add->Particulars->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_discount_add->Procedure->Visible) { // Procedure ?>
	<div id="r_Procedure" class="form-group row">
		<label id="elh_billing_discount_Procedure" for="x_Procedure" class="<?php echo $billing_discount_add->LeftColumnClass ?>"><?php echo $billing_discount_add->Procedure->caption() ?><?php echo $billing_discount_add->Procedure->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $billing_discount_add->RightColumnClass ?>"><div <?php echo $billing_discount_add->Procedure->cellAttributes() ?>>
<span id="el_billing_discount_Procedure">
<input type="text" data-table="billing_discount" data-field="x_Procedure" name="x_Procedure" id="x_Procedure" size="30" placeholder="<?php echo HtmlEncode($billing_discount_add->Procedure->getPlaceHolder()) ?>" value="<?php echo $billing_discount_add->Procedure->EditValue ?>"<?php echo $billing_discount_add->Procedure->editAttributes() ?>>
</span>
<?php echo $billing_discount_add->Procedure->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_discount_add->Pharmacy->Visible) { // Pharmacy ?>
	<div id="r_Pharmacy" class="form-group row">
		<label id="elh_billing_discount_Pharmacy" for="x_Pharmacy" class="<?php echo $billing_discount_add->LeftColumnClass ?>"><?php echo $billing_discount_add->Pharmacy->caption() ?><?php echo $billing_discount_add->Pharmacy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $billing_discount_add->RightColumnClass ?>"><div <?php echo $billing_discount_add->Pharmacy->cellAttributes() ?>>
<span id="el_billing_discount_Pharmacy">
<input type="text" data-table="billing_discount" data-field="x_Pharmacy" name="x_Pharmacy" id="x_Pharmacy" size="30" placeholder="<?php echo HtmlEncode($billing_discount_add->Pharmacy->getPlaceHolder()) ?>" value="<?php echo $billing_discount_add->Pharmacy->EditValue ?>"<?php echo $billing_discount_add->Pharmacy->editAttributes() ?>>
</span>
<?php echo $billing_discount_add->Pharmacy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_discount_add->Investication->Visible) { // Investication ?>
	<div id="r_Investication" class="form-group row">
		<label id="elh_billing_discount_Investication" for="x_Investication" class="<?php echo $billing_discount_add->LeftColumnClass ?>"><?php echo $billing_discount_add->Investication->caption() ?><?php echo $billing_discount_add->Investication->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $billing_discount_add->RightColumnClass ?>"><div <?php echo $billing_discount_add->Investication->cellAttributes() ?>>
<span id="el_billing_discount_Investication">
<input type="text" data-table="billing_discount" data-field="x_Investication" name="x_Investication" id="x_Investication" size="30" placeholder="<?php echo HtmlEncode($billing_discount_add->Investication->getPlaceHolder()) ?>" value="<?php echo $billing_discount_add->Investication->EditValue ?>"<?php echo $billing_discount_add->Investication->editAttributes() ?>>
</span>
<?php echo $billing_discount_add->Investication->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$billing_discount_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $billing_discount_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $billing_discount_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$billing_discount_add->showPageFooter();
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
$billing_discount_add->terminate();
?>