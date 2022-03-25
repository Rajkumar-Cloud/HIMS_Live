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
$pres_sideeffect_table_edit = new pres_sideeffect_table_edit();

// Run the page
$pres_sideeffect_table_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_sideeffect_table_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fpres_sideeffect_tableedit = currentForm = new ew.Form("fpres_sideeffect_tableedit", "edit");

// Validate form
fpres_sideeffect_tableedit.validate = function() {
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
		<?php if ($pres_sideeffect_table_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_sideeffect_table->id->caption(), $pres_sideeffect_table->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_sideeffect_table_edit->Genericname->Required) { ?>
			elm = this.getElements("x" + infix + "_Genericname");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_sideeffect_table->Genericname->caption(), $pres_sideeffect_table->Genericname->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_sideeffect_table_edit->SideEffects->Required) { ?>
			elm = this.getElements("x" + infix + "_SideEffects");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_sideeffect_table->SideEffects->caption(), $pres_sideeffect_table->SideEffects->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_sideeffect_table_edit->Contraindications->Required) { ?>
			elm = this.getElements("x" + infix + "_Contraindications");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_sideeffect_table->Contraindications->caption(), $pres_sideeffect_table->Contraindications->RequiredErrorMessage)) ?>");
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
fpres_sideeffect_tableedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_sideeffect_tableedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pres_sideeffect_table_edit->showPageHeader(); ?>
<?php
$pres_sideeffect_table_edit->showMessage();
?>
<form name="fpres_sideeffect_tableedit" id="fpres_sideeffect_tableedit" class="<?php echo $pres_sideeffect_table_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_sideeffect_table_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_sideeffect_table_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_sideeffect_table">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pres_sideeffect_table_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($pres_sideeffect_table->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_pres_sideeffect_table_id" class="<?php echo $pres_sideeffect_table_edit->LeftColumnClass ?>"><?php echo $pres_sideeffect_table->id->caption() ?><?php echo ($pres_sideeffect_table->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_sideeffect_table_edit->RightColumnClass ?>"><div<?php echo $pres_sideeffect_table->id->cellAttributes() ?>>
<span id="el_pres_sideeffect_table_id">
<span<?php echo $pres_sideeffect_table->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pres_sideeffect_table->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="pres_sideeffect_table" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($pres_sideeffect_table->id->CurrentValue) ?>">
<?php echo $pres_sideeffect_table->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_sideeffect_table->Genericname->Visible) { // Genericname ?>
	<div id="r_Genericname" class="form-group row">
		<label id="elh_pres_sideeffect_table_Genericname" for="x_Genericname" class="<?php echo $pres_sideeffect_table_edit->LeftColumnClass ?>"><?php echo $pres_sideeffect_table->Genericname->caption() ?><?php echo ($pres_sideeffect_table->Genericname->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_sideeffect_table_edit->RightColumnClass ?>"><div<?php echo $pres_sideeffect_table->Genericname->cellAttributes() ?>>
<span id="el_pres_sideeffect_table_Genericname">
<input type="text" data-table="pres_sideeffect_table" data-field="x_Genericname" name="x_Genericname" id="x_Genericname" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pres_sideeffect_table->Genericname->getPlaceHolder()) ?>" value="<?php echo $pres_sideeffect_table->Genericname->EditValue ?>"<?php echo $pres_sideeffect_table->Genericname->editAttributes() ?>>
</span>
<?php echo $pres_sideeffect_table->Genericname->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_sideeffect_table->SideEffects->Visible) { // SideEffects ?>
	<div id="r_SideEffects" class="form-group row">
		<label id="elh_pres_sideeffect_table_SideEffects" for="x_SideEffects" class="<?php echo $pres_sideeffect_table_edit->LeftColumnClass ?>"><?php echo $pres_sideeffect_table->SideEffects->caption() ?><?php echo ($pres_sideeffect_table->SideEffects->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_sideeffect_table_edit->RightColumnClass ?>"><div<?php echo $pres_sideeffect_table->SideEffects->cellAttributes() ?>>
<span id="el_pres_sideeffect_table_SideEffects">
<input type="text" data-table="pres_sideeffect_table" data-field="x_SideEffects" name="x_SideEffects" id="x_SideEffects" placeholder="<?php echo HtmlEncode($pres_sideeffect_table->SideEffects->getPlaceHolder()) ?>" value="<?php echo $pres_sideeffect_table->SideEffects->EditValue ?>"<?php echo $pres_sideeffect_table->SideEffects->editAttributes() ?>>
</span>
<?php echo $pres_sideeffect_table->SideEffects->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_sideeffect_table->Contraindications->Visible) { // Contraindications ?>
	<div id="r_Contraindications" class="form-group row">
		<label id="elh_pres_sideeffect_table_Contraindications" for="x_Contraindications" class="<?php echo $pres_sideeffect_table_edit->LeftColumnClass ?>"><?php echo $pres_sideeffect_table->Contraindications->caption() ?><?php echo ($pres_sideeffect_table->Contraindications->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_sideeffect_table_edit->RightColumnClass ?>"><div<?php echo $pres_sideeffect_table->Contraindications->cellAttributes() ?>>
<span id="el_pres_sideeffect_table_Contraindications">
<input type="text" data-table="pres_sideeffect_table" data-field="x_Contraindications" name="x_Contraindications" id="x_Contraindications" placeholder="<?php echo HtmlEncode($pres_sideeffect_table->Contraindications->getPlaceHolder()) ?>" value="<?php echo $pres_sideeffect_table->Contraindications->EditValue ?>"<?php echo $pres_sideeffect_table->Contraindications->editAttributes() ?>>
</span>
<?php echo $pres_sideeffect_table->Contraindications->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pres_sideeffect_table_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pres_sideeffect_table_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_sideeffect_table_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pres_sideeffect_table_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pres_sideeffect_table_edit->terminate();
?>