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
$sms_cintent_edit = new sms_cintent_edit();

// Run the page
$sms_cintent_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sms_cintent_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fsms_cintentedit = currentForm = new ew.Form("fsms_cintentedit", "edit");

// Validate form
fsms_cintentedit.validate = function() {
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
		<?php if ($sms_cintent_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sms_cintent->id->caption(), $sms_cintent->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($sms_cintent_edit->SMSType->Required) { ?>
			elm = this.getElements("x" + infix + "_SMSType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sms_cintent->SMSType->caption(), $sms_cintent->SMSType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($sms_cintent_edit->Content->Required) { ?>
			elm = this.getElements("x" + infix + "_Content");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sms_cintent->Content->caption(), $sms_cintent->Content->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($sms_cintent_edit->Enabled->Required) { ?>
			elm = this.getElements("x" + infix + "_Enabled[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sms_cintent->Enabled->caption(), $sms_cintent->Enabled->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($sms_cintent_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sms_cintent->HospID->caption(), $sms_cintent->HospID->RequiredErrorMessage)) ?>");
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
fsms_cintentedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsms_cintentedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fsms_cintentedit.lists["x_SMSType"] = <?php echo $sms_cintent_edit->SMSType->Lookup->toClientList() ?>;
fsms_cintentedit.lists["x_SMSType"].options = <?php echo JsonEncode($sms_cintent_edit->SMSType->lookupOptions()) ?>;
fsms_cintentedit.lists["x_Enabled[]"] = <?php echo $sms_cintent_edit->Enabled->Lookup->toClientList() ?>;
fsms_cintentedit.lists["x_Enabled[]"].options = <?php echo JsonEncode($sms_cintent_edit->Enabled->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $sms_cintent_edit->showPageHeader(); ?>
<?php
$sms_cintent_edit->showMessage();
?>
<form name="fsms_cintentedit" id="fsms_cintentedit" class="<?php echo $sms_cintent_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sms_cintent_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sms_cintent_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sms_cintent">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$sms_cintent_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($sms_cintent->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_sms_cintent_id" class="<?php echo $sms_cintent_edit->LeftColumnClass ?>"><?php echo $sms_cintent->id->caption() ?><?php echo ($sms_cintent->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sms_cintent_edit->RightColumnClass ?>"><div<?php echo $sms_cintent->id->cellAttributes() ?>>
<span id="el_sms_cintent_id">
<span<?php echo $sms_cintent->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($sms_cintent->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="sms_cintent" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($sms_cintent->id->CurrentValue) ?>">
<?php echo $sms_cintent->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sms_cintent->SMSType->Visible) { // SMSType ?>
	<div id="r_SMSType" class="form-group row">
		<label id="elh_sms_cintent_SMSType" for="x_SMSType" class="<?php echo $sms_cintent_edit->LeftColumnClass ?>"><?php echo $sms_cintent->SMSType->caption() ?><?php echo ($sms_cintent->SMSType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sms_cintent_edit->RightColumnClass ?>"><div<?php echo $sms_cintent->SMSType->cellAttributes() ?>>
<span id="el_sms_cintent_SMSType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="sms_cintent" data-field="x_SMSType" data-value-separator="<?php echo $sms_cintent->SMSType->displayValueSeparatorAttribute() ?>" id="x_SMSType" name="x_SMSType"<?php echo $sms_cintent->SMSType->editAttributes() ?>>
		<?php echo $sms_cintent->SMSType->selectOptionListHtml("x_SMSType") ?>
	</select>
</div>
<?php echo $sms_cintent->SMSType->Lookup->getParamTag("p_x_SMSType") ?>
</span>
<?php echo $sms_cintent->SMSType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sms_cintent->Content->Visible) { // Content ?>
	<div id="r_Content" class="form-group row">
		<label id="elh_sms_cintent_Content" for="x_Content" class="<?php echo $sms_cintent_edit->LeftColumnClass ?>"><?php echo $sms_cintent->Content->caption() ?><?php echo ($sms_cintent->Content->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sms_cintent_edit->RightColumnClass ?>"><div<?php echo $sms_cintent->Content->cellAttributes() ?>>
<span id="el_sms_cintent_Content">
<textarea data-table="sms_cintent" data-field="x_Content" name="x_Content" id="x_Content" cols="35" rows="4" placeholder="<?php echo HtmlEncode($sms_cintent->Content->getPlaceHolder()) ?>"<?php echo $sms_cintent->Content->editAttributes() ?>><?php echo $sms_cintent->Content->EditValue ?></textarea>
</span>
<?php echo $sms_cintent->Content->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sms_cintent->Enabled->Visible) { // Enabled ?>
	<div id="r_Enabled" class="form-group row">
		<label id="elh_sms_cintent_Enabled" class="<?php echo $sms_cintent_edit->LeftColumnClass ?>"><?php echo $sms_cintent->Enabled->caption() ?><?php echo ($sms_cintent->Enabled->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sms_cintent_edit->RightColumnClass ?>"><div<?php echo $sms_cintent->Enabled->cellAttributes() ?>>
<span id="el_sms_cintent_Enabled">
<div id="tp_x_Enabled" class="ew-template"><input type="checkbox" class="form-check-input" data-table="sms_cintent" data-field="x_Enabled" data-value-separator="<?php echo $sms_cintent->Enabled->displayValueSeparatorAttribute() ?>" name="x_Enabled[]" id="x_Enabled[]" value="{value}"<?php echo $sms_cintent->Enabled->editAttributes() ?>></div>
<div id="dsl_x_Enabled" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $sms_cintent->Enabled->checkBoxListHtml(FALSE, "x_Enabled[]") ?>
</div></div>
</span>
<?php echo $sms_cintent->Enabled->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$sms_cintent_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $sms_cintent_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sms_cintent_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$sms_cintent_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$sms_cintent_edit->terminate();
?>