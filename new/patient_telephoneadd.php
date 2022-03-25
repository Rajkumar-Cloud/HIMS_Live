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
<?php include_once "header.php"; ?>
<script>
var fpatient_telephoneadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpatient_telephoneadd = currentForm = new ew.Form("fpatient_telephoneadd", "add");

	// Validate form
	fpatient_telephoneadd.validate = function() {
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
			<?php if ($patient_telephone_add->patient_id->Required) { ?>
				elm = this.getElements("x" + infix + "_patient_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_telephone_add->patient_id->caption(), $patient_telephone_add->patient_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_patient_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_telephone_add->patient_id->errorMessage()) ?>");
			<?php if ($patient_telephone_add->tele_type->Required) { ?>
				elm = this.getElements("x" + infix + "_tele_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_telephone_add->tele_type->caption(), $patient_telephone_add->tele_type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_telephone_add->telephone->Required) { ?>
				elm = this.getElements("x" + infix + "_telephone");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_telephone_add->telephone->caption(), $patient_telephone_add->telephone->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_telephone_add->telephone_type->Required) { ?>
				elm = this.getElements("x" + infix + "_telephone_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_telephone_add->telephone_type->caption(), $patient_telephone_add->telephone_type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_telephone_add->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_telephone_add->status->caption(), $patient_telephone_add->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_telephone_add->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_telephone_add->createdby->caption(), $patient_telephone_add->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_telephone_add->createdby->errorMessage()) ?>");
			<?php if ($patient_telephone_add->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_telephone_add->createddatetime->caption(), $patient_telephone_add->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_telephone_add->createddatetime->errorMessage()) ?>");
			<?php if ($patient_telephone_add->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_telephone_add->modifiedby->caption(), $patient_telephone_add->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_telephone_add->modifiedby->errorMessage()) ?>");
			<?php if ($patient_telephone_add->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_telephone_add->modifieddatetime->caption(), $patient_telephone_add->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_telephone_add->modifieddatetime->errorMessage()) ?>");

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
	fpatient_telephoneadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_telephoneadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpatient_telephoneadd.lists["x_tele_type"] = <?php echo $patient_telephone_add->tele_type->Lookup->toClientList($patient_telephone_add) ?>;
	fpatient_telephoneadd.lists["x_tele_type"].options = <?php echo JsonEncode($patient_telephone_add->tele_type->lookupOptions()) ?>;
	fpatient_telephoneadd.lists["x_telephone_type"] = <?php echo $patient_telephone_add->telephone_type->Lookup->toClientList($patient_telephone_add) ?>;
	fpatient_telephoneadd.lists["x_telephone_type"].options = <?php echo JsonEncode($patient_telephone_add->telephone_type->lookupOptions()) ?>;
	fpatient_telephoneadd.lists["x_status"] = <?php echo $patient_telephone_add->status->Lookup->toClientList($patient_telephone_add) ?>;
	fpatient_telephoneadd.lists["x_status"].options = <?php echo JsonEncode($patient_telephone_add->status->lookupOptions()) ?>;
	loadjs.done("fpatient_telephoneadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_telephone_add->showPageHeader(); ?>
<?php
$patient_telephone_add->showMessage();
?>
<form name="fpatient_telephoneadd" id="fpatient_telephoneadd" class="<?php echo $patient_telephone_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_telephone">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$patient_telephone_add->IsModal ?>">
<?php if ($patient_telephone->getCurrentMasterTable() == "patient") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="patient">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($patient_telephone_add->patient_id->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($patient_telephone_add->patient_id->Visible) { // patient_id ?>
	<div id="r_patient_id" class="form-group row">
		<label id="elh_patient_telephone_patient_id" for="x_patient_id" class="<?php echo $patient_telephone_add->LeftColumnClass ?>"><?php echo $patient_telephone_add->patient_id->caption() ?><?php echo $patient_telephone_add->patient_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_telephone_add->RightColumnClass ?>"><div <?php echo $patient_telephone_add->patient_id->cellAttributes() ?>>
<?php if ($patient_telephone_add->patient_id->getSessionValue() != "") { ?>
<span id="el_patient_telephone_patient_id">
<span<?php echo $patient_telephone_add->patient_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_telephone_add->patient_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_patient_id" name="x_patient_id" value="<?php echo HtmlEncode($patient_telephone_add->patient_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el_patient_telephone_patient_id">
<input type="text" data-table="patient_telephone" data-field="x_patient_id" name="x_patient_id" id="x_patient_id" size="30" placeholder="<?php echo HtmlEncode($patient_telephone_add->patient_id->getPlaceHolder()) ?>" value="<?php echo $patient_telephone_add->patient_id->EditValue ?>"<?php echo $patient_telephone_add->patient_id->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $patient_telephone_add->patient_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_telephone_add->tele_type->Visible) { // tele_type ?>
	<div id="r_tele_type" class="form-group row">
		<label id="elh_patient_telephone_tele_type" for="x_tele_type" class="<?php echo $patient_telephone_add->LeftColumnClass ?>"><?php echo $patient_telephone_add->tele_type->caption() ?><?php echo $patient_telephone_add->tele_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_telephone_add->RightColumnClass ?>"><div <?php echo $patient_telephone_add->tele_type->cellAttributes() ?>>
<span id="el_patient_telephone_tele_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_telephone" data-field="x_tele_type" data-value-separator="<?php echo $patient_telephone_add->tele_type->displayValueSeparatorAttribute() ?>" id="x_tele_type" name="x_tele_type"<?php echo $patient_telephone_add->tele_type->editAttributes() ?>>
			<?php echo $patient_telephone_add->tele_type->selectOptionListHtml("x_tele_type") ?>
		</select>
</div>
<?php echo $patient_telephone_add->tele_type->Lookup->getParamTag($patient_telephone_add, "p_x_tele_type") ?>
</span>
<?php echo $patient_telephone_add->tele_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_telephone_add->telephone->Visible) { // telephone ?>
	<div id="r_telephone" class="form-group row">
		<label id="elh_patient_telephone_telephone" for="x_telephone" class="<?php echo $patient_telephone_add->LeftColumnClass ?>"><?php echo $patient_telephone_add->telephone->caption() ?><?php echo $patient_telephone_add->telephone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_telephone_add->RightColumnClass ?>"><div <?php echo $patient_telephone_add->telephone->cellAttributes() ?>>
<span id="el_patient_telephone_telephone">
<input type="text" data-table="patient_telephone" data-field="x_telephone" name="x_telephone" id="x_telephone" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($patient_telephone_add->telephone->getPlaceHolder()) ?>" value="<?php echo $patient_telephone_add->telephone->EditValue ?>"<?php echo $patient_telephone_add->telephone->editAttributes() ?>>
</span>
<?php echo $patient_telephone_add->telephone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_telephone_add->telephone_type->Visible) { // telephone_type ?>
	<div id="r_telephone_type" class="form-group row">
		<label id="elh_patient_telephone_telephone_type" for="x_telephone_type" class="<?php echo $patient_telephone_add->LeftColumnClass ?>"><?php echo $patient_telephone_add->telephone_type->caption() ?><?php echo $patient_telephone_add->telephone_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_telephone_add->RightColumnClass ?>"><div <?php echo $patient_telephone_add->telephone_type->cellAttributes() ?>>
<span id="el_patient_telephone_telephone_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_telephone" data-field="x_telephone_type" data-value-separator="<?php echo $patient_telephone_add->telephone_type->displayValueSeparatorAttribute() ?>" id="x_telephone_type" name="x_telephone_type"<?php echo $patient_telephone_add->telephone_type->editAttributes() ?>>
			<?php echo $patient_telephone_add->telephone_type->selectOptionListHtml("x_telephone_type") ?>
		</select>
</div>
<?php echo $patient_telephone_add->telephone_type->Lookup->getParamTag($patient_telephone_add, "p_x_telephone_type") ?>
</span>
<?php echo $patient_telephone_add->telephone_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_telephone_add->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_patient_telephone_status" for="x_status" class="<?php echo $patient_telephone_add->LeftColumnClass ?>"><?php echo $patient_telephone_add->status->caption() ?><?php echo $patient_telephone_add->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_telephone_add->RightColumnClass ?>"><div <?php echo $patient_telephone_add->status->cellAttributes() ?>>
<span id="el_patient_telephone_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_telephone" data-field="x_status" data-value-separator="<?php echo $patient_telephone_add->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $patient_telephone_add->status->editAttributes() ?>>
			<?php echo $patient_telephone_add->status->selectOptionListHtml("x_status") ?>
		</select>
</div>
<?php echo $patient_telephone_add->status->Lookup->getParamTag($patient_telephone_add, "p_x_status") ?>
</span>
<?php echo $patient_telephone_add->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_telephone_add->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label id="elh_patient_telephone_createdby" for="x_createdby" class="<?php echo $patient_telephone_add->LeftColumnClass ?>"><?php echo $patient_telephone_add->createdby->caption() ?><?php echo $patient_telephone_add->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_telephone_add->RightColumnClass ?>"><div <?php echo $patient_telephone_add->createdby->cellAttributes() ?>>
<span id="el_patient_telephone_createdby">
<input type="text" data-table="patient_telephone" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?php echo HtmlEncode($patient_telephone_add->createdby->getPlaceHolder()) ?>" value="<?php echo $patient_telephone_add->createdby->EditValue ?>"<?php echo $patient_telephone_add->createdby->editAttributes() ?>>
</span>
<?php echo $patient_telephone_add->createdby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_telephone_add->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label id="elh_patient_telephone_createddatetime" for="x_createddatetime" class="<?php echo $patient_telephone_add->LeftColumnClass ?>"><?php echo $patient_telephone_add->createddatetime->caption() ?><?php echo $patient_telephone_add->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_telephone_add->RightColumnClass ?>"><div <?php echo $patient_telephone_add->createddatetime->cellAttributes() ?>>
<span id="el_patient_telephone_createddatetime">
<input type="text" data-table="patient_telephone" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($patient_telephone_add->createddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_telephone_add->createddatetime->EditValue ?>"<?php echo $patient_telephone_add->createddatetime->editAttributes() ?>>
<?php if (!$patient_telephone_add->createddatetime->ReadOnly && !$patient_telephone_add->createddatetime->Disabled && !isset($patient_telephone_add->createddatetime->EditAttrs["readonly"]) && !isset($patient_telephone_add->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_telephoneadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_telephoneadd", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $patient_telephone_add->createddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_telephone_add->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label id="elh_patient_telephone_modifiedby" for="x_modifiedby" class="<?php echo $patient_telephone_add->LeftColumnClass ?>"><?php echo $patient_telephone_add->modifiedby->caption() ?><?php echo $patient_telephone_add->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_telephone_add->RightColumnClass ?>"><div <?php echo $patient_telephone_add->modifiedby->cellAttributes() ?>>
<span id="el_patient_telephone_modifiedby">
<input type="text" data-table="patient_telephone" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?php echo HtmlEncode($patient_telephone_add->modifiedby->getPlaceHolder()) ?>" value="<?php echo $patient_telephone_add->modifiedby->EditValue ?>"<?php echo $patient_telephone_add->modifiedby->editAttributes() ?>>
</span>
<?php echo $patient_telephone_add->modifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_telephone_add->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label id="elh_patient_telephone_modifieddatetime" for="x_modifieddatetime" class="<?php echo $patient_telephone_add->LeftColumnClass ?>"><?php echo $patient_telephone_add->modifieddatetime->caption() ?><?php echo $patient_telephone_add->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_telephone_add->RightColumnClass ?>"><div <?php echo $patient_telephone_add->modifieddatetime->cellAttributes() ?>>
<span id="el_patient_telephone_modifieddatetime">
<input type="text" data-table="patient_telephone" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($patient_telephone_add->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_telephone_add->modifieddatetime->EditValue ?>"<?php echo $patient_telephone_add->modifieddatetime->editAttributes() ?>>
<?php if (!$patient_telephone_add->modifieddatetime->ReadOnly && !$patient_telephone_add->modifieddatetime->Disabled && !isset($patient_telephone_add->modifieddatetime->EditAttrs["readonly"]) && !isset($patient_telephone_add->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_telephoneadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_telephoneadd", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $patient_telephone_add->modifieddatetime->CustomMsg ?></div></div>
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
$patient_telephone_add->terminate();
?>