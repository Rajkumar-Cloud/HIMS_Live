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
$pharmacy_add = new pharmacy_add();

// Run the page
$pharmacy_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpharmacyadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpharmacyadd = currentForm = new ew.Form("fpharmacyadd", "add");

	// Validate form
	fpharmacyadd.validate = function() {
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
			<?php if ($pharmacy_add->op_id->Required) { ?>
				elm = this.getElements("x" + infix + "_op_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_add->op_id->caption(), $pharmacy_add->op_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_op_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_add->op_id->errorMessage()) ?>");
			<?php if ($pharmacy_add->ip_id->Required) { ?>
				elm = this.getElements("x" + infix + "_ip_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_add->ip_id->caption(), $pharmacy_add->ip_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_add->patient_id->Required) { ?>
				elm = this.getElements("x" + infix + "_patient_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_add->patient_id->caption(), $pharmacy_add->patient_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_patient_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_add->patient_id->errorMessage()) ?>");
			<?php if ($pharmacy_add->charged_date->Required) { ?>
				elm = this.getElements("x" + infix + "_charged_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_add->charged_date->caption(), $pharmacy_add->charged_date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_charged_date");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_add->charged_date->errorMessage()) ?>");
			<?php if ($pharmacy_add->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_add->status->caption(), $pharmacy_add->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_add->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_add->createdby->caption(), $pharmacy_add->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_add->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_add->createddatetime->caption(), $pharmacy_add->createddatetime->RequiredErrorMessage)) ?>");
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
	fpharmacyadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacyadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpharmacyadd.lists["x_ip_id"] = <?php echo $pharmacy_add->ip_id->Lookup->toClientList($pharmacy_add) ?>;
	fpharmacyadd.lists["x_ip_id"].options = <?php echo JsonEncode($pharmacy_add->ip_id->lookupOptions()) ?>;
	fpharmacyadd.lists["x_status"] = <?php echo $pharmacy_add->status->Lookup->toClientList($pharmacy_add) ?>;
	fpharmacyadd.lists["x_status"].options = <?php echo JsonEncode($pharmacy_add->status->lookupOptions()) ?>;
	loadjs.done("fpharmacyadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_add->showPageHeader(); ?>
<?php
$pharmacy_add->showMessage();
?>
<form name="fpharmacyadd" id="fpharmacyadd" class="<?php echo $pharmacy_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($pharmacy_add->op_id->Visible) { // op_id ?>
	<div id="r_op_id" class="form-group row">
		<label id="elh_pharmacy_op_id" for="x_op_id" class="<?php echo $pharmacy_add->LeftColumnClass ?>"><?php echo $pharmacy_add->op_id->caption() ?><?php echo $pharmacy_add->op_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_add->RightColumnClass ?>"><div <?php echo $pharmacy_add->op_id->cellAttributes() ?>>
<span id="el_pharmacy_op_id">
<input type="text" data-table="pharmacy" data-field="x_op_id" name="x_op_id" id="x_op_id" size="30" placeholder="<?php echo HtmlEncode($pharmacy_add->op_id->getPlaceHolder()) ?>" value="<?php echo $pharmacy_add->op_id->EditValue ?>"<?php echo $pharmacy_add->op_id->editAttributes() ?>>
</span>
<?php echo $pharmacy_add->op_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_add->ip_id->Visible) { // ip_id ?>
	<div id="r_ip_id" class="form-group row">
		<label id="elh_pharmacy_ip_id" for="x_ip_id" class="<?php echo $pharmacy_add->LeftColumnClass ?>"><?php echo $pharmacy_add->ip_id->caption() ?><?php echo $pharmacy_add->ip_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_add->RightColumnClass ?>"><div <?php echo $pharmacy_add->ip_id->cellAttributes() ?>>
<span id="el_pharmacy_ip_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy" data-field="x_ip_id" data-value-separator="<?php echo $pharmacy_add->ip_id->displayValueSeparatorAttribute() ?>" id="x_ip_id" name="x_ip_id"<?php echo $pharmacy_add->ip_id->editAttributes() ?>>
			<?php echo $pharmacy_add->ip_id->selectOptionListHtml("x_ip_id") ?>
		</select>
</div>
<?php echo $pharmacy_add->ip_id->Lookup->getParamTag($pharmacy_add, "p_x_ip_id") ?>
</span>
<?php echo $pharmacy_add->ip_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_add->patient_id->Visible) { // patient_id ?>
	<div id="r_patient_id" class="form-group row">
		<label id="elh_pharmacy_patient_id" for="x_patient_id" class="<?php echo $pharmacy_add->LeftColumnClass ?>"><?php echo $pharmacy_add->patient_id->caption() ?><?php echo $pharmacy_add->patient_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_add->RightColumnClass ?>"><div <?php echo $pharmacy_add->patient_id->cellAttributes() ?>>
<span id="el_pharmacy_patient_id">
<input type="text" data-table="pharmacy" data-field="x_patient_id" name="x_patient_id" id="x_patient_id" size="30" placeholder="<?php echo HtmlEncode($pharmacy_add->patient_id->getPlaceHolder()) ?>" value="<?php echo $pharmacy_add->patient_id->EditValue ?>"<?php echo $pharmacy_add->patient_id->editAttributes() ?>>
</span>
<?php echo $pharmacy_add->patient_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_add->charged_date->Visible) { // charged_date ?>
	<div id="r_charged_date" class="form-group row">
		<label id="elh_pharmacy_charged_date" for="x_charged_date" class="<?php echo $pharmacy_add->LeftColumnClass ?>"><?php echo $pharmacy_add->charged_date->caption() ?><?php echo $pharmacy_add->charged_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_add->RightColumnClass ?>"><div <?php echo $pharmacy_add->charged_date->cellAttributes() ?>>
<span id="el_pharmacy_charged_date">
<input type="text" data-table="pharmacy" data-field="x_charged_date" name="x_charged_date" id="x_charged_date" placeholder="<?php echo HtmlEncode($pharmacy_add->charged_date->getPlaceHolder()) ?>" value="<?php echo $pharmacy_add->charged_date->EditValue ?>"<?php echo $pharmacy_add->charged_date->editAttributes() ?>>
<?php if (!$pharmacy_add->charged_date->ReadOnly && !$pharmacy_add->charged_date->Disabled && !isset($pharmacy_add->charged_date->EditAttrs["readonly"]) && !isset($pharmacy_add->charged_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacyadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacyadd", "x_charged_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_add->charged_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_add->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_pharmacy_status" for="x_status" class="<?php echo $pharmacy_add->LeftColumnClass ?>"><?php echo $pharmacy_add->status->caption() ?><?php echo $pharmacy_add->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_add->RightColumnClass ?>"><div <?php echo $pharmacy_add->status->cellAttributes() ?>>
<span id="el_pharmacy_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy" data-field="x_status" data-value-separator="<?php echo $pharmacy_add->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $pharmacy_add->status->editAttributes() ?>>
			<?php echo $pharmacy_add->status->selectOptionListHtml("x_status") ?>
		</select>
</div>
<?php echo $pharmacy_add->status->Lookup->getParamTag($pharmacy_add, "p_x_status") ?>
</span>
<?php echo $pharmacy_add->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php
	if (in_array("pharmacy_services", explode(",", $pharmacy->getCurrentDetailTable())) && $pharmacy_services->DetailAdd) {
?>
<?php if ($pharmacy->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("pharmacy_services", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "pharmacy_servicesgrid.php" ?>
<?php } ?>
<?php if (!$pharmacy_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pharmacy_add->showPageFooter();
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
$pharmacy_add->terminate();
?>