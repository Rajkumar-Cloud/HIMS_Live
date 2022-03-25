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
$pres_mas_unit_add = new pres_mas_unit_add();

// Run the page
$pres_mas_unit_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_mas_unit_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fpres_mas_unitadd = currentForm = new ew.Form("fpres_mas_unitadd", "add");

// Validate form
fpres_mas_unitadd.validate = function() {
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
		<?php if ($pres_mas_unit_add->Units->Required) { ?>
			elm = this.getElements("x" + infix + "_Units");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_mas_unit->Units->caption(), $pres_mas_unit->Units->RequiredErrorMessage)) ?>");
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
fpres_mas_unitadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_mas_unitadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pres_mas_unit_add->showPageHeader(); ?>
<?php
$pres_mas_unit_add->showMessage();
?>
<form name="fpres_mas_unitadd" id="fpres_mas_unitadd" class="<?php echo $pres_mas_unit_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_mas_unit_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_mas_unit_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_mas_unit">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$pres_mas_unit_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($pres_mas_unit->Units->Visible) { // Units ?>
	<div id="r_Units" class="form-group row">
		<label id="elh_pres_mas_unit_Units" for="x_Units" class="<?php echo $pres_mas_unit_add->LeftColumnClass ?>"><?php echo $pres_mas_unit->Units->caption() ?><?php echo ($pres_mas_unit->Units->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_mas_unit_add->RightColumnClass ?>"><div<?php echo $pres_mas_unit->Units->cellAttributes() ?>>
<span id="el_pres_mas_unit_Units">
<input type="text" data-table="pres_mas_unit" data-field="x_Units" name="x_Units" id="x_Units" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pres_mas_unit->Units->getPlaceHolder()) ?>" value="<?php echo $pres_mas_unit->Units->EditValue ?>"<?php echo $pres_mas_unit->Units->editAttributes() ?>>
</span>
<?php echo $pres_mas_unit->Units->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pres_mas_unit_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pres_mas_unit_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_mas_unit_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pres_mas_unit_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pres_mas_unit_add->terminate();
?>