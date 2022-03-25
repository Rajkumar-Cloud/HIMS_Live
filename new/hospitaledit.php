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
<?php include_once "header.php"; ?>
<script>
var fhospitaledit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fhospitaledit = currentForm = new ew.Form("fhospitaledit", "edit");

	// Validate form
	fhospitaledit.validate = function() {
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
			<?php if ($hospital_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_edit->id->caption(), $hospital_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($hospital_edit->id->errorMessage()) ?>");
			<?php if ($hospital_edit->logo->Required) { ?>
				felm = this.getElements("x" + infix + "_logo");
				elm = this.getElements("fn_x" + infix + "_logo");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $hospital_edit->logo->caption(), $hospital_edit->logo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_edit->hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_edit->hospital->caption(), $hospital_edit->hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_edit->street->Required) { ?>
				elm = this.getElements("x" + infix + "_street");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_edit->street->caption(), $hospital_edit->street->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_edit->area->Required) { ?>
				elm = this.getElements("x" + infix + "_area");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_edit->area->caption(), $hospital_edit->area->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_edit->town->Required) { ?>
				elm = this.getElements("x" + infix + "_town");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_edit->town->caption(), $hospital_edit->town->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_edit->province->Required) { ?>
				elm = this.getElements("x" + infix + "_province");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_edit->province->caption(), $hospital_edit->province->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_edit->postal_code->Required) { ?>
				elm = this.getElements("x" + infix + "_postal_code");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_edit->postal_code->caption(), $hospital_edit->postal_code->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_edit->phone_no->Required) { ?>
				elm = this.getElements("x" + infix + "_phone_no");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_edit->phone_no->caption(), $hospital_edit->phone_no->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_edit->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_edit->status->caption(), $hospital_edit->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_edit->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_edit->modifiedby->caption(), $hospital_edit->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_edit->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_edit->modifieddatetime->caption(), $hospital_edit->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_edit->PreFixCode->Required) { ?>
				elm = this.getElements("x" + infix + "_PreFixCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_edit->PreFixCode->caption(), $hospital_edit->PreFixCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_edit->BillingGST->Required) { ?>
				elm = this.getElements("x" + infix + "_BillingGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_edit->BillingGST->caption(), $hospital_edit->BillingGST->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_edit->pharmacyGST->Required) { ?>
				elm = this.getElements("x" + infix + "_pharmacyGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_edit->pharmacyGST->caption(), $hospital_edit->pharmacyGST->RequiredErrorMessage)) ?>");
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
	fhospitaledit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fhospitaledit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fhospitaledit.lists["x_status"] = <?php echo $hospital_edit->status->Lookup->toClientList($hospital_edit) ?>;
	fhospitaledit.lists["x_status"].options = <?php echo JsonEncode($hospital_edit->status->lookupOptions()) ?>;
	loadjs.done("fhospitaledit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $hospital_edit->showPageHeader(); ?>
<?php
$hospital_edit->showMessage();
?>
<form name="fhospitaledit" id="fhospitaledit" class="<?php echo $hospital_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hospital">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$hospital_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($hospital_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_hospital_id" for="x_id" class="<?php echo $hospital_edit->LeftColumnClass ?>"><?php echo $hospital_edit->id->caption() ?><?php echo $hospital_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_edit->RightColumnClass ?>"><div <?php echo $hospital_edit->id->cellAttributes() ?>>
<input type="text" data-table="hospital" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($hospital_edit->id->getPlaceHolder()) ?>" value="<?php echo $hospital_edit->id->EditValue ?>"<?php echo $hospital_edit->id->editAttributes() ?>>
<input type="hidden" data-table="hospital" data-field="x_id" name="o_id" id="o_id" value="<?php echo HtmlEncode($hospital_edit->id->OldValue != null ? $hospital_edit->id->OldValue : $hospital_edit->id->CurrentValue) ?>">
<?php echo $hospital_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_edit->logo->Visible) { // logo ?>
	<div id="r_logo" class="form-group row">
		<label id="elh_hospital_logo" class="<?php echo $hospital_edit->LeftColumnClass ?>"><?php echo $hospital_edit->logo->caption() ?><?php echo $hospital_edit->logo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_edit->RightColumnClass ?>"><div <?php echo $hospital_edit->logo->cellAttributes() ?>>
<span id="el_hospital_logo">
<div id="fd_x_logo">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $hospital_edit->logo->title() ?>" data-table="hospital" data-field="x_logo" name="x_logo" id="x_logo" lang="<?php echo CurrentLanguageID() ?>"<?php echo $hospital_edit->logo->editAttributes() ?><?php if ($hospital_edit->logo->ReadOnly || $hospital_edit->logo->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x_logo"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x_logo" id= "fn_x_logo" value="<?php echo $hospital_edit->logo->Upload->FileName ?>">
<input type="hidden" name="fa_x_logo" id= "fa_x_logo" value="<?php echo (Post("fa_x_logo") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x_logo" id= "fs_x_logo" value="450">
<input type="hidden" name="fx_x_logo" id= "fx_x_logo" value="<?php echo $hospital_edit->logo->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_logo" id= "fm_x_logo" value="<?php echo $hospital_edit->logo->UploadMaxFileSize ?>">
</div>
<table id="ft_x_logo" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $hospital_edit->logo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_edit->hospital->Visible) { // hospital ?>
	<div id="r_hospital" class="form-group row">
		<label id="elh_hospital_hospital" for="x_hospital" class="<?php echo $hospital_edit->LeftColumnClass ?>"><?php echo $hospital_edit->hospital->caption() ?><?php echo $hospital_edit->hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_edit->RightColumnClass ?>"><div <?php echo $hospital_edit->hospital->cellAttributes() ?>>
<span id="el_hospital_hospital">
<input type="text" data-table="hospital" data-field="x_hospital" name="x_hospital" id="x_hospital" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hospital_edit->hospital->getPlaceHolder()) ?>" value="<?php echo $hospital_edit->hospital->EditValue ?>"<?php echo $hospital_edit->hospital->editAttributes() ?>>
</span>
<?php echo $hospital_edit->hospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_edit->street->Visible) { // street ?>
	<div id="r_street" class="form-group row">
		<label id="elh_hospital_street" for="x_street" class="<?php echo $hospital_edit->LeftColumnClass ?>"><?php echo $hospital_edit->street->caption() ?><?php echo $hospital_edit->street->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_edit->RightColumnClass ?>"><div <?php echo $hospital_edit->street->cellAttributes() ?>>
<span id="el_hospital_street">
<input type="text" data-table="hospital" data-field="x_street" name="x_street" id="x_street" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hospital_edit->street->getPlaceHolder()) ?>" value="<?php echo $hospital_edit->street->EditValue ?>"<?php echo $hospital_edit->street->editAttributes() ?>>
</span>
<?php echo $hospital_edit->street->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_edit->area->Visible) { // area ?>
	<div id="r_area" class="form-group row">
		<label id="elh_hospital_area" for="x_area" class="<?php echo $hospital_edit->LeftColumnClass ?>"><?php echo $hospital_edit->area->caption() ?><?php echo $hospital_edit->area->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_edit->RightColumnClass ?>"><div <?php echo $hospital_edit->area->cellAttributes() ?>>
<span id="el_hospital_area">
<input type="text" data-table="hospital" data-field="x_area" name="x_area" id="x_area" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($hospital_edit->area->getPlaceHolder()) ?>" value="<?php echo $hospital_edit->area->EditValue ?>"<?php echo $hospital_edit->area->editAttributes() ?>>
</span>
<?php echo $hospital_edit->area->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_edit->town->Visible) { // town ?>
	<div id="r_town" class="form-group row">
		<label id="elh_hospital_town" for="x_town" class="<?php echo $hospital_edit->LeftColumnClass ?>"><?php echo $hospital_edit->town->caption() ?><?php echo $hospital_edit->town->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_edit->RightColumnClass ?>"><div <?php echo $hospital_edit->town->cellAttributes() ?>>
<span id="el_hospital_town">
<input type="text" data-table="hospital" data-field="x_town" name="x_town" id="x_town" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($hospital_edit->town->getPlaceHolder()) ?>" value="<?php echo $hospital_edit->town->EditValue ?>"<?php echo $hospital_edit->town->editAttributes() ?>>
</span>
<?php echo $hospital_edit->town->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_edit->province->Visible) { // province ?>
	<div id="r_province" class="form-group row">
		<label id="elh_hospital_province" for="x_province" class="<?php echo $hospital_edit->LeftColumnClass ?>"><?php echo $hospital_edit->province->caption() ?><?php echo $hospital_edit->province->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_edit->RightColumnClass ?>"><div <?php echo $hospital_edit->province->cellAttributes() ?>>
<span id="el_hospital_province">
<input type="text" data-table="hospital" data-field="x_province" name="x_province" id="x_province" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($hospital_edit->province->getPlaceHolder()) ?>" value="<?php echo $hospital_edit->province->EditValue ?>"<?php echo $hospital_edit->province->editAttributes() ?>>
</span>
<?php echo $hospital_edit->province->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_edit->postal_code->Visible) { // postal_code ?>
	<div id="r_postal_code" class="form-group row">
		<label id="elh_hospital_postal_code" for="x_postal_code" class="<?php echo $hospital_edit->LeftColumnClass ?>"><?php echo $hospital_edit->postal_code->caption() ?><?php echo $hospital_edit->postal_code->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_edit->RightColumnClass ?>"><div <?php echo $hospital_edit->postal_code->cellAttributes() ?>>
<span id="el_hospital_postal_code">
<input type="text" data-table="hospital" data-field="x_postal_code" name="x_postal_code" id="x_postal_code" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($hospital_edit->postal_code->getPlaceHolder()) ?>" value="<?php echo $hospital_edit->postal_code->EditValue ?>"<?php echo $hospital_edit->postal_code->editAttributes() ?>>
</span>
<?php echo $hospital_edit->postal_code->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_edit->phone_no->Visible) { // phone_no ?>
	<div id="r_phone_no" class="form-group row">
		<label id="elh_hospital_phone_no" for="x_phone_no" class="<?php echo $hospital_edit->LeftColumnClass ?>"><?php echo $hospital_edit->phone_no->caption() ?><?php echo $hospital_edit->phone_no->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_edit->RightColumnClass ?>"><div <?php echo $hospital_edit->phone_no->cellAttributes() ?>>
<span id="el_hospital_phone_no">
<input type="text" data-table="hospital" data-field="x_phone_no" name="x_phone_no" id="x_phone_no" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($hospital_edit->phone_no->getPlaceHolder()) ?>" value="<?php echo $hospital_edit->phone_no->EditValue ?>"<?php echo $hospital_edit->phone_no->editAttributes() ?>>
</span>
<?php echo $hospital_edit->phone_no->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_edit->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_hospital_status" for="x_status" class="<?php echo $hospital_edit->LeftColumnClass ?>"><?php echo $hospital_edit->status->caption() ?><?php echo $hospital_edit->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_edit->RightColumnClass ?>"><div <?php echo $hospital_edit->status->cellAttributes() ?>>
<span id="el_hospital_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="hospital" data-field="x_status" data-value-separator="<?php echo $hospital_edit->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $hospital_edit->status->editAttributes() ?>>
			<?php echo $hospital_edit->status->selectOptionListHtml("x_status") ?>
		</select>
</div>
<?php echo $hospital_edit->status->Lookup->getParamTag($hospital_edit, "p_x_status") ?>
</span>
<?php echo $hospital_edit->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_edit->PreFixCode->Visible) { // PreFixCode ?>
	<div id="r_PreFixCode" class="form-group row">
		<label id="elh_hospital_PreFixCode" for="x_PreFixCode" class="<?php echo $hospital_edit->LeftColumnClass ?>"><?php echo $hospital_edit->PreFixCode->caption() ?><?php echo $hospital_edit->PreFixCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_edit->RightColumnClass ?>"><div <?php echo $hospital_edit->PreFixCode->cellAttributes() ?>>
<span id="el_hospital_PreFixCode">
<input type="text" data-table="hospital" data-field="x_PreFixCode" name="x_PreFixCode" id="x_PreFixCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($hospital_edit->PreFixCode->getPlaceHolder()) ?>" value="<?php echo $hospital_edit->PreFixCode->EditValue ?>"<?php echo $hospital_edit->PreFixCode->editAttributes() ?>>
</span>
<?php echo $hospital_edit->PreFixCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_edit->BillingGST->Visible) { // BillingGST ?>
	<div id="r_BillingGST" class="form-group row">
		<label id="elh_hospital_BillingGST" for="x_BillingGST" class="<?php echo $hospital_edit->LeftColumnClass ?>"><?php echo $hospital_edit->BillingGST->caption() ?><?php echo $hospital_edit->BillingGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_edit->RightColumnClass ?>"><div <?php echo $hospital_edit->BillingGST->cellAttributes() ?>>
<span id="el_hospital_BillingGST">
<input type="text" data-table="hospital" data-field="x_BillingGST" name="x_BillingGST" id="x_BillingGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($hospital_edit->BillingGST->getPlaceHolder()) ?>" value="<?php echo $hospital_edit->BillingGST->EditValue ?>"<?php echo $hospital_edit->BillingGST->editAttributes() ?>>
</span>
<?php echo $hospital_edit->BillingGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_edit->pharmacyGST->Visible) { // pharmacyGST ?>
	<div id="r_pharmacyGST" class="form-group row">
		<label id="elh_hospital_pharmacyGST" for="x_pharmacyGST" class="<?php echo $hospital_edit->LeftColumnClass ?>"><?php echo $hospital_edit->pharmacyGST->caption() ?><?php echo $hospital_edit->pharmacyGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_edit->RightColumnClass ?>"><div <?php echo $hospital_edit->pharmacyGST->cellAttributes() ?>>
<span id="el_hospital_pharmacyGST">
<input type="text" data-table="hospital" data-field="x_pharmacyGST" name="x_pharmacyGST" id="x_pharmacyGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($hospital_edit->pharmacyGST->getPlaceHolder()) ?>" value="<?php echo $hospital_edit->pharmacyGST->EditValue ?>"<?php echo $hospital_edit->pharmacyGST->editAttributes() ?>>
</span>
<?php echo $hospital_edit->pharmacyGST->CustomMsg ?></div></div>
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
$hospital_edit->terminate();
?>