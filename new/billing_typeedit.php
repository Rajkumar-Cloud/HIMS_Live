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
$billing_type_edit = new billing_type_edit();

// Run the page
$billing_type_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$billing_type_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fbilling_typeedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fbilling_typeedit = currentForm = new ew.Form("fbilling_typeedit", "edit");

	// Validate form
	fbilling_typeedit.validate = function() {
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
			<?php if ($billing_type_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_type_edit->id->caption(), $billing_type_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_type_edit->Type->Required) { ?>
				elm = this.getElements("x" + infix + "_Type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_type_edit->Type->caption(), $billing_type_edit->Type->RequiredErrorMessage)) ?>");
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
	fbilling_typeedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fbilling_typeedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fbilling_typeedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $billing_type_edit->showPageHeader(); ?>
<?php
$billing_type_edit->showMessage();
?>
<form name="fbilling_typeedit" id="fbilling_typeedit" class="<?php echo $billing_type_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="billing_type">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$billing_type_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($billing_type_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_billing_type_id" class="<?php echo $billing_type_edit->LeftColumnClass ?>"><?php echo $billing_type_edit->id->caption() ?><?php echo $billing_type_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $billing_type_edit->RightColumnClass ?>"><div <?php echo $billing_type_edit->id->cellAttributes() ?>>
<span id="el_billing_type_id">
<span<?php echo $billing_type_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_type_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="billing_type" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($billing_type_edit->id->CurrentValue) ?>">
<?php echo $billing_type_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($billing_type_edit->Type->Visible) { // Type ?>
	<div id="r_Type" class="form-group row">
		<label id="elh_billing_type_Type" for="x_Type" class="<?php echo $billing_type_edit->LeftColumnClass ?>"><?php echo $billing_type_edit->Type->caption() ?><?php echo $billing_type_edit->Type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $billing_type_edit->RightColumnClass ?>"><div <?php echo $billing_type_edit->Type->cellAttributes() ?>>
<span id="el_billing_type_Type">
<input type="text" data-table="billing_type" data-field="x_Type" name="x_Type" id="x_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_type_edit->Type->getPlaceHolder()) ?>" value="<?php echo $billing_type_edit->Type->EditValue ?>"<?php echo $billing_type_edit->Type->editAttributes() ?>>
</span>
<?php echo $billing_type_edit->Type->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$billing_type_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $billing_type_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $billing_type_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$billing_type_edit->showPageFooter();
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
$billing_type_edit->terminate();
?>