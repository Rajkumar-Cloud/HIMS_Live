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
$hospital_add = new hospital_add();

// Run the page
$hospital_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hospital_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fhospitaladd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fhospitaladd = currentForm = new ew.Form("fhospitaladd", "add");

	// Validate form
	fhospitaladd.validate = function() {
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
			<?php if ($hospital_add->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_add->id->caption(), $hospital_add->id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($hospital_add->id->errorMessage()) ?>");
			<?php if ($hospital_add->logo->Required) { ?>
				felm = this.getElements("x" + infix + "_logo");
				elm = this.getElements("fn_x" + infix + "_logo");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $hospital_add->logo->caption(), $hospital_add->logo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_add->hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_add->hospital->caption(), $hospital_add->hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_add->street->Required) { ?>
				elm = this.getElements("x" + infix + "_street");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_add->street->caption(), $hospital_add->street->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_add->area->Required) { ?>
				elm = this.getElements("x" + infix + "_area");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_add->area->caption(), $hospital_add->area->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_add->town->Required) { ?>
				elm = this.getElements("x" + infix + "_town");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_add->town->caption(), $hospital_add->town->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_add->province->Required) { ?>
				elm = this.getElements("x" + infix + "_province");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_add->province->caption(), $hospital_add->province->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_add->postal_code->Required) { ?>
				elm = this.getElements("x" + infix + "_postal_code");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_add->postal_code->caption(), $hospital_add->postal_code->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_add->phone_no->Required) { ?>
				elm = this.getElements("x" + infix + "_phone_no");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_add->phone_no->caption(), $hospital_add->phone_no->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_add->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_add->status->caption(), $hospital_add->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_add->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_add->createdby->caption(), $hospital_add->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_add->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_add->createddatetime->caption(), $hospital_add->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_add->PreFixCode->Required) { ?>
				elm = this.getElements("x" + infix + "_PreFixCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_add->PreFixCode->caption(), $hospital_add->PreFixCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_add->BillingGST->Required) { ?>
				elm = this.getElements("x" + infix + "_BillingGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_add->BillingGST->caption(), $hospital_add->BillingGST->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospital_add->pharmacyGST->Required) { ?>
				elm = this.getElements("x" + infix + "_pharmacyGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospital_add->pharmacyGST->caption(), $hospital_add->pharmacyGST->RequiredErrorMessage)) ?>");
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
	fhospitaladd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fhospitaladd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fhospitaladd.lists["x_status"] = <?php echo $hospital_add->status->Lookup->toClientList($hospital_add) ?>;
	fhospitaladd.lists["x_status"].options = <?php echo JsonEncode($hospital_add->status->lookupOptions()) ?>;
	loadjs.done("fhospitaladd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $hospital_add->showPageHeader(); ?>
<?php
$hospital_add->showMessage();
?>
<form name="fhospitaladd" id="fhospitaladd" class="<?php echo $hospital_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hospital">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$hospital_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($hospital_add->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_hospital_id" for="x_id" class="<?php echo $hospital_add->LeftColumnClass ?>"><?php echo $hospital_add->id->caption() ?><?php echo $hospital_add->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_add->RightColumnClass ?>"><div <?php echo $hospital_add->id->cellAttributes() ?>>
<span id="el_hospital_id">
<input type="text" data-table="hospital" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($hospital_add->id->getPlaceHolder()) ?>" value="<?php echo $hospital_add->id->EditValue ?>"<?php echo $hospital_add->id->editAttributes() ?>>
</span>
<?php echo $hospital_add->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_add->logo->Visible) { // logo ?>
	<div id="r_logo" class="form-group row">
		<label id="elh_hospital_logo" class="<?php echo $hospital_add->LeftColumnClass ?>"><?php echo $hospital_add->logo->caption() ?><?php echo $hospital_add->logo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_add->RightColumnClass ?>"><div <?php echo $hospital_add->logo->cellAttributes() ?>>
<span id="el_hospital_logo">
<div id="fd_x_logo">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $hospital_add->logo->title() ?>" data-table="hospital" data-field="x_logo" name="x_logo" id="x_logo" lang="<?php echo CurrentLanguageID() ?>"<?php echo $hospital_add->logo->editAttributes() ?><?php if ($hospital_add->logo->ReadOnly || $hospital_add->logo->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x_logo"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x_logo" id= "fn_x_logo" value="<?php echo $hospital_add->logo->Upload->FileName ?>">
<input type="hidden" name="fa_x_logo" id= "fa_x_logo" value="0">
<input type="hidden" name="fs_x_logo" id= "fs_x_logo" value="450">
<input type="hidden" name="fx_x_logo" id= "fx_x_logo" value="<?php echo $hospital_add->logo->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_logo" id= "fm_x_logo" value="<?php echo $hospital_add->logo->UploadMaxFileSize ?>">
</div>
<table id="ft_x_logo" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $hospital_add->logo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_add->hospital->Visible) { // hospital ?>
	<div id="r_hospital" class="form-group row">
		<label id="elh_hospital_hospital" for="x_hospital" class="<?php echo $hospital_add->LeftColumnClass ?>"><?php echo $hospital_add->hospital->caption() ?><?php echo $hospital_add->hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_add->RightColumnClass ?>"><div <?php echo $hospital_add->hospital->cellAttributes() ?>>
<span id="el_hospital_hospital">
<input type="text" data-table="hospital" data-field="x_hospital" name="x_hospital" id="x_hospital" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hospital_add->hospital->getPlaceHolder()) ?>" value="<?php echo $hospital_add->hospital->EditValue ?>"<?php echo $hospital_add->hospital->editAttributes() ?>>
</span>
<?php echo $hospital_add->hospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_add->street->Visible) { // street ?>
	<div id="r_street" class="form-group row">
		<label id="elh_hospital_street" for="x_street" class="<?php echo $hospital_add->LeftColumnClass ?>"><?php echo $hospital_add->street->caption() ?><?php echo $hospital_add->street->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_add->RightColumnClass ?>"><div <?php echo $hospital_add->street->cellAttributes() ?>>
<span id="el_hospital_street">
<input type="text" data-table="hospital" data-field="x_street" name="x_street" id="x_street" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hospital_add->street->getPlaceHolder()) ?>" value="<?php echo $hospital_add->street->EditValue ?>"<?php echo $hospital_add->street->editAttributes() ?>>
</span>
<?php echo $hospital_add->street->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_add->area->Visible) { // area ?>
	<div id="r_area" class="form-group row">
		<label id="elh_hospital_area" for="x_area" class="<?php echo $hospital_add->LeftColumnClass ?>"><?php echo $hospital_add->area->caption() ?><?php echo $hospital_add->area->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_add->RightColumnClass ?>"><div <?php echo $hospital_add->area->cellAttributes() ?>>
<span id="el_hospital_area">
<input type="text" data-table="hospital" data-field="x_area" name="x_area" id="x_area" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($hospital_add->area->getPlaceHolder()) ?>" value="<?php echo $hospital_add->area->EditValue ?>"<?php echo $hospital_add->area->editAttributes() ?>>
</span>
<?php echo $hospital_add->area->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_add->town->Visible) { // town ?>
	<div id="r_town" class="form-group row">
		<label id="elh_hospital_town" for="x_town" class="<?php echo $hospital_add->LeftColumnClass ?>"><?php echo $hospital_add->town->caption() ?><?php echo $hospital_add->town->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_add->RightColumnClass ?>"><div <?php echo $hospital_add->town->cellAttributes() ?>>
<span id="el_hospital_town">
<input type="text" data-table="hospital" data-field="x_town" name="x_town" id="x_town" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($hospital_add->town->getPlaceHolder()) ?>" value="<?php echo $hospital_add->town->EditValue ?>"<?php echo $hospital_add->town->editAttributes() ?>>
</span>
<?php echo $hospital_add->town->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_add->province->Visible) { // province ?>
	<div id="r_province" class="form-group row">
		<label id="elh_hospital_province" for="x_province" class="<?php echo $hospital_add->LeftColumnClass ?>"><?php echo $hospital_add->province->caption() ?><?php echo $hospital_add->province->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_add->RightColumnClass ?>"><div <?php echo $hospital_add->province->cellAttributes() ?>>
<span id="el_hospital_province">
<input type="text" data-table="hospital" data-field="x_province" name="x_province" id="x_province" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($hospital_add->province->getPlaceHolder()) ?>" value="<?php echo $hospital_add->province->EditValue ?>"<?php echo $hospital_add->province->editAttributes() ?>>
</span>
<?php echo $hospital_add->province->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_add->postal_code->Visible) { // postal_code ?>
	<div id="r_postal_code" class="form-group row">
		<label id="elh_hospital_postal_code" for="x_postal_code" class="<?php echo $hospital_add->LeftColumnClass ?>"><?php echo $hospital_add->postal_code->caption() ?><?php echo $hospital_add->postal_code->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_add->RightColumnClass ?>"><div <?php echo $hospital_add->postal_code->cellAttributes() ?>>
<span id="el_hospital_postal_code">
<input type="text" data-table="hospital" data-field="x_postal_code" name="x_postal_code" id="x_postal_code" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($hospital_add->postal_code->getPlaceHolder()) ?>" value="<?php echo $hospital_add->postal_code->EditValue ?>"<?php echo $hospital_add->postal_code->editAttributes() ?>>
</span>
<?php echo $hospital_add->postal_code->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_add->phone_no->Visible) { // phone_no ?>
	<div id="r_phone_no" class="form-group row">
		<label id="elh_hospital_phone_no" for="x_phone_no" class="<?php echo $hospital_add->LeftColumnClass ?>"><?php echo $hospital_add->phone_no->caption() ?><?php echo $hospital_add->phone_no->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_add->RightColumnClass ?>"><div <?php echo $hospital_add->phone_no->cellAttributes() ?>>
<span id="el_hospital_phone_no">
<input type="text" data-table="hospital" data-field="x_phone_no" name="x_phone_no" id="x_phone_no" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($hospital_add->phone_no->getPlaceHolder()) ?>" value="<?php echo $hospital_add->phone_no->EditValue ?>"<?php echo $hospital_add->phone_no->editAttributes() ?>>
</span>
<?php echo $hospital_add->phone_no->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_add->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_hospital_status" for="x_status" class="<?php echo $hospital_add->LeftColumnClass ?>"><?php echo $hospital_add->status->caption() ?><?php echo $hospital_add->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_add->RightColumnClass ?>"><div <?php echo $hospital_add->status->cellAttributes() ?>>
<span id="el_hospital_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="hospital" data-field="x_status" data-value-separator="<?php echo $hospital_add->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $hospital_add->status->editAttributes() ?>>
			<?php echo $hospital_add->status->selectOptionListHtml("x_status") ?>
		</select>
</div>
<?php echo $hospital_add->status->Lookup->getParamTag($hospital_add, "p_x_status") ?>
</span>
<?php echo $hospital_add->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_add->PreFixCode->Visible) { // PreFixCode ?>
	<div id="r_PreFixCode" class="form-group row">
		<label id="elh_hospital_PreFixCode" for="x_PreFixCode" class="<?php echo $hospital_add->LeftColumnClass ?>"><?php echo $hospital_add->PreFixCode->caption() ?><?php echo $hospital_add->PreFixCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_add->RightColumnClass ?>"><div <?php echo $hospital_add->PreFixCode->cellAttributes() ?>>
<span id="el_hospital_PreFixCode">
<input type="text" data-table="hospital" data-field="x_PreFixCode" name="x_PreFixCode" id="x_PreFixCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($hospital_add->PreFixCode->getPlaceHolder()) ?>" value="<?php echo $hospital_add->PreFixCode->EditValue ?>"<?php echo $hospital_add->PreFixCode->editAttributes() ?>>
</span>
<?php echo $hospital_add->PreFixCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_add->BillingGST->Visible) { // BillingGST ?>
	<div id="r_BillingGST" class="form-group row">
		<label id="elh_hospital_BillingGST" for="x_BillingGST" class="<?php echo $hospital_add->LeftColumnClass ?>"><?php echo $hospital_add->BillingGST->caption() ?><?php echo $hospital_add->BillingGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_add->RightColumnClass ?>"><div <?php echo $hospital_add->BillingGST->cellAttributes() ?>>
<span id="el_hospital_BillingGST">
<input type="text" data-table="hospital" data-field="x_BillingGST" name="x_BillingGST" id="x_BillingGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($hospital_add->BillingGST->getPlaceHolder()) ?>" value="<?php echo $hospital_add->BillingGST->EditValue ?>"<?php echo $hospital_add->BillingGST->editAttributes() ?>>
</span>
<?php echo $hospital_add->BillingGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospital_add->pharmacyGST->Visible) { // pharmacyGST ?>
	<div id="r_pharmacyGST" class="form-group row">
		<label id="elh_hospital_pharmacyGST" for="x_pharmacyGST" class="<?php echo $hospital_add->LeftColumnClass ?>"><?php echo $hospital_add->pharmacyGST->caption() ?><?php echo $hospital_add->pharmacyGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospital_add->RightColumnClass ?>"><div <?php echo $hospital_add->pharmacyGST->cellAttributes() ?>>
<span id="el_hospital_pharmacyGST">
<input type="text" data-table="hospital" data-field="x_pharmacyGST" name="x_pharmacyGST" id="x_pharmacyGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($hospital_add->pharmacyGST->getPlaceHolder()) ?>" value="<?php echo $hospital_add->pharmacyGST->EditValue ?>"<?php echo $hospital_add->pharmacyGST->editAttributes() ?>>
</span>
<?php echo $hospital_add->pharmacyGST->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$hospital_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $hospital_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hospital_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$hospital_add->showPageFooter();
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
$hospital_add->terminate();
?>