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
$patient_address_add = new patient_address_add();

// Run the page
$patient_address_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_address_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fpatient_addressadd = currentForm = new ew.Form("fpatient_addressadd", "add");

// Validate form
fpatient_addressadd.validate = function() {
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
		<?php if ($patient_address_add->patient_id->Required) { ?>
			elm = this.getElements("x" + infix + "_patient_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_address->patient_id->caption(), $patient_address->patient_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_patient_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_address->patient_id->errorMessage()) ?>");
		<?php if ($patient_address_add->street->Required) { ?>
			elm = this.getElements("x" + infix + "_street");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_address->street->caption(), $patient_address->street->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_address_add->town->Required) { ?>
			elm = this.getElements("x" + infix + "_town");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_address->town->caption(), $patient_address->town->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_address_add->province->Required) { ?>
			elm = this.getElements("x" + infix + "_province");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_address->province->caption(), $patient_address->province->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_address_add->postal_code->Required) { ?>
			elm = this.getElements("x" + infix + "_postal_code");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_address->postal_code->caption(), $patient_address->postal_code->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_address_add->address_type->Required) { ?>
			elm = this.getElements("x" + infix + "_address_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_address->address_type->caption(), $patient_address->address_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_address_add->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_address->status->caption(), $patient_address->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_address_add->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_address->createdby->caption(), $patient_address->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_address_add->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_address->createddatetime->caption(), $patient_address->createddatetime->RequiredErrorMessage)) ?>");
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
fpatient_addressadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_addressadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_addressadd.lists["x_address_type"] = <?php echo $patient_address_add->address_type->Lookup->toClientList() ?>;
fpatient_addressadd.lists["x_address_type"].options = <?php echo JsonEncode($patient_address_add->address_type->lookupOptions()) ?>;
fpatient_addressadd.lists["x_status"] = <?php echo $patient_address_add->status->Lookup->toClientList() ?>;
fpatient_addressadd.lists["x_status"].options = <?php echo JsonEncode($patient_address_add->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_address_add->showPageHeader(); ?>
<?php
$patient_address_add->showMessage();
?>
<form name="fpatient_addressadd" id="fpatient_addressadd" class="<?php echo $patient_address_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_address_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_address_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_address">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$patient_address_add->IsModal ?>">
<?php if ($patient_address->getCurrentMasterTable() == "patient") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="patient">
<input type="hidden" name="fk_id" value="<?php echo $patient_address->patient_id->getSessionValue() ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($patient_address->patient_id->Visible) { // patient_id ?>
	<div id="r_patient_id" class="form-group row">
		<label id="elh_patient_address_patient_id" for="x_patient_id" class="<?php echo $patient_address_add->LeftColumnClass ?>"><?php echo $patient_address->patient_id->caption() ?><?php echo ($patient_address->patient_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_address_add->RightColumnClass ?>"><div<?php echo $patient_address->patient_id->cellAttributes() ?>>
<?php if ($patient_address->patient_id->getSessionValue() <> "") { ?>
<span id="el_patient_address_patient_id">
<span<?php echo $patient_address->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_address->patient_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_patient_id" name="x_patient_id" value="<?php echo HtmlEncode($patient_address->patient_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el_patient_address_patient_id">
<input type="text" data-table="patient_address" data-field="x_patient_id" name="x_patient_id" id="x_patient_id" size="30" placeholder="<?php echo HtmlEncode($patient_address->patient_id->getPlaceHolder()) ?>" value="<?php echo $patient_address->patient_id->EditValue ?>"<?php echo $patient_address->patient_id->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $patient_address->patient_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_address->street->Visible) { // street ?>
	<div id="r_street" class="form-group row">
		<label id="elh_patient_address_street" for="x_street" class="<?php echo $patient_address_add->LeftColumnClass ?>"><?php echo $patient_address->street->caption() ?><?php echo ($patient_address->street->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_address_add->RightColumnClass ?>"><div<?php echo $patient_address->street->cellAttributes() ?>>
<span id="el_patient_address_street">
<input type="text" data-table="patient_address" data-field="x_street" name="x_street" id="x_street" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient_address->street->getPlaceHolder()) ?>" value="<?php echo $patient_address->street->EditValue ?>"<?php echo $patient_address->street->editAttributes() ?>>
</span>
<?php echo $patient_address->street->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_address->town->Visible) { // town ?>
	<div id="r_town" class="form-group row">
		<label id="elh_patient_address_town" for="x_town" class="<?php echo $patient_address_add->LeftColumnClass ?>"><?php echo $patient_address->town->caption() ?><?php echo ($patient_address->town->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_address_add->RightColumnClass ?>"><div<?php echo $patient_address->town->cellAttributes() ?>>
<span id="el_patient_address_town">
<input type="text" data-table="patient_address" data-field="x_town" name="x_town" id="x_town" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_address->town->getPlaceHolder()) ?>" value="<?php echo $patient_address->town->EditValue ?>"<?php echo $patient_address->town->editAttributes() ?>>
</span>
<?php echo $patient_address->town->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_address->province->Visible) { // province ?>
	<div id="r_province" class="form-group row">
		<label id="elh_patient_address_province" for="x_province" class="<?php echo $patient_address_add->LeftColumnClass ?>"><?php echo $patient_address->province->caption() ?><?php echo ($patient_address->province->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_address_add->RightColumnClass ?>"><div<?php echo $patient_address->province->cellAttributes() ?>>
<span id="el_patient_address_province">
<input type="text" data-table="patient_address" data-field="x_province" name="x_province" id="x_province" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_address->province->getPlaceHolder()) ?>" value="<?php echo $patient_address->province->EditValue ?>"<?php echo $patient_address->province->editAttributes() ?>>
</span>
<?php echo $patient_address->province->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_address->postal_code->Visible) { // postal_code ?>
	<div id="r_postal_code" class="form-group row">
		<label id="elh_patient_address_postal_code" for="x_postal_code" class="<?php echo $patient_address_add->LeftColumnClass ?>"><?php echo $patient_address->postal_code->caption() ?><?php echo ($patient_address->postal_code->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_address_add->RightColumnClass ?>"><div<?php echo $patient_address->postal_code->cellAttributes() ?>>
<span id="el_patient_address_postal_code">
<input type="text" data-table="patient_address" data-field="x_postal_code" name="x_postal_code" id="x_postal_code" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_address->postal_code->getPlaceHolder()) ?>" value="<?php echo $patient_address->postal_code->EditValue ?>"<?php echo $patient_address->postal_code->editAttributes() ?>>
</span>
<?php echo $patient_address->postal_code->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_address->address_type->Visible) { // address_type ?>
	<div id="r_address_type" class="form-group row">
		<label id="elh_patient_address_address_type" for="x_address_type" class="<?php echo $patient_address_add->LeftColumnClass ?>"><?php echo $patient_address->address_type->caption() ?><?php echo ($patient_address->address_type->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_address_add->RightColumnClass ?>"><div<?php echo $patient_address->address_type->cellAttributes() ?>>
<span id="el_patient_address_address_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_address" data-field="x_address_type" data-value-separator="<?php echo $patient_address->address_type->displayValueSeparatorAttribute() ?>" id="x_address_type" name="x_address_type"<?php echo $patient_address->address_type->editAttributes() ?>>
		<?php echo $patient_address->address_type->selectOptionListHtml("x_address_type") ?>
	</select>
</div>
<?php echo $patient_address->address_type->Lookup->getParamTag("p_x_address_type") ?>
</span>
<?php echo $patient_address->address_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_address->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_patient_address_status" for="x_status" class="<?php echo $patient_address_add->LeftColumnClass ?>"><?php echo $patient_address->status->caption() ?><?php echo ($patient_address->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_address_add->RightColumnClass ?>"><div<?php echo $patient_address->status->cellAttributes() ?>>
<span id="el_patient_address_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_address" data-field="x_status" data-value-separator="<?php echo $patient_address->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $patient_address->status->editAttributes() ?>>
		<?php echo $patient_address->status->selectOptionListHtml("x_status") ?>
	</select>
</div>
<?php echo $patient_address->status->Lookup->getParamTag("p_x_status") ?>
</span>
<?php echo $patient_address->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$patient_address_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_address_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_address_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$patient_address_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$patient_address_add->terminate();
?>