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
$patient_telephone_add = new patient_telephone_add();

// Run the page
$patient_telephone_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_telephone_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fpatient_telephoneadd = currentForm = new ew.Form("fpatient_telephoneadd", "add");

// Validate form
fpatient_telephoneadd.validate = function() {
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
		<?php if ($patient_telephone_add->patient_id->Required) { ?>
			elm = this.getElements("x" + infix + "_patient_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_telephone->patient_id->caption(), $patient_telephone->patient_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_patient_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_telephone->patient_id->errorMessage()) ?>");
		<?php if ($patient_telephone_add->tele_type->Required) { ?>
			elm = this.getElements("x" + infix + "_tele_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_telephone->tele_type->caption(), $patient_telephone->tele_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_telephone_add->telephone->Required) { ?>
			elm = this.getElements("x" + infix + "_telephone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_telephone->telephone->caption(), $patient_telephone->telephone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_telephone_add->telephone_type->Required) { ?>
			elm = this.getElements("x" + infix + "_telephone_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_telephone->telephone_type->caption(), $patient_telephone->telephone_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_telephone_add->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_telephone->status->caption(), $patient_telephone->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_telephone_add->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_telephone->createdby->caption(), $patient_telephone->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_telephone->createdby->errorMessage()) ?>");
		<?php if ($patient_telephone_add->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_telephone->createddatetime->caption(), $patient_telephone->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_telephone->createddatetime->errorMessage()) ?>");
		<?php if ($patient_telephone_add->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_telephone->modifiedby->caption(), $patient_telephone->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_telephone->modifiedby->errorMessage()) ?>");
		<?php if ($patient_telephone_add->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_telephone->modifieddatetime->caption(), $patient_telephone->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_telephone->modifieddatetime->errorMessage()) ?>");

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
fpatient_telephoneadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_telephoneadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_telephoneadd.lists["x_tele_type"] = <?php echo $patient_telephone_add->tele_type->Lookup->toClientList() ?>;
fpatient_telephoneadd.lists["x_tele_type"].options = <?php echo JsonEncode($patient_telephone_add->tele_type->lookupOptions()) ?>;
fpatient_telephoneadd.lists["x_telephone_type"] = <?php echo $patient_telephone_add->telephone_type->Lookup->toClientList() ?>;
fpatient_telephoneadd.lists["x_telephone_type"].options = <?php echo JsonEncode($patient_telephone_add->telephone_type->lookupOptions()) ?>;
fpatient_telephoneadd.lists["x_status"] = <?php echo $patient_telephone_add->status->Lookup->toClientList() ?>;
fpatient_telephoneadd.lists["x_status"].options = <?php echo JsonEncode($patient_telephone_add->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_telephone_add->showPageHeader(); ?>
<?php
$patient_telephone_add->showMessage();
?>
<form name="fpatient_telephoneadd" id="fpatient_telephoneadd" class="<?php echo $patient_telephone_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_telephone_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_telephone_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_telephone">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$patient_telephone_add->IsModal ?>">
<?php if ($patient_telephone->getCurrentMasterTable() == "patient") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="patient">
<input type="hidden" name="fk_id" value="<?php echo $patient_telephone->patient_id->getSessionValue() ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($patient_telephone->patient_id->Visible) { // patient_id ?>
	<div id="r_patient_id" class="form-group row">
		<label id="elh_patient_telephone_patient_id" for="x_patient_id" class="<?php echo $patient_telephone_add->LeftColumnClass ?>"><?php echo $patient_telephone->patient_id->caption() ?><?php echo ($patient_telephone->patient_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_telephone_add->RightColumnClass ?>"><div<?php echo $patient_telephone->patient_id->cellAttributes() ?>>
<?php if ($patient_telephone->patient_id->getSessionValue() <> "") { ?>
<span id="el_patient_telephone_patient_id">
<span<?php echo $patient_telephone->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_telephone->patient_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_patient_id" name="x_patient_id" value="<?php echo HtmlEncode($patient_telephone->patient_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el_patient_telephone_patient_id">
<input type="text" data-table="patient_telephone" data-field="x_patient_id" name="x_patient_id" id="x_patient_id" size="30" placeholder="<?php echo HtmlEncode($patient_telephone->patient_id->getPlaceHolder()) ?>" value="<?php echo $patient_telephone->patient_id->EditValue ?>"<?php echo $patient_telephone->patient_id->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $patient_telephone->patient_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_telephone->tele_type->Visible) { // tele_type ?>
	<div id="r_tele_type" class="form-group row">
		<label id="elh_patient_telephone_tele_type" for="x_tele_type" class="<?php echo $patient_telephone_add->LeftColumnClass ?>"><?php echo $patient_telephone->tele_type->caption() ?><?php echo ($patient_telephone->tele_type->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_telephone_add->RightColumnClass ?>"><div<?php echo $patient_telephone->tele_type->cellAttributes() ?>>
<span id="el_patient_telephone_tele_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_telephone" data-field="x_tele_type" data-value-separator="<?php echo $patient_telephone->tele_type->displayValueSeparatorAttribute() ?>" id="x_tele_type" name="x_tele_type"<?php echo $patient_telephone->tele_type->editAttributes() ?>>
		<?php echo $patient_telephone->tele_type->selectOptionListHtml("x_tele_type") ?>
	</select>
</div>
<?php echo $patient_telephone->tele_type->Lookup->getParamTag("p_x_tele_type") ?>
</span>
<?php echo $patient_telephone->tele_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_telephone->telephone->Visible) { // telephone ?>
	<div id="r_telephone" class="form-group row">
		<label id="elh_patient_telephone_telephone" for="x_telephone" class="<?php echo $patient_telephone_add->LeftColumnClass ?>"><?php echo $patient_telephone->telephone->caption() ?><?php echo ($patient_telephone->telephone->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_telephone_add->RightColumnClass ?>"><div<?php echo $patient_telephone->telephone->cellAttributes() ?>>
<span id="el_patient_telephone_telephone">
<input type="text" data-table="patient_telephone" data-field="x_telephone" name="x_telephone" id="x_telephone" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($patient_telephone->telephone->getPlaceHolder()) ?>" value="<?php echo $patient_telephone->telephone->EditValue ?>"<?php echo $patient_telephone->telephone->editAttributes() ?>>
</span>
<?php echo $patient_telephone->telephone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_telephone->telephone_type->Visible) { // telephone_type ?>
	<div id="r_telephone_type" class="form-group row">
		<label id="elh_patient_telephone_telephone_type" for="x_telephone_type" class="<?php echo $patient_telephone_add->LeftColumnClass ?>"><?php echo $patient_telephone->telephone_type->caption() ?><?php echo ($patient_telephone->telephone_type->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_telephone_add->RightColumnClass ?>"><div<?php echo $patient_telephone->telephone_type->cellAttributes() ?>>
<span id="el_patient_telephone_telephone_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_telephone" data-field="x_telephone_type" data-value-separator="<?php echo $patient_telephone->telephone_type->displayValueSeparatorAttribute() ?>" id="x_telephone_type" name="x_telephone_type"<?php echo $patient_telephone->telephone_type->editAttributes() ?>>
		<?php echo $patient_telephone->telephone_type->selectOptionListHtml("x_telephone_type") ?>
	</select>
</div>
<?php echo $patient_telephone->telephone_type->Lookup->getParamTag("p_x_telephone_type") ?>
</span>
<?php echo $patient_telephone->telephone_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_telephone->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_patient_telephone_status" for="x_status" class="<?php echo $patient_telephone_add->LeftColumnClass ?>"><?php echo $patient_telephone->status->caption() ?><?php echo ($patient_telephone->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_telephone_add->RightColumnClass ?>"><div<?php echo $patient_telephone->status->cellAttributes() ?>>
<span id="el_patient_telephone_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_telephone" data-field="x_status" data-value-separator="<?php echo $patient_telephone->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $patient_telephone->status->editAttributes() ?>>
		<?php echo $patient_telephone->status->selectOptionListHtml("x_status") ?>
	</select>
</div>
<?php echo $patient_telephone->status->Lookup->getParamTag("p_x_status") ?>
</span>
<?php echo $patient_telephone->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_telephone->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label id="elh_patient_telephone_createdby" for="x_createdby" class="<?php echo $patient_telephone_add->LeftColumnClass ?>"><?php echo $patient_telephone->createdby->caption() ?><?php echo ($patient_telephone->createdby->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_telephone_add->RightColumnClass ?>"><div<?php echo $patient_telephone->createdby->cellAttributes() ?>>
<span id="el_patient_telephone_createdby">
<input type="text" data-table="patient_telephone" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?php echo HtmlEncode($patient_telephone->createdby->getPlaceHolder()) ?>" value="<?php echo $patient_telephone->createdby->EditValue ?>"<?php echo $patient_telephone->createdby->editAttributes() ?>>
</span>
<?php echo $patient_telephone->createdby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_telephone->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label id="elh_patient_telephone_createddatetime" for="x_createddatetime" class="<?php echo $patient_telephone_add->LeftColumnClass ?>"><?php echo $patient_telephone->createddatetime->caption() ?><?php echo ($patient_telephone->createddatetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_telephone_add->RightColumnClass ?>"><div<?php echo $patient_telephone->createddatetime->cellAttributes() ?>>
<span id="el_patient_telephone_createddatetime">
<input type="text" data-table="patient_telephone" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($patient_telephone->createddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_telephone->createddatetime->EditValue ?>"<?php echo $patient_telephone->createddatetime->editAttributes() ?>>
<?php if (!$patient_telephone->createddatetime->ReadOnly && !$patient_telephone->createddatetime->Disabled && !isset($patient_telephone->createddatetime->EditAttrs["readonly"]) && !isset($patient_telephone->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_telephoneadd", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $patient_telephone->createddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_telephone->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label id="elh_patient_telephone_modifiedby" for="x_modifiedby" class="<?php echo $patient_telephone_add->LeftColumnClass ?>"><?php echo $patient_telephone->modifiedby->caption() ?><?php echo ($patient_telephone->modifiedby->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_telephone_add->RightColumnClass ?>"><div<?php echo $patient_telephone->modifiedby->cellAttributes() ?>>
<span id="el_patient_telephone_modifiedby">
<input type="text" data-table="patient_telephone" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?php echo HtmlEncode($patient_telephone->modifiedby->getPlaceHolder()) ?>" value="<?php echo $patient_telephone->modifiedby->EditValue ?>"<?php echo $patient_telephone->modifiedby->editAttributes() ?>>
</span>
<?php echo $patient_telephone->modifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_telephone->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label id="elh_patient_telephone_modifieddatetime" for="x_modifieddatetime" class="<?php echo $patient_telephone_add->LeftColumnClass ?>"><?php echo $patient_telephone->modifieddatetime->caption() ?><?php echo ($patient_telephone->modifieddatetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_telephone_add->RightColumnClass ?>"><div<?php echo $patient_telephone->modifieddatetime->cellAttributes() ?>>
<span id="el_patient_telephone_modifieddatetime">
<input type="text" data-table="patient_telephone" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($patient_telephone->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_telephone->modifieddatetime->EditValue ?>"<?php echo $patient_telephone->modifieddatetime->editAttributes() ?>>
<?php if (!$patient_telephone->modifieddatetime->ReadOnly && !$patient_telephone->modifieddatetime->Disabled && !isset($patient_telephone->modifieddatetime->EditAttrs["readonly"]) && !isset($patient_telephone->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_telephoneadd", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $patient_telephone->modifieddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$patient_telephone_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_telephone_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_telephone_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$patient_telephone_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$patient_telephone_add->terminate();
?>