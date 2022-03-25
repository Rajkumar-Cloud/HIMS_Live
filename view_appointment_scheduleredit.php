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
$view_appointment_scheduler_edit = new view_appointment_scheduler_edit();

// Run the page
$view_appointment_scheduler_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_appointment_scheduler_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fview_appointment_scheduleredit = currentForm = new ew.Form("fview_appointment_scheduleredit", "edit");

// Validate form
fview_appointment_scheduleredit.validate = function() {
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
		<?php if ($view_appointment_scheduler_edit->patientID->Required) { ?>
			elm = this.getElements("x" + infix + "_patientID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->patientID->caption(), $view_appointment_scheduler->patientID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_edit->patientName->Required) { ?>
			elm = this.getElements("x" + infix + "_patientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->patientName->caption(), $view_appointment_scheduler->patientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_edit->MobileNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_MobileNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->MobileNumber->caption(), $view_appointment_scheduler->MobileNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_edit->start_time->Required) { ?>
			elm = this.getElements("x" + infix + "_start_time");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->start_time->caption(), $view_appointment_scheduler->start_time->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_start_time");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler->start_time->errorMessage()) ?>");
		<?php if ($view_appointment_scheduler_edit->Purpose->Required) { ?>
			elm = this.getElements("x" + infix + "_Purpose");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->Purpose->caption(), $view_appointment_scheduler->Purpose->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_edit->patienttype->Required) { ?>
			elm = this.getElements("x" + infix + "_patienttype");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->patienttype->caption(), $view_appointment_scheduler->patienttype->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_edit->Referal->Required) { ?>
			elm = this.getElements("x" + infix + "_Referal");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->Referal->caption(), $view_appointment_scheduler->Referal->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_edit->start_date->Required) { ?>
			elm = this.getElements("x" + infix + "_start_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->start_date->caption(), $view_appointment_scheduler->start_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_start_date");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler->start_date->errorMessage()) ?>");
		<?php if ($view_appointment_scheduler_edit->DoctorName->Required) { ?>
			elm = this.getElements("x" + infix + "_DoctorName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->DoctorName->caption(), $view_appointment_scheduler->DoctorName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_edit->Id->Required) { ?>
			elm = this.getElements("x" + infix + "_Id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->Id->caption(), $view_appointment_scheduler->Id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->HospID->caption(), $view_appointment_scheduler->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler->HospID->errorMessage()) ?>");

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
fview_appointment_scheduleredit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_appointment_scheduleredit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_appointment_scheduleredit.lists["x_Referal"] = <?php echo $view_appointment_scheduler_edit->Referal->Lookup->toClientList() ?>;
fview_appointment_scheduleredit.lists["x_Referal"].options = <?php echo JsonEncode($view_appointment_scheduler_edit->Referal->lookupOptions()) ?>;
fview_appointment_scheduleredit.autoSuggests["x_Referal"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_appointment_scheduleredit.lists["x_DoctorName"] = <?php echo $view_appointment_scheduler_edit->DoctorName->Lookup->toClientList() ?>;
fview_appointment_scheduleredit.lists["x_DoctorName"].options = <?php echo JsonEncode($view_appointment_scheduler_edit->DoctorName->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_appointment_scheduler_edit->showPageHeader(); ?>
<?php
$view_appointment_scheduler_edit->showMessage();
?>
<form name="fview_appointment_scheduleredit" id="fview_appointment_scheduleredit" class="<?php echo $view_appointment_scheduler_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_appointment_scheduler_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_appointment_scheduler_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_appointment_scheduler">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$view_appointment_scheduler_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($view_appointment_scheduler->patientID->Visible) { // patientID ?>
	<div id="r_patientID" class="form-group row">
		<label id="elh_view_appointment_scheduler_patientID" for="x_patientID" class="<?php echo $view_appointment_scheduler_edit->LeftColumnClass ?>"><?php echo $view_appointment_scheduler->patientID->caption() ?><?php echo ($view_appointment_scheduler->patientID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->patientID->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_patientID">
<input type="text" data-table="view_appointment_scheduler" data-field="x_patientID" name="x_patientID" id="x_patientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->patientID->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->patientID->EditValue ?>"<?php echo $view_appointment_scheduler->patientID->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler->patientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->patientName->Visible) { // patientName ?>
	<div id="r_patientName" class="form-group row">
		<label id="elh_view_appointment_scheduler_patientName" for="x_patientName" class="<?php echo $view_appointment_scheduler_edit->LeftColumnClass ?>"><?php echo $view_appointment_scheduler->patientName->caption() ?><?php echo ($view_appointment_scheduler->patientName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->patientName->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_patientName">
<input type="text" data-table="view_appointment_scheduler" data-field="x_patientName" name="x_patientName" id="x_patientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->patientName->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->patientName->EditValue ?>"<?php echo $view_appointment_scheduler->patientName->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler->patientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->MobileNumber->Visible) { // MobileNumber ?>
	<div id="r_MobileNumber" class="form-group row">
		<label id="elh_view_appointment_scheduler_MobileNumber" for="x_MobileNumber" class="<?php echo $view_appointment_scheduler_edit->LeftColumnClass ?>"><?php echo $view_appointment_scheduler->MobileNumber->caption() ?><?php echo ($view_appointment_scheduler->MobileNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->MobileNumber->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_MobileNumber">
<input type="text" data-table="view_appointment_scheduler" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->MobileNumber->EditValue ?>"<?php echo $view_appointment_scheduler->MobileNumber->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler->MobileNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->start_time->Visible) { // start_time ?>
	<div id="r_start_time" class="form-group row">
		<label id="elh_view_appointment_scheduler_start_time" for="x_start_time" class="<?php echo $view_appointment_scheduler_edit->LeftColumnClass ?>"><?php echo $view_appointment_scheduler->start_time->caption() ?><?php echo ($view_appointment_scheduler->start_time->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->start_time->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_start_time">
<input type="text" data-table="view_appointment_scheduler" data-field="x_start_time" data-format="3" name="x_start_time" id="x_start_time" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->start_time->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->start_time->EditValue ?>"<?php echo $view_appointment_scheduler->start_time->editAttributes() ?>>
<?php if (!$view_appointment_scheduler->start_time->ReadOnly && !$view_appointment_scheduler->start_time->Disabled && !isset($view_appointment_scheduler->start_time->EditAttrs["readonly"]) && !isset($view_appointment_scheduler->start_time->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_appointment_scheduleredit", "x_start_time", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
<?php if (!$view_appointment_scheduler->start_time->ReadOnly && !$view_appointment_scheduler->start_time->Disabled && !isset($view_appointment_scheduler->start_time->EditAttrs["readonly"]) && !isset($view_appointment_scheduler->start_time->EditAttrs["disabled"])) { ?>
<script>ew.createTimePicker("fview_appointment_scheduleredit", "x_start_time", {"timeFormat":"h:i A","step":15});</script><?php } ?>
</span>
<?php echo $view_appointment_scheduler->start_time->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->Purpose->Visible) { // Purpose ?>
	<div id="r_Purpose" class="form-group row">
		<label id="elh_view_appointment_scheduler_Purpose" for="x_Purpose" class="<?php echo $view_appointment_scheduler_edit->LeftColumnClass ?>"><?php echo $view_appointment_scheduler->Purpose->caption() ?><?php echo ($view_appointment_scheduler->Purpose->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->Purpose->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_Purpose">
<input type="text" data-table="view_appointment_scheduler" data-field="x_Purpose" name="x_Purpose" id="x_Purpose" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->Purpose->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->Purpose->EditValue ?>"<?php echo $view_appointment_scheduler->Purpose->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler->Purpose->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->patienttype->Visible) { // patienttype ?>
	<div id="r_patienttype" class="form-group row">
		<label id="elh_view_appointment_scheduler_patienttype" for="x_patienttype" class="<?php echo $view_appointment_scheduler_edit->LeftColumnClass ?>"><?php echo $view_appointment_scheduler->patienttype->caption() ?><?php echo ($view_appointment_scheduler->patienttype->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->patienttype->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_patienttype">
<input type="text" data-table="view_appointment_scheduler" data-field="x_patienttype" name="x_patienttype" id="x_patienttype" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->patienttype->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->patienttype->EditValue ?>"<?php echo $view_appointment_scheduler->patienttype->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler->patienttype->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->Referal->Visible) { // Referal ?>
	<div id="r_Referal" class="form-group row">
		<label id="elh_view_appointment_scheduler_Referal" class="<?php echo $view_appointment_scheduler_edit->LeftColumnClass ?>"><?php echo $view_appointment_scheduler->Referal->caption() ?><?php echo ($view_appointment_scheduler->Referal->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->Referal->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_Referal">
<?php
$wrkonchange = "" . trim(@$view_appointment_scheduler->Referal->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_appointment_scheduler->Referal->EditAttrs["onchange"] = "";
?>
<span id="as_x_Referal" class="text-nowrap" style="z-index: 8930">
	<input type="text" class="form-control" name="sv_x_Referal" id="sv_x_Referal" value="<?php echo RemoveHtml($view_appointment_scheduler->Referal->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->Referal->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_appointment_scheduler->Referal->getPlaceHolder()) ?>"<?php echo $view_appointment_scheduler->Referal->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_Referal" data-value-separator="<?php echo $view_appointment_scheduler->Referal->displayValueSeparatorAttribute() ?>" name="x_Referal" id="x_Referal" value="<?php echo HtmlEncode($view_appointment_scheduler->Referal->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_appointment_scheduleredit.createAutoSuggest({"id":"x_Referal","forceSelect":false});
</script>
<?php echo $view_appointment_scheduler->Referal->Lookup->getParamTag("p_x_Referal") ?>
</span>
<?php echo $view_appointment_scheduler->Referal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->start_date->Visible) { // start_date ?>
	<div id="r_start_date" class="form-group row">
		<label id="elh_view_appointment_scheduler_start_date" for="x_start_date" class="<?php echo $view_appointment_scheduler_edit->LeftColumnClass ?>"><?php echo $view_appointment_scheduler->start_date->caption() ?><?php echo ($view_appointment_scheduler->start_date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->start_date->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_start_date">
<input type="text" data-table="view_appointment_scheduler" data-field="x_start_date" data-format="11" name="x_start_date" id="x_start_date" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->start_date->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->start_date->EditValue ?>"<?php echo $view_appointment_scheduler->start_date->editAttributes() ?>>
<?php if (!$view_appointment_scheduler->start_date->ReadOnly && !$view_appointment_scheduler->start_date->Disabled && !isset($view_appointment_scheduler->start_date->EditAttrs["readonly"]) && !isset($view_appointment_scheduler->start_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_appointment_scheduleredit", "x_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php echo $view_appointment_scheduler->start_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->DoctorName->Visible) { // DoctorName ?>
	<div id="r_DoctorName" class="form-group row">
		<label id="elh_view_appointment_scheduler_DoctorName" for="x_DoctorName" class="<?php echo $view_appointment_scheduler_edit->LeftColumnClass ?>"><?php echo $view_appointment_scheduler->DoctorName->caption() ?><?php echo ($view_appointment_scheduler->DoctorName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->DoctorName->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_DoctorName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_appointment_scheduler" data-field="x_DoctorName" data-value-separator="<?php echo $view_appointment_scheduler->DoctorName->displayValueSeparatorAttribute() ?>" id="x_DoctorName" name="x_DoctorName"<?php echo $view_appointment_scheduler->DoctorName->editAttributes() ?>>
		<?php echo $view_appointment_scheduler->DoctorName->selectOptionListHtml("x_DoctorName") ?>
	</select>
</div>
<?php echo $view_appointment_scheduler->DoctorName->Lookup->getParamTag("p_x_DoctorName") ?>
</span>
<?php echo $view_appointment_scheduler->DoctorName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->Id->Visible) { // Id ?>
	<div id="r_Id" class="form-group row">
		<label id="elh_view_appointment_scheduler_Id" class="<?php echo $view_appointment_scheduler_edit->LeftColumnClass ?>"><?php echo $view_appointment_scheduler->Id->caption() ?><?php echo ($view_appointment_scheduler->Id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->Id->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_Id">
<span<?php echo $view_appointment_scheduler->Id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_appointment_scheduler->Id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_Id" name="x_Id" id="x_Id" value="<?php echo HtmlEncode($view_appointment_scheduler->Id->CurrentValue) ?>">
<?php echo $view_appointment_scheduler->Id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label id="elh_view_appointment_scheduler_HospID" for="x_HospID" class="<?php echo $view_appointment_scheduler_edit->LeftColumnClass ?>"><?php echo $view_appointment_scheduler->HospID->caption() ?><?php echo ($view_appointment_scheduler->HospID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->HospID->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_HospID">
<input type="text" data-table="view_appointment_scheduler" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->HospID->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->HospID->EditValue ?>"<?php echo $view_appointment_scheduler->HospID->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler->HospID->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_appointment_scheduler_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_appointment_scheduler_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_appointment_scheduler_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_appointment_scheduler_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_appointment_scheduler_edit->terminate();
?>