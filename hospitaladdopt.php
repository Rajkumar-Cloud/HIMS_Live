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
$hospital_addopt = new hospital_addopt();

// Run the page
$hospital_addopt->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hospital_addopt->Page_Render();
?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "addopt";
var fhospitaladdopt = currentForm = new ew.Form("fhospitaladdopt", "addopt");

// Validate form
fhospitaladdopt.validate = function() {
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
		<?php if ($hospital_addopt->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital->id->caption(), $hospital->id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($hospital->id->errorMessage()) ?>");
		<?php if ($hospital_addopt->logo->Required) { ?>
			felm = this.getElements("x" + infix + "_logo");
			elm = this.getElements("fn_x" + infix + "_logo");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $hospital->logo->caption(), $hospital->logo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_addopt->hospital->Required) { ?>
			elm = this.getElements("x" + infix + "_hospital");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital->hospital->caption(), $hospital->hospital->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_addopt->street->Required) { ?>
			elm = this.getElements("x" + infix + "_street");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital->street->caption(), $hospital->street->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_addopt->area->Required) { ?>
			elm = this.getElements("x" + infix + "_area");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital->area->caption(), $hospital->area->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_addopt->town->Required) { ?>
			elm = this.getElements("x" + infix + "_town");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital->town->caption(), $hospital->town->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_addopt->province->Required) { ?>
			elm = this.getElements("x" + infix + "_province");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital->province->caption(), $hospital->province->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_addopt->postal_code->Required) { ?>
			elm = this.getElements("x" + infix + "_postal_code");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital->postal_code->caption(), $hospital->postal_code->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_addopt->phone_no->Required) { ?>
			elm = this.getElements("x" + infix + "_phone_no");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital->phone_no->caption(), $hospital->phone_no->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_addopt->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital->status->caption(), $hospital->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_addopt->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital->createdby->caption(), $hospital->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_addopt->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital->createddatetime->caption(), $hospital->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_addopt->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital->modifiedby->caption(), $hospital->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_addopt->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital->modifieddatetime->caption(), $hospital->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_addopt->PreFixCode->Required) { ?>
			elm = this.getElements("x" + infix + "_PreFixCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital->PreFixCode->caption(), $hospital->PreFixCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_addopt->BillingGST->Required) { ?>
			elm = this.getElements("x" + infix + "_BillingGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital->BillingGST->caption(), $hospital->BillingGST->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_addopt->pharmacyGST->Required) { ?>
			elm = this.getElements("x" + infix + "_pharmacyGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital->pharmacyGST->caption(), $hospital->pharmacyGST->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
fhospitaladdopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhospitaladdopt.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhospitaladdopt.lists["x_status"] = <?php echo $hospital_addopt->status->Lookup->toClientList() ?>;
fhospitaladdopt.lists["x_status"].options = <?php echo JsonEncode($hospital_addopt->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hospital_addopt->showPageHeader(); ?>
<?php
$hospital_addopt->showMessage();
?>
<form name="fhospitaladdopt" id="fhospitaladdopt" class="ew-form ew-horizontal" action="<?php echo API_URL ?>" method="post">
<?php //if ($hospital_addopt->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hospital_addopt->Token ?>">
<?php //} ?>
<input type="hidden" name="<?php echo API_ACTION_NAME ?>" id="<?php echo API_ACTION_NAME ?>" value="<?php echo API_ADD_ACTION ?>">
<input type="hidden" name="<?php echo API_OBJECT_NAME ?>" id="<?php echo API_OBJECT_NAME ?>" value="<?php echo $hospital_addopt->TableVar ?>">
<?php if ($hospital->id->Visible) { // id ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_id"><?php echo $hospital->id->caption() ?><?php echo ($hospital->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="hospital" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($hospital->id->getPlaceHolder()) ?>" value="<?php echo $hospital->id->EditValue ?>"<?php echo $hospital->id->editAttributes() ?>>
<?php echo $hospital->id->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($hospital->logo->Visible) { // logo ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label"><?php echo $hospital->logo->caption() ?><?php echo ($hospital->logo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div id="fd_x_logo">
<span title="<?php echo $hospital->logo->title() ? $hospital->logo->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($hospital->logo->ReadOnly || $hospital->logo->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="hospital" data-field="x_logo" name="x_logo" id="x_logo"<?php echo $hospital->logo->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x_logo" id= "fn_x_logo" value="<?php echo $hospital->logo->Upload->FileName ?>">
<input type="hidden" name="fa_x_logo" id= "fa_x_logo" value="0">
<input type="hidden" name="fs_x_logo" id= "fs_x_logo" value="450">
<input type="hidden" name="fx_x_logo" id= "fx_x_logo" value="<?php echo $hospital->logo->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_logo" id= "fm_x_logo" value="<?php echo $hospital->logo->UploadMaxFileSize ?>">
</div>
<table id="ft_x_logo" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
<?php echo $hospital->logo->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($hospital->hospital->Visible) { // hospital ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_hospital"><?php echo $hospital->hospital->caption() ?><?php echo ($hospital->hospital->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="hospital" data-field="x_hospital" name="x_hospital" id="x_hospital" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hospital->hospital->getPlaceHolder()) ?>" value="<?php echo $hospital->hospital->EditValue ?>"<?php echo $hospital->hospital->editAttributes() ?>>
<?php echo $hospital->hospital->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($hospital->street->Visible) { // street ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_street"><?php echo $hospital->street->caption() ?><?php echo ($hospital->street->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="hospital" data-field="x_street" name="x_street" id="x_street" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hospital->street->getPlaceHolder()) ?>" value="<?php echo $hospital->street->EditValue ?>"<?php echo $hospital->street->editAttributes() ?>>
<?php echo $hospital->street->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($hospital->area->Visible) { // area ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_area"><?php echo $hospital->area->caption() ?><?php echo ($hospital->area->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="hospital" data-field="x_area" name="x_area" id="x_area" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($hospital->area->getPlaceHolder()) ?>" value="<?php echo $hospital->area->EditValue ?>"<?php echo $hospital->area->editAttributes() ?>>
<?php echo $hospital->area->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($hospital->town->Visible) { // town ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_town"><?php echo $hospital->town->caption() ?><?php echo ($hospital->town->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="hospital" data-field="x_town" name="x_town" id="x_town" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($hospital->town->getPlaceHolder()) ?>" value="<?php echo $hospital->town->EditValue ?>"<?php echo $hospital->town->editAttributes() ?>>
<?php echo $hospital->town->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($hospital->province->Visible) { // province ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_province"><?php echo $hospital->province->caption() ?><?php echo ($hospital->province->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="hospital" data-field="x_province" name="x_province" id="x_province" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($hospital->province->getPlaceHolder()) ?>" value="<?php echo $hospital->province->EditValue ?>"<?php echo $hospital->province->editAttributes() ?>>
<?php echo $hospital->province->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($hospital->postal_code->Visible) { // postal_code ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_postal_code"><?php echo $hospital->postal_code->caption() ?><?php echo ($hospital->postal_code->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="hospital" data-field="x_postal_code" name="x_postal_code" id="x_postal_code" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($hospital->postal_code->getPlaceHolder()) ?>" value="<?php echo $hospital->postal_code->EditValue ?>"<?php echo $hospital->postal_code->editAttributes() ?>>
<?php echo $hospital->postal_code->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($hospital->phone_no->Visible) { // phone_no ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_phone_no"><?php echo $hospital->phone_no->caption() ?><?php echo ($hospital->phone_no->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="hospital" data-field="x_phone_no" name="x_phone_no" id="x_phone_no" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($hospital->phone_no->getPlaceHolder()) ?>" value="<?php echo $hospital->phone_no->EditValue ?>"<?php echo $hospital->phone_no->editAttributes() ?>>
<?php echo $hospital->phone_no->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($hospital->status->Visible) { // status ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_status"><?php echo $hospital->status->caption() ?><?php echo ($hospital->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="hospital" data-field="x_status" data-value-separator="<?php echo $hospital->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $hospital->status->editAttributes() ?>>
		<?php echo $hospital->status->selectOptionListHtml("x_status") ?>
	</select>
</div>
<?php echo $hospital->status->Lookup->getParamTag("p_x_status") ?>
<?php echo $hospital->status->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($hospital->createdby->Visible) { // createdby ?>
	<input type="hidden" data-table="hospital" data-field="x_createdby" name="x_createdby" id="x_createdby" value="<?php echo HtmlEncode($hospital->createdby->CurrentValue) ?>">
<?php } ?>
<?php if ($hospital->createddatetime->Visible) { // createddatetime ?>
	<input type="hidden" data-table="hospital" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" value="<?php echo HtmlEncode($hospital->createddatetime->CurrentValue) ?>">
	<?php if (!$hospital->createddatetime->ReadOnly && !$hospital->createddatetime->Disabled && !isset($hospital->createddatetime->EditAttrs["readonly"]) && !isset($hospital->createddatetime->EditAttrs["disabled"])) { ?>
	<script>
	ew.createDateTimePicker("fhospitaladdopt", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
	</script>
	<?php } ?>
<?php } ?>
<?php if ($hospital->modifiedby->Visible) { // modifiedby ?>
	<input type="hidden" data-table="hospital" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" value="<?php echo HtmlEncode($hospital->modifiedby->CurrentValue) ?>">
<?php } ?>
<?php if ($hospital->modifieddatetime->Visible) { // modifieddatetime ?>
	<input type="hidden" data-table="hospital" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" value="<?php echo HtmlEncode($hospital->modifieddatetime->CurrentValue) ?>">
	<?php if (!$hospital->modifieddatetime->ReadOnly && !$hospital->modifieddatetime->Disabled && !isset($hospital->modifieddatetime->EditAttrs["readonly"]) && !isset($hospital->modifieddatetime->EditAttrs["disabled"])) { ?>
	<script>
	ew.createDateTimePicker("fhospitaladdopt", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
	</script>
	<?php } ?>
<?php } ?>
<?php if ($hospital->PreFixCode->Visible) { // PreFixCode ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_PreFixCode"><?php echo $hospital->PreFixCode->caption() ?><?php echo ($hospital->PreFixCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="hospital" data-field="x_PreFixCode" name="x_PreFixCode" id="x_PreFixCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($hospital->PreFixCode->getPlaceHolder()) ?>" value="<?php echo $hospital->PreFixCode->EditValue ?>"<?php echo $hospital->PreFixCode->editAttributes() ?>>
<?php echo $hospital->PreFixCode->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($hospital->BillingGST->Visible) { // BillingGST ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_BillingGST"><?php echo $hospital->BillingGST->caption() ?><?php echo ($hospital->BillingGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="hospital" data-field="x_BillingGST" name="x_BillingGST" id="x_BillingGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($hospital->BillingGST->getPlaceHolder()) ?>" value="<?php echo $hospital->BillingGST->EditValue ?>"<?php echo $hospital->BillingGST->editAttributes() ?>>
<?php echo $hospital->BillingGST->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($hospital->pharmacyGST->Visible) { // pharmacyGST ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_pharmacyGST"><?php echo $hospital->pharmacyGST->caption() ?><?php echo ($hospital->pharmacyGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="hospital" data-field="x_pharmacyGST" name="x_pharmacyGST" id="x_pharmacyGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($hospital->pharmacyGST->getPlaceHolder()) ?>" value="<?php echo $hospital->pharmacyGST->EditValue ?>"<?php echo $hospital->pharmacyGST->editAttributes() ?>>
<?php echo $hospital->pharmacyGST->CustomMsg ?></div>
	</div>
<?php } ?>
</form>
<?php
$hospital_addopt->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php
$hospital_addopt->terminate();
?>