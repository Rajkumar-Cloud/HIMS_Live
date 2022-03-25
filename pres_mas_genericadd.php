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
$pres_mas_generic_add = new pres_mas_generic_add();

// Run the page
$pres_mas_generic_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_mas_generic_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fpres_mas_genericadd = currentForm = new ew.Form("fpres_mas_genericadd", "add");

// Validate form
fpres_mas_genericadd.validate = function() {
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
		<?php if ($pres_mas_generic_add->Generic->Required) { ?>
			elm = this.getElements("x" + infix + "_Generic");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_mas_generic->Generic->caption(), $pres_mas_generic->Generic->RequiredErrorMessage)) ?>");
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
fpres_mas_genericadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_mas_genericadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pres_mas_generic_add->showPageHeader(); ?>
<?php
$pres_mas_generic_add->showMessage();
?>
<form name="fpres_mas_genericadd" id="fpres_mas_genericadd" class="<?php echo $pres_mas_generic_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_mas_generic_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_mas_generic_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_mas_generic">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$pres_mas_generic_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($pres_mas_generic->Generic->Visible) { // Generic ?>
	<div id="r_Generic" class="form-group row">
		<label id="elh_pres_mas_generic_Generic" for="x_Generic" class="<?php echo $pres_mas_generic_add->LeftColumnClass ?>"><?php echo $pres_mas_generic->Generic->caption() ?><?php echo ($pres_mas_generic->Generic->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_mas_generic_add->RightColumnClass ?>"><div<?php echo $pres_mas_generic->Generic->cellAttributes() ?>>
<span id="el_pres_mas_generic_Generic">
<input type="text" data-table="pres_mas_generic" data-field="x_Generic" name="x_Generic" id="x_Generic" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pres_mas_generic->Generic->getPlaceHolder()) ?>" value="<?php echo $pres_mas_generic->Generic->EditValue ?>"<?php echo $pres_mas_generic->Generic->editAttributes() ?>>
</span>
<?php echo $pres_mas_generic->Generic->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pres_mas_generic_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pres_mas_generic_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_mas_generic_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pres_mas_generic_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pres_mas_generic_add->terminate();
?>