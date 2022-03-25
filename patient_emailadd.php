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
$patient_email_add = new patient_email_add();

// Run the page
$patient_email_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_email_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fpatient_emailadd = currentForm = new ew.Form("fpatient_emailadd", "add");

// Validate form
fpatient_emailadd.validate = function() {
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
		<?php if ($patient_email_add->patient_id->Required) { ?>
			elm = this.getElements("x" + infix + "_patient_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_email->patient_id->caption(), $patient_email->patient_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_patient_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_email->patient_id->errorMessage()) ?>");
		<?php if ($patient_email_add->_email->Required) { ?>
			elm = this.getElements("x" + infix + "__email");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_email->_email->caption(), $patient_email->_email->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_email_add->email_type->Required) { ?>
			elm = this.getElements("x" + infix + "_email_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_email->email_type->caption(), $patient_email->email_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_email_add->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_email->status->caption(), $patient_email->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_email_add->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_email->createdby->caption(), $patient_email->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_email_add->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_email->createddatetime->caption(), $patient_email->createddatetime->RequiredErrorMessage)) ?>");
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
fpatient_emailadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_emailadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_emailadd.lists["x_email_type"] = <?php echo $patient_email_add->email_type->Lookup->toClientList() ?>;
fpatient_emailadd.lists["x_email_type"].options = <?php echo JsonEncode($patient_email_add->email_type->lookupOptions()) ?>;
fpatient_emailadd.lists["x_status"] = <?php echo $patient_email_add->status->Lookup->toClientList() ?>;
fpatient_emailadd.lists["x_status"].options = <?php echo JsonEncode($patient_email_add->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_email_add->showPageHeader(); ?>
<?php
$patient_email_add->showMessage();
?>
<form name="fpatient_emailadd" id="fpatient_emailadd" class="<?php echo $patient_email_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_email_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_email_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_email">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$patient_email_add->IsModal ?>">
<?php if ($patient_email->getCurrentMasterTable() == "patient") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="patient">
<input type="hidden" name="fk_id" value="<?php echo $patient_email->patient_id->getSessionValue() ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($patient_email->patient_id->Visible) { // patient_id ?>
	<div id="r_patient_id" class="form-group row">
		<label id="elh_patient_email_patient_id" for="x_patient_id" class="<?php echo $patient_email_add->LeftColumnClass ?>"><?php echo $patient_email->patient_id->caption() ?><?php echo ($patient_email->patient_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_email_add->RightColumnClass ?>"><div<?php echo $patient_email->patient_id->cellAttributes() ?>>
<?php if ($patient_email->patient_id->getSessionValue() <> "") { ?>
<span id="el_patient_email_patient_id">
<span<?php echo $patient_email->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_email->patient_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_patient_id" name="x_patient_id" value="<?php echo HtmlEncode($patient_email->patient_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el_patient_email_patient_id">
<input type="text" data-table="patient_email" data-field="x_patient_id" name="x_patient_id" id="x_patient_id" size="30" placeholder="<?php echo HtmlEncode($patient_email->patient_id->getPlaceHolder()) ?>" value="<?php echo $patient_email->patient_id->EditValue ?>"<?php echo $patient_email->patient_id->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $patient_email->patient_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_email->_email->Visible) { // email ?>
	<div id="r__email" class="form-group row">
		<label id="elh_patient_email__email" for="x__email" class="<?php echo $patient_email_add->LeftColumnClass ?>"><?php echo $patient_email->_email->caption() ?><?php echo ($patient_email->_email->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_email_add->RightColumnClass ?>"><div<?php echo $patient_email->_email->cellAttributes() ?>>
<span id="el_patient_email__email">
<input type="text" data-table="patient_email" data-field="x__email" name="x__email" id="x__email" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient_email->_email->getPlaceHolder()) ?>" value="<?php echo $patient_email->_email->EditValue ?>"<?php echo $patient_email->_email->editAttributes() ?>>
</span>
<?php echo $patient_email->_email->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_email->email_type->Visible) { // email_type ?>
	<div id="r_email_type" class="form-group row">
		<label id="elh_patient_email_email_type" for="x_email_type" class="<?php echo $patient_email_add->LeftColumnClass ?>"><?php echo $patient_email->email_type->caption() ?><?php echo ($patient_email->email_type->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_email_add->RightColumnClass ?>"><div<?php echo $patient_email->email_type->cellAttributes() ?>>
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
		<label id="elh_patient_email_status" for="x_status" class="<?php echo $patient_email_add->LeftColumnClass ?>"><?php echo $patient_email->status->caption() ?><?php echo ($patient_email->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_email_add->RightColumnClass ?>"><div<?php echo $patient_email->status->cellAttributes() ?>>
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
<?php if (!$patient_email_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_email_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_email_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$patient_email_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$patient_email_add->terminate();
?>