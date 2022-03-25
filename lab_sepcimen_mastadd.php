<?php
namespace PHPMaker2019\HIMS;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var flab_sepcimen_mastadd = currentForm = new ew.Form("flab_sepcimen_mastadd", "add");

// Validate form
flab_sepcimen_mastadd.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
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
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_sepcimen_mast->SpecimenCD->caption(), $lab_sepcimen_mast->SpecimenCD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_sepcimen_mast_add->SpecimenDesc->Required) { ?>
			elm = this.getElements("x" + infix + "_SpecimenDesc");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_sepcimen_mast->SpecimenDesc->caption(), $lab_sepcimen_mast->SpecimenDesc->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
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

// Form_CustomValidate event
flab_sepcimen_mastadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_sepcimen_mastadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $lab_sepcimen_mast_add->showPageHeader(); ?>
<?php
$lab_sepcimen_mast_add->showMessage();
?>
<form name="flab_sepcimen_mastadd" id="flab_sepcimen_mastadd" class="<?php echo $lab_sepcimen_mast_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_sepcimen_mast_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_sepcimen_mast_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_sepcimen_mast">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$lab_sepcimen_mast_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($lab_sepcimen_mast->SpecimenCD->Visible) { // SpecimenCD ?>
	<div id="r_SpecimenCD" class="form-group row">
		<label id="elh_lab_sepcimen_mast_SpecimenCD" for="x_SpecimenCD" class="<?php echo $lab_sepcimen_mast_add->LeftColumnClass ?>"><?php echo $lab_sepcimen_mast->SpecimenCD->caption() ?><?php echo ($lab_sepcimen_mast->SpecimenCD->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_sepcimen_mast_add->RightColumnClass ?>"><div<?php echo $lab_sepcimen_mast->SpecimenCD->cellAttributes() ?>>
<span id="el_lab_sepcimen_mast_SpecimenCD">
<input type="text" data-table="lab_sepcimen_mast" data-field="x_SpecimenCD" name="x_SpecimenCD" id="x_SpecimenCD" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($lab_sepcimen_mast->SpecimenCD->getPlaceHolder()) ?>" value="<?php echo $lab_sepcimen_mast->SpecimenCD->EditValue ?>"<?php echo $lab_sepcimen_mast->SpecimenCD->editAttributes() ?>>
</span>
<?php echo $lab_sepcimen_mast->SpecimenCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_sepcimen_mast->SpecimenDesc->Visible) { // SpecimenDesc ?>
	<div id="r_SpecimenDesc" class="form-group row">
		<label id="elh_lab_sepcimen_mast_SpecimenDesc" for="x_SpecimenDesc" class="<?php echo $lab_sepcimen_mast_add->LeftColumnClass ?>"><?php echo $lab_sepcimen_mast->SpecimenDesc->caption() ?><?php echo ($lab_sepcimen_mast->SpecimenDesc->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_sepcimen_mast_add->RightColumnClass ?>"><div<?php echo $lab_sepcimen_mast->SpecimenDesc->cellAttributes() ?>>
<span id="el_lab_sepcimen_mast_SpecimenDesc">
<input type="text" data-table="lab_sepcimen_mast" data-field="x_SpecimenDesc" name="x_SpecimenDesc" id="x_SpecimenDesc" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($lab_sepcimen_mast->SpecimenDesc->getPlaceHolder()) ?>" value="<?php echo $lab_sepcimen_mast->SpecimenDesc->EditValue ?>"<?php echo $lab_sepcimen_mast->SpecimenDesc->editAttributes() ?>>
</span>
<?php echo $lab_sepcimen_mast->SpecimenDesc->CustomMsg ?></div></div>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$lab_sepcimen_mast_add->terminate();
?>