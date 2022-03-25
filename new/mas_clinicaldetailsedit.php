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
$mas_clinicaldetails_edit = new mas_clinicaldetails_edit();

// Run the page
$mas_clinicaldetails_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_clinicaldetails_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmas_clinicaldetailsedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fmas_clinicaldetailsedit = currentForm = new ew.Form("fmas_clinicaldetailsedit", "edit");

	// Validate form
	fmas_clinicaldetailsedit.validate = function() {
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
			<?php if ($mas_clinicaldetails_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_clinicaldetails_edit->id->caption(), $mas_clinicaldetails_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_clinicaldetails_edit->ClinicalDetails->Required) { ?>
				elm = this.getElements("x" + infix + "_ClinicalDetails");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_clinicaldetails_edit->ClinicalDetails->caption(), $mas_clinicaldetails_edit->ClinicalDetails->RequiredErrorMessage)) ?>");
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
	fmas_clinicaldetailsedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmas_clinicaldetailsedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fmas_clinicaldetailsedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $mas_clinicaldetails_edit->showPageHeader(); ?>
<?php
$mas_clinicaldetails_edit->showMessage();
?>
<form name="fmas_clinicaldetailsedit" id="fmas_clinicaldetailsedit" class="<?php echo $mas_clinicaldetails_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_clinicaldetails">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$mas_clinicaldetails_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($mas_clinicaldetails_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_mas_clinicaldetails_id" class="<?php echo $mas_clinicaldetails_edit->LeftColumnClass ?>"><?php echo $mas_clinicaldetails_edit->id->caption() ?><?php echo $mas_clinicaldetails_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_clinicaldetails_edit->RightColumnClass ?>"><div <?php echo $mas_clinicaldetails_edit->id->cellAttributes() ?>>
<span id="el_mas_clinicaldetails_id">
<span<?php echo $mas_clinicaldetails_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($mas_clinicaldetails_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="mas_clinicaldetails" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($mas_clinicaldetails_edit->id->CurrentValue) ?>">
<?php echo $mas_clinicaldetails_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_clinicaldetails_edit->ClinicalDetails->Visible) { // ClinicalDetails ?>
	<div id="r_ClinicalDetails" class="form-group row">
		<label id="elh_mas_clinicaldetails_ClinicalDetails" for="x_ClinicalDetails" class="<?php echo $mas_clinicaldetails_edit->LeftColumnClass ?>"><?php echo $mas_clinicaldetails_edit->ClinicalDetails->caption() ?><?php echo $mas_clinicaldetails_edit->ClinicalDetails->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_clinicaldetails_edit->RightColumnClass ?>"><div <?php echo $mas_clinicaldetails_edit->ClinicalDetails->cellAttributes() ?>>
<span id="el_mas_clinicaldetails_ClinicalDetails">
<input type="text" data-table="mas_clinicaldetails" data-field="x_ClinicalDetails" name="x_ClinicalDetails" id="x_ClinicalDetails" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_clinicaldetails_edit->ClinicalDetails->getPlaceHolder()) ?>" value="<?php echo $mas_clinicaldetails_edit->ClinicalDetails->EditValue ?>"<?php echo $mas_clinicaldetails_edit->ClinicalDetails->editAttributes() ?>>
</span>
<?php echo $mas_clinicaldetails_edit->ClinicalDetails->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$mas_clinicaldetails_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $mas_clinicaldetails_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_clinicaldetails_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$mas_clinicaldetails_edit->showPageFooter();
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
$mas_clinicaldetails_edit->terminate();
?>