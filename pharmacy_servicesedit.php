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
$pharmacy_services_edit = new pharmacy_services_edit();

// Run the page
$pharmacy_services_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_services_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fpharmacy_servicesedit = currentForm = new ew.Form("fpharmacy_servicesedit", "edit");

// Validate form
fpharmacy_servicesedit.validate = function() {
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
		<?php if ($pharmacy_services_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_services->id->caption(), $pharmacy_services->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_services_edit->pharmacy_id->Required) { ?>
			elm = this.getElements("x" + infix + "_pharmacy_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_services->pharmacy_id->caption(), $pharmacy_services->pharmacy_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_services_edit->patient_id->Required) { ?>
			elm = this.getElements("x" + infix + "_patient_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_services->patient_id->caption(), $pharmacy_services->patient_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_patient_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_services->patient_id->errorMessage()) ?>");
		<?php if ($pharmacy_services_edit->name->Required) { ?>
			elm = this.getElements("x" + infix + "_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_services->name->caption(), $pharmacy_services->name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_services_edit->amount->Required) { ?>
			elm = this.getElements("x" + infix + "_amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_services->amount->caption(), $pharmacy_services->amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_services->amount->errorMessage()) ?>");
		<?php if ($pharmacy_services_edit->description->Required) { ?>
			elm = this.getElements("x" + infix + "_description");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_services->description->caption(), $pharmacy_services->description->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_services_edit->charged_date->Required) { ?>
			elm = this.getElements("x" + infix + "_charged_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_services->charged_date->caption(), $pharmacy_services->charged_date->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_services_edit->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_services->status->caption(), $pharmacy_services->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_services_edit->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_services->modifiedby->caption(), $pharmacy_services->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_services_edit->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_services->modifieddatetime->caption(), $pharmacy_services->modifieddatetime->RequiredErrorMessage)) ?>");
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
fpharmacy_servicesedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_servicesedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_servicesedit.lists["x_pharmacy_id"] = <?php echo $pharmacy_services_edit->pharmacy_id->Lookup->toClientList() ?>;
fpharmacy_servicesedit.lists["x_pharmacy_id"].options = <?php echo JsonEncode($pharmacy_services_edit->pharmacy_id->lookupOptions()) ?>;
fpharmacy_servicesedit.lists["x_name"] = <?php echo $pharmacy_services_edit->name->Lookup->toClientList() ?>;
fpharmacy_servicesedit.lists["x_name"].options = <?php echo JsonEncode($pharmacy_services_edit->name->lookupOptions()) ?>;
fpharmacy_servicesedit.lists["x_status"] = <?php echo $pharmacy_services_edit->status->Lookup->toClientList() ?>;
fpharmacy_servicesedit.lists["x_status"].options = <?php echo JsonEncode($pharmacy_services_edit->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_services_edit->showPageHeader(); ?>
<?php
$pharmacy_services_edit->showMessage();
?>
<form name="fpharmacy_servicesedit" id="fpharmacy_servicesedit" class="<?php echo $pharmacy_services_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_services_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_services_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_services">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_services_edit->IsModal ?>">
<?php if ($pharmacy_services->getCurrentMasterTable() == "pharmacy") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="pharmacy">
<input type="hidden" name="fk_id" value="<?php echo $pharmacy_services->pharmacy_id->getSessionValue() ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo $pharmacy_services->patient_id->getSessionValue() ?>">
<?php } ?>
<?php if ($pharmacy_services->getCurrentMasterTable() == "mas_pharmacy") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="mas_pharmacy">
<input type="hidden" name="fk_name" value="<?php echo $pharmacy_services->name->getSessionValue() ?>">
<input type="hidden" name="fk_amount" value="<?php echo $pharmacy_services->amount->getSessionValue() ?>">
<input type="hidden" name="fk_description" value="<?php echo $pharmacy_services->description->getSessionValue() ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($pharmacy_services->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_pharmacy_services_id" class="<?php echo $pharmacy_services_edit->LeftColumnClass ?>"><?php echo $pharmacy_services->id->caption() ?><?php echo ($pharmacy_services->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_services_edit->RightColumnClass ?>"><div<?php echo $pharmacy_services->id->cellAttributes() ?>>
<span id="el_pharmacy_services_id">
<span<?php echo $pharmacy_services->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_services->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_services" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($pharmacy_services->id->CurrentValue) ?>">
<?php echo $pharmacy_services->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_services->pharmacy_id->Visible) { // pharmacy_id ?>
	<div id="r_pharmacy_id" class="form-group row">
		<label id="elh_pharmacy_services_pharmacy_id" for="x_pharmacy_id" class="<?php echo $pharmacy_services_edit->LeftColumnClass ?>"><?php echo $pharmacy_services->pharmacy_id->caption() ?><?php echo ($pharmacy_services->pharmacy_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_services_edit->RightColumnClass ?>"><div<?php echo $pharmacy_services->pharmacy_id->cellAttributes() ?>>
<?php if ($pharmacy_services->pharmacy_id->getSessionValue() <> "") { ?>
<span id="el_pharmacy_services_pharmacy_id">
<span<?php echo $pharmacy_services->pharmacy_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_services->pharmacy_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_pharmacy_id" name="x_pharmacy_id" value="<?php echo HtmlEncode($pharmacy_services->pharmacy_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el_pharmacy_services_pharmacy_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_services" data-field="x_pharmacy_id" data-value-separator="<?php echo $pharmacy_services->pharmacy_id->displayValueSeparatorAttribute() ?>" id="x_pharmacy_id" name="x_pharmacy_id"<?php echo $pharmacy_services->pharmacy_id->editAttributes() ?>>
		<?php echo $pharmacy_services->pharmacy_id->selectOptionListHtml("x_pharmacy_id") ?>
	</select>
</div>
<?php echo $pharmacy_services->pharmacy_id->Lookup->getParamTag("p_x_pharmacy_id") ?>
</span>
<?php } ?>
<?php echo $pharmacy_services->pharmacy_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_services->patient_id->Visible) { // patient_id ?>
	<div id="r_patient_id" class="form-group row">
		<label id="elh_pharmacy_services_patient_id" for="x_patient_id" class="<?php echo $pharmacy_services_edit->LeftColumnClass ?>"><?php echo $pharmacy_services->patient_id->caption() ?><?php echo ($pharmacy_services->patient_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_services_edit->RightColumnClass ?>"><div<?php echo $pharmacy_services->patient_id->cellAttributes() ?>>
<?php if ($pharmacy_services->patient_id->getSessionValue() <> "") { ?>
<span id="el_pharmacy_services_patient_id">
<span<?php echo $pharmacy_services->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_services->patient_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_patient_id" name="x_patient_id" value="<?php echo HtmlEncode($pharmacy_services->patient_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el_pharmacy_services_patient_id">
<input type="text" data-table="pharmacy_services" data-field="x_patient_id" name="x_patient_id" id="x_patient_id" size="30" placeholder="<?php echo HtmlEncode($pharmacy_services->patient_id->getPlaceHolder()) ?>" value="<?php echo $pharmacy_services->patient_id->EditValue ?>"<?php echo $pharmacy_services->patient_id->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $pharmacy_services->patient_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_services->name->Visible) { // name ?>
	<div id="r_name" class="form-group row">
		<label id="elh_pharmacy_services_name" for="x_name" class="<?php echo $pharmacy_services_edit->LeftColumnClass ?>"><?php echo $pharmacy_services->name->caption() ?><?php echo ($pharmacy_services->name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_services_edit->RightColumnClass ?>"><div<?php echo $pharmacy_services->name->cellAttributes() ?>>
<?php if ($pharmacy_services->name->getSessionValue() <> "") { ?>
<span id="el_pharmacy_services_name">
<span<?php echo $pharmacy_services->name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_services->name->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_name" name="x_name" value="<?php echo HtmlEncode($pharmacy_services->name->CurrentValue) ?>">
<?php } else { ?>
<span id="el_pharmacy_services_name">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_name"><?php echo strval($pharmacy_services->name->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_services->name->ViewValue) : $pharmacy_services->name->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_services->name->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_services->name->ReadOnly || $pharmacy_services->name->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_name',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_services->name->Lookup->getParamTag("p_x_name") ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_name" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_services->name->displayValueSeparatorAttribute() ?>" name="x_name" id="x_name" value="<?php echo $pharmacy_services->name->CurrentValue ?>"<?php echo $pharmacy_services->name->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $pharmacy_services->name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_services->amount->Visible) { // amount ?>
	<div id="r_amount" class="form-group row">
		<label id="elh_pharmacy_services_amount" for="x_amount" class="<?php echo $pharmacy_services_edit->LeftColumnClass ?>"><?php echo $pharmacy_services->amount->caption() ?><?php echo ($pharmacy_services->amount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_services_edit->RightColumnClass ?>"><div<?php echo $pharmacy_services->amount->cellAttributes() ?>>
<?php if ($pharmacy_services->amount->getSessionValue() <> "") { ?>
<span id="el_pharmacy_services_amount">
<span<?php echo $pharmacy_services->amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_services->amount->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_amount" name="x_amount" value="<?php echo HtmlEncode($pharmacy_services->amount->CurrentValue) ?>">
<?php } else { ?>
<span id="el_pharmacy_services_amount">
<input type="text" data-table="pharmacy_services" data-field="x_amount" name="x_amount" id="x_amount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_services->amount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_services->amount->EditValue ?>"<?php echo $pharmacy_services->amount->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $pharmacy_services->amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_services->description->Visible) { // description ?>
	<div id="r_description" class="form-group row">
		<label id="elh_pharmacy_services_description" for="x_description" class="<?php echo $pharmacy_services_edit->LeftColumnClass ?>"><?php echo $pharmacy_services->description->caption() ?><?php echo ($pharmacy_services->description->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_services_edit->RightColumnClass ?>"><div<?php echo $pharmacy_services->description->cellAttributes() ?>>
<?php if ($pharmacy_services->description->getSessionValue() <> "") { ?>
<span id="el_pharmacy_services_description">
<span<?php echo $pharmacy_services->description->viewAttributes() ?>>
<?php echo $pharmacy_services->description->ViewValue ?></span>
</span>
<input type="hidden" id="x_description" name="x_description" value="<?php echo HtmlEncode($pharmacy_services->description->CurrentValue) ?>">
<?php } else { ?>
<span id="el_pharmacy_services_description">
<textarea data-table="pharmacy_services" data-field="x_description" name="x_description" id="x_description" cols="35" rows="4" placeholder="<?php echo HtmlEncode($pharmacy_services->description->getPlaceHolder()) ?>"<?php echo $pharmacy_services->description->editAttributes() ?>><?php echo $pharmacy_services->description->EditValue ?></textarea>
</span>
<?php } ?>
<?php echo $pharmacy_services->description->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_services->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_pharmacy_services_status" for="x_status" class="<?php echo $pharmacy_services_edit->LeftColumnClass ?>"><?php echo $pharmacy_services->status->caption() ?><?php echo ($pharmacy_services->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_services_edit->RightColumnClass ?>"><div<?php echo $pharmacy_services->status->cellAttributes() ?>>
<span id="el_pharmacy_services_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_services" data-field="x_status" data-value-separator="<?php echo $pharmacy_services->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $pharmacy_services->status->editAttributes() ?>>
		<?php echo $pharmacy_services->status->selectOptionListHtml("x_status") ?>
	</select>
</div>
<?php echo $pharmacy_services->status->Lookup->getParamTag("p_x_status") ?>
</span>
<?php echo $pharmacy_services->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pharmacy_services_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_services_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_services_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pharmacy_services_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_services_edit->terminate();
?>