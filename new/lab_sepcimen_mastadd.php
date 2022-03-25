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
$lab_sepcimen_mast_add = new lab_sepcimen_mast_add();

// Run the page
$lab_sepcimen_mast_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_sepcimen_mast_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var flab_sepcimen_mastadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	flab_sepcimen_mastadd = currentForm = new ew.Form("flab_sepcimen_mastadd", "add");

	// Validate form
	flab_sepcimen_mastadd.validate = function() {
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
			<?php if ($lab_sepcimen_mast_add->SpecimenCD->Required) { ?>
				elm = this.getElements("x" + infix + "_SpecimenCD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_sepcimen_mast_add->SpecimenCD->caption(), $lab_sepcimen_mast_add->SpecimenCD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_sepcimen_mast_add->SpecimenDesc->Required) { ?>
				elm = this.getElements("x" + infix + "_SpecimenDesc");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_sepcimen_mast_add->SpecimenDesc->caption(), $lab_sepcimen_mast_add->SpecimenDesc->RequiredErrorMessage)) ?>");
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
	flab_sepcimen_mastadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	flab_sepcimen_mastadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("flab_sepcimen_mastadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $lab_sepcimen_mast_add->showPageHeader(); ?>
<?php
$lab_sepcimen_mast_add->showMessage();
?>
<form name="flab_sepcimen_mastadd" id="flab_sepcimen_mastadd" class="<?php echo $lab_sepcimen_mast_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_sepcimen_mast">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$lab_sepcimen_mast_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($lab_sepcimen_mast_add->SpecimenCD->Visible) { // SpecimenCD ?>
	<div id="r_SpecimenCD" class="form-group row">
		<label id="elh_lab_sepcimen_mast_SpecimenCD" for="x_SpecimenCD" class="<?php echo $lab_sepcimen_mast_add->LeftColumnClass ?>"><?php echo $lab_sepcimen_mast_add->SpecimenCD->caption() ?><?php echo $lab_sepcimen_mast_add->SpecimenCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_sepcimen_mast_add->RightColumnClass ?>"><div <?php echo $lab_sepcimen_mast_add->SpecimenCD->cellAttributes() ?>>
<span id="el_lab_sepcimen_mast_SpecimenCD">
<input type="text" data-table="lab_sepcimen_mast" data-field="x_SpecimenCD" name="x_SpecimenCD" id="x_SpecimenCD" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($lab_sepcimen_mast_add->SpecimenCD->getPlaceHolder()) ?>" value="<?php echo $lab_sepcimen_mast_add->SpecimenCD->EditValue ?>"<?php echo $lab_sepcimen_mast_add->SpecimenCD->editAttributes() ?>>
</span>
<?php echo $lab_sepcimen_mast_add->SpecimenCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_sepcimen_mast_add->SpecimenDesc->Visible) { // SpecimenDesc ?>
	<div id="r_SpecimenDesc" class="form-group row">
		<label id="elh_lab_sepcimen_mast_SpecimenDesc" for="x_SpecimenDesc" class="<?php echo $lab_sepcimen_mast_add->LeftColumnClass ?>"><?php echo $lab_sepcimen_mast_add->SpecimenDesc->caption() ?><?php echo $lab_sepcimen_mast_add->SpecimenDesc->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_sepcimen_mast_add->RightColumnClass ?>"><div <?php echo $lab_sepcimen_mast_add->SpecimenDesc->cellAttributes() ?>>
<span id="el_lab_sepcimen_mast_SpecimenDesc">
<input type="text" data-table="lab_sepcimen_mast" data-field="x_SpecimenDesc" name="x_SpecimenDesc" id="x_SpecimenDesc" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($lab_sepcimen_mast_add->SpecimenDesc->getPlaceHolder()) ?>" value="<?php echo $lab_sepcimen_mast_add->SpecimenDesc->EditValue ?>"<?php echo $lab_sepcimen_mast_add->SpecimenDesc->editAttributes() ?>>
</span>
<?php echo $lab_sepcimen_mast_add->SpecimenDesc->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$lab_sepcimen_mast_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $lab_sepcimen_mast_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lab_sepcimen_mast_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$lab_sepcimen_mast_add->showPageFooter();
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
$lab_sepcimen_mast_add->terminate();
?>