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
$hospital_edit = new hospital_edit();

// Run the page
$hospital_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hospital_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fhospitaledit = currentForm = new ew.Form("fhospitaledit", "edit");

// Validate form
fhospitaledit.validate = function() {
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
		<?php if ($hospital_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital->id->caption(), $hospital->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_edit->logo->Required) { ?>
			felm = this.getElements("x" + infix + "_logo");
			elm = this.getElements("fn_x" + infix + "_logo");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $hospital->logo->caption(), $hospital->logo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_edit->hospital->Required) { ?>
			elm = this.getElements("x" + infix + "_hospital");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital->hospital->caption(), $hospital->hospital->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_edit->street->Required) { ?>
			elm = this.getElements("x" + infix + "_street");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital->street->caption(), $hospital->street->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_edit->area->Required) { ?>
			elm = this.getElements("x" + infix + "_area");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital->area->caption(), $hospital->area->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_edit->town->Required) { ?>
			elm = this.getElements("x" + infix + "_town");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital->town->caption(), $hospital->town->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_edit->province->Required) { ?>
			elm = this.getElements("x" + infix + "_province");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital->province->caption(), $hospital->province->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_edit->postal_code->Required) { ?>
			elm = this.getElements("x" + infix + "_postal_code");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital->postal_code->caption(), $hospital->postal_code->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_edit->phone_no->Required) { ?>
			elm = this.getElements("x" + infix + "_phone_no");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital->phone_no->caption(), $hospital->phone_no->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_edit->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital->status->caption(), $hospital->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_edit->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital->modifiedby->caption(), $hospital->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_edit->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital->modifieddatetime->caption(), $hospital->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_edit->PreFixCode->Required) { ?>
			elm = this.getElements("x" + infix + "_PreFixCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital->PreFixCode->caption(), $hospital->PreFixCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_edit->BillingGST->Required) { ?>
			elm = this.getElements("x" + infix + "_BillingGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital->BillingGST->caption(), $hospital->BillingGST->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_edit->pharmacyGST->Required) { ?>
			elm = this.getElements("x" + infix + "_pharmacyGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital->pharmacyGST->caption(), $hospital->pharmacyGST->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_edit->Country->Required) { ?>
			elm = this.getElements("x" + infix + "_Country");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital->Country->caption(), $hospital->Country->RequiredErrorMessage)) ?>");
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
fhospitaledit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhospitaledit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhospitaledit.lists["x_status"] = <?php echo $hospital_edit->status->Lookup->toClientList() ?>;
fhospitaledit.lists["x_status"].options = <?php echo JsonEncode($hospital_edit->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hospital_edit->showPageHeader(); ?>
<?php
$hospital_edit->showMessage();
?>
<form name="fhospitaledit" id="fhospitaledit" class="<?php echo $hospital_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hospital_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hospital_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hospital">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$hospital_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($hospital->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_hospital_id" class="<?php echo $hospital_edit->LeftColumnClass ?>"><?php echo $hospital->id->caption() ?><?php echo ($hospital->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_edit->RightColumnClass ?>"><div<?php echo $hospital->id->cellAttributes() ?>>
<span id="el_hospital_id">
<span<?php echo $hospital->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($hospital->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="hospital" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($hospital->id->CurrentValue) ?>">
<?php echo $hospital->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital->logo->Visible) { // logo ?>
	<div id="r_logo" class="form-group row">
		<label id="elh_hospital_logo" class="<?php echo $hospital_edit->LeftColumnClass ?>"><?php echo $hospital->logo->caption() ?><?php echo ($hospital->logo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_edit->RightColumnClass ?>"><div<?php echo $hospital->logo->cellAttributes() ?>>
<span id="el_hospital_logo">
<div id="fd_x_logo">
<span title="<?php echo $hospital->logo->title() ? $hospital->logo->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($hospital->logo->ReadOnly || $hospital->logo->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="hospital" data-field="x_logo" name="x_logo" id="x_logo"<?php echo $hospital->logo->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x_logo" id= "fn_x_logo" value="<?php echo $hospital->logo->Upload->FileName ?>">
<?php if (Post("fa_x_logo") == "0") { ?>
<input type="hidden" name="fa_x_logo" id= "fa_x_logo" value="0">
<?php } else { ?>
<input type="hidden" name="fa_x_logo" id= "fa_x_logo" value="1">
<?php } ?>
<input type="hidden" name="fs_x_logo" id= "fs_x_logo" value="450">
<input type="hidden" name="fx_x_logo" id= "fx_x_logo" value="<?php echo $hospital->logo->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_logo" id= "fm_x_logo" value="<?php echo $hospital->logo->UploadMaxFileSize ?>">
</div>
<table id="ft_x_logo" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $hospital->logo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital->hospital->Visible) { // hospital ?>
	<div id="r_hospital" class="form-group row">
		<label id="elh_hospital_hospital" for="x_hospital" class="<?php echo $hospital_edit->LeftColumnClass ?>"><?php echo $hospital->hospital->caption() ?><?php echo ($hospital->hospital->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_edit->RightColumnClass ?>"><div<?php echo $hospital->hospital->cellAttributes() ?>>
<span id="el_hospital_hospital">
<input type="text" data-table="hospital" data-field="x_hospital" name="x_hospital" id="x_hospital" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hospital->hospital->getPlaceHolder()) ?>" value="<?php echo $hospital->hospital->EditValue ?>"<?php echo $hospital->hospital->editAttributes() ?>>
</span>
<?php echo $hospital->hospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital->street->Visible) { // street ?>
	<div id="r_street" class="form-group row">
		<label id="elh_hospital_street" for="x_street" class="<?php echo $hospital_edit->LeftColumnClass ?>"><?php echo $hospital->street->caption() ?><?php echo ($hospital->street->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_edit->RightColumnClass ?>"><div<?php echo $hospital->street->cellAttributes() ?>>
<span id="el_hospital_street">
<input type="text" data-table="hospital" data-field="x_street" name="x_street" id="x_street" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hospital->street->getPlaceHolder()) ?>" value="<?php echo $hospital->street->EditValue ?>"<?php echo $hospital->street->editAttributes() ?>>
</span>
<?php echo $hospital->street->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital->area->Visible) { // area ?>
	<div id="r_area" class="form-group row">
		<label id="elh_hospital_area" for="x_area" class="<?php echo $hospital_edit->LeftColumnClass ?>"><?php echo $hospital->area->caption() ?><?php echo ($hospital->area->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_edit->RightColumnClass ?>"><div<?php echo $hospital->area->cellAttributes() ?>>
<span id="el_hospital_area">
<input type="text" data-table="hospital" data-field="x_area" name="x_area" id="x_area" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($hospital->area->getPlaceHolder()) ?>" value="<?php echo $hospital->area->EditValue ?>"<?php echo $hospital->area->editAttributes() ?>>
</span>
<?php echo $hospital->area->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital->town->Visible) { // town ?>
	<div id="r_town" class="form-group row">
		<label id="elh_hospital_town" for="x_town" class="<?php echo $hospital_edit->LeftColumnClass ?>"><?php echo $hospital->town->caption() ?><?php echo ($hospital->town->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_edit->RightColumnClass ?>"><div<?php echo $hospital->town->cellAttributes() ?>>
<span id="el_hospital_town">
<input type="text" data-table="hospital" data-field="x_town" name="x_town" id="x_town" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($hospital->town->getPlaceHolder()) ?>" value="<?php echo $hospital->town->EditValue ?>"<?php echo $hospital->town->editAttributes() ?>>
</span>
<?php echo $hospital->town->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital->province->Visible) { // province ?>
	<div id="r_province" class="form-group row">
		<label id="elh_hospital_province" for="x_province" class="<?php echo $hospital_edit->LeftColumnClass ?>"><?php echo $hospital->province->caption() ?><?php echo ($hospital->province->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_edit->RightColumnClass ?>"><div<?php echo $hospital->province->cellAttributes() ?>>
<span id="el_hospital_province">
<input type="text" data-table="hospital" data-field="x_province" name="x_province" id="x_province" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($hospital->province->getPlaceHolder()) ?>" value="<?php echo $hospital->province->EditValue ?>"<?php echo $hospital->province->editAttributes() ?>>
</span>
<?php echo $hospital->province->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital->postal_code->Visible) { // postal_code ?>
	<div id="r_postal_code" class="form-group row">
		<label id="elh_hospital_postal_code" for="x_postal_code" class="<?php echo $hospital_edit->LeftColumnClass ?>"><?php echo $hospital->postal_code->caption() ?><?php echo ($hospital->postal_code->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_edit->RightColumnClass ?>"><div<?php echo $hospital->postal_code->cellAttributes() ?>>
<span id="el_hospital_postal_code">
<input type="text" data-table="hospital" data-field="x_postal_code" name="x_postal_code" id="x_postal_code" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($hospital->postal_code->getPlaceHolder()) ?>" value="<?php echo $hospital->postal_code->EditValue ?>"<?php echo $hospital->postal_code->editAttributes() ?>>
</span>
<?php echo $hospital->postal_code->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital->phone_no->Visible) { // phone_no ?>
	<div id="r_phone_no" class="form-group row">
		<label id="elh_hospital_phone_no" for="x_phone_no" class="<?php echo $hospital_edit->LeftColumnClass ?>"><?php echo $hospital->phone_no->caption() ?><?php echo ($hospital->phone_no->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_edit->RightColumnClass ?>"><div<?php echo $hospital->phone_no->cellAttributes() ?>>
<span id="el_hospital_phone_no">
<input type="text" data-table="hospital" data-field="x_phone_no" name="x_phone_no" id="x_phone_no" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($hospital->phone_no->getPlaceHolder()) ?>" value="<?php echo $hospital->phone_no->EditValue ?>"<?php echo $hospital->phone_no->editAttributes() ?>>
</span>
<?php echo $hospital->phone_no->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_hospital_status" for="x_status" class="<?php echo $hospital_edit->LeftColumnClass ?>"><?php echo $hospital->status->caption() ?><?php echo ($hospital->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_edit->RightColumnClass ?>"><div<?php echo $hospital->status->cellAttributes() ?>>
<span id="el_hospital_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="hospital" data-field="x_status" data-value-separator="<?php echo $hospital->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $hospital->status->editAttributes() ?>>
		<?php echo $hospital->status->selectOptionListHtml("x_status") ?>
	</select>
</div>
<?php echo $hospital->status->Lookup->getParamTag("p_x_status") ?>
</span>
<?php echo $hospital->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital->PreFixCode->Visible) { // PreFixCode ?>
	<div id="r_PreFixCode" class="form-group row">
		<label id="elh_hospital_PreFixCode" for="x_PreFixCode" class="<?php echo $hospital_edit->LeftColumnClass ?>"><?php echo $hospital->PreFixCode->caption() ?><?php echo ($hospital->PreFixCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_edit->RightColumnClass ?>"><div<?php echo $hospital->PreFixCode->cellAttributes() ?>>
<span id="el_hospital_PreFixCode">
<input type="text" data-table="hospital" data-field="x_PreFixCode" name="x_PreFixCode" id="x_PreFixCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($hospital->PreFixCode->getPlaceHolder()) ?>" value="<?php echo $hospital->PreFixCode->EditValue ?>"<?php echo $hospital->PreFixCode->editAttributes() ?>>
</span>
<?php echo $hospital->PreFixCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital->BillingGST->Visible) { // BillingGST ?>
	<div id="r_BillingGST" class="form-group row">
		<label id="elh_hospital_BillingGST" for="x_BillingGST" class="<?php echo $hospital_edit->LeftColumnClass ?>"><?php echo $hospital->BillingGST->caption() ?><?php echo ($hospital->BillingGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_edit->RightColumnClass ?>"><div<?php echo $hospital->BillingGST->cellAttributes() ?>>
<span id="el_hospital_BillingGST">
<input type="text" data-table="hospital" data-field="x_BillingGST" name="x_BillingGST" id="x_BillingGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($hospital->BillingGST->getPlaceHolder()) ?>" value="<?php echo $hospital->BillingGST->EditValue ?>"<?php echo $hospital->BillingGST->editAttributes() ?>>
</span>
<?php echo $hospital->BillingGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital->pharmacyGST->Visible) { // pharmacyGST ?>
	<div id="r_pharmacyGST" class="form-group row">
		<label id="elh_hospital_pharmacyGST" for="x_pharmacyGST" class="<?php echo $hospital_edit->LeftColumnClass ?>"><?php echo $hospital->pharmacyGST->caption() ?><?php echo ($hospital->pharmacyGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_edit->RightColumnClass ?>"><div<?php echo $hospital->pharmacyGST->cellAttributes() ?>>
<span id="el_hospital_pharmacyGST">
<input type="text" data-table="hospital" data-field="x_pharmacyGST" name="x_pharmacyGST" id="x_pharmacyGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($hospital->pharmacyGST->getPlaceHolder()) ?>" value="<?php echo $hospital->pharmacyGST->EditValue ?>"<?php echo $hospital->pharmacyGST->editAttributes() ?>>
</span>
<?php echo $hospital->pharmacyGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital->Country->Visible) { // Country ?>
	<div id="r_Country" class="form-group row">
		<label id="elh_hospital_Country" for="x_Country" class="<?php echo $hospital_edit->LeftColumnClass ?>"><?php echo $hospital->Country->caption() ?><?php echo ($hospital->Country->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_edit->RightColumnClass ?>"><div<?php echo $hospital->Country->cellAttributes() ?>>
<span id="el_hospital_Country">
<input type="text" data-table="hospital" data-field="x_Country" name="x_Country" id="x_Country" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($hospital->Country->getPlaceHolder()) ?>" value="<?php echo $hospital->Country->EditValue ?>"<?php echo $hospital->Country->editAttributes() ?>>
</span>
<?php echo $hospital->Country->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$hospital_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $hospital_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hospital_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$hospital_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hospital_edit->terminate();
?>