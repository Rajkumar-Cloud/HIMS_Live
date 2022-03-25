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
$ivf_history_master_add = new ivf_history_master_add();

// Run the page
$ivf_history_master_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_history_master_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fivf_history_masteradd = currentForm = new ew.Form("fivf_history_masteradd", "add");

// Validate form
fivf_history_masteradd.validate = function() {
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
		<?php if ($ivf_history_master_add->History->Required) { ?>
			elm = this.getElements("x" + infix + "_History");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_history_master->History->caption(), $ivf_history_master->History->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_history_master_add->HistoryType->Required) { ?>
			elm = this.getElements("x" + infix + "_HistoryType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_history_master->HistoryType->caption(), $ivf_history_master->HistoryType->RequiredErrorMessage)) ?>");
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
fivf_history_masteradd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_history_masteradd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_history_master_add->showPageHeader(); ?>
<?php
$ivf_history_master_add->showMessage();
?>
<form name="fivf_history_masteradd" id="fivf_history_masteradd" class="<?php echo $ivf_history_master_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_history_master_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_history_master_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_history_master">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_history_master_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($ivf_history_master->History->Visible) { // History ?>
	<div id="r_History" class="form-group row">
		<label id="elh_ivf_history_master_History" for="x_History" class="<?php echo $ivf_history_master_add->LeftColumnClass ?>"><?php echo $ivf_history_master->History->caption() ?><?php echo ($ivf_history_master->History->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_history_master_add->RightColumnClass ?>"><div<?php echo $ivf_history_master->History->cellAttributes() ?>>
<span id="el_ivf_history_master_History">
<input type="text" data-table="ivf_history_master" data-field="x_History" name="x_History" id="x_History" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_history_master->History->getPlaceHolder()) ?>" value="<?php echo $ivf_history_master->History->EditValue ?>"<?php echo $ivf_history_master->History->editAttributes() ?>>
</span>
<?php echo $ivf_history_master->History->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_history_master->HistoryType->Visible) { // HistoryType ?>
	<div id="r_HistoryType" class="form-group row">
		<label id="elh_ivf_history_master_HistoryType" for="x_HistoryType" class="<?php echo $ivf_history_master_add->LeftColumnClass ?>"><?php echo $ivf_history_master->HistoryType->caption() ?><?php echo ($ivf_history_master->HistoryType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_history_master_add->RightColumnClass ?>"><div<?php echo $ivf_history_master->HistoryType->cellAttributes() ?>>
<span id="el_ivf_history_master_HistoryType">
<input type="text" data-table="ivf_history_master" data-field="x_HistoryType" name="x_HistoryType" id="x_HistoryType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_history_master->HistoryType->getPlaceHolder()) ?>" value="<?php echo $ivf_history_master->HistoryType->EditValue ?>"<?php echo $ivf_history_master->HistoryType->editAttributes() ?>>
</span>
<?php echo $ivf_history_master->HistoryType->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$ivf_history_master_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ivf_history_master_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_history_master_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$ivf_history_master_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_history_master_add->terminate();
?>