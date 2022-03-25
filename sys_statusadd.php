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
$sys_status_add = new sys_status_add();

// Run the page
$sys_status_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_status_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fsys_statusadd = currentForm = new ew.Form("fsys_statusadd", "add");

// Validate form
fsys_statusadd.validate = function() {
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
		<?php if ($sys_status_add->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sys_status->Name->caption(), $sys_status->Name->RequiredErrorMessage)) ?>");
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
fsys_statusadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsys_statusadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $sys_status_add->showPageHeader(); ?>
<?php
$sys_status_add->showMessage();
?>
<form name="fsys_statusadd" id="fsys_statusadd" class="<?php echo $sys_status_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sys_status_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sys_status_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_status">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$sys_status_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($sys_status->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_sys_status_Name" for="x_Name" class="<?php echo $sys_status_add->LeftColumnClass ?>"><?php echo $sys_status->Name->caption() ?><?php echo ($sys_status->Name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sys_status_add->RightColumnClass ?>"><div<?php echo $sys_status->Name->cellAttributes() ?>>
<span id="el_sys_status_Name">
<input type="text" data-table="sys_status" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($sys_status->Name->getPlaceHolder()) ?>" value="<?php echo $sys_status->Name->EditValue ?>"<?php echo $sys_status->Name->editAttributes() ?>>
</span>
<?php echo $sys_status->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$sys_status_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $sys_status_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sys_status_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$sys_status_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$sys_status_add->terminate();
?>