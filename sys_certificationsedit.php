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
$sys_certifications_edit = new sys_certifications_edit();

// Run the page
$sys_certifications_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_certifications_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fsys_certificationsedit = currentForm = new ew.Form("fsys_certificationsedit", "edit");

// Validate form
fsys_certificationsedit.validate = function() {
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
		<?php if ($sys_certifications_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sys_certifications->id->caption(), $sys_certifications->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($sys_certifications_edit->name->Required) { ?>
			elm = this.getElements("x" + infix + "_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sys_certifications->name->caption(), $sys_certifications->name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($sys_certifications_edit->description->Required) { ?>
			elm = this.getElements("x" + infix + "_description");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sys_certifications->description->caption(), $sys_certifications->description->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($sys_certifications_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sys_certifications->HospID->caption(), $sys_certifications->HospID->RequiredErrorMessage)) ?>");
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
fsys_certificationsedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsys_certificationsedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $sys_certifications_edit->showPageHeader(); ?>
<?php
$sys_certifications_edit->showMessage();
?>
<form name="fsys_certificationsedit" id="fsys_certificationsedit" class="<?php echo $sys_certifications_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sys_certifications_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sys_certifications_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_certifications">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$sys_certifications_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($sys_certifications->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_sys_certifications_id" class="<?php echo $sys_certifications_edit->LeftColumnClass ?>"><?php echo $sys_certifications->id->caption() ?><?php echo ($sys_certifications->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sys_certifications_edit->RightColumnClass ?>"><div<?php echo $sys_certifications->id->cellAttributes() ?>>
<span id="el_sys_certifications_id">
<span<?php echo $sys_certifications->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($sys_certifications->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="sys_certifications" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($sys_certifications->id->CurrentValue) ?>">
<?php echo $sys_certifications->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sys_certifications->name->Visible) { // name ?>
	<div id="r_name" class="form-group row">
		<label id="elh_sys_certifications_name" for="x_name" class="<?php echo $sys_certifications_edit->LeftColumnClass ?>"><?php echo $sys_certifications->name->caption() ?><?php echo ($sys_certifications->name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sys_certifications_edit->RightColumnClass ?>"><div<?php echo $sys_certifications->name->cellAttributes() ?>>
<span id="el_sys_certifications_name">
<input type="text" data-table="sys_certifications" data-field="x_name" name="x_name" id="x_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($sys_certifications->name->getPlaceHolder()) ?>" value="<?php echo $sys_certifications->name->EditValue ?>"<?php echo $sys_certifications->name->editAttributes() ?>>
</span>
<?php echo $sys_certifications->name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sys_certifications->description->Visible) { // description ?>
	<div id="r_description" class="form-group row">
		<label id="elh_sys_certifications_description" for="x_description" class="<?php echo $sys_certifications_edit->LeftColumnClass ?>"><?php echo $sys_certifications->description->caption() ?><?php echo ($sys_certifications->description->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sys_certifications_edit->RightColumnClass ?>"><div<?php echo $sys_certifications->description->cellAttributes() ?>>
<span id="el_sys_certifications_description">
<textarea data-table="sys_certifications" data-field="x_description" name="x_description" id="x_description" cols="35" rows="4" placeholder="<?php echo HtmlEncode($sys_certifications->description->getPlaceHolder()) ?>"<?php echo $sys_certifications->description->editAttributes() ?>><?php echo $sys_certifications->description->EditValue ?></textarea>
</span>
<?php echo $sys_certifications->description->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$sys_certifications_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $sys_certifications_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sys_certifications_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$sys_certifications_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$sys_certifications_edit->terminate();
?>