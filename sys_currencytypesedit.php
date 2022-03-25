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
$sys_currencytypes_edit = new sys_currencytypes_edit();

// Run the page
$sys_currencytypes_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_currencytypes_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fsys_currencytypesedit = currentForm = new ew.Form("fsys_currencytypesedit", "edit");

// Validate form
fsys_currencytypesedit.validate = function() {
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
		<?php if ($sys_currencytypes_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sys_currencytypes->id->caption(), $sys_currencytypes->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($sys_currencytypes_edit->code->Required) { ?>
			elm = this.getElements("x" + infix + "_code");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sys_currencytypes->code->caption(), $sys_currencytypes->code->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($sys_currencytypes_edit->name->Required) { ?>
			elm = this.getElements("x" + infix + "_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sys_currencytypes->name->caption(), $sys_currencytypes->name->RequiredErrorMessage)) ?>");
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
fsys_currencytypesedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsys_currencytypesedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $sys_currencytypes_edit->showPageHeader(); ?>
<?php
$sys_currencytypes_edit->showMessage();
?>
<form name="fsys_currencytypesedit" id="fsys_currencytypesedit" class="<?php echo $sys_currencytypes_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sys_currencytypes_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sys_currencytypes_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_currencytypes">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$sys_currencytypes_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($sys_currencytypes->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_sys_currencytypes_id" class="<?php echo $sys_currencytypes_edit->LeftColumnClass ?>"><?php echo $sys_currencytypes->id->caption() ?><?php echo ($sys_currencytypes->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sys_currencytypes_edit->RightColumnClass ?>"><div<?php echo $sys_currencytypes->id->cellAttributes() ?>>
<span id="el_sys_currencytypes_id">
<span<?php echo $sys_currencytypes->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($sys_currencytypes->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="sys_currencytypes" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($sys_currencytypes->id->CurrentValue) ?>">
<?php echo $sys_currencytypes->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sys_currencytypes->code->Visible) { // code ?>
	<div id="r_code" class="form-group row">
		<label id="elh_sys_currencytypes_code" for="x_code" class="<?php echo $sys_currencytypes_edit->LeftColumnClass ?>"><?php echo $sys_currencytypes->code->caption() ?><?php echo ($sys_currencytypes->code->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sys_currencytypes_edit->RightColumnClass ?>"><div<?php echo $sys_currencytypes->code->cellAttributes() ?>>
<span id="el_sys_currencytypes_code">
<input type="text" data-table="sys_currencytypes" data-field="x_code" name="x_code" id="x_code" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($sys_currencytypes->code->getPlaceHolder()) ?>" value="<?php echo $sys_currencytypes->code->EditValue ?>"<?php echo $sys_currencytypes->code->editAttributes() ?>>
</span>
<?php echo $sys_currencytypes->code->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sys_currencytypes->name->Visible) { // name ?>
	<div id="r_name" class="form-group row">
		<label id="elh_sys_currencytypes_name" for="x_name" class="<?php echo $sys_currencytypes_edit->LeftColumnClass ?>"><?php echo $sys_currencytypes->name->caption() ?><?php echo ($sys_currencytypes->name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sys_currencytypes_edit->RightColumnClass ?>"><div<?php echo $sys_currencytypes->name->cellAttributes() ?>>
<span id="el_sys_currencytypes_name">
<input type="text" data-table="sys_currencytypes" data-field="x_name" name="x_name" id="x_name" size="30" maxlength="70" placeholder="<?php echo HtmlEncode($sys_currencytypes->name->getPlaceHolder()) ?>" value="<?php echo $sys_currencytypes->name->EditValue ?>"<?php echo $sys_currencytypes->name->editAttributes() ?>>
</span>
<?php echo $sys_currencytypes->name->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$sys_currencytypes_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $sys_currencytypes_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sys_currencytypes_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$sys_currencytypes_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$sys_currencytypes_edit->terminate();
?>