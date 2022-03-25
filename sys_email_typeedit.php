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
$sys_email_type_edit = new sys_email_type_edit();

// Run the page
$sys_email_type_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_email_type_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fsys_email_typeedit = currentForm = new ew.Form("fsys_email_typeedit", "edit");

// Validate form
fsys_email_typeedit.validate = function() {
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
		<?php if ($sys_email_type_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sys_email_type->id->caption(), $sys_email_type->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($sys_email_type_edit->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sys_email_type->Name->caption(), $sys_email_type->Name->RequiredErrorMessage)) ?>");
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
fsys_email_typeedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsys_email_typeedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $sys_email_type_edit->showPageHeader(); ?>
<?php
$sys_email_type_edit->showMessage();
?>
<form name="fsys_email_typeedit" id="fsys_email_typeedit" class="<?php echo $sys_email_type_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sys_email_type_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sys_email_type_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_email_type">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$sys_email_type_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($sys_email_type->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_sys_email_type_id" class="<?php echo $sys_email_type_edit->LeftColumnClass ?>"><?php echo $sys_email_type->id->caption() ?><?php echo ($sys_email_type->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sys_email_type_edit->RightColumnClass ?>"><div<?php echo $sys_email_type->id->cellAttributes() ?>>
<span id="el_sys_email_type_id">
<span<?php echo $sys_email_type->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($sys_email_type->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="sys_email_type" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($sys_email_type->id->CurrentValue) ?>">
<?php echo $sys_email_type->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sys_email_type->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_sys_email_type_Name" for="x_Name" class="<?php echo $sys_email_type_edit->LeftColumnClass ?>"><?php echo $sys_email_type->Name->caption() ?><?php echo ($sys_email_type->Name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sys_email_type_edit->RightColumnClass ?>"><div<?php echo $sys_email_type->Name->cellAttributes() ?>>
<span id="el_sys_email_type_Name">
<input type="text" data-table="sys_email_type" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($sys_email_type->Name->getPlaceHolder()) ?>" value="<?php echo $sys_email_type->Name->EditValue ?>"<?php echo $sys_email_type->Name->editAttributes() ?>>
</span>
<?php echo $sys_email_type->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$sys_email_type_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $sys_email_type_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sys_email_type_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$sys_email_type_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$sys_email_type_edit->terminate();
?>