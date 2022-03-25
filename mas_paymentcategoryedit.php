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
$mas_paymentcategory_edit = new mas_paymentcategory_edit();

// Run the page
$mas_paymentcategory_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_paymentcategory_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fmas_paymentcategoryedit = currentForm = new ew.Form("fmas_paymentcategoryedit", "edit");

// Validate form
fmas_paymentcategoryedit.validate = function() {
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
		<?php if ($mas_paymentcategory_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_paymentcategory->id->caption(), $mas_paymentcategory->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_paymentcategory_edit->Category->Required) { ?>
			elm = this.getElements("x" + infix + "_Category");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_paymentcategory->Category->caption(), $mas_paymentcategory->Category->RequiredErrorMessage)) ?>");
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
fmas_paymentcategoryedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_paymentcategoryedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $mas_paymentcategory_edit->showPageHeader(); ?>
<?php
$mas_paymentcategory_edit->showMessage();
?>
<form name="fmas_paymentcategoryedit" id="fmas_paymentcategoryedit" class="<?php echo $mas_paymentcategory_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_paymentcategory_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_paymentcategory_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_paymentcategory">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$mas_paymentcategory_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($mas_paymentcategory->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_mas_paymentcategory_id" class="<?php echo $mas_paymentcategory_edit->LeftColumnClass ?>"><?php echo $mas_paymentcategory->id->caption() ?><?php echo ($mas_paymentcategory->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_paymentcategory_edit->RightColumnClass ?>"><div<?php echo $mas_paymentcategory->id->cellAttributes() ?>>
<span id="el_mas_paymentcategory_id">
<span<?php echo $mas_paymentcategory->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($mas_paymentcategory->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="mas_paymentcategory" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($mas_paymentcategory->id->CurrentValue) ?>">
<?php echo $mas_paymentcategory->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_paymentcategory->Category->Visible) { // Category ?>
	<div id="r_Category" class="form-group row">
		<label id="elh_mas_paymentcategory_Category" for="x_Category" class="<?php echo $mas_paymentcategory_edit->LeftColumnClass ?>"><?php echo $mas_paymentcategory->Category->caption() ?><?php echo ($mas_paymentcategory->Category->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_paymentcategory_edit->RightColumnClass ?>"><div<?php echo $mas_paymentcategory->Category->cellAttributes() ?>>
<span id="el_mas_paymentcategory_Category">
<input type="text" data-table="mas_paymentcategory" data-field="x_Category" name="x_Category" id="x_Category" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_paymentcategory->Category->getPlaceHolder()) ?>" value="<?php echo $mas_paymentcategory->Category->EditValue ?>"<?php echo $mas_paymentcategory->Category->editAttributes() ?>>
</span>
<?php echo $mas_paymentcategory->Category->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$mas_paymentcategory_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $mas_paymentcategory_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_paymentcategory_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$mas_paymentcategory_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$mas_paymentcategory_edit->terminate();
?>