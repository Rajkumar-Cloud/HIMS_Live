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
var fhospitaladdopt, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "addopt";
	fhospitaladdopt = currentForm = new ew.Form("fhospitaladdopt", "addopt");

	// Validate form
	fhospitaladdopt.validate = function() {
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
			<?php if ($hospital_addopt->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_addopt->id->caption(), $hospital_addopt->id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($hospital_addopt->id->errorMessage()) ?>");
			<?php if ($hospital_addopt->logo->Required) { ?>
				felm = this.getElements("x" + infix + "_logo");
				elm = this.getElements("fn_x" + infix + "_logo");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $hospital_addopt->logo->caption(), $hospital_addopt->logo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_addopt->hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_addopt->hospital->caption(), $hospital_addopt->hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_addopt->street->Required) { ?>
				elm = this.getElements("x" + infix + "_street");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_addopt->street->caption(), $hospital_addopt->street->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_addopt->area->Required) { ?>
				elm = this.getElements("x" + infix + "_area");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_addopt->area->caption(), $hospital_addopt->area->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_addopt->town->Required) { ?>
				elm = this.getElements("x" + infix + "_town");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_addopt->town->caption(), $hospital_addopt->town->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_addopt->province->Required) { ?>
				elm = this.getElements("x" + infix + "_province");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_addopt->province->caption(), $hospital_addopt->province->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_addopt->postal_code->Required) { ?>
				elm = this.getElements("x" + infix + "_postal_code");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_addopt->postal_code->caption(), $hospital_addopt->postal_code->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_addopt->phone_no->Required) { ?>
				elm = this.getElements("x" + infix + "_phone_no");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_addopt->phone_no->caption(), $hospital_addopt->phone_no->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_addopt->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_addopt->status->caption(), $hospital_addopt->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_addopt->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_addopt->createdby->caption(), $hospital_addopt->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_addopt->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_addopt->createddatetime->caption(), $hospital_addopt->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_addopt->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_addopt->modifiedby->caption(), $hospital_addopt->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_addopt->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_addopt->modifieddatetime->caption(), $hospital_addopt->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_addopt->PreFixCode->Required) { ?>
				elm = this.getElements("x" + infix + "_PreFixCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_addopt->PreFixCode->caption(), $hospital_addopt->PreFixCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_addopt->BillingGST->Required) { ?>
				elm = this.getElements("x" + infix + "_BillingGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_addopt->BillingGST->caption(), $hospital_addopt->BillingGST->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_addopt->pharmacyGST->Required) { ?>
				elm = this.getElements("x" + infix + "_pharmacyGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_addopt->pharmacyGST->caption(), $hospital_addopt->pharmacyGST->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fhospitaladdopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fhospitaladdopt.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fhospitaladdopt.lists["x_status"] = <?php echo $hospital_addopt->status->Lookup->toClientList($hospital_addopt) ?>;
	fhospitaladdopt.lists["x_status"].options = <?php echo JsonEncode($hospital_addopt->status->lookupOptions()) ?>;
	loadjs.done("fhospitaladdopt");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $hospital_addopt->showPageHeader(); ?>
<?php
$hospital_addopt->showMessage();
?>
<form name="fhospitaladdopt" id="fhospitaladdopt" class="ew-form ew-horizontal" action="<?php echo Config("API_URL") ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="<?php echo Config("API_ACTION_NAME") ?>" id="<?php echo Config("API_ACTION_NAME") ?>" value="<?php echo Config("API_ADD_ACTION") ?>">
<input type="hidden" name="<?php echo Config("API_OBJECT_NAME") ?>" id="<?php echo Config("API_OBJECT_NAME") ?>" value="<?php echo $hospital_addopt->TableVar ?>">
<input type="hidden" name="addopt" id="addopt" value="1">
<?php if ($hospital_addopt->id->Visible) { // id ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_id"><?php echo $hospital_addopt->id->caption() ?><?php echo $hospital_addopt->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="hospital" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($hospital_addopt->id->getPlaceHolder()) ?>" value="<?php echo $hospital_addopt->id->EditValue ?>"<?php echo $hospital_addopt->id->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($hospital_addopt->logo->Visible) { // logo ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label"><?php echo $hospital_addopt->logo->caption() ?><?php echo $hospital_addopt->logo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div id="fd_x_logo">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $hospital_addopt->logo->title() ?>" data-table="hospital" data-field="x_logo" name="x_logo" id="x_logo" lang="<?php echo CurrentLanguageID() ?>"<?php echo $hospital_addopt->logo->editAttributes() ?><?php if ($hospital_addopt->logo->ReadOnly || $hospital_addopt->logo->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x_logo"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x_logo" id= "fn_x_logo" value="<?php echo $hospital_addopt->logo->Upload->FileName ?>">
<input type="hidden" name="fa_x_logo" id= "fa_x_logo" value="0">
<input type="hidden" name="fs_x_logo" id= "fs_x_logo" value="450">
<input type="hidden" name="fx_x_logo" id= "fx_x_logo" value="<?php echo $hospital_addopt->logo->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_logo" id= "fm_x_logo" value="<?php echo $hospital_addopt->logo->UploadMaxFileSize ?>">
</div>
<table id="ft_x_logo" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</div>
	</div>
<?php } ?>
<?php if ($hospital_addopt->hospital->Visible) { // hospital ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_hospital"><?php echo $hospital_addopt->hospital->caption() ?><?php echo $hospital_addopt->hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="hospital" data-field="x_hospital" name="x_hospital" id="x_hospital" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hospital_addopt->hospital->getPlaceHolder()) ?>" value="<?php echo $hospital_addopt->hospital->EditValue ?>"<?php echo $hospital_addopt->hospital->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($hospital_addopt->street->Visible) { // street ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_street"><?php echo $hospital_addopt->street->caption() ?><?php echo $hospital_addopt->street->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="hospital" data-field="x_street" name="x_street" id="x_street" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hospital_addopt->street->getPlaceHolder()) ?>" value="<?php echo $hospital_addopt->street->EditValue ?>"<?php echo $hospital_addopt->street->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($hospital_addopt->area->Visible) { // area ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_area"><?php echo $hospital_addopt->area->caption() ?><?php echo $hospital_addopt->area->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="hospital" data-field="x_area" name="x_area" id="x_area" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($hospital_addopt->area->getPlaceHolder()) ?>" value="<?php echo $hospital_addopt->area->EditValue ?>"<?php echo $hospital_addopt->area->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($hospital_addopt->town->Visible) { // town ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_town"><?php echo $hospital_addopt->town->caption() ?><?php echo $hospital_addopt->town->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="hospital" data-field="x_town" name="x_town" id="x_town" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($hospital_addopt->town->getPlaceHolder()) ?>" value="<?php echo $hospital_addopt->town->EditValue ?>"<?php echo $hospital_addopt->town->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($hospital_addopt->province->Visible) { // province ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_province"><?php echo $hospital_addopt->province->caption() ?><?php echo $hospital_addopt->province->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="hospital" data-field="x_province" name="x_province" id="x_province" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($hospital_addopt->province->getPlaceHolder()) ?>" value="<?php echo $hospital_addopt->province->EditValue ?>"<?php echo $hospital_addopt->province->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($hospital_addopt->postal_code->Visible) { // postal_code ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_postal_code"><?php echo $hospital_addopt->postal_code->caption() ?><?php echo $hospital_addopt->postal_code->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="hospital" data-field="x_postal_code" name="x_postal_code" id="x_postal_code" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($hospital_addopt->postal_code->getPlaceHolder()) ?>" value="<?php echo $hospital_addopt->postal_code->EditValue ?>"<?php echo $hospital_addopt->postal_code->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($hospital_addopt->phone_no->Visible) { // phone_no ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_phone_no"><?php echo $hospital_addopt->phone_no->caption() ?><?php echo $hospital_addopt->phone_no->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="hospital" data-field="x_phone_no" name="x_phone_no" id="x_phone_no" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($hospital_addopt->phone_no->getPlaceHolder()) ?>" value="<?php echo $hospital_addopt->phone_no->EditValue ?>"<?php echo $hospital_addopt->phone_no->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($hospital_addopt->status->Visible) { // status ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_status"><?php echo $hospital_addopt->status->caption() ?><?php echo $hospital_addopt->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="hospital" data-field="x_status" data-value-separator="<?php echo $hospital_addopt->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $hospital_addopt->status->editAttributes() ?>>
			<?php echo $hospital_addopt->status->selectOptionListHtml("x_status") ?>
		</select>
</div>
<?php echo $hospital_addopt->status->Lookup->getParamTag($hospital_addopt, "p_x_status") ?>
</div>
	</div>
<?php } ?>
<?php if ($hospital_addopt->createdby->Visible) { // createdby ?>
	<input type="hidden" data-table="hospital" data-field="x_createdby" name="x_createdby" id="x_createdby" value="<?php echo HtmlEncode($hospital_addopt->createdby->CurrentValue) ?>">
<?php } ?>
<?php if ($hospital_addopt->createddatetime->Visible) { // createddatetime ?>
	<input type="hidden" data-table="hospital" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" value="<?php echo HtmlEncode($hospital_addopt->createddatetime->CurrentValue) ?>">
<?php } ?>
<?php if ($hospital_addopt->modifiedby->Visible) { // modifiedby ?>
	<input type="hidden" data-table="hospital" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" value="<?php echo HtmlEncode($hospital_addopt->modifiedby->CurrentValue) ?>">
<?php } ?>
<?php if ($hospital_addopt->modifieddatetime->Visible) { // modifieddatetime ?>
	<input type="hidden" data-table="hospital" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" value="<?php echo HtmlEncode($hospital_addopt->modifieddatetime->CurrentValue) ?>">
<?php } ?>
<?php if ($hospital_addopt->PreFixCode->Visible) { // PreFixCode ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_PreFixCode"><?php echo $hospital_addopt->PreFixCode->caption() ?><?php echo $hospital_addopt->PreFixCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="hospital" data-field="x_PreFixCode" name="x_PreFixCode" id="x_PreFixCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($hospital_addopt->PreFixCode->getPlaceHolder()) ?>" value="<?php echo $hospital_addopt->PreFixCode->EditValue ?>"<?php echo $hospital_addopt->PreFixCode->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($hospital_addopt->BillingGST->Visible) { // BillingGST ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_BillingGST"><?php echo $hospital_addopt->BillingGST->caption() ?><?php echo $hospital_addopt->BillingGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="hospital" data-field="x_BillingGST" name="x_BillingGST" id="x_BillingGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($hospital_addopt->BillingGST->getPlaceHolder()) ?>" value="<?php echo $hospital_addopt->BillingGST->EditValue ?>"<?php echo $hospital_addopt->BillingGST->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($hospital_addopt->pharmacyGST->Visible) { // pharmacyGST ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_pharmacyGST"><?php echo $hospital_addopt->pharmacyGST->caption() ?><?php echo $hospital_addopt->pharmacyGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="hospital" data-field="x_pharmacyGST" name="x_pharmacyGST" id="x_pharmacyGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($hospital_addopt->pharmacyGST->getPlaceHolder()) ?>" value="<?php echo $hospital_addopt->pharmacyGST->EditValue ?>"<?php echo $hospital_addopt->pharmacyGST->editAttributes() ?>>
</div>
	</div>
<?php } ?>
</form>
<?php
$hospital_addopt->showPageFooter();
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
<?php
$hospital_addopt->terminate();
?>