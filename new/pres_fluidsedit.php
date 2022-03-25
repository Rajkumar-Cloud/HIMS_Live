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
$pres_fluids_edit = new pres_fluids_edit();

// Run the page
$pres_fluids_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_fluids_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpres_fluidsedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpres_fluidsedit = currentForm = new ew.Form("fpres_fluidsedit", "edit");

	// Validate form
	fpres_fluidsedit.validate = function() {
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
			<?php if ($pres_fluids_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_fluids_edit->id->caption(), $pres_fluids_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_fluids_edit->FORMS->Required) { ?>
				elm = this.getElements("x" + infix + "_FORMS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_fluids_edit->FORMS->caption(), $pres_fluids_edit->FORMS->RequiredErrorMessage)) ?>");
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
	fpres_fluidsedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpres_fluidsedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpres_fluidsedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pres_fluids_edit->showPageHeader(); ?>
<?php
$pres_fluids_edit->showMessage();
?>
<form name="fpres_fluidsedit" id="fpres_fluidsedit" class="<?php echo $pres_fluids_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_fluids">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pres_fluids_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($pres_fluids_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_pres_fluids_id" class="<?php echo $pres_fluids_edit->LeftColumnClass ?>"><?php echo $pres_fluids_edit->id->caption() ?><?php echo $pres_fluids_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_fluids_edit->RightColumnClass ?>"><div <?php echo $pres_fluids_edit->id->cellAttributes() ?>>
<span id="el_pres_fluids_id">
<span<?php echo $pres_fluids_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pres_fluids_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="pres_fluids" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($pres_fluids_edit->id->CurrentValue) ?>">
<?php echo $pres_fluids_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_fluids_edit->FORMS->Visible) { // FORMS ?>
	<div id="r_FORMS" class="form-group row">
		<label id="elh_pres_fluids_FORMS" for="x_FORMS" class="<?php echo $pres_fluids_edit->LeftColumnClass ?>"><?php echo $pres_fluids_edit->FORMS->caption() ?><?php echo $pres_fluids_edit->FORMS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_fluids_edit->RightColumnClass ?>"><div <?php echo $pres_fluids_edit->FORMS->cellAttributes() ?>>
<span id="el_pres_fluids_FORMS">
<input type="text" data-table="pres_fluids" data-field="x_FORMS" name="x_FORMS" id="x_FORMS" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_fluids_edit->FORMS->getPlaceHolder()) ?>" value="<?php echo $pres_fluids_edit->FORMS->EditValue ?>"<?php echo $pres_fluids_edit->FORMS->editAttributes() ?>>
</span>
<?php echo $pres_fluids_edit->FORMS->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pres_fluids_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pres_fluids_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_fluids_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pres_fluids_edit->showPageFooter();
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
$pres_fluids_edit->terminate();
?>