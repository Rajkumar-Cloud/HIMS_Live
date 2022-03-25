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
$op_admission_edit = new op_admission_edit();

// Run the page
$op_admission_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$op_admission_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fop_admissionedit = currentForm = new ew.Form("fop_admissionedit", "edit");

// Validate form
fop_admissionedit.validate = function() {
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
		<?php if ($op_admission_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $op_admission->id->caption(), $op_admission->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($op_admission_edit->patient_id->Required) { ?>
			elm = this.getElements("x" + infix + "_patient_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $op_admission->patient_id->caption(), $op_admission->patient_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($op_admission_edit->physician_id->Required) { ?>
			elm = this.getElements("x" + infix + "_physician_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $op_admission->physician_id->caption(), $op_admission->physician_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($op_admission_edit->cause->Required) { ?>
			elm = this.getElements("x" + infix + "_cause");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $op_admission->cause->caption(), $op_admission->cause->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($op_admission_edit->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $op_admission->status->caption(), $op_admission->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($op_admission_edit->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $op_admission->modifiedby->caption(), $op_admission->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($op_admission_edit->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $op_admission->modifieddatetime->caption(), $op_admission->modifieddatetime->RequiredErrorMessage)) ?>");
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
fop_admissionedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fop_admissionedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fop_admissionedit.lists["x_patient_id"] = <?php echo $op_admission_edit->patient_id->Lookup->toClientList() ?>;
fop_admissionedit.lists["x_patient_id"].options = <?php echo JsonEncode($op_admission_edit->patient_id->lookupOptions()) ?>;
fop_admissionedit.lists["x_physician_id"] = <?php echo $op_admission_edit->physician_id->Lookup->toClientList() ?>;
fop_admissionedit.lists["x_physician_id"].options = <?php echo JsonEncode($op_admission_edit->physician_id->lookupOptions()) ?>;
fop_admissionedit.lists["x_status"] = <?php echo $op_admission_edit->status->Lookup->toClientList() ?>;
fop_admissionedit.lists["x_status"].options = <?php echo JsonEncode($op_admission_edit->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $op_admission_edit->showPageHeader(); ?>
<?php
$op_admission_edit->showMessage();
?>
<form name="fop_admissionedit" id="fop_admissionedit" class="<?php echo $op_admission_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($op_admission_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $op_admission_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="op_admission">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$op_admission_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($op_admission->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_op_admission_id" class="<?php echo $op_admission_edit->LeftColumnClass ?>"><?php echo $op_admission->id->caption() ?><?php echo ($op_admission->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $op_admission_edit->RightColumnClass ?>"><div<?php echo $op_admission->id->cellAttributes() ?>>
<span id="el_op_admission_id">
<span<?php echo $op_admission->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($op_admission->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="op_admission" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($op_admission->id->CurrentValue) ?>">
<?php echo $op_admission->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($op_admission->patient_id->Visible) { // patient_id ?>
	<div id="r_patient_id" class="form-group row">
		<label id="elh_op_admission_patient_id" for="x_patient_id" class="<?php echo $op_admission_edit->LeftColumnClass ?>"><?php echo $op_admission->patient_id->caption() ?><?php echo ($op_admission->patient_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $op_admission_edit->RightColumnClass ?>"><div<?php echo $op_admission->patient_id->cellAttributes() ?>>
<span id="el_op_admission_patient_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="op_admission" data-field="x_patient_id" data-value-separator="<?php echo $op_admission->patient_id->displayValueSeparatorAttribute() ?>" id="x_patient_id" name="x_patient_id"<?php echo $op_admission->patient_id->editAttributes() ?>>
		<?php echo $op_admission->patient_id->selectOptionListHtml("x_patient_id") ?>
	</select>
</div>
<?php echo $op_admission->patient_id->Lookup->getParamTag("p_x_patient_id") ?>
</span>
<?php echo $op_admission->patient_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($op_admission->physician_id->Visible) { // physician_id ?>
	<div id="r_physician_id" class="form-group row">
		<label id="elh_op_admission_physician_id" for="x_physician_id" class="<?php echo $op_admission_edit->LeftColumnClass ?>"><?php echo $op_admission->physician_id->caption() ?><?php echo ($op_admission->physician_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $op_admission_edit->RightColumnClass ?>"><div<?php echo $op_admission->physician_id->cellAttributes() ?>>
<span id="el_op_admission_physician_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="op_admission" data-field="x_physician_id" data-value-separator="<?php echo $op_admission->physician_id->displayValueSeparatorAttribute() ?>" id="x_physician_id" name="x_physician_id"<?php echo $op_admission->physician_id->editAttributes() ?>>
		<?php echo $op_admission->physician_id->selectOptionListHtml("x_physician_id") ?>
	</select>
</div>
<?php echo $op_admission->physician_id->Lookup->getParamTag("p_x_physician_id") ?>
</span>
<?php echo $op_admission->physician_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($op_admission->cause->Visible) { // cause ?>
	<div id="r_cause" class="form-group row">
		<label id="elh_op_admission_cause" for="x_cause" class="<?php echo $op_admission_edit->LeftColumnClass ?>"><?php echo $op_admission->cause->caption() ?><?php echo ($op_admission->cause->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $op_admission_edit->RightColumnClass ?>"><div<?php echo $op_admission->cause->cellAttributes() ?>>
<span id="el_op_admission_cause">
<textarea data-table="op_admission" data-field="x_cause" name="x_cause" id="x_cause" cols="35" rows="4" placeholder="<?php echo HtmlEncode($op_admission->cause->getPlaceHolder()) ?>"<?php echo $op_admission->cause->editAttributes() ?>><?php echo $op_admission->cause->EditValue ?></textarea>
</span>
<?php echo $op_admission->cause->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($op_admission->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_op_admission_status" for="x_status" class="<?php echo $op_admission_edit->LeftColumnClass ?>"><?php echo $op_admission->status->caption() ?><?php echo ($op_admission->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $op_admission_edit->RightColumnClass ?>"><div<?php echo $op_admission->status->cellAttributes() ?>>
<span id="el_op_admission_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="op_admission" data-field="x_status" data-value-separator="<?php echo $op_admission->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $op_admission->status->editAttributes() ?>>
		<?php echo $op_admission->status->selectOptionListHtml("x_status") ?>
	</select>
</div>
<?php echo $op_admission->status->Lookup->getParamTag("p_x_status") ?>
</span>
<?php echo $op_admission->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php
	if (in_array("patient_services", explode(",", $op_admission->getCurrentDetailTable())) && $patient_services->DetailEdit) {
?>
<?php if ($op_admission->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("patient_services", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_servicesgrid.php" ?>
<?php } ?>
<?php if (!$op_admission_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $op_admission_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $op_admission_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$op_admission_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$op_admission_edit->terminate();
?>