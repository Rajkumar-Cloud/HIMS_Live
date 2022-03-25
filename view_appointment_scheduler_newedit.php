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
$view_appointment_scheduler_new_edit = new view_appointment_scheduler_new_edit();

// Run the page
$view_appointment_scheduler_new_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_appointment_scheduler_new_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fview_appointment_scheduler_newedit = currentForm = new ew.Form("fview_appointment_scheduler_newedit", "edit");

// Validate form
fview_appointment_scheduler_newedit.validate = function() {
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
		<?php if ($view_appointment_scheduler_new_edit->patientID->Required) { ?>
			elm = this.getElements("x" + infix + "_patientID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new->patientID->caption(), $view_appointment_scheduler_new->patientID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_new_edit->patientName->Required) { ?>
			elm = this.getElements("x" + infix + "_patientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new->patientName->caption(), $view_appointment_scheduler_new->patientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_new_edit->MobileNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_MobileNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new->MobileNumber->caption(), $view_appointment_scheduler_new->MobileNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_new_edit->start_time->Required) { ?>
			elm = this.getElements("x" + infix + "_start_time");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new->start_time->caption(), $view_appointment_scheduler_new->start_time->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_start_time");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler_new->start_time->errorMessage()) ?>");
		<?php if ($view_appointment_scheduler_new_edit->Purpose->Required) { ?>
			elm = this.getElements("x" + infix + "_Purpose");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new->Purpose->caption(), $view_appointment_scheduler_new->Purpose->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_new_edit->patienttype->Required) { ?>
			elm = this.getElements("x" + infix + "_patienttype");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new->patienttype->caption(), $view_appointment_scheduler_new->patienttype->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_new_edit->Referal->Required) { ?>
			elm = this.getElements("x" + infix + "_Referal");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new->Referal->caption(), $view_appointment_scheduler_new->Referal->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_new_edit->start_date->Required) { ?>
			elm = this.getElements("x" + infix + "_start_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new->start_date->caption(), $view_appointment_scheduler_new->start_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_start_date");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler_new->start_date->errorMessage()) ?>");
		<?php if ($view_appointment_scheduler_new_edit->DoctorName->Required) { ?>
			elm = this.getElements("x" + infix + "_DoctorName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new->DoctorName->caption(), $view_appointment_scheduler_new->DoctorName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_new_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new->HospID->caption(), $view_appointment_scheduler_new->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler_new->HospID->errorMessage()) ?>");
		<?php if ($view_appointment_scheduler_new_edit->Id->Required) { ?>
			elm = this.getElements("x" + infix + "_Id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new->Id->caption(), $view_appointment_scheduler_new->Id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_new_edit->PatientTypee->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientTypee");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new->PatientTypee->caption(), $view_appointment_scheduler_new->PatientTypee->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_new_edit->Notes->Required) { ?>
			elm = this.getElements("x" + infix + "_Notes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new->Notes->caption(), $view_appointment_scheduler_new->Notes->RequiredErrorMessage)) ?>");
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
fview_appointment_scheduler_newedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_appointment_scheduler_newedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_appointment_scheduler_newedit.lists["x_Referal"] = <?php echo $view_appointment_scheduler_new_edit->Referal->Lookup->toClientList() ?>;
fview_appointment_scheduler_newedit.lists["x_Referal"].options = <?php echo JsonEncode($view_appointment_scheduler_new_edit->Referal->lookupOptions()) ?>;
fview_appointment_scheduler_newedit.autoSuggests["x_Referal"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_appointment_scheduler_newedit.lists["x_DoctorName"] = <?php echo $view_appointment_scheduler_new_edit->DoctorName->Lookup->toClientList() ?>;
fview_appointment_scheduler_newedit.lists["x_DoctorName"].options = <?php echo JsonEncode($view_appointment_scheduler_new_edit->DoctorName->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_appointment_scheduler_new_edit->showPageHeader(); ?>
<?php
$view_appointment_scheduler_new_edit->showMessage();
?>
<form name="fview_appointment_scheduler_newedit" id="fview_appointment_scheduler_newedit" class="<?php echo $view_appointment_scheduler_new_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_appointment_scheduler_new_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_appointment_scheduler_new_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_appointment_scheduler_new">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$view_appointment_scheduler_new_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($view_appointment_scheduler_new->patientID->Visible) { // patientID ?>
	<div id="r_patientID" class="form-group row">
		<label id="elh_view_appointment_scheduler_new_patientID" for="x_patientID" class="<?php echo $view_appointment_scheduler_new_edit->LeftColumnClass ?>"><?php echo $view_appointment_scheduler_new->patientID->caption() ?><?php echo ($view_appointment_scheduler_new->patientID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_appointment_scheduler_new_edit->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler_new->patientID->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_patientID">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_patientID" name="x_patientID" id="x_patientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->patientID->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->patientID->EditValue ?>"<?php echo $view_appointment_scheduler_new->patientID->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler_new->patientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new->patientName->Visible) { // patientName ?>
	<div id="r_patientName" class="form-group row">
		<label id="elh_view_appointment_scheduler_new_patientName" for="x_patientName" class="<?php echo $view_appointment_scheduler_new_edit->LeftColumnClass ?>"><?php echo $view_appointment_scheduler_new->patientName->caption() ?><?php echo ($view_appointment_scheduler_new->patientName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_appointment_scheduler_new_edit->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler_new->patientName->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_patientName">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_patientName" name="x_patientName" id="x_patientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->patientName->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->patientName->EditValue ?>"<?php echo $view_appointment_scheduler_new->patientName->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler_new->patientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new->MobileNumber->Visible) { // MobileNumber ?>
	<div id="r_MobileNumber" class="form-group row">
		<label id="elh_view_appointment_scheduler_new_MobileNumber" for="x_MobileNumber" class="<?php echo $view_appointment_scheduler_new_edit->LeftColumnClass ?>"><?php echo $view_appointment_scheduler_new->MobileNumber->caption() ?><?php echo ($view_appointment_scheduler_new->MobileNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_appointment_scheduler_new_edit->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler_new->MobileNumber->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_MobileNumber">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->MobileNumber->EditValue ?>"<?php echo $view_appointment_scheduler_new->MobileNumber->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler_new->MobileNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new->start_time->Visible) { // start_time ?>
	<div id="r_start_time" class="form-group row">
		<label id="elh_view_appointment_scheduler_new_start_time" for="x_start_time" class="<?php echo $view_appointment_scheduler_new_edit->LeftColumnClass ?>"><?php echo $view_appointment_scheduler_new->start_time->caption() ?><?php echo ($view_appointment_scheduler_new->start_time->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_appointment_scheduler_new_edit->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler_new->start_time->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_start_time">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_start_time" data-format="3" name="x_start_time" id="x_start_time" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->start_time->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->start_time->EditValue ?>"<?php echo $view_appointment_scheduler_new->start_time->editAttributes() ?>>
<?php if (!$view_appointment_scheduler_new->start_time->ReadOnly && !$view_appointment_scheduler_new->start_time->Disabled && !isset($view_appointment_scheduler_new->start_time->EditAttrs["readonly"]) && !isset($view_appointment_scheduler_new->start_time->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_appointment_scheduler_newedit", "x_start_time", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
<?php if (!$view_appointment_scheduler_new->start_time->ReadOnly && !$view_appointment_scheduler_new->start_time->Disabled && !isset($view_appointment_scheduler_new->start_time->EditAttrs["readonly"]) && !isset($view_appointment_scheduler_new->start_time->EditAttrs["disabled"])) { ?>
<script>ew.createTimePicker("fview_appointment_scheduler_newedit", "x_start_time", {"timeFormat":"h:i A","step":15});</script><?php } ?>
</span>
<?php echo $view_appointment_scheduler_new->start_time->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new->Purpose->Visible) { // Purpose ?>
	<div id="r_Purpose" class="form-group row">
		<label id="elh_view_appointment_scheduler_new_Purpose" for="x_Purpose" class="<?php echo $view_appointment_scheduler_new_edit->LeftColumnClass ?>"><?php echo $view_appointment_scheduler_new->Purpose->caption() ?><?php echo ($view_appointment_scheduler_new->Purpose->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_appointment_scheduler_new_edit->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler_new->Purpose->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_Purpose">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_Purpose" name="x_Purpose" id="x_Purpose" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->Purpose->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->Purpose->EditValue ?>"<?php echo $view_appointment_scheduler_new->Purpose->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler_new->Purpose->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new->patienttype->Visible) { // patienttype ?>
	<div id="r_patienttype" class="form-group row">
		<label id="elh_view_appointment_scheduler_new_patienttype" for="x_patienttype" class="<?php echo $view_appointment_scheduler_new_edit->LeftColumnClass ?>"><?php echo $view_appointment_scheduler_new->patienttype->caption() ?><?php echo ($view_appointment_scheduler_new->patienttype->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_appointment_scheduler_new_edit->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler_new->patienttype->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_patienttype">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_patienttype" name="x_patienttype" id="x_patienttype" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->patienttype->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->patienttype->EditValue ?>"<?php echo $view_appointment_scheduler_new->patienttype->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler_new->patienttype->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new->Referal->Visible) { // Referal ?>
	<div id="r_Referal" class="form-group row">
		<label id="elh_view_appointment_scheduler_new_Referal" class="<?php echo $view_appointment_scheduler_new_edit->LeftColumnClass ?>"><?php echo $view_appointment_scheduler_new->Referal->caption() ?><?php echo ($view_appointment_scheduler_new->Referal->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_appointment_scheduler_new_edit->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler_new->Referal->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_Referal">
<?php
$wrkonchange = "" . trim(@$view_appointment_scheduler_new->Referal->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_appointment_scheduler_new->Referal->EditAttrs["onchange"] = "";
?>
<span id="as_x_Referal" class="text-nowrap" style="z-index: 8930">
	<input type="text" class="form-control" name="sv_x_Referal" id="sv_x_Referal" value="<?php echo RemoveHtml($view_appointment_scheduler_new->Referal->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->Referal->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->Referal->getPlaceHolder()) ?>"<?php echo $view_appointment_scheduler_new->Referal->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_Referal" data-value-separator="<?php echo $view_appointment_scheduler_new->Referal->displayValueSeparatorAttribute() ?>" name="x_Referal" id="x_Referal" value="<?php echo HtmlEncode($view_appointment_scheduler_new->Referal->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_appointment_scheduler_newedit.createAutoSuggest({"id":"x_Referal","forceSelect":false});
</script>
<?php echo $view_appointment_scheduler_new->Referal->Lookup->getParamTag("p_x_Referal") ?>
</span>
<?php echo $view_appointment_scheduler_new->Referal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new->start_date->Visible) { // start_date ?>
	<div id="r_start_date" class="form-group row">
		<label id="elh_view_appointment_scheduler_new_start_date" for="x_start_date" class="<?php echo $view_appointment_scheduler_new_edit->LeftColumnClass ?>"><?php echo $view_appointment_scheduler_new->start_date->caption() ?><?php echo ($view_appointment_scheduler_new->start_date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_appointment_scheduler_new_edit->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler_new->start_date->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_start_date">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_start_date" data-format="11" name="x_start_date" id="x_start_date" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->start_date->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->start_date->EditValue ?>"<?php echo $view_appointment_scheduler_new->start_date->editAttributes() ?>>
<?php if (!$view_appointment_scheduler_new->start_date->ReadOnly && !$view_appointment_scheduler_new->start_date->Disabled && !isset($view_appointment_scheduler_new->start_date->EditAttrs["readonly"]) && !isset($view_appointment_scheduler_new->start_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_appointment_scheduler_newedit", "x_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php echo $view_appointment_scheduler_new->start_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new->DoctorName->Visible) { // DoctorName ?>
	<div id="r_DoctorName" class="form-group row">
		<label id="elh_view_appointment_scheduler_new_DoctorName" for="x_DoctorName" class="<?php echo $view_appointment_scheduler_new_edit->LeftColumnClass ?>"><?php echo $view_appointment_scheduler_new->DoctorName->caption() ?><?php echo ($view_appointment_scheduler_new->DoctorName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_appointment_scheduler_new_edit->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler_new->DoctorName->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_DoctorName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_appointment_scheduler_new" data-field="x_DoctorName" data-value-separator="<?php echo $view_appointment_scheduler_new->DoctorName->displayValueSeparatorAttribute() ?>" id="x_DoctorName" name="x_DoctorName"<?php echo $view_appointment_scheduler_new->DoctorName->editAttributes() ?>>
		<?php echo $view_appointment_scheduler_new->DoctorName->selectOptionListHtml("x_DoctorName") ?>
	</select>
</div>
<?php echo $view_appointment_scheduler_new->DoctorName->Lookup->getParamTag("p_x_DoctorName") ?>
</span>
<?php echo $view_appointment_scheduler_new->DoctorName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label id="elh_view_appointment_scheduler_new_HospID" for="x_HospID" class="<?php echo $view_appointment_scheduler_new_edit->LeftColumnClass ?>"><?php echo $view_appointment_scheduler_new->HospID->caption() ?><?php echo ($view_appointment_scheduler_new->HospID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_appointment_scheduler_new_edit->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler_new->HospID->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_HospID">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->HospID->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->HospID->EditValue ?>"<?php echo $view_appointment_scheduler_new->HospID->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler_new->HospID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new->Id->Visible) { // Id ?>
	<div id="r_Id" class="form-group row">
		<label id="elh_view_appointment_scheduler_new_Id" class="<?php echo $view_appointment_scheduler_new_edit->LeftColumnClass ?>"><?php echo $view_appointment_scheduler_new->Id->caption() ?><?php echo ($view_appointment_scheduler_new->Id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_appointment_scheduler_new_edit->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler_new->Id->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_Id">
<span<?php echo $view_appointment_scheduler_new->Id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_appointment_scheduler_new->Id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_Id" name="x_Id" id="x_Id" value="<?php echo HtmlEncode($view_appointment_scheduler_new->Id->CurrentValue) ?>">
<?php echo $view_appointment_scheduler_new->Id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new->PatientTypee->Visible) { // PatientTypee ?>
	<div id="r_PatientTypee" class="form-group row">
		<label id="elh_view_appointment_scheduler_new_PatientTypee" for="x_PatientTypee" class="<?php echo $view_appointment_scheduler_new_edit->LeftColumnClass ?>"><?php echo $view_appointment_scheduler_new->PatientTypee->caption() ?><?php echo ($view_appointment_scheduler_new->PatientTypee->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_appointment_scheduler_new_edit->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler_new->PatientTypee->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_PatientTypee">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_PatientTypee" name="x_PatientTypee" id="x_PatientTypee" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->PatientTypee->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->PatientTypee->EditValue ?>"<?php echo $view_appointment_scheduler_new->PatientTypee->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler_new->PatientTypee->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new->Notes->Visible) { // Notes ?>
	<div id="r_Notes" class="form-group row">
		<label id="elh_view_appointment_scheduler_new_Notes" for="x_Notes" class="<?php echo $view_appointment_scheduler_new_edit->LeftColumnClass ?>"><?php echo $view_appointment_scheduler_new->Notes->caption() ?><?php echo ($view_appointment_scheduler_new->Notes->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_appointment_scheduler_new_edit->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler_new->Notes->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_Notes">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_Notes" name="x_Notes" id="x_Notes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->Notes->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->Notes->EditValue ?>"<?php echo $view_appointment_scheduler_new->Notes->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler_new->Notes->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_appointment_scheduler_new_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_appointment_scheduler_new_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_appointment_scheduler_new_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_appointment_scheduler_new_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_appointment_scheduler_new_edit->terminate();
?>