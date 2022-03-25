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
$pharmacy_edit = new pharmacy_edit();

// Run the page
$pharmacy_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpharmacyedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpharmacyedit = currentForm = new ew.Form("fpharmacyedit", "edit");

	// Validate form
	fpharmacyedit.validate = function() {
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
			<?php if ($pharmacy_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_edit->id->caption(), $pharmacy_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_edit->op_id->Required) { ?>
				elm = this.getElements("x" + infix + "_op_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_edit->op_id->caption(), $pharmacy_edit->op_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_op_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_edit->op_id->errorMessage()) ?>");
			<?php if ($pharmacy_edit->ip_id->Required) { ?>
				elm = this.getElements("x" + infix + "_ip_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_edit->ip_id->caption(), $pharmacy_edit->ip_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_edit->patient_id->Required) { ?>
				elm = this.getElements("x" + infix + "_patient_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_edit->patient_id->caption(), $pharmacy_edit->patient_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_patient_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_edit->patient_id->errorMessage()) ?>");
			<?php if ($pharmacy_edit->charged_date->Required) { ?>
				elm = this.getElements("x" + infix + "_charged_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_edit->charged_date->caption(), $pharmacy_edit->charged_date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_charged_date");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_edit->charged_date->errorMessage()) ?>");
			<?php if ($pharmacy_edit->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_edit->status->caption(), $pharmacy_edit->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_edit->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_edit->modifiedby->caption(), $pharmacy_edit->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_edit->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_edit->modifieddatetime->caption(), $pharmacy_edit->modifieddatetime->RequiredErrorMessage)) ?>");
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
	fpharmacyedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacyedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpharmacyedit.lists["x_ip_id"] = <?php echo $pharmacy_edit->ip_id->Lookup->toClientList($pharmacy_edit) ?>;
	fpharmacyedit.lists["x_ip_id"].options = <?php echo JsonEncode($pharmacy_edit->ip_id->lookupOptions()) ?>;
	fpharmacyedit.lists["x_status"] = <?php echo $pharmacy_edit->status->Lookup->toClientList($pharmacy_edit) ?>;
	fpharmacyedit.lists["x_status"].options = <?php echo JsonEncode($pharmacy_edit->status->lookupOptions()) ?>;
	loadjs.done("fpharmacyedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_edit->showPageHeader(); ?>
<?php
$pharmacy_edit->showMessage();
?>
<form name="fpharmacyedit" id="fpharmacyedit" class="<?php echo $pharmacy_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($pharmacy_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_pharmacy_id" class="<?php echo $pharmacy_edit->LeftColumnClass ?>"><?php echo $pharmacy_edit->id->caption() ?><?php echo $pharmacy_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_edit->RightColumnClass ?>"><div <?php echo $pharmacy_edit->id->cellAttributes() ?>>
<span id="el_pharmacy_id">
<span<?php echo $pharmacy_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($pharmacy_edit->id->CurrentValue) ?>">
<?php echo $pharmacy_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_edit->op_id->Visible) { // op_id ?>
	<div id="r_op_id" class="form-group row">
		<label id="elh_pharmacy_op_id" for="x_op_id" class="<?php echo $pharmacy_edit->LeftColumnClass ?>"><?php echo $pharmacy_edit->op_id->caption() ?><?php echo $pharmacy_edit->op_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_edit->RightColumnClass ?>"><div <?php echo $pharmacy_edit->op_id->cellAttributes() ?>>
<span id="el_pharmacy_op_id">
<input type="text" data-table="pharmacy" data-field="x_op_id" name="x_op_id" id="x_op_id" size="30" placeholder="<?php echo HtmlEncode($pharmacy_edit->op_id->getPlaceHolder()) ?>" value="<?php echo $pharmacy_edit->op_id->EditValue ?>"<?php echo $pharmacy_edit->op_id->editAttributes() ?>>
</span>
<?php echo $pharmacy_edit->op_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_edit->ip_id->Visible) { // ip_id ?>
	<div id="r_ip_id" class="form-group row">
		<label id="elh_pharmacy_ip_id" for="x_ip_id" class="<?php echo $pharmacy_edit->LeftColumnClass ?>"><?php echo $pharmacy_edit->ip_id->caption() ?><?php echo $pharmacy_edit->ip_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_edit->RightColumnClass ?>"><div <?php echo $pharmacy_edit->ip_id->cellAttributes() ?>>
<span id="el_pharmacy_ip_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy" data-field="x_ip_id" data-value-separator="<?php echo $pharmacy_edit->ip_id->displayValueSeparatorAttribute() ?>" id="x_ip_id" name="x_ip_id"<?php echo $pharmacy_edit->ip_id->editAttributes() ?>>
			<?php echo $pharmacy_edit->ip_id->selectOptionListHtml("x_ip_id") ?>
		</select>
</div>
<?php echo $pharmacy_edit->ip_id->Lookup->getParamTag($pharmacy_edit, "p_x_ip_id") ?>
</span>
<?php echo $pharmacy_edit->ip_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_edit->patient_id->Visible) { // patient_id ?>
	<div id="r_patient_id" class="form-group row">
		<label id="elh_pharmacy_patient_id" for="x_patient_id" class="<?php echo $pharmacy_edit->LeftColumnClass ?>"><?php echo $pharmacy_edit->patient_id->caption() ?><?php echo $pharmacy_edit->patient_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_edit->RightColumnClass ?>"><div <?php echo $pharmacy_edit->patient_id->cellAttributes() ?>>
<span id="el_pharmacy_patient_id">
<input type="text" data-table="pharmacy" data-field="x_patient_id" name="x_patient_id" id="x_patient_id" size="30" placeholder="<?php echo HtmlEncode($pharmacy_edit->patient_id->getPlaceHolder()) ?>" value="<?php echo $pharmacy_edit->patient_id->EditValue ?>"<?php echo $pharmacy_edit->patient_id->editAttributes() ?>>
</span>
<?php echo $pharmacy_edit->patient_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_edit->charged_date->Visible) { // charged_date ?>
	<div id="r_charged_date" class="form-group row">
		<label id="elh_pharmacy_charged_date" for="x_charged_date" class="<?php echo $pharmacy_edit->LeftColumnClass ?>"><?php echo $pharmacy_edit->charged_date->caption() ?><?php echo $pharmacy_edit->charged_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_edit->RightColumnClass ?>"><div <?php echo $pharmacy_edit->charged_date->cellAttributes() ?>>
<span id="el_pharmacy_charged_date">
<input type="text" data-table="pharmacy" data-field="x_charged_date" name="x_charged_date" id="x_charged_date" placeholder="<?php echo HtmlEncode($pharmacy_edit->charged_date->getPlaceHolder()) ?>" value="<?php echo $pharmacy_edit->charged_date->EditValue ?>"<?php echo $pharmacy_edit->charged_date->editAttributes() ?>>
<?php if (!$pharmacy_edit->charged_date->ReadOnly && !$pharmacy_edit->charged_date->Disabled && !isset($pharmacy_edit->charged_date->EditAttrs["readonly"]) && !isset($pharmacy_edit->charged_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacyedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacyedit", "x_charged_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_edit->charged_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_edit->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_pharmacy_status" for="x_status" class="<?php echo $pharmacy_edit->LeftColumnClass ?>"><?php echo $pharmacy_edit->status->caption() ?><?php echo $pharmacy_edit->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_edit->RightColumnClass ?>"><div <?php echo $pharmacy_edit->status->cellAttributes() ?>>
<span id="el_pharmacy_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy" data-field="x_status" data-value-separator="<?php echo $pharmacy_edit->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $pharmacy_edit->status->editAttributes() ?>>
			<?php echo $pharmacy_edit->status->selectOptionListHtml("x_status") ?>
		</select>
</div>
<?php echo $pharmacy_edit->status->Lookup->getParamTag($pharmacy_edit, "p_x_status") ?>
</span>
<?php echo $pharmacy_edit->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php
	if (in_array("pharmacy_services", explode(",", $pharmacy->getCurrentDetailTable())) && $pharmacy_services->DetailEdit) {
?>
<?php if ($pharmacy->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("pharmacy_services", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "pharmacy_servicesgrid.php" ?>
<?php } ?>
<?php if (!$pharmacy_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pharmacy_edit->showPageFooter();
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
$pharmacy_edit->terminate();
?>