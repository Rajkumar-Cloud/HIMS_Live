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
$hospital_store_edit = new hospital_store_edit();

// Run the page
$hospital_store_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hospital_store_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fhospital_storeedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fhospital_storeedit = currentForm = new ew.Form("fhospital_storeedit", "edit");

	// Validate form
	fhospital_storeedit.validate = function() {
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
			<?php if ($hospital_store_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_store_edit->id->caption(), $hospital_store_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_store_edit->logo->Required) { ?>
				felm = this.getElements("x" + infix + "_logo");
				elm = this.getElements("fn_x" + infix + "_logo");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $hospital_store_edit->logo->caption(), $hospital_store_edit->logo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_store_edit->pharmacy->Required) { ?>
				elm = this.getElements("x" + infix + "_pharmacy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_store_edit->pharmacy->caption(), $hospital_store_edit->pharmacy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_store_edit->street->Required) { ?>
				elm = this.getElements("x" + infix + "_street");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_store_edit->street->caption(), $hospital_store_edit->street->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_store_edit->area->Required) { ?>
				elm = this.getElements("x" + infix + "_area");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_store_edit->area->caption(), $hospital_store_edit->area->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_store_edit->town->Required) { ?>
				elm = this.getElements("x" + infix + "_town");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_store_edit->town->caption(), $hospital_store_edit->town->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_store_edit->province->Required) { ?>
				elm = this.getElements("x" + infix + "_province");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_store_edit->province->caption(), $hospital_store_edit->province->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_store_edit->postal_code->Required) { ?>
				elm = this.getElements("x" + infix + "_postal_code");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_store_edit->postal_code->caption(), $hospital_store_edit->postal_code->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_store_edit->phone_no->Required) { ?>
				elm = this.getElements("x" + infix + "_phone_no");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_store_edit->phone_no->caption(), $hospital_store_edit->phone_no->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_store_edit->PreFixCode->Required) { ?>
				elm = this.getElements("x" + infix + "_PreFixCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_store_edit->PreFixCode->caption(), $hospital_store_edit->PreFixCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_store_edit->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_store_edit->status->caption(), $hospital_store_edit->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_store_edit->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_store_edit->modifiedby->caption(), $hospital_store_edit->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_store_edit->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_store_edit->modifieddatetime->caption(), $hospital_store_edit->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_store_edit->pharmacyGST->Required) { ?>
				elm = this.getElements("x" + infix + "_pharmacyGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_store_edit->pharmacyGST->caption(), $hospital_store_edit->pharmacyGST->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_store_edit->HospId->Required) { ?>
				elm = this.getElements("x" + infix + "_HospId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_store_edit->HospId->caption(), $hospital_store_edit->HospId->RequiredErrorMessage)) ?>");
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
	fhospital_storeedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fhospital_storeedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fhospital_storeedit.lists["x_status"] = <?php echo $hospital_store_edit->status->Lookup->toClientList($hospital_store_edit) ?>;
	fhospital_storeedit.lists["x_status"].options = <?php echo JsonEncode($hospital_store_edit->status->lookupOptions()) ?>;
	fhospital_storeedit.lists["x_HospId"] = <?php echo $hospital_store_edit->HospId->Lookup->toClientList($hospital_store_edit) ?>;
	fhospital_storeedit.lists["x_HospId"].options = <?php echo JsonEncode($hospital_store_edit->HospId->lookupOptions()) ?>;
	loadjs.done("fhospital_storeedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $hospital_store_edit->showPageHeader(); ?>
<?php
$hospital_store_edit->showMessage();
?>
<form name="fhospital_storeedit" id="fhospital_storeedit" class="<?php echo $hospital_store_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hospital_store">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$hospital_store_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($hospital_store_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_hospital_store_id" class="<?php echo $hospital_store_edit->LeftColumnClass ?>"><?php echo $hospital_store_edit->id->caption() ?><?php echo $hospital_store_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_store_edit->RightColumnClass ?>"><div <?php echo $hospital_store_edit->id->cellAttributes() ?>>
<span id="el_hospital_store_id">
<span<?php echo $hospital_store_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($hospital_store_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="hospital_store" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($hospital_store_edit->id->CurrentValue) ?>">
<?php echo $hospital_store_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_store_edit->logo->Visible) { // logo ?>
	<div id="r_logo" class="form-group row">
		<label id="elh_hospital_store_logo" class="<?php echo $hospital_store_edit->LeftColumnClass ?>"><?php echo $hospital_store_edit->logo->caption() ?><?php echo $hospital_store_edit->logo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_store_edit->RightColumnClass ?>"><div <?php echo $hospital_store_edit->logo->cellAttributes() ?>>
<span id="el_hospital_store_logo">
<div id="fd_x_logo">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $hospital_store_edit->logo->title() ?>" data-table="hospital_store" data-field="x_logo" name="x_logo" id="x_logo" lang="<?php echo CurrentLanguageID() ?>"<?php echo $hospital_store_edit->logo->editAttributes() ?><?php if ($hospital_store_edit->logo->ReadOnly || $hospital_store_edit->logo->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x_logo"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x_logo" id= "fn_x_logo" value="<?php echo $hospital_store_edit->logo->Upload->FileName ?>">
<input type="hidden" name="fa_x_logo" id= "fa_x_logo" value="<?php echo (Post("fa_x_logo") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x_logo" id= "fs_x_logo" value="450">
<input type="hidden" name="fx_x_logo" id= "fx_x_logo" value="<?php echo $hospital_store_edit->logo->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_logo" id= "fm_x_logo" value="<?php echo $hospital_store_edit->logo->UploadMaxFileSize ?>">
</div>
<table id="ft_x_logo" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $hospital_store_edit->logo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_store_edit->pharmacy->Visible) { // pharmacy ?>
	<div id="r_pharmacy" class="form-group row">
		<label id="elh_hospital_store_pharmacy" for="x_pharmacy" class="<?php echo $hospital_store_edit->LeftColumnClass ?>"><?php echo $hospital_store_edit->pharmacy->caption() ?><?php echo $hospital_store_edit->pharmacy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_store_edit->RightColumnClass ?>"><div <?php echo $hospital_store_edit->pharmacy->cellAttributes() ?>>
<span id="el_hospital_store_pharmacy">
<input type="text" data-table="hospital_store" data-field="x_pharmacy" name="x_pharmacy" id="x_pharmacy" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hospital_store_edit->pharmacy->getPlaceHolder()) ?>" value="<?php echo $hospital_store_edit->pharmacy->EditValue ?>"<?php echo $hospital_store_edit->pharmacy->editAttributes() ?>>
</span>
<?php echo $hospital_store_edit->pharmacy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_store_edit->street->Visible) { // street ?>
	<div id="r_street" class="form-group row">
		<label id="elh_hospital_store_street" for="x_street" class="<?php echo $hospital_store_edit->LeftColumnClass ?>"><?php echo $hospital_store_edit->street->caption() ?><?php echo $hospital_store_edit->street->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_store_edit->RightColumnClass ?>"><div <?php echo $hospital_store_edit->street->cellAttributes() ?>>
<span id="el_hospital_store_street">
<input type="text" data-table="hospital_store" data-field="x_street" name="x_street" id="x_street" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hospital_store_edit->street->getPlaceHolder()) ?>" value="<?php echo $hospital_store_edit->street->EditValue ?>"<?php echo $hospital_store_edit->street->editAttributes() ?>>
</span>
<?php echo $hospital_store_edit->street->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_store_edit->area->Visible) { // area ?>
	<div id="r_area" class="form-group row">
		<label id="elh_hospital_store_area" for="x_area" class="<?php echo $hospital_store_edit->LeftColumnClass ?>"><?php echo $hospital_store_edit->area->caption() ?><?php echo $hospital_store_edit->area->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_store_edit->RightColumnClass ?>"><div <?php echo $hospital_store_edit->area->cellAttributes() ?>>
<span id="el_hospital_store_area">
<input type="text" data-table="hospital_store" data-field="x_area" name="x_area" id="x_area" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($hospital_store_edit->area->getPlaceHolder()) ?>" value="<?php echo $hospital_store_edit->area->EditValue ?>"<?php echo $hospital_store_edit->area->editAttributes() ?>>
</span>
<?php echo $hospital_store_edit->area->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_store_edit->town->Visible) { // town ?>
	<div id="r_town" class="form-group row">
		<label id="elh_hospital_store_town" for="x_town" class="<?php echo $hospital_store_edit->LeftColumnClass ?>"><?php echo $hospital_store_edit->town->caption() ?><?php echo $hospital_store_edit->town->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_store_edit->RightColumnClass ?>"><div <?php echo $hospital_store_edit->town->cellAttributes() ?>>
<span id="el_hospital_store_town">
<input type="text" data-table="hospital_store" data-field="x_town" name="x_town" id="x_town" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($hospital_store_edit->town->getPlaceHolder()) ?>" value="<?php echo $hospital_store_edit->town->EditValue ?>"<?php echo $hospital_store_edit->town->editAttributes() ?>>
</span>
<?php echo $hospital_store_edit->town->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_store_edit->province->Visible) { // province ?>
	<div id="r_province" class="form-group row">
		<label id="elh_hospital_store_province" for="x_province" class="<?php echo $hospital_store_edit->LeftColumnClass ?>"><?php echo $hospital_store_edit->province->caption() ?><?php echo $hospital_store_edit->province->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_store_edit->RightColumnClass ?>"><div <?php echo $hospital_store_edit->province->cellAttributes() ?>>
<span id="el_hospital_store_province">
<input type="text" data-table="hospital_store" data-field="x_province" name="x_province" id="x_province" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($hospital_store_edit->province->getPlaceHolder()) ?>" value="<?php echo $hospital_store_edit->province->EditValue ?>"<?php echo $hospital_store_edit->province->editAttributes() ?>>
</span>
<?php echo $hospital_store_edit->province->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_store_edit->postal_code->Visible) { // postal_code ?>
	<div id="r_postal_code" class="form-group row">
		<label id="elh_hospital_store_postal_code" for="x_postal_code" class="<?php echo $hospital_store_edit->LeftColumnClass ?>"><?php echo $hospital_store_edit->postal_code->caption() ?><?php echo $hospital_store_edit->postal_code->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_store_edit->RightColumnClass ?>"><div <?php echo $hospital_store_edit->postal_code->cellAttributes() ?>>
<span id="el_hospital_store_postal_code">
<input type="text" data-table="hospital_store" data-field="x_postal_code" name="x_postal_code" id="x_postal_code" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($hospital_store_edit->postal_code->getPlaceHolder()) ?>" value="<?php echo $hospital_store_edit->postal_code->EditValue ?>"<?php echo $hospital_store_edit->postal_code->editAttributes() ?>>
</span>
<?php echo $hospital_store_edit->postal_code->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_store_edit->phone_no->Visible) { // phone_no ?>
	<div id="r_phone_no" class="form-group row">
		<label id="elh_hospital_store_phone_no" for="x_phone_no" class="<?php echo $hospital_store_edit->LeftColumnClass ?>"><?php echo $hospital_store_edit->phone_no->caption() ?><?php echo $hospital_store_edit->phone_no->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_store_edit->RightColumnClass ?>"><div <?php echo $hospital_store_edit->phone_no->cellAttributes() ?>>
<span id="el_hospital_store_phone_no">
<input type="text" data-table="hospital_store" data-field="x_phone_no" name="x_phone_no" id="x_phone_no" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($hospital_store_edit->phone_no->getPlaceHolder()) ?>" value="<?php echo $hospital_store_edit->phone_no->EditValue ?>"<?php echo $hospital_store_edit->phone_no->editAttributes() ?>>
</span>
<?php echo $hospital_store_edit->phone_no->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_store_edit->PreFixCode->Visible) { // PreFixCode ?>
	<div id="r_PreFixCode" class="form-group row">
		<label id="elh_hospital_store_PreFixCode" for="x_PreFixCode" class="<?php echo $hospital_store_edit->LeftColumnClass ?>"><?php echo $hospital_store_edit->PreFixCode->caption() ?><?php echo $hospital_store_edit->PreFixCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_store_edit->RightColumnClass ?>"><div <?php echo $hospital_store_edit->PreFixCode->cellAttributes() ?>>
<span id="el_hospital_store_PreFixCode">
<input type="text" data-table="hospital_store" data-field="x_PreFixCode" name="x_PreFixCode" id="x_PreFixCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($hospital_store_edit->PreFixCode->getPlaceHolder()) ?>" value="<?php echo $hospital_store_edit->PreFixCode->EditValue ?>"<?php echo $hospital_store_edit->PreFixCode->editAttributes() ?>>
</span>
<?php echo $hospital_store_edit->PreFixCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_store_edit->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_hospital_store_status" for="x_status" class="<?php echo $hospital_store_edit->LeftColumnClass ?>"><?php echo $hospital_store_edit->status->caption() ?><?php echo $hospital_store_edit->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_store_edit->RightColumnClass ?>"><div <?php echo $hospital_store_edit->status->cellAttributes() ?>>
<span id="el_hospital_store_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="hospital_store" data-field="x_status" data-value-separator="<?php echo $hospital_store_edit->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $hospital_store_edit->status->editAttributes() ?>>
			<?php echo $hospital_store_edit->status->selectOptionListHtml("x_status") ?>
		</select>
</div>
<?php echo $hospital_store_edit->status->Lookup->getParamTag($hospital_store_edit, "p_x_status") ?>
</span>
<?php echo $hospital_store_edit->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_store_edit->pharmacyGST->Visible) { // pharmacyGST ?>
	<div id="r_pharmacyGST" class="form-group row">
		<label id="elh_hospital_store_pharmacyGST" for="x_pharmacyGST" class="<?php echo $hospital_store_edit->LeftColumnClass ?>"><?php echo $hospital_store_edit->pharmacyGST->caption() ?><?php echo $hospital_store_edit->pharmacyGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_store_edit->RightColumnClass ?>"><div <?php echo $hospital_store_edit->pharmacyGST->cellAttributes() ?>>
<span id="el_hospital_store_pharmacyGST">
<input type="text" data-table="hospital_store" data-field="x_pharmacyGST" name="x_pharmacyGST" id="x_pharmacyGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($hospital_store_edit->pharmacyGST->getPlaceHolder()) ?>" value="<?php echo $hospital_store_edit->pharmacyGST->EditValue ?>"<?php echo $hospital_store_edit->pharmacyGST->editAttributes() ?>>
</span>
<?php echo $hospital_store_edit->pharmacyGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_store_edit->HospId->Visible) { // HospId ?>
	<div id="r_HospId" class="form-group row">
		<label id="elh_hospital_store_HospId" for="x_HospId" class="<?php echo $hospital_store_edit->LeftColumnClass ?>"><?php echo $hospital_store_edit->HospId->caption() ?><?php echo $hospital_store_edit->HospId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_store_edit->RightColumnClass ?>"><div <?php echo $hospital_store_edit->HospId->cellAttributes() ?>>
<span id="el_hospital_store_HospId">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="hospital_store" data-field="x_HospId" data-value-separator="<?php echo $hospital_store_edit->HospId->displayValueSeparatorAttribute() ?>" id="x_HospId" name="x_HospId"<?php echo $hospital_store_edit->HospId->editAttributes() ?>>
			<?php echo $hospital_store_edit->HospId->selectOptionListHtml("x_HospId") ?>
		</select>
</div>
<?php echo $hospital_store_edit->HospId->Lookup->getParamTag($hospital_store_edit, "p_x_HospId") ?>
</span>
<?php echo $hospital_store_edit->HospId->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$hospital_store_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $hospital_store_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hospital_store_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$hospital_store_edit->showPageFooter();
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
$hospital_store_edit->terminate();
?>