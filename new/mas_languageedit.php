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
$mas_language_edit = new mas_language_edit();

// Run the page
$mas_language_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_language_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmas_languageedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fmas_languageedit = currentForm = new ew.Form("fmas_languageedit", "edit");

	// Validate form
	fmas_languageedit.validate = function() {
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
			<?php if ($mas_language_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_language_edit->id->caption(), $mas_language_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_language_edit->_Language->Required) { ?>
				elm = this.getElements("x" + infix + "__Language");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_language_edit->_Language->caption(), $mas_language_edit->_Language->RequiredErrorMessage)) ?>");
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
	fmas_languageedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmas_languageedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fmas_languageedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $mas_language_edit->showPageHeader(); ?>
<?php
$mas_language_edit->showMessage();
?>
<form name="fmas_languageedit" id="fmas_languageedit" class="<?php echo $mas_language_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_language">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$mas_language_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($mas_language_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_mas_language_id" class="<?php echo $mas_language_edit->LeftColumnClass ?>"><?php echo $mas_language_edit->id->caption() ?><?php echo $mas_language_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_language_edit->RightColumnClass ?>"><div <?php echo $mas_language_edit->id->cellAttributes() ?>>
<span id="el_mas_language_id">
<span<?php echo $mas_language_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($mas_language_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="mas_language" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($mas_language_edit->id->CurrentValue) ?>">
<?php echo $mas_language_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_language_edit->_Language->Visible) { // Language ?>
	<div id="r__Language" class="form-group row">
		<label id="elh_mas_language__Language" for="x__Language" class="<?php echo $mas_language_edit->LeftColumnClass ?>"><?php echo $mas_language_edit->_Language->caption() ?><?php echo $mas_language_edit->_Language->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_language_edit->RightColumnClass ?>"><div <?php echo $mas_language_edit->_Language->cellAttributes() ?>>
<span id="el_mas_language__Language">
<input type="text" data-table="mas_language" data-field="x__Language" name="x__Language" id="x__Language" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_language_edit->_Language->getPlaceHolder()) ?>" value="<?php echo $mas_language_edit->_Language->EditValue ?>"<?php echo $mas_language_edit->_Language->editAttributes() ?>>
</span>
<?php echo $mas_language_edit->_Language->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$mas_language_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $mas_language_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_language_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$mas_language_edit->showPageFooter();
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
$mas_language_edit->terminate();
?>