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
$hr_benifits_edit = new hr_benifits_edit();

// Run the page
$hr_benifits_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_benifits_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fhr_benifitsedit = currentForm = new ew.Form("fhr_benifitsedit", "edit");

// Validate form
fhr_benifitsedit.validate = function() {
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
		<?php if ($hr_benifits_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_benifits->id->caption(), $hr_benifits->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_benifits_edit->name->Required) { ?>
			elm = this.getElements("x" + infix + "_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_benifits->name->caption(), $hr_benifits->name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_benifits_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_benifits->HospID->caption(), $hr_benifits->HospID->RequiredErrorMessage)) ?>");
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
fhr_benifitsedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_benifitsedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_benifits_edit->showPageHeader(); ?>
<?php
$hr_benifits_edit->showMessage();
?>
<form name="fhr_benifitsedit" id="fhr_benifitsedit" class="<?php echo $hr_benifits_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_benifits_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_benifits_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_benifits">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$hr_benifits_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($hr_benifits->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_hr_benifits_id" class="<?php echo $hr_benifits_edit->LeftColumnClass ?>"><?php echo $hr_benifits->id->caption() ?><?php echo ($hr_benifits->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_benifits_edit->RightColumnClass ?>"><div<?php echo $hr_benifits->id->cellAttributes() ?>>
<span id="el_hr_benifits_id">
<span<?php echo $hr_benifits->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($hr_benifits->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="hr_benifits" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($hr_benifits->id->CurrentValue) ?>">
<?php echo $hr_benifits->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_benifits->name->Visible) { // name ?>
	<div id="r_name" class="form-group row">
		<label id="elh_hr_benifits_name" for="x_name" class="<?php echo $hr_benifits_edit->LeftColumnClass ?>"><?php echo $hr_benifits->name->caption() ?><?php echo ($hr_benifits->name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_benifits_edit->RightColumnClass ?>"><div<?php echo $hr_benifits->name->cellAttributes() ?>>
<span id="el_hr_benifits_name">
<input type="text" data-table="hr_benifits" data-field="x_name" name="x_name" id="x_name" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($hr_benifits->name->getPlaceHolder()) ?>" value="<?php echo $hr_benifits->name->EditValue ?>"<?php echo $hr_benifits->name->editAttributes() ?>>
</span>
<?php echo $hr_benifits->name->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$hr_benifits_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $hr_benifits_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_benifits_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$hr_benifits_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_benifits_edit->terminate();
?>