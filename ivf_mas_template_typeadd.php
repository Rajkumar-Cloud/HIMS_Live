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
$ivf_mas_template_type_add = new ivf_mas_template_type_add();

// Run the page
$ivf_mas_template_type_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_mas_template_type_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fivf_mas_template_typeadd = currentForm = new ew.Form("fivf_mas_template_typeadd", "add");

// Validate form
fivf_mas_template_typeadd.validate = function() {
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
		<?php if ($ivf_mas_template_type_add->TemplateName->Required) { ?>
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
fivf_mas_template_typeadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_mas_template_typeadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_mas_template_type_add->showPageHeader(); ?>
<?php
$ivf_mas_template_type_add->showMessage();
?>
<form name="fivf_mas_template_typeadd" id="fivf_mas_template_typeadd" class="<?php echo $ivf_mas_template_type_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_mas_template_type_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_mas_template_type_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_mas_template_type">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_mas_template_type_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($ivf_mas_template_type->TemplateName->Visible) { // TemplateName ?>
	<div id="r_TemplateName" class="form-group row">
		<label id="elh_ivf_mas_template_type_TemplateName" for="x_TemplateName" class="<?php echo $ivf_mas_template_type_add->LeftColumnClass ?>"><?php echo $ivf_mas_template_type->TemplateName->caption() ?><?php echo ($ivf_mas_template_type->TemplateName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_mas_template_type_add->RightColumnClass ?>"><div<?php echo $ivf_mas_template_type->TemplateName->cellAttributes() ?>>
<span id="el_ivf_mas_template_type_TemplateName">
<input type="text" data-table="ivf_mas_template_type" data-field="x_TemplateName" name="x_TemplateName" id="x_TemplateName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_mas_template_type->TemplateName->getPlaceHolder()) ?>" value="<?php echo $ivf_mas_template_type->TemplateName->EditValue ?>"<?php echo $ivf_mas_template_type->TemplateName->editAttributes() ?>>
</span>
<?php echo $ivf_mas_template_type->TemplateName->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$ivf_mas_template_type_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ivf_mas_template_type_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_mas_template_type_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$ivf_mas_template_type_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_mas_template_type_add->terminate();
?>