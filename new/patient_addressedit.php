<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$patient_address_edit = new patient_address_edit();

// Run the page
$patient_address_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_address_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpatient_addressedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpatient_addressedit = currentForm = new ew.Form("fpatient_addressedit", "edit");

	// Validate form
	fpatient_addressedit.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "confirm")
			return true;
		var elm, felm, uelm, addcnt = 0;
		var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
		var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
		var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
		var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
		for (var i = startcnt; i <= rowcnt; i++) {
			var infix = ($k[0]) ? String(i) : "";
			$fobj.data("rowindex", infix);
			<?php if ($patient_address_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_address_edit->id->caption(), $patient_address_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_address_edit->patient_id->Required) { ?>
				elm = this.getElements("x" + infix + "_patient_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_address_edit->patient_id->caption(), $patient_address_edit->patient_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_address_edit->street->Required) { ?>
				elm = this.getElements("x" + infix + "_street");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_address_edit->street->caption(), $patient_address_edit->street->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_address_edit->town->Required) { ?>
				elm = this.getElements("x" + infix + "_town");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_address_edit->town->caption(), $patient_address_edit->town->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_address_edit->province->Required) { ?>
				elm = this.getElements("x" + infix + "_province");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_address_edit->province->caption(), $patient_address_edit->province->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_address_edit->postal_code->Required) { ?>
				elm = this.getElements("x" + infix + "_postal_code");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_address_edit->postal_code->caption(), $patient_address_edit->postal_code->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_address_edit->address_type->Required) { ?>
				elm = this.getElements("x" + infix + "_address_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_address_edit->address_type->caption(), $patient_address_edit->address_type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_address_edit->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_address_edit->status->caption(), $patient_address_edit->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_address_edit->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_address_edit->modifiedby->caption(), $patient_address_edit->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_address_edit->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_address_edit->modifieddatetime->caption(), $patient_address_edit->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
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

	// Form_CustomValidate
	fpatient_addressedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_addressedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpatient_addressedit.lists["x_address_type"] = <?php echo $patient_address_edit->address_type->Lookup->toClientList($patient_address_edit) ?>;
	fpatient_addressedit.lists["x_address_type"].options = <?php echo JsonEncode($patient_address_edit->address_type->lookupOptions()) ?>;
	fpatient_addressedit.lists["x_status"] = <?php echo $patient_address_edit->status->Lookup->toClientList($patient_address_edit) ?>;
	fpatient_addressedit.lists["x_status"].options = <?php echo JsonEncode($patient_address_edit->status->lookupOptions()) ?>;
	loadjs.done("fpatient_addressedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_address_edit->showPageHeader(); ?>
<?php
$patient_address_edit->showMessage();
?>
<form name="fpatient_addressedit" id="fpatient_addressedit" class="<?php echo $patient_address_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_address">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$patient_address_edit->IsModal ?>">
<?php if ($patient_address->getCurrentMasterTable() == "patient") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="patient">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($patient_address_edit->patient_id->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($patient_address_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_patient_address_id" class="<?php echo $patient_address_edit->LeftColumnClass ?>"><?php echo $patient_address_edit->id->caption() ?><?php echo $patient_address_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_address_edit->RightColumnClass ?>"><div <?php echo $patient_address_edit->id->cellAttributes() ?>>
<span id="el_patient_address_id">
<span<?php echo $patient_address_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_address_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_address" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($patient_address_edit->id->CurrentValue) ?>">
<?php echo $patient_address_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_address_edit->patient_id->Visible) { // patient_id ?>
	<div id="r_patient_id" class="form-group row">
		<label id="elh_patient_address_patient_id" for="x_patient_id" class="<?php echo $patient_address_edit->LeftColumnClass ?>"><?php echo $patient_address_edit->patient_id->caption() ?><?php echo $patient_address_edit->patient_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_address_edit->RightColumnClass ?>"><div <?php echo $patient_address_edit->patient_id->cellAttributes() ?>>
<span id="el_patient_address_patient_id">
<span<?php echo $patient_address_edit->patient_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_address_edit->patient_id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_address" data-field="x_patient_id" name="x_patient_id" id="x_patient_id" value="<?php echo HtmlEncode($patient_address_edit->patient_id->CurrentValue) ?>">
<?php echo $patient_address_edit->patient_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_address_edit->street->Visible) { // street ?>
	<div id="r_street" class="form-group row">
		<label id="elh_patient_address_street" for="x_street" class="<?php echo $patient_address_edit->LeftColumnClass ?>"><?php echo $patient_address_edit->street->caption() ?><?php echo $patient_address_edit->street->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_address_edit->RightColumnClass ?>"><div <?php echo $patient_address_edit->street->cellAttributes() ?>>
<span id="el_patient_address_street">
<input type="text" data-table="patient_address" data-field="x_street" name="x_street" id="x_street" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient_address_edit->street->getPlaceHolder()) ?>" value="<?php echo $patient_address_edit->street->EditValue ?>"<?php echo $patient_address_edit->street->editAttributes() ?>>
</span>
<?php echo $patient_address_edit->street->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_address_edit->town->Visible) { // town ?>
	<div id="r_town" class="form-group row">
		<label id="elh_patient_address_town" for="x_town" class="<?php echo $patient_address_edit->LeftColumnClass ?>"><?php echo $patient_address_edit->town->caption() ?><?php echo $patient_address_edit->town->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_address_edit->RightColumnClass ?>"><div <?php echo $patient_address_edit->town->cellAttributes() ?>>
<span id="el_patient_address_town">
<input type="text" data-table="patient_address" data-field="x_town" name="x_town" id="x_town" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_address_edit->town->getPlaceHolder()) ?>" value="<?php echo $patient_address_edit->town->EditValue ?>"<?php echo $patient_address_edit->town->editAttributes() ?>>
</span>
<?php echo $patient_address_edit->town->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_address_edit->province->Visible) { // province ?>
	<div id="r_province" class="form-group row">
		<label id="elh_patient_address_province" for="x_province" class="<?php echo $patient_address_edit->LeftColumnClass ?>"><?php echo $patient_address_edit->province->caption() ?><?php echo $patient_address_edit->province->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_address_edit->RightColumnClass ?>"><div <?php echo $patient_address_edit->province->cellAttributes() ?>>
<span id="el_patient_address_province">
<input type="text" data-table="patient_address" data-field="x_province" name="x_province" id="x_province" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_address_edit->province->getPlaceHolder()) ?>" value="<?php echo $patient_address_edit->province->EditValue ?>"<?php echo $patient_address_edit->province->editAttributes() ?>>
</span>
<?php echo $patient_address_edit->province->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_address_edit->postal_code->Visible) { // postal_code ?>
	<div id="r_postal_code" class="form-group row">
		<label id="elh_patient_address_postal_code" for="x_postal_code" class="<?php echo $patient_address_edit->LeftColumnClass ?>"><?php echo $patient_address_edit->postal_code->caption() ?><?php echo $patient_address_edit->postal_code->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_address_edit->RightColumnClass ?>"><div <?php echo $patient_address_edit->postal_code->cellAttributes() ?>>
<span id="el_patient_address_postal_code">
<input type="text" data-table="patient_address" data-field="x_postal_code" name="x_postal_code" id="x_postal_code" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_address_edit->postal_code->getPlaceHolder()) ?>" value="<?php echo $patient_address_edit->postal_code->EditValue ?>"<?php echo $patient_address_edit->postal_code->editAttributes() ?>>
</span>
<?php echo $patient_address_edit->postal_code->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_address_edit->address_type->Visible) { // address_type ?>
	<div id="r_address_type" class="form-group row">
		<label id="elh_patient_address_address_type" for="x_address_type" class="<?php echo $patient_address_edit->LeftColumnClass ?>"><?php echo $patient_address_edit->address_type->caption() ?><?php echo $patient_address_edit->address_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_address_edit->RightColumnClass ?>"><div <?php echo $patient_address_edit->address_type->cellAttributes() ?>>
<span id="el_patient_address_address_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_address" data-field="x_address_type" data-value-separator="<?php echo $patient_address_edit->address_type->displayValueSeparatorAttribute() ?>" id="x_address_type" name="x_address_type"<?php echo $patient_address_edit->address_type->editAttributes() ?>>
			<?php echo $patient_address_edit->address_type->selectOptionListHtml("x_address_type") ?>
		</select>
</div>
<?php echo $patient_address_edit->address_type->Lookup->getParamTag($patient_address_edit, "p_x_address_type") ?>
</span>
<?php echo $patient_address_edit->address_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_address_edit->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_patient_address_status" for="x_status" class="<?php echo $patient_address_edit->LeftColumnClass ?>"><?php echo $patient_address_edit->status->caption() ?><?php echo $patient_address_edit->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_address_edit->RightColumnClass ?>"><div <?php echo $patient_address_edit->status->cellAttributes() ?>>
<span id="el_patient_address_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_address" data-field="x_status" data-value-separator="<?php echo $patient_address_edit->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $patient_address_edit->status->editAttributes() ?>>
			<?php echo $patient_address_edit->status->selectOptionListHtml("x_status") ?>
		</select>
</div>
<?php echo $patient_address_edit->status->Lookup->getParamTag($patient_address_edit, "p_x_status") ?>
</span>
<?php echo $patient_address_edit->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$patient_address_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_address_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_address_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$patient_address_edit->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$patient_address_edit->terminate();
?>