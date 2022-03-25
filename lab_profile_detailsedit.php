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
$lab_profile_details_edit = new lab_profile_details_edit();

// Run the page
$lab_profile_details_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_profile_details_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var flab_profile_detailsedit = currentForm = new ew.Form("flab_profile_detailsedit", "edit");

// Validate form
flab_profile_detailsedit.validate = function() {
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
		<?php if ($lab_profile_details_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_details->id->caption(), $lab_profile_details->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_profile_details_edit->ProfileCode->Required) { ?>
			elm = this.getElements("x" + infix + "_ProfileCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_details->ProfileCode->caption(), $lab_profile_details->ProfileCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_profile_details_edit->SubProfileCode->Required) { ?>
			elm = this.getElements("x" + infix + "_SubProfileCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_details->SubProfileCode->caption(), $lab_profile_details->SubProfileCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_profile_details_edit->ProfileTestCode->Required) { ?>
			elm = this.getElements("x" + infix + "_ProfileTestCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_details->ProfileTestCode->caption(), $lab_profile_details->ProfileTestCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_profile_details_edit->ProfileSubTestCode->Required) { ?>
			elm = this.getElements("x" + infix + "_ProfileSubTestCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_details->ProfileSubTestCode->caption(), $lab_profile_details->ProfileSubTestCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_profile_details_edit->TestOrder->Required) { ?>
			elm = this.getElements("x" + infix + "_TestOrder");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_details->TestOrder->caption(), $lab_profile_details->TestOrder->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TestOrder");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_profile_details->TestOrder->errorMessage()) ?>");
		<?php if ($lab_profile_details_edit->TestAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_TestAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_details->TestAmount->caption(), $lab_profile_details->TestAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TestAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_profile_details->TestAmount->errorMessage()) ?>");

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
flab_profile_detailsedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_profile_detailsedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
flab_profile_detailsedit.lists["x_SubProfileCode"] = <?php echo $lab_profile_details_edit->SubProfileCode->Lookup->toClientList() ?>;
flab_profile_detailsedit.lists["x_SubProfileCode"].options = <?php echo JsonEncode($lab_profile_details_edit->SubProfileCode->lookupOptions()) ?>;
flab_profile_detailsedit.lists["x_ProfileTestCode"] = <?php echo $lab_profile_details_edit->ProfileTestCode->Lookup->toClientList() ?>;
flab_profile_detailsedit.lists["x_ProfileTestCode"].options = <?php echo JsonEncode($lab_profile_details_edit->ProfileTestCode->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $lab_profile_details_edit->showPageHeader(); ?>
<?php
$lab_profile_details_edit->showMessage();
?>
<form name="flab_profile_detailsedit" id="flab_profile_detailsedit" class="<?php echo $lab_profile_details_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_profile_details_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_profile_details_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_profile_details">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$lab_profile_details_edit->IsModal ?>">
<?php if ($lab_profile_details->getCurrentMasterTable() == "view_lab_profile") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="view_lab_profile">
<input type="hidden" name="fk_CODE" value="<?php echo $lab_profile_details->ProfileCode->getSessionValue() ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($lab_profile_details->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_lab_profile_details_id" class="<?php echo $lab_profile_details_edit->LeftColumnClass ?>"><?php echo $lab_profile_details->id->caption() ?><?php echo ($lab_profile_details->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_details_edit->RightColumnClass ?>"><div<?php echo $lab_profile_details->id->cellAttributes() ?>>
<span id="el_lab_profile_details_id">
<span<?php echo $lab_profile_details->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_profile_details->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($lab_profile_details->id->CurrentValue) ?>">
<?php echo $lab_profile_details->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_details->ProfileCode->Visible) { // ProfileCode ?>
	<div id="r_ProfileCode" class="form-group row">
		<label id="elh_lab_profile_details_ProfileCode" for="x_ProfileCode" class="<?php echo $lab_profile_details_edit->LeftColumnClass ?>"><?php echo $lab_profile_details->ProfileCode->caption() ?><?php echo ($lab_profile_details->ProfileCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_details_edit->RightColumnClass ?>"><div<?php echo $lab_profile_details->ProfileCode->cellAttributes() ?>>
<?php if ($lab_profile_details->ProfileCode->getSessionValue() <> "") { ?>
<span id="el_lab_profile_details_ProfileCode">
<span<?php echo $lab_profile_details->ProfileCode->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_profile_details->ProfileCode->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_ProfileCode" name="x_ProfileCode" value="<?php echo HtmlEncode($lab_profile_details->ProfileCode->CurrentValue) ?>">
<?php } else { ?>
<span id="el_lab_profile_details_ProfileCode">
<input type="text" data-table="lab_profile_details" data-field="x_ProfileCode" name="x_ProfileCode" id="x_ProfileCode" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_profile_details->ProfileCode->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details->ProfileCode->EditValue ?>"<?php echo $lab_profile_details->ProfileCode->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $lab_profile_details->ProfileCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_details->SubProfileCode->Visible) { // SubProfileCode ?>
	<div id="r_SubProfileCode" class="form-group row">
		<label id="elh_lab_profile_details_SubProfileCode" for="x_SubProfileCode" class="<?php echo $lab_profile_details_edit->LeftColumnClass ?>"><?php echo $lab_profile_details->SubProfileCode->caption() ?><?php echo ($lab_profile_details->SubProfileCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_details_edit->RightColumnClass ?>"><div<?php echo $lab_profile_details->SubProfileCode->cellAttributes() ?>>
<span id="el_lab_profile_details_SubProfileCode">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_SubProfileCode"><?php echo strval($lab_profile_details->SubProfileCode->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($lab_profile_details->SubProfileCode->ViewValue) : $lab_profile_details->SubProfileCode->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($lab_profile_details->SubProfileCode->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($lab_profile_details->SubProfileCode->ReadOnly || $lab_profile_details->SubProfileCode->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_SubProfileCode',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $lab_profile_details->SubProfileCode->Lookup->getParamTag("p_x_SubProfileCode") ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_SubProfileCode" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $lab_profile_details->SubProfileCode->displayValueSeparatorAttribute() ?>" name="x_SubProfileCode" id="x_SubProfileCode" value="<?php echo $lab_profile_details->SubProfileCode->CurrentValue ?>"<?php echo $lab_profile_details->SubProfileCode->editAttributes() ?>>
</span>
<?php echo $lab_profile_details->SubProfileCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_details->ProfileTestCode->Visible) { // ProfileTestCode ?>
	<div id="r_ProfileTestCode" class="form-group row">
		<label id="elh_lab_profile_details_ProfileTestCode" for="x_ProfileTestCode" class="<?php echo $lab_profile_details_edit->LeftColumnClass ?>"><?php echo $lab_profile_details->ProfileTestCode->caption() ?><?php echo ($lab_profile_details->ProfileTestCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_details_edit->RightColumnClass ?>"><div<?php echo $lab_profile_details->ProfileTestCode->cellAttributes() ?>>
<span id="el_lab_profile_details_ProfileTestCode">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ProfileTestCode"><?php echo strval($lab_profile_details->ProfileTestCode->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($lab_profile_details->ProfileTestCode->ViewValue) : $lab_profile_details->ProfileTestCode->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($lab_profile_details->ProfileTestCode->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($lab_profile_details->ProfileTestCode->ReadOnly || $lab_profile_details->ProfileTestCode->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_ProfileTestCode',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $lab_profile_details->ProfileTestCode->Lookup->getParamTag("p_x_ProfileTestCode") ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileTestCode" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $lab_profile_details->ProfileTestCode->displayValueSeparatorAttribute() ?>" name="x_ProfileTestCode" id="x_ProfileTestCode" value="<?php echo $lab_profile_details->ProfileTestCode->CurrentValue ?>"<?php echo $lab_profile_details->ProfileTestCode->editAttributes() ?>>
</span>
<?php echo $lab_profile_details->ProfileTestCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_details->ProfileSubTestCode->Visible) { // ProfileSubTestCode ?>
	<div id="r_ProfileSubTestCode" class="form-group row">
		<label id="elh_lab_profile_details_ProfileSubTestCode" for="x_ProfileSubTestCode" class="<?php echo $lab_profile_details_edit->LeftColumnClass ?>"><?php echo $lab_profile_details->ProfileSubTestCode->caption() ?><?php echo ($lab_profile_details->ProfileSubTestCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_details_edit->RightColumnClass ?>"><div<?php echo $lab_profile_details->ProfileSubTestCode->cellAttributes() ?>>
<span id="el_lab_profile_details_ProfileSubTestCode">
<input type="text" data-table="lab_profile_details" data-field="x_ProfileSubTestCode" name="x_ProfileSubTestCode" id="x_ProfileSubTestCode" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_profile_details->ProfileSubTestCode->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details->ProfileSubTestCode->EditValue ?>"<?php echo $lab_profile_details->ProfileSubTestCode->editAttributes() ?>>
</span>
<?php echo $lab_profile_details->ProfileSubTestCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_details->TestOrder->Visible) { // TestOrder ?>
	<div id="r_TestOrder" class="form-group row">
		<label id="elh_lab_profile_details_TestOrder" for="x_TestOrder" class="<?php echo $lab_profile_details_edit->LeftColumnClass ?>"><?php echo $lab_profile_details->TestOrder->caption() ?><?php echo ($lab_profile_details->TestOrder->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_details_edit->RightColumnClass ?>"><div<?php echo $lab_profile_details->TestOrder->cellAttributes() ?>>
<span id="el_lab_profile_details_TestOrder">
<input type="text" data-table="lab_profile_details" data-field="x_TestOrder" name="x_TestOrder" id="x_TestOrder" size="30" placeholder="<?php echo HtmlEncode($lab_profile_details->TestOrder->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details->TestOrder->EditValue ?>"<?php echo $lab_profile_details->TestOrder->editAttributes() ?>>
</span>
<?php echo $lab_profile_details->TestOrder->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_details->TestAmount->Visible) { // TestAmount ?>
	<div id="r_TestAmount" class="form-group row">
		<label id="elh_lab_profile_details_TestAmount" for="x_TestAmount" class="<?php echo $lab_profile_details_edit->LeftColumnClass ?>"><?php echo $lab_profile_details->TestAmount->caption() ?><?php echo ($lab_profile_details->TestAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_details_edit->RightColumnClass ?>"><div<?php echo $lab_profile_details->TestAmount->cellAttributes() ?>>
<span id="el_lab_profile_details_TestAmount">
<input type="text" data-table="lab_profile_details" data-field="x_TestAmount" name="x_TestAmount" id="x_TestAmount" size="30" placeholder="<?php echo HtmlEncode($lab_profile_details->TestAmount->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details->TestAmount->EditValue ?>"<?php echo $lab_profile_details->TestAmount->editAttributes() ?>>
</span>
<?php echo $lab_profile_details->TestAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$lab_profile_details_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $lab_profile_details_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lab_profile_details_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$lab_profile_details_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$lab_profile_details_edit->terminate();
?>