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
$mas_lab_services_type_edit = new mas_lab_services_type_edit();

// Run the page
$mas_lab_services_type_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_lab_services_type_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fmas_lab_services_typeedit = currentForm = new ew.Form("fmas_lab_services_typeedit", "edit");

// Validate form
fmas_lab_services_typeedit.validate = function() {
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
		<?php if ($mas_lab_services_type_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_lab_services_type->id->caption(), $mas_lab_services_type->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_lab_services_type_edit->name->Required) { ?>
			elm = this.getElements("x" + infix + "_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_lab_services_type->name->caption(), $mas_lab_services_type->name->RequiredErrorMessage)) ?>");
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
fmas_lab_services_typeedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_lab_services_typeedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $mas_lab_services_type_edit->showPageHeader(); ?>
<?php
$mas_lab_services_type_edit->showMessage();
?>
<form name="fmas_lab_services_typeedit" id="fmas_lab_services_typeedit" class="<?php echo $mas_lab_services_type_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_lab_services_type_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_lab_services_type_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_lab_services_type">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$mas_lab_services_type_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($mas_lab_services_type->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_mas_lab_services_type_id" class="<?php echo $mas_lab_services_type_edit->LeftColumnClass ?>"><?php echo $mas_lab_services_type->id->caption() ?><?php echo ($mas_lab_services_type->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_lab_services_type_edit->RightColumnClass ?>"><div<?php echo $mas_lab_services_type->id->cellAttributes() ?>>
<span id="el_mas_lab_services_type_id">
<span<?php echo $mas_lab_services_type->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($mas_lab_services_type->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="mas_lab_services_type" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($mas_lab_services_type->id->CurrentValue) ?>">
<?php echo $mas_lab_services_type->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_lab_services_type->name->Visible) { // name ?>
	<div id="r_name" class="form-group row">
		<label id="elh_mas_lab_services_type_name" for="x_name" class="<?php echo $mas_lab_services_type_edit->LeftColumnClass ?>"><?php echo $mas_lab_services_type->name->caption() ?><?php echo ($mas_lab_services_type->name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_lab_services_type_edit->RightColumnClass ?>"><div<?php echo $mas_lab_services_type->name->cellAttributes() ?>>
<span id="el_mas_lab_services_type_name">
<input type="text" data-table="mas_lab_services_type" data-field="x_name" name="x_name" id="x_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($mas_lab_services_type->name->getPlaceHolder()) ?>" value="<?php echo $mas_lab_services_type->name->EditValue ?>"<?php echo $mas_lab_services_type->name->editAttributes() ?>>
</span>
<?php echo $mas_lab_services_type->name->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$mas_lab_services_type_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $mas_lab_services_type_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_lab_services_type_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$mas_lab_services_type_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$mas_lab_services_type_edit->terminate();
?>