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
$pres_restricteddruglist_edit = new pres_restricteddruglist_edit();

// Run the page
$pres_restricteddruglist_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_restricteddruglist_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpres_restricteddruglistedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpres_restricteddruglistedit = currentForm = new ew.Form("fpres_restricteddruglistedit", "edit");

	// Validate form
	fpres_restricteddruglistedit.validate = function() {
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
			<?php if ($pres_restricteddruglist_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_restricteddruglist_edit->id->caption(), $pres_restricteddruglist_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_restricteddruglist_edit->Genericname->Required) { ?>
				elm = this.getElements("x" + infix + "_Genericname");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_restricteddruglist_edit->Genericname->caption(), $pres_restricteddruglist_edit->Genericname->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_restricteddruglist_edit->RestrictedWarning->Required) { ?>
				elm = this.getElements("x" + infix + "_RestrictedWarning");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_restricteddruglist_edit->RestrictedWarning->caption(), $pres_restricteddruglist_edit->RestrictedWarning->RequiredErrorMessage)) ?>");
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
	fpres_restricteddruglistedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpres_restricteddruglistedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpres_restricteddruglistedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pres_restricteddruglist_edit->showPageHeader(); ?>
<?php
$pres_restricteddruglist_edit->showMessage();
?>
<form name="fpres_restricteddruglistedit" id="fpres_restricteddruglistedit" class="<?php echo $pres_restricteddruglist_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_restricteddruglist">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pres_restricteddruglist_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($pres_restricteddruglist_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_pres_restricteddruglist_id" class="<?php echo $pres_restricteddruglist_edit->LeftColumnClass ?>"><?php echo $pres_restricteddruglist_edit->id->caption() ?><?php echo $pres_restricteddruglist_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_restricteddruglist_edit->RightColumnClass ?>"><div <?php echo $pres_restricteddruglist_edit->id->cellAttributes() ?>>
<span id="el_pres_restricteddruglist_id">
<span<?php echo $pres_restricteddruglist_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pres_restricteddruglist_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="pres_restricteddruglist" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($pres_restricteddruglist_edit->id->CurrentValue) ?>">
<?php echo $pres_restricteddruglist_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_restricteddruglist_edit->Genericname->Visible) { // Genericname ?>
	<div id="r_Genericname" class="form-group row">
		<label id="elh_pres_restricteddruglist_Genericname" for="x_Genericname" class="<?php echo $pres_restricteddruglist_edit->LeftColumnClass ?>"><?php echo $pres_restricteddruglist_edit->Genericname->caption() ?><?php echo $pres_restricteddruglist_edit->Genericname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_restricteddruglist_edit->RightColumnClass ?>"><div <?php echo $pres_restricteddruglist_edit->Genericname->cellAttributes() ?>>
<span id="el_pres_restricteddruglist_Genericname">
<input type="text" data-table="pres_restricteddruglist" data-field="x_Genericname" name="x_Genericname" id="x_Genericname" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_restricteddruglist_edit->Genericname->getPlaceHolder()) ?>" value="<?php echo $pres_restricteddruglist_edit->Genericname->EditValue ?>"<?php echo $pres_restricteddruglist_edit->Genericname->editAttributes() ?>>
</span>
<?php echo $pres_restricteddruglist_edit->Genericname->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_restricteddruglist_edit->RestrictedWarning->Visible) { // RestrictedWarning ?>
	<div id="r_RestrictedWarning" class="form-group row">
		<label id="elh_pres_restricteddruglist_RestrictedWarning" for="x_RestrictedWarning" class="<?php echo $pres_restricteddruglist_edit->LeftColumnClass ?>"><?php echo $pres_restricteddruglist_edit->RestrictedWarning->caption() ?><?php echo $pres_restricteddruglist_edit->RestrictedWarning->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_restricteddruglist_edit->RightColumnClass ?>"><div <?php echo $pres_restricteddruglist_edit->RestrictedWarning->cellAttributes() ?>>
<span id="el_pres_restricteddruglist_RestrictedWarning">
<textarea data-table="pres_restricteddruglist" data-field="x_RestrictedWarning" name="x_RestrictedWarning" id="x_RestrictedWarning" cols="35" rows="4" placeholder="<?php echo HtmlEncode($pres_restricteddruglist_edit->RestrictedWarning->getPlaceHolder()) ?>"<?php echo $pres_restricteddruglist_edit->RestrictedWarning->editAttributes() ?>><?php echo $pres_restricteddruglist_edit->RestrictedWarning->EditValue ?></textarea>
</span>
<?php echo $pres_restricteddruglist_edit->RestrictedWarning->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pres_restricteddruglist_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pres_restricteddruglist_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_restricteddruglist_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pres_restricteddruglist_edit->showPageFooter();
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
$pres_restricteddruglist_edit->terminate();
?>