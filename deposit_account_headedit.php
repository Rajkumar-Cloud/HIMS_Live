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
$deposit_account_head_edit = new deposit_account_head_edit();

// Run the page
$deposit_account_head_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$deposit_account_head_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fdeposit_account_headedit = currentForm = new ew.Form("fdeposit_account_headedit", "edit");

// Validate form
fdeposit_account_headedit.validate = function() {
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
		<?php if ($deposit_account_head_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $deposit_account_head->id->caption(), $deposit_account_head->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($deposit_account_head_edit->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $deposit_account_head->Name->caption(), $deposit_account_head->Name->RequiredErrorMessage)) ?>");
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
fdeposit_account_headedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fdeposit_account_headedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $deposit_account_head_edit->showPageHeader(); ?>
<?php
$deposit_account_head_edit->showMessage();
?>
<form name="fdeposit_account_headedit" id="fdeposit_account_headedit" class="<?php echo $deposit_account_head_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($deposit_account_head_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $deposit_account_head_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="deposit_account_head">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$deposit_account_head_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($deposit_account_head->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_deposit_account_head_id" class="<?php echo $deposit_account_head_edit->LeftColumnClass ?>"><?php echo $deposit_account_head->id->caption() ?><?php echo ($deposit_account_head->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $deposit_account_head_edit->RightColumnClass ?>"><div<?php echo $deposit_account_head->id->cellAttributes() ?>>
<span id="el_deposit_account_head_id">
<span<?php echo $deposit_account_head->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($deposit_account_head->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="deposit_account_head" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($deposit_account_head->id->CurrentValue) ?>">
<?php echo $deposit_account_head->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($deposit_account_head->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_deposit_account_head_Name" for="x_Name" class="<?php echo $deposit_account_head_edit->LeftColumnClass ?>"><?php echo $deposit_account_head->Name->caption() ?><?php echo ($deposit_account_head->Name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $deposit_account_head_edit->RightColumnClass ?>"><div<?php echo $deposit_account_head->Name->cellAttributes() ?>>
<span id="el_deposit_account_head_Name">
<input type="text" data-table="deposit_account_head" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($deposit_account_head->Name->getPlaceHolder()) ?>" value="<?php echo $deposit_account_head->Name->EditValue ?>"<?php echo $deposit_account_head->Name->editAttributes() ?>>
</span>
<?php echo $deposit_account_head->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$deposit_account_head_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $deposit_account_head_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $deposit_account_head_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$deposit_account_head_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$deposit_account_head_edit->terminate();
?>