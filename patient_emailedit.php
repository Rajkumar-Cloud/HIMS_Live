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
$patient_email_edit = new patient_email_edit();

// Run the page
$patient_email_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_email_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fpatient_emailedit = currentForm = new ew.Form("fpatient_emailedit", "edit");

// Validate form
fpatient_emailedit.validate = function() {
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
		<?php if ($patient_email_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_email->id->caption(), $patient_email->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_email_edit->patient_id->Required) { ?>
			elm = this.getElements("x" + infix + "_patient_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_email->patient_id->caption(), $patient_email->patient_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_email_edit->_email->Required) { ?>
			elm = this.getElements("x" + infix + "__email");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_email->_email->caption(), $patient_email->_email->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_email_edit->email_type->Required) { ?>
			elm = this.getElements("x" + infix + "_email_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_email->email_type->caption(), $patient_email->email_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_email_edit->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_email->status->caption(), $patient_email->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_email_edit->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_email->modifiedby->caption(), $patient_email->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_email_edit->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_email->modifieddatetime->caption(), $patient_email->modifieddatetime->RequiredErrorMessage)) ?>");
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
fpatient_emailedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_emailedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_emailedit.lists["x_email_type"] = <?php echo $patient_email_edit->email_type->Lookup->toClientList() ?>;
fpatient_emailedit.lists["x_email_type"].options = <?php echo JsonEncode($patient_email_edit->email_type->lookupOptions()) ?>;
fpatient_emailedit.lists["x_status"] = <?php echo $patient_email_edit->status->Lookup->toClientList() ?>;
fpatient_emailedit.lists["x_status"].options = <?php echo JsonEncode($patient_email_edit->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_email_edit->showPageHeader(); ?>
<?php
$patient_email_edit->showMessage();
?>
<form name="fpatient_emailedit" id="fpatient_emailedit" class="<?php echo $patient_email_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_email_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_email_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_email">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$patient_email_edit->IsModal ?>">
<?php if ($patient_email->getCurrentMasterTable() == "patient") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="patient">
<input type="hidden" name="fk_id" value="<?php echo $patient_email->patient_id->getSessionValue() ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($patient_email->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_patient_email_id" class="<?php echo $patient_email_edit->LeftColumnClass ?>"><?php echo $patient_email->id->caption() ?><?php echo ($patient_email->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_email_edit->RightColumnClass ?>"><div<?php echo $patient_email->id->cellAttributes() ?>>
<span id="el_patient_email_id">
<span<?php echo $patient_email->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_email->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_email" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($patient_email->id->CurrentValue) ?>">
<?php echo $patient_email->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_email->patient_id->Visible) { // patient_id ?>
	<div id="r_patient_id" class="form-group row">
		<label id="elh_patient_email_patient_id" for="x_patient_id" class="<?php echo $patient_email_edit->LeftColumnClass ?>"><?php echo $patient_email->patient_id->caption() ?><?php echo ($patient_email->patient_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_email_edit->RightColumnClass ?>"><div<?php echo $patient_email->patient_id->cellAttributes() ?>>
<span id="el_patient_email_patient_id">
<span<?php echo $patient_email->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_email->patient_id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_email" data-field="x_patient_id" name="x_patient_id" id="x_patient_id" value="<?php echo HtmlEncode($patient_email->patient_id->CurrentValue) ?>">
<?php echo $patient_email->patient_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_email->_email->Visible) { // email ?>
	<div id="r__email" class="form-group row">
		<label id="elh_patient_email__email" for="x__email" class="<?php echo $patient_email_edit->LeftColumnClass ?>"><?php echo $patient_email->_email->caption() ?><?php echo ($patient_email->_email->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_email_edit->RightColumnClass ?>"><div<?php echo $patient_email->_email->cellAttributes() ?>>
<span id="el_patient_email__email">
<input type="text" data-table="patient_email" data-field="x__email" name="x__email" id="x__email" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient_email->_email->getPlaceHolder()) ?>" value="<?php echo $patient_email->_email->EditValue ?>"<?php echo $patient_email->_email->editAttributes() ?>>
</span>
<?php echo $patient_email->_email->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_email->email_type->Visible) { // email_type ?>
	<div id="r_email_type" class="form-group row">
		<label id="elh_patient_email_email_type" for="x_email_type" class="<?php echo $patient_email_edit->LeftColumnClass ?>"><?php echo $patient_email->email_type->caption() ?><?php echo ($patient_email->email_type->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_email_edit->RightColumnClass ?>"><div<?php echo $patient_email->email_type->cellAttributes() ?>>
<span id="el_patient_email_email_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_email" data-field="x_email_type" data-value-separator="<?php echo $patient_email->email_type->displayValueSeparatorAttribute() ?>" id="x_email_type" name="x_email_type"<?php echo $patient_email->email_type->editAttributes() ?>>
		<?php echo $patient_email->email_type->selectOptionListHtml("x_email_type") ?>
	</select>
</div>
<?php echo $patient_email->email_type->Lookup->getParamTag("p_x_email_type") ?>
</span>
<?php echo $patient_email->email_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_email->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_patient_email_status" for="x_status" class="<?php echo $patient_email_edit->LeftColumnClass ?>"><?php echo $patient_email->status->caption() ?><?php echo ($patient_email->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_email_edit->RightColumnClass ?>"><div<?php echo $patient_email->status->cellAttributes() ?>>
<span id="el_patient_email_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_email" data-field="x_status" data-value-separator="<?php echo $patient_email->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $patient_email->status->editAttributes() ?>>
		<?php echo $patient_email->status->selectOptionListHtml("x_status") ?>
	</select>
</div>
<?php echo $patient_email->status->Lookup->getParamTag("p_x_status") ?>
</span>
<?php echo $patient_email->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$patient_email_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_email_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_email_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$patient_email_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$patient_email_edit->terminate();
?>