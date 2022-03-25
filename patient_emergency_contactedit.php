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
$patient_emergency_contact_edit = new patient_emergency_contact_edit();

// Run the page
$patient_emergency_contact_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_emergency_contact_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fpatient_emergency_contactedit = currentForm = new ew.Form("fpatient_emergency_contactedit", "edit");

// Validate form
fpatient_emergency_contactedit.validate = function() {
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
		<?php if ($patient_emergency_contact_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_emergency_contact->id->caption(), $patient_emergency_contact->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_emergency_contact_edit->patient_id->Required) { ?>
			elm = this.getElements("x" + infix + "_patient_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_emergency_contact->patient_id->caption(), $patient_emergency_contact->patient_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_emergency_contact_edit->name->Required) { ?>
			elm = this.getElements("x" + infix + "_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_emergency_contact->name->caption(), $patient_emergency_contact->name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_emergency_contact_edit->relationship->Required) { ?>
			elm = this.getElements("x" + infix + "_relationship");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_emergency_contact->relationship->caption(), $patient_emergency_contact->relationship->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_emergency_contact_edit->telephone->Required) { ?>
			elm = this.getElements("x" + infix + "_telephone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_emergency_contact->telephone->caption(), $patient_emergency_contact->telephone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_emergency_contact_edit->address->Required) { ?>
			elm = this.getElements("x" + infix + "_address");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_emergency_contact->address->caption(), $patient_emergency_contact->address->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_emergency_contact_edit->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_emergency_contact->status->caption(), $patient_emergency_contact->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_emergency_contact_edit->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_emergency_contact->createdby->caption(), $patient_emergency_contact->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_emergency_contact->createdby->errorMessage()) ?>");
		<?php if ($patient_emergency_contact_edit->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_emergency_contact->createddatetime->caption(), $patient_emergency_contact->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_emergency_contact->createddatetime->errorMessage()) ?>");
		<?php if ($patient_emergency_contact_edit->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_emergency_contact->modifiedby->caption(), $patient_emergency_contact->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_emergency_contact->modifiedby->errorMessage()) ?>");
		<?php if ($patient_emergency_contact_edit->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_emergency_contact->modifieddatetime->caption(), $patient_emergency_contact->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_emergency_contact->modifieddatetime->errorMessage()) ?>");

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
fpatient_emergency_contactedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_emergency_contactedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_emergency_contactedit.lists["x_status"] = <?php echo $patient_emergency_contact_edit->status->Lookup->toClientList() ?>;
fpatient_emergency_contactedit.lists["x_status"].options = <?php echo JsonEncode($patient_emergency_contact_edit->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_emergency_contact_edit->showPageHeader(); ?>
<?php
$patient_emergency_contact_edit->showMessage();
?>
<form name="fpatient_emergency_contactedit" id="fpatient_emergency_contactedit" class="<?php echo $patient_emergency_contact_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_emergency_contact_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_emergency_contact_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_emergency_contact">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$patient_emergency_contact_edit->IsModal ?>">
<?php if ($patient_emergency_contact->getCurrentMasterTable() == "patient") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="patient">
<input type="hidden" name="fk_id" value="<?php echo $patient_emergency_contact->patient_id->getSessionValue() ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($patient_emergency_contact->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_patient_emergency_contact_id" class="<?php echo $patient_emergency_contact_edit->LeftColumnClass ?>"><?php echo $patient_emergency_contact->id->caption() ?><?php echo ($patient_emergency_contact->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_emergency_contact_edit->RightColumnClass ?>"><div<?php echo $patient_emergency_contact->id->cellAttributes() ?>>
<span id="el_patient_emergency_contact_id">
<span<?php echo $patient_emergency_contact->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_emergency_contact->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($patient_emergency_contact->id->CurrentValue) ?>">
<?php echo $patient_emergency_contact->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_emergency_contact->patient_id->Visible) { // patient_id ?>
	<div id="r_patient_id" class="form-group row">
		<label id="elh_patient_emergency_contact_patient_id" for="x_patient_id" class="<?php echo $patient_emergency_contact_edit->LeftColumnClass ?>"><?php echo $patient_emergency_contact->patient_id->caption() ?><?php echo ($patient_emergency_contact->patient_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_emergency_contact_edit->RightColumnClass ?>"><div<?php echo $patient_emergency_contact->patient_id->cellAttributes() ?>>
<span id="el_patient_emergency_contact_patient_id">
<span<?php echo $patient_emergency_contact->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_emergency_contact->patient_id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_patient_id" name="x_patient_id" id="x_patient_id" value="<?php echo HtmlEncode($patient_emergency_contact->patient_id->CurrentValue) ?>">
<?php echo $patient_emergency_contact->patient_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_emergency_contact->name->Visible) { // name ?>
	<div id="r_name" class="form-group row">
		<label id="elh_patient_emergency_contact_name" for="x_name" class="<?php echo $patient_emergency_contact_edit->LeftColumnClass ?>"><?php echo $patient_emergency_contact->name->caption() ?><?php echo ($patient_emergency_contact->name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_emergency_contact_edit->RightColumnClass ?>"><div<?php echo $patient_emergency_contact->name->cellAttributes() ?>>
<span id="el_patient_emergency_contact_name">
<input type="text" data-table="patient_emergency_contact" data-field="x_name" name="x_name" id="x_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient_emergency_contact->name->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact->name->EditValue ?>"<?php echo $patient_emergency_contact->name->editAttributes() ?>>
</span>
<?php echo $patient_emergency_contact->name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_emergency_contact->relationship->Visible) { // relationship ?>
	<div id="r_relationship" class="form-group row">
		<label id="elh_patient_emergency_contact_relationship" for="x_relationship" class="<?php echo $patient_emergency_contact_edit->LeftColumnClass ?>"><?php echo $patient_emergency_contact->relationship->caption() ?><?php echo ($patient_emergency_contact->relationship->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_emergency_contact_edit->RightColumnClass ?>"><div<?php echo $patient_emergency_contact->relationship->cellAttributes() ?>>
<span id="el_patient_emergency_contact_relationship">
<input type="text" data-table="patient_emergency_contact" data-field="x_relationship" name="x_relationship" id="x_relationship" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_emergency_contact->relationship->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact->relationship->EditValue ?>"<?php echo $patient_emergency_contact->relationship->editAttributes() ?>>
</span>
<?php echo $patient_emergency_contact->relationship->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_emergency_contact->telephone->Visible) { // telephone ?>
	<div id="r_telephone" class="form-group row">
		<label id="elh_patient_emergency_contact_telephone" for="x_telephone" class="<?php echo $patient_emergency_contact_edit->LeftColumnClass ?>"><?php echo $patient_emergency_contact->telephone->caption() ?><?php echo ($patient_emergency_contact->telephone->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_emergency_contact_edit->RightColumnClass ?>"><div<?php echo $patient_emergency_contact->telephone->cellAttributes() ?>>
<span id="el_patient_emergency_contact_telephone">
<input type="text" data-table="patient_emergency_contact" data-field="x_telephone" name="x_telephone" id="x_telephone" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($patient_emergency_contact->telephone->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact->telephone->EditValue ?>"<?php echo $patient_emergency_contact->telephone->editAttributes() ?>>
</span>
<?php echo $patient_emergency_contact->telephone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_emergency_contact->address->Visible) { // address ?>
	<div id="r_address" class="form-group row">
		<label id="elh_patient_emergency_contact_address" for="x_address" class="<?php echo $patient_emergency_contact_edit->LeftColumnClass ?>"><?php echo $patient_emergency_contact->address->caption() ?><?php echo ($patient_emergency_contact->address->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_emergency_contact_edit->RightColumnClass ?>"><div<?php echo $patient_emergency_contact->address->cellAttributes() ?>>
<span id="el_patient_emergency_contact_address">
<input type="text" data-table="patient_emergency_contact" data-field="x_address" name="x_address" id="x_address" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($patient_emergency_contact->address->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact->address->EditValue ?>"<?php echo $patient_emergency_contact->address->editAttributes() ?>>
</span>
<?php echo $patient_emergency_contact->address->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_emergency_contact->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_patient_emergency_contact_status" for="x_status" class="<?php echo $patient_emergency_contact_edit->LeftColumnClass ?>"><?php echo $patient_emergency_contact->status->caption() ?><?php echo ($patient_emergency_contact->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_emergency_contact_edit->RightColumnClass ?>"><div<?php echo $patient_emergency_contact->status->cellAttributes() ?>>
<span id="el_patient_emergency_contact_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_emergency_contact" data-field="x_status" data-value-separator="<?php echo $patient_emergency_contact->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $patient_emergency_contact->status->editAttributes() ?>>
		<?php echo $patient_emergency_contact->status->selectOptionListHtml("x_status") ?>
	</select>
</div>
<?php echo $patient_emergency_contact->status->Lookup->getParamTag("p_x_status") ?>
</span>
<?php echo $patient_emergency_contact->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_emergency_contact->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label id="elh_patient_emergency_contact_createdby" for="x_createdby" class="<?php echo $patient_emergency_contact_edit->LeftColumnClass ?>"><?php echo $patient_emergency_contact->createdby->caption() ?><?php echo ($patient_emergency_contact->createdby->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_emergency_contact_edit->RightColumnClass ?>"><div<?php echo $patient_emergency_contact->createdby->cellAttributes() ?>>
<span id="el_patient_emergency_contact_createdby">
<input type="text" data-table="patient_emergency_contact" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?php echo HtmlEncode($patient_emergency_contact->createdby->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact->createdby->EditValue ?>"<?php echo $patient_emergency_contact->createdby->editAttributes() ?>>
</span>
<?php echo $patient_emergency_contact->createdby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_emergency_contact->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label id="elh_patient_emergency_contact_createddatetime" for="x_createddatetime" class="<?php echo $patient_emergency_contact_edit->LeftColumnClass ?>"><?php echo $patient_emergency_contact->createddatetime->caption() ?><?php echo ($patient_emergency_contact->createddatetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_emergency_contact_edit->RightColumnClass ?>"><div<?php echo $patient_emergency_contact->createddatetime->cellAttributes() ?>>
<span id="el_patient_emergency_contact_createddatetime">
<input type="text" data-table="patient_emergency_contact" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($patient_emergency_contact->createddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact->createddatetime->EditValue ?>"<?php echo $patient_emergency_contact->createddatetime->editAttributes() ?>>
<?php if (!$patient_emergency_contact->createddatetime->ReadOnly && !$patient_emergency_contact->createddatetime->Disabled && !isset($patient_emergency_contact->createddatetime->EditAttrs["readonly"]) && !isset($patient_emergency_contact->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_emergency_contactedit", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $patient_emergency_contact->createddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_emergency_contact->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label id="elh_patient_emergency_contact_modifiedby" for="x_modifiedby" class="<?php echo $patient_emergency_contact_edit->LeftColumnClass ?>"><?php echo $patient_emergency_contact->modifiedby->caption() ?><?php echo ($patient_emergency_contact->modifiedby->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_emergency_contact_edit->RightColumnClass ?>"><div<?php echo $patient_emergency_contact->modifiedby->cellAttributes() ?>>
<span id="el_patient_emergency_contact_modifiedby">
<input type="text" data-table="patient_emergency_contact" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?php echo HtmlEncode($patient_emergency_contact->modifiedby->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact->modifiedby->EditValue ?>"<?php echo $patient_emergency_contact->modifiedby->editAttributes() ?>>
</span>
<?php echo $patient_emergency_contact->modifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_emergency_contact->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label id="elh_patient_emergency_contact_modifieddatetime" for="x_modifieddatetime" class="<?php echo $patient_emergency_contact_edit->LeftColumnClass ?>"><?php echo $patient_emergency_contact->modifieddatetime->caption() ?><?php echo ($patient_emergency_contact->modifieddatetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_emergency_contact_edit->RightColumnClass ?>"><div<?php echo $patient_emergency_contact->modifieddatetime->cellAttributes() ?>>
<span id="el_patient_emergency_contact_modifieddatetime">
<input type="text" data-table="patient_emergency_contact" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($patient_emergency_contact->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact->modifieddatetime->EditValue ?>"<?php echo $patient_emergency_contact->modifieddatetime->editAttributes() ?>>
<?php if (!$patient_emergency_contact->modifieddatetime->ReadOnly && !$patient_emergency_contact->modifieddatetime->Disabled && !isset($patient_emergency_contact->modifieddatetime->EditAttrs["readonly"]) && !isset($patient_emergency_contact->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_emergency_contactedit", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $patient_emergency_contact->modifieddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$patient_emergency_contact_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_emergency_contact_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_emergency_contact_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$patient_emergency_contact_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$patient_emergency_contact_edit->terminate();
?>