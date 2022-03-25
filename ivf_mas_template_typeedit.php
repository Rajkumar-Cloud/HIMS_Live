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
$ivf_mas_template_type_edit = new ivf_mas_template_type_edit();

// Run the page
$ivf_mas_template_type_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_mas_template_type_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fivf_mas_template_typeedit = currentForm = new ew.Form("fivf_mas_template_typeedit", "edit");

// Validate form
fivf_mas_template_typeedit.validate = function() {
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
		<?php if ($ivf_mas_template_type_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_mas_template_type->id->caption(), $ivf_mas_template_type->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_mas_template_type_edit->TemplateName->Required) { ?>
			elm = this.getElements("x" + infix + "_TemplateName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_mas_template_type->TemplateName->caption(), $ivf_mas_template_type->TemplateName->RequiredErrorMessage)) ?>");
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
fivf_mas_template_typeedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_mas_template_typeedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_mas_template_type_edit->showPageHeader(); ?>
<?php
$ivf_mas_template_type_edit->showMessage();
?>
<form name="fivf_mas_template_typeedit" id="fivf_mas_template_typeedit" class="<?php echo $ivf_mas_template_type_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_mas_template_type_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_mas_template_type_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_mas_template_type">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_mas_template_type_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($ivf_mas_template_type->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_ivf_mas_template_type_id" class="<?php echo $ivf_mas_template_type_edit->LeftColumnClass ?>"><?php echo $ivf_mas_template_type->id->caption() ?><?php echo ($ivf_mas_template_type->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_mas_template_type_edit->RightColumnClass ?>"><div<?php echo $ivf_mas_template_type->id->cellAttributes() ?>>
<span id="el_ivf_mas_template_type_id">
<span<?php echo $ivf_mas_template_type->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_mas_template_type->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_mas_template_type" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($ivf_mas_template_type->id->CurrentValue) ?>">
<?php echo $ivf_mas_template_type->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_mas_template_type->TemplateName->Visible) { // TemplateName ?>
	<div id="r_TemplateName" class="form-group row">
		<label id="elh_ivf_mas_template_type_TemplateName" for="x_TemplateName" class="<?php echo $ivf_mas_template_type_edit->LeftColumnClass ?>"><?php echo $ivf_mas_template_type->TemplateName->caption() ?><?php echo ($ivf_mas_template_type->TemplateName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_mas_template_type_edit->RightColumnClass ?>"><div<?php echo $ivf_mas_template_type->TemplateName->cellAttributes() ?>>
<span id="el_ivf_mas_template_type_TemplateName">
<input type="text" data-table="ivf_mas_template_type" data-field="x_TemplateName" name="x_TemplateName" id="x_TemplateName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_mas_template_type->TemplateName->getPlaceHolder()) ?>" value="<?php echo $ivf_mas_template_type->TemplateName->EditValue ?>"<?php echo $ivf_mas_template_type->TemplateName->editAttributes() ?>>
</span>
<?php echo $ivf_mas_template_type->TemplateName->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$ivf_mas_template_type_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ivf_mas_template_type_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_mas_template_type_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$ivf_mas_template_type_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_mas_template_type_edit->terminate();
?>