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
$pres_mas_forms_edit = new pres_mas_forms_edit();

// Run the page
$pres_mas_forms_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_mas_forms_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpres_mas_formsedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpres_mas_formsedit = currentForm = new ew.Form("fpres_mas_formsedit", "edit");

	// Validate form
	fpres_mas_formsedit.validate = function() {
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
			<?php if ($pres_mas_forms_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_mas_forms_edit->id->caption(), $pres_mas_forms_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_mas_forms_edit->Forms->Required) { ?>
				elm = this.getElements("x" + infix + "_Forms");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_mas_forms_edit->Forms->caption(), $pres_mas_forms_edit->Forms->RequiredErrorMessage)) ?>");
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
	fpres_mas_formsedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpres_mas_formsedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpres_mas_formsedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pres_mas_forms_edit->showPageHeader(); ?>
<?php
$pres_mas_forms_edit->showMessage();
?>
<form name="fpres_mas_formsedit" id="fpres_mas_formsedit" class="<?php echo $pres_mas_forms_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_mas_forms">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pres_mas_forms_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($pres_mas_forms_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_pres_mas_forms_id" class="<?php echo $pres_mas_forms_edit->LeftColumnClass ?>"><?php echo $pres_mas_forms_edit->id->caption() ?><?php echo $pres_mas_forms_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_mas_forms_edit->RightColumnClass ?>"><div <?php echo $pres_mas_forms_edit->id->cellAttributes() ?>>
<span id="el_pres_mas_forms_id">
<span<?php echo $pres_mas_forms_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pres_mas_forms_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="pres_mas_forms" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($pres_mas_forms_edit->id->CurrentValue) ?>">
<?php echo $pres_mas_forms_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_mas_forms_edit->Forms->Visible) { // Forms ?>
	<div id="r_Forms" class="form-group row">
		<label id="elh_pres_mas_forms_Forms" for="x_Forms" class="<?php echo $pres_mas_forms_edit->LeftColumnClass ?>"><?php echo $pres_mas_forms_edit->Forms->caption() ?><?php echo $pres_mas_forms_edit->Forms->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_mas_forms_edit->RightColumnClass ?>"><div <?php echo $pres_mas_forms_edit->Forms->cellAttributes() ?>>
<span id="el_pres_mas_forms_Forms">
<input type="text" data-table="pres_mas_forms" data-field="x_Forms" name="x_Forms" id="x_Forms" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pres_mas_forms_edit->Forms->getPlaceHolder()) ?>" value="<?php echo $pres_mas_forms_edit->Forms->EditValue ?>"<?php echo $pres_mas_forms_edit->Forms->editAttributes() ?>>
</span>
<?php echo $pres_mas_forms_edit->Forms->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pres_mas_forms_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pres_mas_forms_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_mas_forms_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pres_mas_forms_edit->showPageFooter();
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
$pres_mas_forms_edit->terminate();
?>