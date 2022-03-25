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
$pres_mas_route_edit = new pres_mas_route_edit();

// Run the page
$pres_mas_route_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_mas_route_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fpres_mas_routeedit = currentForm = new ew.Form("fpres_mas_routeedit", "edit");

// Validate form
fpres_mas_routeedit.validate = function() {
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
		<?php if ($pres_mas_route_edit->ID->Required) { ?>
			elm = this.getElements("x" + infix + "_ID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_mas_route->ID->caption(), $pres_mas_route->ID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_mas_route_edit->_Route->Required) { ?>
			elm = this.getElements("x" + infix + "__Route");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_mas_route->_Route->caption(), $pres_mas_route->_Route->RequiredErrorMessage)) ?>");
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
fpres_mas_routeedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_mas_routeedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pres_mas_route_edit->showPageHeader(); ?>
<?php
$pres_mas_route_edit->showMessage();
?>
<form name="fpres_mas_routeedit" id="fpres_mas_routeedit" class="<?php echo $pres_mas_route_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_mas_route_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_mas_route_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_mas_route">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pres_mas_route_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($pres_mas_route->ID->Visible) { // ID ?>
	<div id="r_ID" class="form-group row">
		<label id="elh_pres_mas_route_ID" class="<?php echo $pres_mas_route_edit->LeftColumnClass ?>"><?php echo $pres_mas_route->ID->caption() ?><?php echo ($pres_mas_route->ID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_mas_route_edit->RightColumnClass ?>"><div<?php echo $pres_mas_route->ID->cellAttributes() ?>>
<span id="el_pres_mas_route_ID">
<span<?php echo $pres_mas_route->ID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pres_mas_route->ID->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="pres_mas_route" data-field="x_ID" name="x_ID" id="x_ID" value="<?php echo HtmlEncode($pres_mas_route->ID->CurrentValue) ?>">
<?php echo $pres_mas_route->ID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_mas_route->_Route->Visible) { // Route ?>
	<div id="r__Route" class="form-group row">
		<label id="elh_pres_mas_route__Route" for="x__Route" class="<?php echo $pres_mas_route_edit->LeftColumnClass ?>"><?php echo $pres_mas_route->_Route->caption() ?><?php echo ($pres_mas_route->_Route->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_mas_route_edit->RightColumnClass ?>"><div<?php echo $pres_mas_route->_Route->cellAttributes() ?>>
<span id="el_pres_mas_route__Route">
<input type="text" data-table="pres_mas_route" data-field="x__Route" name="x__Route" id="x__Route" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pres_mas_route->_Route->getPlaceHolder()) ?>" value="<?php echo $pres_mas_route->_Route->EditValue ?>"<?php echo $pres_mas_route->_Route->editAttributes() ?>>
</span>
<?php echo $pres_mas_route->_Route->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pres_mas_route_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pres_mas_route_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_mas_route_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pres_mas_route_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pres_mas_route_edit->terminate();
?>