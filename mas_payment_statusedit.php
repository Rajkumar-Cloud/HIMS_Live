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
$mas_payment_status_edit = new mas_payment_status_edit();

// Run the page
$mas_payment_status_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_payment_status_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fmas_payment_statusedit = currentForm = new ew.Form("fmas_payment_statusedit", "edit");

// Validate form
fmas_payment_statusedit.validate = function() {
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
		<?php if ($mas_payment_status_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_payment_status->id->caption(), $mas_payment_status->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_payment_status_edit->Status->Required) { ?>
			elm = this.getElements("x" + infix + "_Status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_payment_status->Status->caption(), $mas_payment_status->Status->RequiredErrorMessage)) ?>");
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
fmas_payment_statusedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_payment_statusedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $mas_payment_status_edit->showPageHeader(); ?>
<?php
$mas_payment_status_edit->showMessage();
?>
<form name="fmas_payment_statusedit" id="fmas_payment_statusedit" class="<?php echo $mas_payment_status_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_payment_status_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_payment_status_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_payment_status">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$mas_payment_status_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($mas_payment_status->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_mas_payment_status_id" class="<?php echo $mas_payment_status_edit->LeftColumnClass ?>"><?php echo $mas_payment_status->id->caption() ?><?php echo ($mas_payment_status->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_payment_status_edit->RightColumnClass ?>"><div<?php echo $mas_payment_status->id->cellAttributes() ?>>
<span id="el_mas_payment_status_id">
<span<?php echo $mas_payment_status->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($mas_payment_status->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="mas_payment_status" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($mas_payment_status->id->CurrentValue) ?>">
<?php echo $mas_payment_status->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_payment_status->Status->Visible) { // Status ?>
	<div id="r_Status" class="form-group row">
		<label id="elh_mas_payment_status_Status" for="x_Status" class="<?php echo $mas_payment_status_edit->LeftColumnClass ?>"><?php echo $mas_payment_status->Status->caption() ?><?php echo ($mas_payment_status->Status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_payment_status_edit->RightColumnClass ?>"><div<?php echo $mas_payment_status->Status->cellAttributes() ?>>
<span id="el_mas_payment_status_Status">
<input type="text" data-table="mas_payment_status" data-field="x_Status" name="x_Status" id="x_Status" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_payment_status->Status->getPlaceHolder()) ?>" value="<?php echo $mas_payment_status->Status->EditValue ?>"<?php echo $mas_payment_status->Status->editAttributes() ?>>
</span>
<?php echo $mas_payment_status->Status->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$mas_payment_status_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $mas_payment_status_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_payment_status_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$mas_payment_status_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$mas_payment_status_edit->terminate();
?>