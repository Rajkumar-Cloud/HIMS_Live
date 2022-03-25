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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fpharmacyadd = currentForm = new ew.Form("fpharmacyadd", "add");

// Validate form
fpharmacyadd.validate = function() {
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
		<?php if ($pharmacy_add->op_id->Required) { ?>
			elm = this.getElements("x" + infix + "_op_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy->op_id->caption(), $pharmacy->op_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_op_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy->op_id->errorMessage()) ?>");
		<?php if ($pharmacy_add->ip_id->Required) { ?>
			elm = this.getElements("x" + infix + "_ip_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy->ip_id->caption(), $pharmacy->ip_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_add->patient_id->Required) { ?>
			elm = this.getElements("x" + infix + "_patient_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy->patient_id->caption(), $pharmacy->patient_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_patient_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy->patient_id->errorMessage()) ?>");
		<?php if ($pharmacy_add->charged_date->Required) { ?>
			elm = this.getElements("x" + infix + "_charged_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy->charged_date->caption(), $pharmacy->charged_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_charged_date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy->charged_date->errorMessage()) ?>");
		<?php if ($pharmacy_add->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy->status->caption(), $pharmacy->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_add->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy->createdby->caption(), $pharmacy->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_add->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy->createddatetime->caption(), $pharmacy->createddatetime->RequiredErrorMessage)) ?>");
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
fpharmacyadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacyadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacyadd.lists["x_ip_id"] = <?php echo $pharmacy_add->ip_id->Lookup->toClientList() ?>;
fpharmacyadd.lists["x_ip_id"].options = <?php echo JsonEncode($pharmacy_add->ip_id->lookupOptions()) ?>;
fpharmacyadd.lists["x_status"] = <?php echo $pharmacy_add->status->Lookup->toClientList() ?>;
fpharmacyadd.lists["x_status"].options = <?php echo JsonEncode($pharmacy_add->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_add->showPageHeader(); ?>
<?php
$pharmacy_add->showMessage();
?>
<form name="fpharmacyadd" id="fpharmacyadd" class="<?php echo $pharmacy_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($pharmacy->op_id->Visible) { // op_id ?>
	<div id="r_op_id" class="form-group row">
		<label id="elh_pharmacy_op_id" for="x_op_id" class="<?php echo $pharmacy_add->LeftColumnClass ?>"><?php echo $pharmacy->op_id->caption() ?><?php echo ($pharmacy->op_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_add->RightColumnClass ?>"><div<?php echo $pharmacy->op_id->cellAttributes() ?>>
<span id="el_pharmacy_op_id">
<input type="text" data-table="pharmacy" data-field="x_op_id" name="x_op_id" id="x_op_id" size="30" placeholder="<?php echo HtmlEncode($pharmacy->op_id->getPlaceHolder()) ?>" value="<?php echo $pharmacy->op_id->EditValue ?>"<?php echo $pharmacy->op_id->editAttributes() ?>>
</span>
<?php echo $pharmacy->op_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy->ip_id->Visible) { // ip_id ?>
	<div id="r_ip_id" class="form-group row">
		<label id="elh_pharmacy_ip_id" for="x_ip_id" class="<?php echo $pharmacy_add->LeftColumnClass ?>"><?php echo $pharmacy->ip_id->caption() ?><?php echo ($pharmacy->ip_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_add->RightColumnClass ?>"><div<?php echo $pharmacy->ip_id->cellAttributes() ?>>
<span id="el_pharmacy_ip_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy" data-field="x_ip_id" data-value-separator="<?php echo $pharmacy->ip_id->displayValueSeparatorAttribute() ?>" id="x_ip_id" name="x_ip_id"<?php echo $pharmacy->ip_id->editAttributes() ?>>
		<?php echo $pharmacy->ip_id->selectOptionListHtml("x_ip_id") ?>
	</select>
</div>
<?php echo $pharmacy->ip_id->Lookup->getParamTag("p_x_ip_id") ?>
</span>
<?php echo $pharmacy->ip_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy->patient_id->Visible) { // patient_id ?>
	<div id="r_patient_id" class="form-group row">
		<label id="elh_pharmacy_patient_id" for="x_patient_id" class="<?php echo $pharmacy_add->LeftColumnClass ?>"><?php echo $pharmacy->patient_id->caption() ?><?php echo ($pharmacy->patient_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_add->RightColumnClass ?>"><div<?php echo $pharmacy->patient_id->cellAttributes() ?>>
<span id="el_pharmacy_patient_id">
<input type="text" data-table="pharmacy" data-field="x_patient_id" name="x_patient_id" id="x_patient_id" size="30" placeholder="<?php echo HtmlEncode($pharmacy->patient_id->getPlaceHolder()) ?>" value="<?php echo $pharmacy->patient_id->EditValue ?>"<?php echo $pharmacy->patient_id->editAttributes() ?>>
</span>
<?php echo $pharmacy->patient_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy->charged_date->Visible) { // charged_date ?>
	<div id="r_charged_date" class="form-group row">
		<label id="elh_pharmacy_charged_date" for="x_charged_date" class="<?php echo $pharmacy_add->LeftColumnClass ?>"><?php echo $pharmacy->charged_date->caption() ?><?php echo ($pharmacy->charged_date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_add->RightColumnClass ?>"><div<?php echo $pharmacy->charged_date->cellAttributes() ?>>
<span id="el_pharmacy_charged_date">
<input type="text" data-table="pharmacy" data-field="x_charged_date" name="x_charged_date" id="x_charged_date" placeholder="<?php echo HtmlEncode($pharmacy->charged_date->getPlaceHolder()) ?>" value="<?php echo $pharmacy->charged_date->EditValue ?>"<?php echo $pharmacy->charged_date->editAttributes() ?>>
<?php if (!$pharmacy->charged_date->ReadOnly && !$pharmacy->charged_date->Disabled && !isset($pharmacy->charged_date->EditAttrs["readonly"]) && !isset($pharmacy->charged_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacyadd", "x_charged_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $pharmacy->charged_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_pharmacy_status" for="x_status" class="<?php echo $pharmacy_add->LeftColumnClass ?>"><?php echo $pharmacy->status->caption() ?><?php echo ($pharmacy->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_add->RightColumnClass ?>"><div<?php echo $pharmacy->status->cellAttributes() ?>>
<span id="el_pharmacy_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy" data-field="x_status" data-value-separator="<?php echo $pharmacy->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $pharmacy->status->editAttributes() ?>>
		<?php echo $pharmacy->status->selectOptionListHtml("x_status") ?>
	</select>
</div>
<?php echo $pharmacy->status->Lookup->getParamTag("p_x_status") ?>
</span>
<?php echo $pharmacy->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php
	if (in_array("pharmacy_services", explode(",", $pharmacy->getCurrentDetailTable())) && $pharmacy_services->DetailAdd) {
?>
<?php if ($pharmacy->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("pharmacy_services", "TblCaption") ?></h4>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_add->terminate();
?>