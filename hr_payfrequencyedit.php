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
$hr_payfrequency_edit = new hr_payfrequency_edit();

// Run the page
$hr_payfrequency_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_payfrequency_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fhr_payfrequencyedit = currentForm = new ew.Form("fhr_payfrequencyedit", "edit");

// Validate form
fhr_payfrequencyedit.validate = function() {
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
		<?php if ($hr_payfrequency_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_payfrequency->id->caption(), $hr_payfrequency->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_payfrequency_edit->name->Required) { ?>
			elm = this.getElements("x" + infix + "_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_payfrequency->name->caption(), $hr_payfrequency->name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_payfrequency_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_payfrequency->HospID->caption(), $hr_payfrequency->HospID->RequiredErrorMessage)) ?>");
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
fhr_payfrequencyedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_payfrequencyedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_payfrequency_edit->showPageHeader(); ?>
<?php
$hr_payfrequency_edit->showMessage();
?>
<form name="fhr_payfrequencyedit" id="fhr_payfrequencyedit" class="<?php echo $hr_payfrequency_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_payfrequency_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_payfrequency_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_payfrequency">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$hr_payfrequency_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($hr_payfrequency->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_hr_payfrequency_id" class="<?php echo $hr_payfrequency_edit->LeftColumnClass ?>"><?php echo $hr_payfrequency->id->caption() ?><?php echo ($hr_payfrequency->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_payfrequency_edit->RightColumnClass ?>"><div<?php echo $hr_payfrequency->id->cellAttributes() ?>>
<span id="el_hr_payfrequency_id">
<span<?php echo $hr_payfrequency->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($hr_payfrequency->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="hr_payfrequency" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($hr_payfrequency->id->CurrentValue) ?>">
<?php echo $hr_payfrequency->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_payfrequency->name->Visible) { // name ?>
	<div id="r_name" class="form-group row">
		<label id="elh_hr_payfrequency_name" for="x_name" class="<?php echo $hr_payfrequency_edit->LeftColumnClass ?>"><?php echo $hr_payfrequency->name->caption() ?><?php echo ($hr_payfrequency->name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_payfrequency_edit->RightColumnClass ?>"><div<?php echo $hr_payfrequency->name->cellAttributes() ?>>
<span id="el_hr_payfrequency_name">
<input type="text" data-table="hr_payfrequency" data-field="x_name" name="x_name" id="x_name" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($hr_payfrequency->name->getPlaceHolder()) ?>" value="<?php echo $hr_payfrequency->name->EditValue ?>"<?php echo $hr_payfrequency->name->editAttributes() ?>>
</span>
<?php echo $hr_payfrequency->name->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$hr_payfrequency_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $hr_payfrequency_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_payfrequency_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$hr_payfrequency_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_payfrequency_edit->terminate();
?>