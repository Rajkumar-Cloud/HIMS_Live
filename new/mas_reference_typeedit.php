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
$mas_reference_type_edit = new mas_reference_type_edit();

// Run the page
$mas_reference_type_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_reference_type_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmas_reference_typeedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fmas_reference_typeedit = currentForm = new ew.Form("fmas_reference_typeedit", "edit");

	// Validate form
	fmas_reference_typeedit.validate = function() {
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
			<?php if ($mas_reference_type_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_reference_type_edit->id->caption(), $mas_reference_type_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_reference_type_edit->reference->Required) { ?>
				elm = this.getElements("x" + infix + "_reference");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_reference_type_edit->reference->caption(), $mas_reference_type_edit->reference->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_reference_type_edit->ReferMobileNo->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferMobileNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_reference_type_edit->ReferMobileNo->caption(), $mas_reference_type_edit->ReferMobileNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_reference_type_edit->ReferClinicname->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferClinicname");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_reference_type_edit->ReferClinicname->caption(), $mas_reference_type_edit->ReferClinicname->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_reference_type_edit->ReferCity->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferCity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_reference_type_edit->ReferCity->caption(), $mas_reference_type_edit->ReferCity->RequiredErrorMessage)) ?>");
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
	fmas_reference_typeedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmas_reference_typeedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fmas_reference_typeedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $mas_reference_type_edit->showPageHeader(); ?>
<?php
$mas_reference_type_edit->showMessage();
?>
<form name="fmas_reference_typeedit" id="fmas_reference_typeedit" class="<?php echo $mas_reference_type_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_reference_type">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$mas_reference_type_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($mas_reference_type_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_mas_reference_type_id" class="<?php echo $mas_reference_type_edit->LeftColumnClass ?>"><?php echo $mas_reference_type_edit->id->caption() ?><?php echo $mas_reference_type_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_reference_type_edit->RightColumnClass ?>"><div <?php echo $mas_reference_type_edit->id->cellAttributes() ?>>
<span id="el_mas_reference_type_id">
<span<?php echo $mas_reference_type_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($mas_reference_type_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="mas_reference_type" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($mas_reference_type_edit->id->CurrentValue) ?>">
<?php echo $mas_reference_type_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_reference_type_edit->reference->Visible) { // reference ?>
	<div id="r_reference" class="form-group row">
		<label id="elh_mas_reference_type_reference" for="x_reference" class="<?php echo $mas_reference_type_edit->LeftColumnClass ?>"><?php echo $mas_reference_type_edit->reference->caption() ?><?php echo $mas_reference_type_edit->reference->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_reference_type_edit->RightColumnClass ?>"><div <?php echo $mas_reference_type_edit->reference->cellAttributes() ?>>
<span id="el_mas_reference_type_reference">
<input type="text" data-table="mas_reference_type" data-field="x_reference" name="x_reference" id="x_reference" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_reference_type_edit->reference->getPlaceHolder()) ?>" value="<?php echo $mas_reference_type_edit->reference->EditValue ?>"<?php echo $mas_reference_type_edit->reference->editAttributes() ?>>
</span>
<?php echo $mas_reference_type_edit->reference->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_reference_type_edit->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<div id="r_ReferMobileNo" class="form-group row">
		<label id="elh_mas_reference_type_ReferMobileNo" for="x_ReferMobileNo" class="<?php echo $mas_reference_type_edit->LeftColumnClass ?>"><?php echo $mas_reference_type_edit->ReferMobileNo->caption() ?><?php echo $mas_reference_type_edit->ReferMobileNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_reference_type_edit->RightColumnClass ?>"><div <?php echo $mas_reference_type_edit->ReferMobileNo->cellAttributes() ?>>
<span id="el_mas_reference_type_ReferMobileNo">
<input type="text" data-table="mas_reference_type" data-field="x_ReferMobileNo" name="x_ReferMobileNo" id="x_ReferMobileNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_reference_type_edit->ReferMobileNo->getPlaceHolder()) ?>" value="<?php echo $mas_reference_type_edit->ReferMobileNo->EditValue ?>"<?php echo $mas_reference_type_edit->ReferMobileNo->editAttributes() ?>>
</span>
<?php echo $mas_reference_type_edit->ReferMobileNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_reference_type_edit->ReferClinicname->Visible) { // ReferClinicname ?>
	<div id="r_ReferClinicname" class="form-group row">
		<label id="elh_mas_reference_type_ReferClinicname" for="x_ReferClinicname" class="<?php echo $mas_reference_type_edit->LeftColumnClass ?>"><?php echo $mas_reference_type_edit->ReferClinicname->caption() ?><?php echo $mas_reference_type_edit->ReferClinicname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_reference_type_edit->RightColumnClass ?>"><div <?php echo $mas_reference_type_edit->ReferClinicname->cellAttributes() ?>>
<span id="el_mas_reference_type_ReferClinicname">
<input type="text" data-table="mas_reference_type" data-field="x_ReferClinicname" name="x_ReferClinicname" id="x_ReferClinicname" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_reference_type_edit->ReferClinicname->getPlaceHolder()) ?>" value="<?php echo $mas_reference_type_edit->ReferClinicname->EditValue ?>"<?php echo $mas_reference_type_edit->ReferClinicname->editAttributes() ?>>
</span>
<?php echo $mas_reference_type_edit->ReferClinicname->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_reference_type_edit->ReferCity->Visible) { // ReferCity ?>
	<div id="r_ReferCity" class="form-group row">
		<label id="elh_mas_reference_type_ReferCity" for="x_ReferCity" class="<?php echo $mas_reference_type_edit->LeftColumnClass ?>"><?php echo $mas_reference_type_edit->ReferCity->caption() ?><?php echo $mas_reference_type_edit->ReferCity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_reference_type_edit->RightColumnClass ?>"><div <?php echo $mas_reference_type_edit->ReferCity->cellAttributes() ?>>
<span id="el_mas_reference_type_ReferCity">
<input type="text" data-table="mas_reference_type" data-field="x_ReferCity" name="x_ReferCity" id="x_ReferCity" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_reference_type_edit->ReferCity->getPlaceHolder()) ?>" value="<?php echo $mas_reference_type_edit->ReferCity->EditValue ?>"<?php echo $mas_reference_type_edit->ReferCity->editAttributes() ?>>
</span>
<?php echo $mas_reference_type_edit->ReferCity->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$mas_reference_type_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $mas_reference_type_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_reference_type_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$mas_reference_type_edit->showPageFooter();
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
$mas_reference_type_edit->terminate();
?>