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
$hospital_store_add = new hospital_store_add();

// Run the page
$hospital_store_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hospital_store_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fhospital_storeadd = currentForm = new ew.Form("fhospital_storeadd", "add");

// Validate form
fhospital_storeadd.validate = function() {
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
		<?php if ($hospital_store_add->logo->Required) { ?>
			felm = this.getElements("x" + infix + "_logo");
			elm = this.getElements("fn_x" + infix + "_logo");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $hospital_store->logo->caption(), $hospital_store->logo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_store_add->pharmacy->Required) { ?>
			elm = this.getElements("x" + infix + "_pharmacy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_store->pharmacy->caption(), $hospital_store->pharmacy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_store_add->street->Required) { ?>
			elm = this.getElements("x" + infix + "_street");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_store->street->caption(), $hospital_store->street->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_store_add->area->Required) { ?>
			elm = this.getElements("x" + infix + "_area");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_store->area->caption(), $hospital_store->area->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_store_add->town->Required) { ?>
			elm = this.getElements("x" + infix + "_town");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_store->town->caption(), $hospital_store->town->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_store_add->province->Required) { ?>
			elm = this.getElements("x" + infix + "_province");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_store->province->caption(), $hospital_store->province->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_store_add->postal_code->Required) { ?>
			elm = this.getElements("x" + infix + "_postal_code");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_store->postal_code->caption(), $hospital_store->postal_code->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_store_add->phone_no->Required) { ?>
			elm = this.getElements("x" + infix + "_phone_no");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_store->phone_no->caption(), $hospital_store->phone_no->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_store_add->PreFixCode->Required) { ?>
			elm = this.getElements("x" + infix + "_PreFixCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_store->PreFixCode->caption(), $hospital_store->PreFixCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_store_add->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_store->status->caption(), $hospital_store->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_store_add->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_store->createdby->caption(), $hospital_store->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_store_add->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_store->createddatetime->caption(), $hospital_store->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_store_add->pharmacyGST->Required) { ?>
			elm = this.getElements("x" + infix + "_pharmacyGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_store->pharmacyGST->caption(), $hospital_store->pharmacyGST->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_store_add->HospId->Required) { ?>
			elm = this.getElements("x" + infix + "_HospId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_store->HospId->caption(), $hospital_store->HospId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($hospital_store_add->BranchID->Required) { ?>
			elm = this.getElements("x" + infix + "_BranchID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_store->BranchID->caption(), $hospital_store->BranchID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BranchID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($hospital_store->BranchID->errorMessage()) ?>");

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
fhospital_storeadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhospital_storeadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhospital_storeadd.lists["x_status"] = <?php echo $hospital_store_add->status->Lookup->toClientList() ?>;
fhospital_storeadd.lists["x_status"].options = <?php echo JsonEncode($hospital_store_add->status->lookupOptions()) ?>;
fhospital_storeadd.lists["x_HospId"] = <?php echo $hospital_store_add->HospId->Lookup->toClientList() ?>;
fhospital_storeadd.lists["x_HospId"].options = <?php echo JsonEncode($hospital_store_add->HospId->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hospital_store_add->showPageHeader(); ?>
<?php
$hospital_store_add->showMessage();
?>
<form name="fhospital_storeadd" id="fhospital_storeadd" class="<?php echo $hospital_store_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hospital_store_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hospital_store_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hospital_store">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$hospital_store_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($hospital_store->logo->Visible) { // logo ?>
	<div id="r_logo" class="form-group row">
		<label id="elh_hospital_store_logo" class="<?php echo $hospital_store_add->LeftColumnClass ?>"><?php echo $hospital_store->logo->caption() ?><?php echo ($hospital_store->logo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_store_add->RightColumnClass ?>"><div<?php echo $hospital_store->logo->cellAttributes() ?>>
<span id="el_hospital_store_logo">
<div id="fd_x_logo">
<span title="<?php echo $hospital_store->logo->title() ? $hospital_store->logo->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($hospital_store->logo->ReadOnly || $hospital_store->logo->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="hospital_store" data-field="x_logo" name="x_logo" id="x_logo"<?php echo $hospital_store->logo->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x_logo" id= "fn_x_logo" value="<?php echo $hospital_store->logo->Upload->FileName ?>">
<input type="hidden" name="fa_x_logo" id= "fa_x_logo" value="0">
<input type="hidden" name="fs_x_logo" id= "fs_x_logo" value="450">
<input type="hidden" name="fx_x_logo" id= "fx_x_logo" value="<?php echo $hospital_store->logo->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_logo" id= "fm_x_logo" value="<?php echo $hospital_store->logo->UploadMaxFileSize ?>">
</div>
<table id="ft_x_logo" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $hospital_store->logo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_store->pharmacy->Visible) { // pharmacy ?>
	<div id="r_pharmacy" class="form-group row">
		<label id="elh_hospital_store_pharmacy" for="x_pharmacy" class="<?php echo $hospital_store_add->LeftColumnClass ?>"><?php echo $hospital_store->pharmacy->caption() ?><?php echo ($hospital_store->pharmacy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_store_add->RightColumnClass ?>"><div<?php echo $hospital_store->pharmacy->cellAttributes() ?>>
<span id="el_hospital_store_pharmacy">
<input type="text" data-table="hospital_store" data-field="x_pharmacy" name="x_pharmacy" id="x_pharmacy" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hospital_store->pharmacy->getPlaceHolder()) ?>" value="<?php echo $hospital_store->pharmacy->EditValue ?>"<?php echo $hospital_store->pharmacy->editAttributes() ?>>
</span>
<?php echo $hospital_store->pharmacy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_store->street->Visible) { // street ?>
	<div id="r_street" class="form-group row">
		<label id="elh_hospital_store_street" for="x_street" class="<?php echo $hospital_store_add->LeftColumnClass ?>"><?php echo $hospital_store->street->caption() ?><?php echo ($hospital_store->street->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_store_add->RightColumnClass ?>"><div<?php echo $hospital_store->street->cellAttributes() ?>>
<span id="el_hospital_store_street">
<input type="text" data-table="hospital_store" data-field="x_street" name="x_street" id="x_street" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hospital_store->street->getPlaceHolder()) ?>" value="<?php echo $hospital_store->street->EditValue ?>"<?php echo $hospital_store->street->editAttributes() ?>>
</span>
<?php echo $hospital_store->street->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_store->area->Visible) { // area ?>
	<div id="r_area" class="form-group row">
		<label id="elh_hospital_store_area" for="x_area" class="<?php echo $hospital_store_add->LeftColumnClass ?>"><?php echo $hospital_store->area->caption() ?><?php echo ($hospital_store->area->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_store_add->RightColumnClass ?>"><div<?php echo $hospital_store->area->cellAttributes() ?>>
<span id="el_hospital_store_area">
<input type="text" data-table="hospital_store" data-field="x_area" name="x_area" id="x_area" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($hospital_store->area->getPlaceHolder()) ?>" value="<?php echo $hospital_store->area->EditValue ?>"<?php echo $hospital_store->area->editAttributes() ?>>
</span>
<?php echo $hospital_store->area->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_store->town->Visible) { // town ?>
	<div id="r_town" class="form-group row">
		<label id="elh_hospital_store_town" for="x_town" class="<?php echo $hospital_store_add->LeftColumnClass ?>"><?php echo $hospital_store->town->caption() ?><?php echo ($hospital_store->town->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_store_add->RightColumnClass ?>"><div<?php echo $hospital_store->town->cellAttributes() ?>>
<span id="el_hospital_store_town">
<input type="text" data-table="hospital_store" data-field="x_town" name="x_town" id="x_town" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($hospital_store->town->getPlaceHolder()) ?>" value="<?php echo $hospital_store->town->EditValue ?>"<?php echo $hospital_store->town->editAttributes() ?>>
</span>
<?php echo $hospital_store->town->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_store->province->Visible) { // province ?>
	<div id="r_province" class="form-group row">
		<label id="elh_hospital_store_province" for="x_province" class="<?php echo $hospital_store_add->LeftColumnClass ?>"><?php echo $hospital_store->province->caption() ?><?php echo ($hospital_store->province->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_store_add->RightColumnClass ?>"><div<?php echo $hospital_store->province->cellAttributes() ?>>
<span id="el_hospital_store_province">
<input type="text" data-table="hospital_store" data-field="x_province" name="x_province" id="x_province" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($hospital_store->province->getPlaceHolder()) ?>" value="<?php echo $hospital_store->province->EditValue ?>"<?php echo $hospital_store->province->editAttributes() ?>>
</span>
<?php echo $hospital_store->province->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_store->postal_code->Visible) { // postal_code ?>
	<div id="r_postal_code" class="form-group row">
		<label id="elh_hospital_store_postal_code" for="x_postal_code" class="<?php echo $hospital_store_add->LeftColumnClass ?>"><?php echo $hospital_store->postal_code->caption() ?><?php echo ($hospital_store->postal_code->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_store_add->RightColumnClass ?>"><div<?php echo $hospital_store->postal_code->cellAttributes() ?>>
<span id="el_hospital_store_postal_code">
<input type="text" data-table="hospital_store" data-field="x_postal_code" name="x_postal_code" id="x_postal_code" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($hospital_store->postal_code->getPlaceHolder()) ?>" value="<?php echo $hospital_store->postal_code->EditValue ?>"<?php echo $hospital_store->postal_code->editAttributes() ?>>
</span>
<?php echo $hospital_store->postal_code->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_store->phone_no->Visible) { // phone_no ?>
	<div id="r_phone_no" class="form-group row">
		<label id="elh_hospital_store_phone_no" for="x_phone_no" class="<?php echo $hospital_store_add->LeftColumnClass ?>"><?php echo $hospital_store->phone_no->caption() ?><?php echo ($hospital_store->phone_no->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_store_add->RightColumnClass ?>"><div<?php echo $hospital_store->phone_no->cellAttributes() ?>>
<span id="el_hospital_store_phone_no">
<input type="text" data-table="hospital_store" data-field="x_phone_no" name="x_phone_no" id="x_phone_no" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($hospital_store->phone_no->getPlaceHolder()) ?>" value="<?php echo $hospital_store->phone_no->EditValue ?>"<?php echo $hospital_store->phone_no->editAttributes() ?>>
</span>
<?php echo $hospital_store->phone_no->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_store->PreFixCode->Visible) { // PreFixCode ?>
	<div id="r_PreFixCode" class="form-group row">
		<label id="elh_hospital_store_PreFixCode" for="x_PreFixCode" class="<?php echo $hospital_store_add->LeftColumnClass ?>"><?php echo $hospital_store->PreFixCode->caption() ?><?php echo ($hospital_store->PreFixCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_store_add->RightColumnClass ?>"><div<?php echo $hospital_store->PreFixCode->cellAttributes() ?>>
<span id="el_hospital_store_PreFixCode">
<input type="text" data-table="hospital_store" data-field="x_PreFixCode" name="x_PreFixCode" id="x_PreFixCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($hospital_store->PreFixCode->getPlaceHolder()) ?>" value="<?php echo $hospital_store->PreFixCode->EditValue ?>"<?php echo $hospital_store->PreFixCode->editAttributes() ?>>
</span>
<?php echo $hospital_store->PreFixCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_store->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_hospital_store_status" for="x_status" class="<?php echo $hospital_store_add->LeftColumnClass ?>"><?php echo $hospital_store->status->caption() ?><?php echo ($hospital_store->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_store_add->RightColumnClass ?>"><div<?php echo $hospital_store->status->cellAttributes() ?>>
<span id="el_hospital_store_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="hospital_store" data-field="x_status" data-value-separator="<?php echo $hospital_store->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $hospital_store->status->editAttributes() ?>>
		<?php echo $hospital_store->status->selectOptionListHtml("x_status") ?>
	</select>
</div>
<?php echo $hospital_store->status->Lookup->getParamTag("p_x_status") ?>
</span>
<?php echo $hospital_store->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_store->pharmacyGST->Visible) { // pharmacyGST ?>
	<div id="r_pharmacyGST" class="form-group row">
		<label id="elh_hospital_store_pharmacyGST" for="x_pharmacyGST" class="<?php echo $hospital_store_add->LeftColumnClass ?>"><?php echo $hospital_store->pharmacyGST->caption() ?><?php echo ($hospital_store->pharmacyGST->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_store_add->RightColumnClass ?>"><div<?php echo $hospital_store->pharmacyGST->cellAttributes() ?>>
<span id="el_hospital_store_pharmacyGST">
<input type="text" data-table="hospital_store" data-field="x_pharmacyGST" name="x_pharmacyGST" id="x_pharmacyGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($hospital_store->pharmacyGST->getPlaceHolder()) ?>" value="<?php echo $hospital_store->pharmacyGST->EditValue ?>"<?php echo $hospital_store->pharmacyGST->editAttributes() ?>>
</span>
<?php echo $hospital_store->pharmacyGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_store->HospId->Visible) { // HospId ?>
	<div id="r_HospId" class="form-group row">
		<label id="elh_hospital_store_HospId" for="x_HospId" class="<?php echo $hospital_store_add->LeftColumnClass ?>"><?php echo $hospital_store->HospId->caption() ?><?php echo ($hospital_store->HospId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_store_add->RightColumnClass ?>"><div<?php echo $hospital_store->HospId->cellAttributes() ?>>
<span id="el_hospital_store_HospId">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="hospital_store" data-field="x_HospId" data-value-separator="<?php echo $hospital_store->HospId->displayValueSeparatorAttribute() ?>" id="x_HospId" name="x_HospId"<?php echo $hospital_store->HospId->editAttributes() ?>>
		<?php echo $hospital_store->HospId->selectOptionListHtml("x_HospId") ?>
	</select>
</div>
<?php echo $hospital_store->HospId->Lookup->getParamTag("p_x_HospId") ?>
</span>
<?php echo $hospital_store->HospId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_store->BranchID->Visible) { // BranchID ?>
	<div id="r_BranchID" class="form-group row">
		<label id="elh_hospital_store_BranchID" for="x_BranchID" class="<?php echo $hospital_store_add->LeftColumnClass ?>"><?php echo $hospital_store->BranchID->caption() ?><?php echo ($hospital_store->BranchID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_store_add->RightColumnClass ?>"><div<?php echo $hospital_store->BranchID->cellAttributes() ?>>
<span id="el_hospital_store_BranchID">
<input type="text" data-table="hospital_store" data-field="x_BranchID" name="x_BranchID" id="x_BranchID" size="30" placeholder="<?php echo HtmlEncode($hospital_store->BranchID->getPlaceHolder()) ?>" value="<?php echo $hospital_store->BranchID->EditValue ?>"<?php echo $hospital_store->BranchID->editAttributes() ?>>
</span>
<?php echo $hospital_store->BranchID->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$hospital_store_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $hospital_store_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hospital_store_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$hospital_store_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hospital_store_add->terminate();
?>