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
$hr_jobfunction_edit = new hr_jobfunction_edit();

// Run the page
$hr_jobfunction_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_jobfunction_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fhr_jobfunctionedit = currentForm = new ew.Form("fhr_jobfunctionedit", "edit");

// Validate form
fhr_jobfunctionedit.validate = function() {
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
		<?php if ($hr_jobfunction_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_jobfunction->id->caption(), $hr_jobfunction->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_jobfunction_edit->name->Required) { ?>
			elm = this.getElements("x" + infix + "_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_jobfunction->name->caption(), $hr_jobfunction->name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hr_jobfunction_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hr_jobfunction->HospID->caption(), $hr_jobfunction->HospID->RequiredErrorMessage)) ?>");
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
fhr_jobfunctionedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_jobfunctionedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_jobfunction_edit->showPageHeader(); ?>
<?php
$hr_jobfunction_edit->showMessage();
?>
<form name="fhr_jobfunctionedit" id="fhr_jobfunctionedit" class="<?php echo $hr_jobfunction_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_jobfunction_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_jobfunction_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_jobfunction">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$hr_jobfunction_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($hr_jobfunction->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_hr_jobfunction_id" class="<?php echo $hr_jobfunction_edit->LeftColumnClass ?>"><?php echo $hr_jobfunction->id->caption() ?><?php echo ($hr_jobfunction->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_jobfunction_edit->RightColumnClass ?>"><div<?php echo $hr_jobfunction->id->cellAttributes() ?>>
<span id="el_hr_jobfunction_id">
<span<?php echo $hr_jobfunction->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($hr_jobfunction->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="hr_jobfunction" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($hr_jobfunction->id->CurrentValue) ?>">
<?php echo $hr_jobfunction->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hr_jobfunction->name->Visible) { // name ?>
	<div id="r_name" class="form-group row">
		<label id="elh_hr_jobfunction_name" for="x_name" class="<?php echo $hr_jobfunction_edit->LeftColumnClass ?>"><?php echo $hr_jobfunction->name->caption() ?><?php echo ($hr_jobfunction->name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hr_jobfunction_edit->RightColumnClass ?>"><div<?php echo $hr_jobfunction->name->cellAttributes() ?>>
<span id="el_hr_jobfunction_name">
<input type="text" data-table="hr_jobfunction" data-field="x_name" name="x_name" id="x_name" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($hr_jobfunction->name->getPlaceHolder()) ?>" value="<?php echo $hr_jobfunction->name->EditValue ?>"<?php echo $hr_jobfunction->name->editAttributes() ?>>
</span>
<?php echo $hr_jobfunction->name->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$hr_jobfunction_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $hr_jobfunction_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_jobfunction_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$hr_jobfunction_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_jobfunction_edit->terminate();
?>