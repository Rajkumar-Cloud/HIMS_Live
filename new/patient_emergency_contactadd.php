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
$patient_emergency_contact_add = new patient_emergency_contact_add();

// Run the page
$patient_emergency_contact_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_emergency_contact_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpatient_emergency_contactadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpatient_emergency_contactadd = currentForm = new ew.Form("fpatient_emergency_contactadd", "add");

	// Validate form
	fpatient_emergency_contactadd.validate = function() {
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
			<?php if ($patient_emergency_contact_add->patient_id->Required) { ?>
				elm = this.getElements("x" + infix + "_patient_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_emergency_contact_add->patient_id->caption(), $patient_emergency_contact_add->patient_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_patient_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_emergency_contact_add->patient_id->errorMessage()) ?>");
			<?php if ($patient_emergency_contact_add->name->Required) { ?>
				elm = this.getElements("x" + infix + "_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_emergency_contact_add->name->caption(), $patient_emergency_contact_add->name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_emergency_contact_add->relationship->Required) { ?>
				elm = this.getElements("x" + infix + "_relationship");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_emergency_contact_add->relationship->caption(), $patient_emergency_contact_add->relationship->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_emergency_contact_add->telephone->Required) { ?>
				elm = this.getElements("x" + infix + "_telephone");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_emergency_contact_add->telephone->caption(), $patient_emergency_contact_add->telephone->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_emergency_contact_add->address->Required) { ?>
				elm = this.getElements("x" + infix + "_address");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_emergency_contact_add->address->caption(), $patient_emergency_contact_add->address->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_emergency_contact_add->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_emergency_contact_add->status->caption(), $patient_emergency_contact_add->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_emergency_contact_add->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_emergency_contact_add->createdby->caption(), $patient_emergency_contact_add->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_emergency_contact_add->createdby->errorMessage()) ?>");
			<?php if ($patient_emergency_contact_add->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_emergency_contact_add->createddatetime->caption(), $patient_emergency_contact_add->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_emergency_contact_add->createddatetime->errorMessage()) ?>");
			<?php if ($patient_emergency_contact_add->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_emergency_contact_add->modifiedby->caption(), $patient_emergency_contact_add->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_emergency_contact_add->modifiedby->errorMessage()) ?>");
			<?php if ($patient_emergency_contact_add->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_emergency_contact_add->modifieddatetime->caption(), $patient_emergency_contact_add->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_emergency_contact_add->modifieddatetime->errorMessage()) ?>");

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
	fpatient_emergency_contactadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_emergency_contactadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpatient_emergency_contactadd.lists["x_status"] = <?php echo $patient_emergency_contact_add->status->Lookup->toClientList($patient_emergency_contact_add) ?>;
	fpatient_emergency_contactadd.lists["x_status"].options = <?php echo JsonEncode($patient_emergency_contact_add->status->lookupOptions()) ?>;
	loadjs.done("fpatient_emergency_contactadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_emergency_contact_add->showPageHeader(); ?>
<?php
$patient_emergency_contact_add->showMessage();
?>
<form name="fpatient_emergency_contactadd" id="fpatient_emergency_contactadd" class="<?php echo $patient_emergency_contact_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_emergency_contact">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$patient_emergency_contact_add->IsModal ?>">
<?php if ($patient_emergency_contact->getCurrentMasterTable() == "patient") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="patient">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($patient_emergency_contact_add->patient_id->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($patient_emergency_contact_add->patient_id->Visible) { // patient_id ?>
	<div id="r_patient_id" class="form-group row">
		<label id="elh_patient_emergency_contact_patient_id" for="x_patient_id" class="<?php echo $patient_emergency_contact_add->LeftColumnClass ?>"><?php echo $patient_emergency_contact_add->patient_id->caption() ?><?php echo $patient_emergency_contact_add->patient_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_emergency_contact_add->RightColumnClass ?>"><div <?php echo $patient_emergency_contact_add->patient_id->cellAttributes() ?>>
<?php if ($patient_emergency_contact_add->patient_id->getSessionValue() != "") { ?>
<span id="el_patient_emergency_contact_patient_id">
<span<?php echo $patient_emergency_contact_add->patient_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_emergency_contact_add->patient_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_patient_id" name="x_patient_id" value="<?php echo HtmlEncode($patient_emergency_contact_add->patient_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el_patient_emergency_contact_patient_id">
<input type="text" data-table="patient_emergency_contact" data-field="x_patient_id" name="x_patient_id" id="x_patient_id" size="30" placeholder="<?php echo HtmlEncode($patient_emergency_contact_add->patient_id->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact_add->patient_id->EditValue ?>"<?php echo $patient_emergency_contact_add->patient_id->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $patient_emergency_contact_add->patient_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_emergency_contact_add->name->Visible) { // name ?>
	<div id="r_name" class="form-group row">
		<label id="elh_patient_emergency_contact_name" for="x_name" class="<?php echo $patient_emergency_contact_add->LeftColumnClass ?>"><?php echo $patient_emergency_contact_add->name->caption() ?><?php echo $patient_emergency_contact_add->name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_emergency_contact_add->RightColumnClass ?>"><div <?php echo $patient_emergency_contact_add->name->cellAttributes() ?>>
<span id="el_patient_emergency_contact_name">
<input type="text" data-table="patient_emergency_contact" data-field="x_name" name="x_name" id="x_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient_emergency_contact_add->name->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact_add->name->EditValue ?>"<?php echo $patient_emergency_contact_add->name->editAttributes() ?>>
</span>
<?php echo $patient_emergency_contact_add->name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_emergency_contact_add->relationship->Visible) { // relationship ?>
	<div id="r_relationship" class="form-group row">
		<label id="elh_patient_emergency_contact_relationship" for="x_relationship" class="<?php echo $patient_emergency_contact_add->LeftColumnClass ?>"><?php echo $patient_emergency_contact_add->relationship->caption() ?><?php echo $patient_emergency_contact_add->relationship->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_emergency_contact_add->RightColumnClass ?>"><div <?php echo $patient_emergency_contact_add->relationship->cellAttributes() ?>>
<span id="el_patient_emergency_contact_relationship">
<input type="text" data-table="patient_emergency_contact" data-field="x_relationship" name="x_relationship" id="x_relationship" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_emergency_contact_add->relationship->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact_add->relationship->EditValue ?>"<?php echo $patient_emergency_contact_add->relationship->editAttributes() ?>>
</span>
<?php echo $patient_emergency_contact_add->relationship->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_emergency_contact_add->telephone->Visible) { // telephone ?>
	<div id="r_telephone" class="form-group row">
		<label id="elh_patient_emergency_contact_telephone" for="x_telephone" class="<?php echo $patient_emergency_contact_add->LeftColumnClass ?>"><?php echo $patient_emergency_contact_add->telephone->caption() ?><?php echo $patient_emergency_contact_add->telephone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_emergency_contact_add->RightColumnClass ?>"><div <?php echo $patient_emergency_contact_add->telephone->cellAttributes() ?>>
<span id="el_patient_emergency_contact_telephone">
<input type="text" data-table="patient_emergency_contact" data-field="x_telephone" name="x_telephone" id="x_telephone" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($patient_emergency_contact_add->telephone->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact_add->telephone->EditValue ?>"<?php echo $patient_emergency_contact_add->telephone->editAttributes() ?>>
</span>
<?php echo $patient_emergency_contact_add->telephone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_emergency_contact_add->address->Visible) { // address ?>
	<div id="r_address" class="form-group row">
		<label id="elh_patient_emergency_contact_address" for="x_address" class="<?php echo $patient_emergency_contact_add->LeftColumnClass ?>"><?php echo $patient_emergency_contact_add->address->caption() ?><?php echo $patient_emergency_contact_add->address->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_emergency_contact_add->RightColumnClass ?>"><div <?php echo $patient_emergency_contact_add->address->cellAttributes() ?>>
<span id="el_patient_emergency_contact_address">
<input type="text" data-table="patient_emergency_contact" data-field="x_address" name="x_address" id="x_address" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($patient_emergency_contact_add->address->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact_add->address->EditValue ?>"<?php echo $patient_emergency_contact_add->address->editAttributes() ?>>
</span>
<?php echo $patient_emergency_contact_add->address->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_emergency_contact_add->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_patient_emergency_contact_status" for="x_status" class="<?php echo $patient_emergency_contact_add->LeftColumnClass ?>"><?php echo $patient_emergency_contact_add->status->caption() ?><?php echo $patient_emergency_contact_add->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_emergency_contact_add->RightColumnClass ?>"><div <?php echo $patient_emergency_contact_add->status->cellAttributes() ?>>
<span id="el_patient_emergency_contact_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_emergency_contact" data-field="x_status" data-value-separator="<?php echo $patient_emergency_contact_add->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $patient_emergency_contact_add->status->editAttributes() ?>>
			<?php echo $patient_emergency_contact_add->status->selectOptionListHtml("x_status") ?>
		</select>
</div>
<?php echo $patient_emergency_contact_add->status->Lookup->getParamTag($patient_emergency_contact_add, "p_x_status") ?>
</span>
<?php echo $patient_emergency_contact_add->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_emergency_contact_add->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label id="elh_patient_emergency_contact_createdby" for="x_createdby" class="<?php echo $patient_emergency_contact_add->LeftColumnClass ?>"><?php echo $patient_emergency_contact_add->createdby->caption() ?><?php echo $patient_emergency_contact_add->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_emergency_contact_add->RightColumnClass ?>"><div <?php echo $patient_emergency_contact_add->createdby->cellAttributes() ?>>
<span id="el_patient_emergency_contact_createdby">
<input type="text" data-table="patient_emergency_contact" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?php echo HtmlEncode($patient_emergency_contact_add->createdby->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact_add->createdby->EditValue ?>"<?php echo $patient_emergency_contact_add->createdby->editAttributes() ?>>
</span>
<?php echo $patient_emergency_contact_add->createdby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_emergency_contact_add->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label id="elh_patient_emergency_contact_createddatetime" for="x_createddatetime" class="<?php echo $patient_emergency_contact_add->LeftColumnClass ?>"><?php echo $patient_emergency_contact_add->createddatetime->caption() ?><?php echo $patient_emergency_contact_add->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_emergency_contact_add->RightColumnClass ?>"><div <?php echo $patient_emergency_contact_add->createddatetime->cellAttributes() ?>>
<span id="el_patient_emergency_contact_createddatetime">
<input type="text" data-table="patient_emergency_contact" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($patient_emergency_contact_add->createddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact_add->createddatetime->EditValue ?>"<?php echo $patient_emergency_contact_add->createddatetime->editAttributes() ?>>
<?php if (!$patient_emergency_contact_add->createddatetime->ReadOnly && !$patient_emergency_contact_add->createddatetime->Disabled && !isset($patient_emergency_contact_add->createddatetime->EditAttrs["readonly"]) && !isset($patient_emergency_contact_add->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_emergency_contactadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_emergency_contactadd", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $patient_emergency_contact_add->createddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_emergency_contact_add->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label id="elh_patient_emergency_contact_modifiedby" for="x_modifiedby" class="<?php echo $patient_emergency_contact_add->LeftColumnClass ?>"><?php echo $patient_emergency_contact_add->modifiedby->caption() ?><?php echo $patient_emergency_contact_add->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_emergency_contact_add->RightColumnClass ?>"><div <?php echo $patient_emergency_contact_add->modifiedby->cellAttributes() ?>>
<span id="el_patient_emergency_contact_modifiedby">
<input type="text" data-table="patient_emergency_contact" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?php echo HtmlEncode($patient_emergency_contact_add->modifiedby->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact_add->modifiedby->EditValue ?>"<?php echo $patient_emergency_contact_add->modifiedby->editAttributes() ?>>
</span>
<?php echo $patient_emergency_contact_add->modifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_emergency_contact_add->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label id="elh_patient_emergency_contact_modifieddatetime" for="x_modifieddatetime" class="<?php echo $patient_emergency_contact_add->LeftColumnClass ?>"><?php echo $patient_emergency_contact_add->modifieddatetime->caption() ?><?php echo $patient_emergency_contact_add->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_emergency_contact_add->RightColumnClass ?>"><div <?php echo $patient_emergency_contact_add->modifieddatetime->cellAttributes() ?>>
<span id="el_patient_emergency_contact_modifieddatetime">
<input type="text" data-table="patient_emergency_contact" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($patient_emergency_contact_add->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact_add->modifieddatetime->EditValue ?>"<?php echo $patient_emergency_contact_add->modifieddatetime->editAttributes() ?>>
<?php if (!$patient_emergency_contact_add->modifieddatetime->ReadOnly && !$patient_emergency_contact_add->modifieddatetime->Disabled && !isset($patient_emergency_contact_add->modifieddatetime->EditAttrs["readonly"]) && !isset($patient_emergency_contact_add->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_emergency_contactadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_emergency_contactadd", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $patient_emergency_contact_add->modifieddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$patient_emergency_contact_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_emergency_contact_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_emergency_contact_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$patient_emergency_contact_add->showPageFooter();
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
$patient_emergency_contact_add->terminate();
?>