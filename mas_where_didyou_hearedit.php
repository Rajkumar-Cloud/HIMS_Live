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
$mas_where_didyou_hear_edit = new mas_where_didyou_hear_edit();

// Run the page
$mas_where_didyou_hear_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_where_didyou_hear_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fmas_where_didyou_hearedit = currentForm = new ew.Form("fmas_where_didyou_hearedit", "edit");

// Validate form
fmas_where_didyou_hearedit.validate = function() {
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
		<?php if ($mas_where_didyou_hear_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_where_didyou_hear->id->caption(), $mas_where_didyou_hear->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_where_didyou_hear_edit->Job->Required) { ?>
			elm = this.getElements("x" + infix + "_Job");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_where_didyou_hear->Job->caption(), $mas_where_didyou_hear->Job->RequiredErrorMessage)) ?>");
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
fmas_where_didyou_hearedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_where_didyou_hearedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $mas_where_didyou_hear_edit->showPageHeader(); ?>
<?php
$mas_where_didyou_hear_edit->showMessage();
?>
<form name="fmas_where_didyou_hearedit" id="fmas_where_didyou_hearedit" class="<?php echo $mas_where_didyou_hear_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_where_didyou_hear_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_where_didyou_hear_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_where_didyou_hear">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$mas_where_didyou_hear_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($mas_where_didyou_hear->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_mas_where_didyou_hear_id" class="<?php echo $mas_where_didyou_hear_edit->LeftColumnClass ?>"><?php echo $mas_where_didyou_hear->id->caption() ?><?php echo ($mas_where_didyou_hear->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_where_didyou_hear_edit->RightColumnClass ?>"><div<?php echo $mas_where_didyou_hear->id->cellAttributes() ?>>
<span id="el_mas_where_didyou_hear_id">
<span<?php echo $mas_where_didyou_hear->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($mas_where_didyou_hear->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="mas_where_didyou_hear" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($mas_where_didyou_hear->id->CurrentValue) ?>">
<?php echo $mas_where_didyou_hear->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_where_didyou_hear->Job->Visible) { // Job ?>
	<div id="r_Job" class="form-group row">
		<label id="elh_mas_where_didyou_hear_Job" for="x_Job" class="<?php echo $mas_where_didyou_hear_edit->LeftColumnClass ?>"><?php echo $mas_where_didyou_hear->Job->caption() ?><?php echo ($mas_where_didyou_hear->Job->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_where_didyou_hear_edit->RightColumnClass ?>"><div<?php echo $mas_where_didyou_hear->Job->cellAttributes() ?>>
<span id="el_mas_where_didyou_hear_Job">
<input type="text" data-table="mas_where_didyou_hear" data-field="x_Job" name="x_Job" id="x_Job" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_where_didyou_hear->Job->getPlaceHolder()) ?>" value="<?php echo $mas_where_didyou_hear->Job->EditValue ?>"<?php echo $mas_where_didyou_hear->Job->editAttributes() ?>>
</span>
<?php echo $mas_where_didyou_hear->Job->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$mas_where_didyou_hear_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $mas_where_didyou_hear_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_where_didyou_hear_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$mas_where_didyou_hear_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$mas_where_didyou_hear_edit->terminate();
?>