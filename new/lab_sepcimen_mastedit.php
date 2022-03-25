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
$lab_sepcimen_mast_edit = new lab_sepcimen_mast_edit();

// Run the page
$lab_sepcimen_mast_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_sepcimen_mast_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var flab_sepcimen_mastedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	flab_sepcimen_mastedit = currentForm = new ew.Form("flab_sepcimen_mastedit", "edit");

	// Validate form
	flab_sepcimen_mastedit.validate = function() {
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
			<?php if ($lab_sepcimen_mast_edit->SpecimenCD->Required) { ?>
				elm = this.getElements("x" + infix + "_SpecimenCD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_sepcimen_mast_edit->SpecimenCD->caption(), $lab_sepcimen_mast_edit->SpecimenCD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_sepcimen_mast_edit->SpecimenDesc->Required) { ?>
				elm = this.getElements("x" + infix + "_SpecimenDesc");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_sepcimen_mast_edit->SpecimenDesc->caption(), $lab_sepcimen_mast_edit->SpecimenDesc->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_sepcimen_mast_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_sepcimen_mast_edit->id->caption(), $lab_sepcimen_mast_edit->id->RequiredErrorMessage)) ?>");
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
	flab_sepcimen_mastedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	flab_sepcimen_mastedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("flab_sepcimen_mastedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $lab_sepcimen_mast_edit->showPageHeader(); ?>
<?php
$lab_sepcimen_mast_edit->showMessage();
?>
<form name="flab_sepcimen_mastedit" id="flab_sepcimen_mastedit" class="<?php echo $lab_sepcimen_mast_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_sepcimen_mast">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$lab_sepcimen_mast_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($lab_sepcimen_mast_edit->SpecimenCD->Visible) { // SpecimenCD ?>
	<div id="r_SpecimenCD" class="form-group row">
		<label id="elh_lab_sepcimen_mast_SpecimenCD" for="x_SpecimenCD" class="<?php echo $lab_sepcimen_mast_edit->LeftColumnClass ?>"><?php echo $lab_sepcimen_mast_edit->SpecimenCD->caption() ?><?php echo $lab_sepcimen_mast_edit->SpecimenCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_sepcimen_mast_edit->RightColumnClass ?>"><div <?php echo $lab_sepcimen_mast_edit->SpecimenCD->cellAttributes() ?>>
<span id="el_lab_sepcimen_mast_SpecimenCD">
<input type="text" data-table="lab_sepcimen_mast" data-field="x_SpecimenCD" name="x_SpecimenCD" id="x_SpecimenCD" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($lab_sepcimen_mast_edit->SpecimenCD->getPlaceHolder()) ?>" value="<?php echo $lab_sepcimen_mast_edit->SpecimenCD->EditValue ?>"<?php echo $lab_sepcimen_mast_edit->SpecimenCD->editAttributes() ?>>
</span>
<?php echo $lab_sepcimen_mast_edit->SpecimenCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_sepcimen_mast_edit->SpecimenDesc->Visible) { // SpecimenDesc ?>
	<div id="r_SpecimenDesc" class="form-group row">
		<label id="elh_lab_sepcimen_mast_SpecimenDesc" for="x_SpecimenDesc" class="<?php echo $lab_sepcimen_mast_edit->LeftColumnClass ?>"><?php echo $lab_sepcimen_mast_edit->SpecimenDesc->caption() ?><?php echo $lab_sepcimen_mast_edit->SpecimenDesc->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_sepcimen_mast_edit->RightColumnClass ?>"><div <?php echo $lab_sepcimen_mast_edit->SpecimenDesc->cellAttributes() ?>>
<span id="el_lab_sepcimen_mast_SpecimenDesc">
<input type="text" data-table="lab_sepcimen_mast" data-field="x_SpecimenDesc" name="x_SpecimenDesc" id="x_SpecimenDesc" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($lab_sepcimen_mast_edit->SpecimenDesc->getPlaceHolder()) ?>" value="<?php echo $lab_sepcimen_mast_edit->SpecimenDesc->EditValue ?>"<?php echo $lab_sepcimen_mast_edit->SpecimenDesc->editAttributes() ?>>
</span>
<?php echo $lab_sepcimen_mast_edit->SpecimenDesc->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_sepcimen_mast_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_lab_sepcimen_mast_id" class="<?php echo $lab_sepcimen_mast_edit->LeftColumnClass ?>"><?php echo $lab_sepcimen_mast_edit->id->caption() ?><?php echo $lab_sepcimen_mast_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_sepcimen_mast_edit->RightColumnClass ?>"><div <?php echo $lab_sepcimen_mast_edit->id->cellAttributes() ?>>
<span id="el_lab_sepcimen_mast_id">
<span<?php echo $lab_sepcimen_mast_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($lab_sepcimen_mast_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="lab_sepcimen_mast" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($lab_sepcimen_mast_edit->id->CurrentValue) ?>">
<?php echo $lab_sepcimen_mast_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$lab_sepcimen_mast_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $lab_sepcimen_mast_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lab_sepcimen_mast_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$lab_sepcimen_mast_edit->showPageFooter();
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
$lab_sepcimen_mast_edit->terminate();
?>