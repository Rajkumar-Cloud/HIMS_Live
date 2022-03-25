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
$patient_opd_follow_up_edit = new patient_opd_follow_up_edit();

// Run the page
$patient_opd_follow_up_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_opd_follow_up_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fpatient_opd_follow_upedit = currentForm = new ew.Form("fpatient_opd_follow_upedit", "edit");

// Validate form
fpatient_opd_follow_upedit.validate = function() {
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
		<?php if ($patient_opd_follow_up_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->id->caption(), $patient_opd_follow_up->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_edit->procedurenotes->Required) { ?>
			elm = this.getElements("x" + infix + "_procedurenotes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->procedurenotes->caption(), $patient_opd_follow_up->procedurenotes->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_edit->NextReviewDate->Required) { ?>
			elm = this.getElements("x" + infix + "_NextReviewDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->NextReviewDate->caption(), $patient_opd_follow_up->NextReviewDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_NextReviewDate");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_opd_follow_up->NextReviewDate->errorMessage()) ?>");
		<?php if ($patient_opd_follow_up_edit->ICSIAdvised->Required) { ?>
			elm = this.getElements("x" + infix + "_ICSIAdvised[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->ICSIAdvised->caption(), $patient_opd_follow_up->ICSIAdvised->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_edit->DeliveryRegistered->Required) { ?>
			elm = this.getElements("x" + infix + "_DeliveryRegistered[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->DeliveryRegistered->caption(), $patient_opd_follow_up->DeliveryRegistered->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_edit->EDD->Required) { ?>
			elm = this.getElements("x" + infix + "_EDD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->EDD->caption(), $patient_opd_follow_up->EDD->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_EDD");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_opd_follow_up->EDD->errorMessage()) ?>");
		<?php if ($patient_opd_follow_up_edit->SerologyPositive->Required) { ?>
			elm = this.getElements("x" + infix + "_SerologyPositive[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->SerologyPositive->caption(), $patient_opd_follow_up->SerologyPositive->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_edit->Allergy->Required) { ?>
			elm = this.getElements("x" + infix + "_Allergy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->Allergy->caption(), $patient_opd_follow_up->Allergy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_edit->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->status->caption(), $patient_opd_follow_up->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_edit->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->modifiedby->caption(), $patient_opd_follow_up->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_edit->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->modifieddatetime->caption(), $patient_opd_follow_up->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_edit->LMP->Required) { ?>
			elm = this.getElements("x" + infix + "_LMP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->LMP->caption(), $patient_opd_follow_up->LMP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LMP");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_opd_follow_up->LMP->errorMessage()) ?>");
		<?php if ($patient_opd_follow_up_edit->Procedure->Required) { ?>
			elm = this.getElements("x" + infix + "_Procedure");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->Procedure->caption(), $patient_opd_follow_up->Procedure->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_edit->ProcedureDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_ProcedureDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->ProcedureDateTime->caption(), $patient_opd_follow_up->ProcedureDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_edit->ICSIDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ICSIDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->ICSIDate->caption(), $patient_opd_follow_up->ICSIDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ICSIDate");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_opd_follow_up->ICSIDate->errorMessage()) ?>");
		<?php if ($patient_opd_follow_up_edit->PatientSearch->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientSearch");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->PatientSearch->caption(), $patient_opd_follow_up->PatientSearch->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_edit->TemplateDrNotes->Required) { ?>
			elm = this.getElements("x" + infix + "_TemplateDrNotes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->TemplateDrNotes->caption(), $patient_opd_follow_up->TemplateDrNotes->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_edit->reportheader->Required) { ?>
			elm = this.getElements("x" + infix + "_reportheader[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->reportheader->caption(), $patient_opd_follow_up->reportheader->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_edit->Purpose->Required) { ?>
			elm = this.getElements("x" + infix + "_Purpose");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->Purpose->caption(), $patient_opd_follow_up->Purpose->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_edit->DrName->Required) { ?>
			elm = this.getElements("x" + infix + "_DrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->DrName->caption(), $patient_opd_follow_up->DrName->RequiredErrorMessage)) ?>");
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
fpatient_opd_follow_upedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_opd_follow_upedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_opd_follow_upedit.lists["x_ICSIAdvised[]"] = <?php echo $patient_opd_follow_up_edit->ICSIAdvised->Lookup->toClientList() ?>;
fpatient_opd_follow_upedit.lists["x_ICSIAdvised[]"].options = <?php echo JsonEncode($patient_opd_follow_up_edit->ICSIAdvised->options(FALSE, TRUE)) ?>;
fpatient_opd_follow_upedit.lists["x_DeliveryRegistered[]"] = <?php echo $patient_opd_follow_up_edit->DeliveryRegistered->Lookup->toClientList() ?>;
fpatient_opd_follow_upedit.lists["x_DeliveryRegistered[]"].options = <?php echo JsonEncode($patient_opd_follow_up_edit->DeliveryRegistered->options(FALSE, TRUE)) ?>;
fpatient_opd_follow_upedit.lists["x_SerologyPositive[]"] = <?php echo $patient_opd_follow_up_edit->SerologyPositive->Lookup->toClientList() ?>;
fpatient_opd_follow_upedit.lists["x_SerologyPositive[]"].options = <?php echo JsonEncode($patient_opd_follow_up_edit->SerologyPositive->options(FALSE, TRUE)) ?>;
fpatient_opd_follow_upedit.lists["x_Allergy"] = <?php echo $patient_opd_follow_up_edit->Allergy->Lookup->toClientList() ?>;
fpatient_opd_follow_upedit.lists["x_Allergy"].options = <?php echo JsonEncode($patient_opd_follow_up_edit->Allergy->lookupOptions()) ?>;
fpatient_opd_follow_upedit.autoSuggests["x_Allergy"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_opd_follow_upedit.lists["x_status"] = <?php echo $patient_opd_follow_up_edit->status->Lookup->toClientList() ?>;
fpatient_opd_follow_upedit.lists["x_status"].options = <?php echo JsonEncode($patient_opd_follow_up_edit->status->lookupOptions()) ?>;
fpatient_opd_follow_upedit.lists["x_PatientSearch"] = <?php echo $patient_opd_follow_up_edit->PatientSearch->Lookup->toClientList() ?>;
fpatient_opd_follow_upedit.lists["x_PatientSearch"].options = <?php echo JsonEncode($patient_opd_follow_up_edit->PatientSearch->lookupOptions()) ?>;
fpatient_opd_follow_upedit.lists["x_TemplateDrNotes"] = <?php echo $patient_opd_follow_up_edit->TemplateDrNotes->Lookup->toClientList() ?>;
fpatient_opd_follow_upedit.lists["x_TemplateDrNotes"].options = <?php echo JsonEncode($patient_opd_follow_up_edit->TemplateDrNotes->lookupOptions()) ?>;
fpatient_opd_follow_upedit.lists["x_reportheader[]"] = <?php echo $patient_opd_follow_up_edit->reportheader->Lookup->toClientList() ?>;
fpatient_opd_follow_upedit.lists["x_reportheader[]"].options = <?php echo JsonEncode($patient_opd_follow_up_edit->reportheader->options(FALSE, TRUE)) ?>;
fpatient_opd_follow_upedit.lists["x_DrName"] = <?php echo $patient_opd_follow_up_edit->DrName->Lookup->toClientList() ?>;
fpatient_opd_follow_upedit.lists["x_DrName"].options = <?php echo JsonEncode($patient_opd_follow_up_edit->DrName->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_opd_follow_up_edit->showPageHeader(); ?>
<?php
$patient_opd_follow_up_edit->showMessage();
?>
<form name="fpatient_opd_follow_upedit" id="fpatient_opd_follow_upedit" class="<?php echo $patient_opd_follow_up_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_opd_follow_up_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_opd_follow_up_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_opd_follow_up">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$patient_opd_follow_up_edit->IsModal ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($patient_opd_follow_up->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_patient_opd_follow_up_id" class="<?php echo $patient_opd_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_id" class="patient_opd_follow_upedit" type="text/html"><span><?php echo $patient_opd_follow_up->id->caption() ?><?php echo ($patient_opd_follow_up->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->id->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_id" class="patient_opd_follow_upedit" type="text/html">
<span id="el_patient_opd_follow_up_id">
<span<?php echo $patient_opd_follow_up->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->id->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($patient_opd_follow_up->id->CurrentValue) ?>">
<?php echo $patient_opd_follow_up->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->procedurenotes->Visible) { // procedurenotes ?>
	<div id="r_procedurenotes" class="form-group row">
		<label id="elh_patient_opd_follow_up_procedurenotes" class="<?php echo $patient_opd_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_procedurenotes" class="patient_opd_follow_upedit" type="text/html"><span><?php echo $patient_opd_follow_up->procedurenotes->caption() ?><?php echo ($patient_opd_follow_up->procedurenotes->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->procedurenotes->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_procedurenotes" class="patient_opd_follow_upedit" type="text/html">
<span id="el_patient_opd_follow_up_procedurenotes">
<?php AppendClass($patient_opd_follow_up->procedurenotes->EditAttrs["class"], "editor"); ?>
<textarea data-table="patient_opd_follow_up" data-field="x_procedurenotes" name="x_procedurenotes" id="x_procedurenotes" cols="35" rows="22" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->procedurenotes->getPlaceHolder()) ?>"<?php echo $patient_opd_follow_up->procedurenotes->editAttributes() ?>><?php echo $patient_opd_follow_up->procedurenotes->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="patient_opd_follow_upedit_js">
ew.createEditor("fpatient_opd_follow_upedit", "x_procedurenotes", 35, 22, <?php echo ($patient_opd_follow_up->procedurenotes->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $patient_opd_follow_up->procedurenotes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->NextReviewDate->Visible) { // NextReviewDate ?>
	<div id="r_NextReviewDate" class="form-group row">
		<label id="elh_patient_opd_follow_up_NextReviewDate" for="x_NextReviewDate" class="<?php echo $patient_opd_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_NextReviewDate" class="patient_opd_follow_upedit" type="text/html"><span><?php echo $patient_opd_follow_up->NextReviewDate->caption() ?><?php echo ($patient_opd_follow_up->NextReviewDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->NextReviewDate->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_NextReviewDate" class="patient_opd_follow_upedit" type="text/html">
<span id="el_patient_opd_follow_up_NextReviewDate">
<input type="text" data-table="patient_opd_follow_up" data-field="x_NextReviewDate" data-format="7" name="x_NextReviewDate" id="x_NextReviewDate" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->NextReviewDate->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->NextReviewDate->EditValue ?>"<?php echo $patient_opd_follow_up->NextReviewDate->editAttributes() ?>>
<?php if (!$patient_opd_follow_up->NextReviewDate->ReadOnly && !$patient_opd_follow_up->NextReviewDate->Disabled && !isset($patient_opd_follow_up->NextReviewDate->EditAttrs["readonly"]) && !isset($patient_opd_follow_up->NextReviewDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_opd_follow_upedit_js">
ew.createDateTimePicker("fpatient_opd_follow_upedit", "x_NextReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $patient_opd_follow_up->NextReviewDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->ICSIAdvised->Visible) { // ICSIAdvised ?>
	<div id="r_ICSIAdvised" class="form-group row">
		<label id="elh_patient_opd_follow_up_ICSIAdvised" class="<?php echo $patient_opd_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_ICSIAdvised" class="patient_opd_follow_upedit" type="text/html"><span><?php echo $patient_opd_follow_up->ICSIAdvised->caption() ?><?php echo ($patient_opd_follow_up->ICSIAdvised->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->ICSIAdvised->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_ICSIAdvised" class="patient_opd_follow_upedit" type="text/html">
<span id="el_patient_opd_follow_up_ICSIAdvised">
<div id="tp_x_ICSIAdvised" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_opd_follow_up" data-field="x_ICSIAdvised" data-value-separator="<?php echo $patient_opd_follow_up->ICSIAdvised->displayValueSeparatorAttribute() ?>" name="x_ICSIAdvised[]" id="x_ICSIAdvised[]" value="{value}"<?php echo $patient_opd_follow_up->ICSIAdvised->editAttributes() ?>></div>
<div id="dsl_x_ICSIAdvised" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_opd_follow_up->ICSIAdvised->checkBoxListHtml(FALSE, "x_ICSIAdvised[]") ?>
</div></div>
</span>
</script>
<?php echo $patient_opd_follow_up->ICSIAdvised->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
	<div id="r_DeliveryRegistered" class="form-group row">
		<label id="elh_patient_opd_follow_up_DeliveryRegistered" class="<?php echo $patient_opd_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_DeliveryRegistered" class="patient_opd_follow_upedit" type="text/html"><span><?php echo $patient_opd_follow_up->DeliveryRegistered->caption() ?><?php echo ($patient_opd_follow_up->DeliveryRegistered->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->DeliveryRegistered->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_DeliveryRegistered" class="patient_opd_follow_upedit" type="text/html">
<span id="el_patient_opd_follow_up_DeliveryRegistered">
<div id="tp_x_DeliveryRegistered" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_opd_follow_up" data-field="x_DeliveryRegistered" data-value-separator="<?php echo $patient_opd_follow_up->DeliveryRegistered->displayValueSeparatorAttribute() ?>" name="x_DeliveryRegistered[]" id="x_DeliveryRegistered[]" value="{value}"<?php echo $patient_opd_follow_up->DeliveryRegistered->editAttributes() ?>></div>
<div id="dsl_x_DeliveryRegistered" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_opd_follow_up->DeliveryRegistered->checkBoxListHtml(FALSE, "x_DeliveryRegistered[]") ?>
</div></div>
</span>
</script>
<?php echo $patient_opd_follow_up->DeliveryRegistered->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->EDD->Visible) { // EDD ?>
	<div id="r_EDD" class="form-group row">
		<label id="elh_patient_opd_follow_up_EDD" for="x_EDD" class="<?php echo $patient_opd_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_EDD" class="patient_opd_follow_upedit" type="text/html"><span><?php echo $patient_opd_follow_up->EDD->caption() ?><?php echo ($patient_opd_follow_up->EDD->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->EDD->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_EDD" class="patient_opd_follow_upedit" type="text/html">
<span id="el_patient_opd_follow_up_EDD">
<input type="text" data-table="patient_opd_follow_up" data-field="x_EDD" data-format="7" name="x_EDD" id="x_EDD" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->EDD->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->EDD->EditValue ?>"<?php echo $patient_opd_follow_up->EDD->editAttributes() ?>>
<?php if (!$patient_opd_follow_up->EDD->ReadOnly && !$patient_opd_follow_up->EDD->Disabled && !isset($patient_opd_follow_up->EDD->EditAttrs["readonly"]) && !isset($patient_opd_follow_up->EDD->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_opd_follow_upedit_js">
ew.createDateTimePicker("fpatient_opd_follow_upedit", "x_EDD", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $patient_opd_follow_up->EDD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->SerologyPositive->Visible) { // SerologyPositive ?>
	<div id="r_SerologyPositive" class="form-group row">
		<label id="elh_patient_opd_follow_up_SerologyPositive" class="<?php echo $patient_opd_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_SerologyPositive" class="patient_opd_follow_upedit" type="text/html"><span><?php echo $patient_opd_follow_up->SerologyPositive->caption() ?><?php echo ($patient_opd_follow_up->SerologyPositive->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->SerologyPositive->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_SerologyPositive" class="patient_opd_follow_upedit" type="text/html">
<span id="el_patient_opd_follow_up_SerologyPositive">
<div id="tp_x_SerologyPositive" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_opd_follow_up" data-field="x_SerologyPositive" data-value-separator="<?php echo $patient_opd_follow_up->SerologyPositive->displayValueSeparatorAttribute() ?>" name="x_SerologyPositive[]" id="x_SerologyPositive[]" value="{value}"<?php echo $patient_opd_follow_up->SerologyPositive->editAttributes() ?>></div>
<div id="dsl_x_SerologyPositive" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_opd_follow_up->SerologyPositive->checkBoxListHtml(FALSE, "x_SerologyPositive[]") ?>
</div></div>
</span>
</script>
<?php echo $patient_opd_follow_up->SerologyPositive->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->Allergy->Visible) { // Allergy ?>
	<div id="r_Allergy" class="form-group row">
		<label id="elh_patient_opd_follow_up_Allergy" class="<?php echo $patient_opd_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_Allergy" class="patient_opd_follow_upedit" type="text/html"><span><?php echo $patient_opd_follow_up->Allergy->caption() ?><?php echo ($patient_opd_follow_up->Allergy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->Allergy->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_Allergy" class="patient_opd_follow_upedit" type="text/html">
<span id="el_patient_opd_follow_up_Allergy">
<?php
$wrkonchange = "" . trim(@$patient_opd_follow_up->Allergy->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_opd_follow_up->Allergy->EditAttrs["onchange"] = "";
?>
<span id="as_x_Allergy" class="text-nowrap" style="z-index: 8820">
	<div class="input-group mb-3">
		<input type="text" class="form-control" name="sv_x_Allergy" id="sv_x_Allergy" value="<?php echo RemoveHtml($patient_opd_follow_up->Allergy->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->Allergy->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_opd_follow_up->Allergy->getPlaceHolder()) ?>"<?php echo $patient_opd_follow_up->Allergy->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_opd_follow_up->Allergy->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_Allergy',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo (($patient_opd_follow_up->Allergy->ReadOnly || $patient_opd_follow_up->Allergy->Disabled) ? " disabled" : "")?>><i class="fa fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Allergy" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_opd_follow_up->Allergy->displayValueSeparatorAttribute() ?>" name="x_Allergy" id="x_Allergy" value="<?php echo HtmlEncode($patient_opd_follow_up->Allergy->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<?php echo $patient_opd_follow_up->Allergy->Lookup->getParamTag("p_x_Allergy") ?>
</span>
</script>
<script type="text/html" class="patient_opd_follow_upedit_js">
fpatient_opd_follow_upedit.createAutoSuggest({"id":"x_Allergy","forceSelect":false});
</script>
<?php echo $patient_opd_follow_up->Allergy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_patient_opd_follow_up_status" for="x_status" class="<?php echo $patient_opd_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_status" class="patient_opd_follow_upedit" type="text/html"><span><?php echo $patient_opd_follow_up->status->caption() ?><?php echo ($patient_opd_follow_up->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->status->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_status" class="patient_opd_follow_upedit" type="text/html">
<span id="el_patient_opd_follow_up_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_opd_follow_up" data-field="x_status" data-value-separator="<?php echo $patient_opd_follow_up->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $patient_opd_follow_up->status->editAttributes() ?>>
		<?php echo $patient_opd_follow_up->status->selectOptionListHtml("x_status") ?>
	</select>
</div>
<?php echo $patient_opd_follow_up->status->Lookup->getParamTag("p_x_status") ?>
</span>
</script>
<?php echo $patient_opd_follow_up->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->LMP->Visible) { // LMP ?>
	<div id="r_LMP" class="form-group row">
		<label id="elh_patient_opd_follow_up_LMP" for="x_LMP" class="<?php echo $patient_opd_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_LMP" class="patient_opd_follow_upedit" type="text/html"><span><?php echo $patient_opd_follow_up->LMP->caption() ?><?php echo ($patient_opd_follow_up->LMP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->LMP->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_LMP" class="patient_opd_follow_upedit" type="text/html">
<span id="el_patient_opd_follow_up_LMP">
<input type="text" data-table="patient_opd_follow_up" data-field="x_LMP" data-format="7" name="x_LMP" id="x_LMP" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->LMP->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->LMP->EditValue ?>"<?php echo $patient_opd_follow_up->LMP->editAttributes() ?>>
<?php if (!$patient_opd_follow_up->LMP->ReadOnly && !$patient_opd_follow_up->LMP->Disabled && !isset($patient_opd_follow_up->LMP->EditAttrs["readonly"]) && !isset($patient_opd_follow_up->LMP->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_opd_follow_upedit_js">
ew.createDateTimePicker("fpatient_opd_follow_upedit", "x_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $patient_opd_follow_up->LMP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->Procedure->Visible) { // Procedure ?>
	<div id="r_Procedure" class="form-group row">
		<label id="elh_patient_opd_follow_up_Procedure" for="x_Procedure" class="<?php echo $patient_opd_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_Procedure" class="patient_opd_follow_upedit" type="text/html"><span><?php echo $patient_opd_follow_up->Procedure->caption() ?><?php echo ($patient_opd_follow_up->Procedure->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->Procedure->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_Procedure" class="patient_opd_follow_upedit" type="text/html">
<span id="el_patient_opd_follow_up_Procedure">
<textarea data-table="patient_opd_follow_up" data-field="x_Procedure" name="x_Procedure" id="x_Procedure" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->Procedure->getPlaceHolder()) ?>"<?php echo $patient_opd_follow_up->Procedure->editAttributes() ?>><?php echo $patient_opd_follow_up->Procedure->EditValue ?></textarea>
</span>
</script>
<?php echo $patient_opd_follow_up->Procedure->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
	<div id="r_ProcedureDateTime" class="form-group row">
		<label id="elh_patient_opd_follow_up_ProcedureDateTime" for="x_ProcedureDateTime" class="<?php echo $patient_opd_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_ProcedureDateTime" class="patient_opd_follow_upedit" type="text/html"><span><?php echo $patient_opd_follow_up->ProcedureDateTime->caption() ?><?php echo ($patient_opd_follow_up->ProcedureDateTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->ProcedureDateTime->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_ProcedureDateTime" class="patient_opd_follow_upedit" type="text/html">
<span id="el_patient_opd_follow_up_ProcedureDateTime">
<input type="text" data-table="patient_opd_follow_up" data-field="x_ProcedureDateTime" data-format="11" name="x_ProcedureDateTime" id="x_ProcedureDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->ProcedureDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->ProcedureDateTime->EditValue ?>"<?php echo $patient_opd_follow_up->ProcedureDateTime->editAttributes() ?>>
<?php if (!$patient_opd_follow_up->ProcedureDateTime->ReadOnly && !$patient_opd_follow_up->ProcedureDateTime->Disabled && !isset($patient_opd_follow_up->ProcedureDateTime->EditAttrs["readonly"]) && !isset($patient_opd_follow_up->ProcedureDateTime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_opd_follow_upedit_js">
ew.createDateTimePicker("fpatient_opd_follow_upedit", "x_ProcedureDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php echo $patient_opd_follow_up->ProcedureDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->ICSIDate->Visible) { // ICSIDate ?>
	<div id="r_ICSIDate" class="form-group row">
		<label id="elh_patient_opd_follow_up_ICSIDate" for="x_ICSIDate" class="<?php echo $patient_opd_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_ICSIDate" class="patient_opd_follow_upedit" type="text/html"><span><?php echo $patient_opd_follow_up->ICSIDate->caption() ?><?php echo ($patient_opd_follow_up->ICSIDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->ICSIDate->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_ICSIDate" class="patient_opd_follow_upedit" type="text/html">
<span id="el_patient_opd_follow_up_ICSIDate">
<input type="text" data-table="patient_opd_follow_up" data-field="x_ICSIDate" data-format="7" name="x_ICSIDate" id="x_ICSIDate" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->ICSIDate->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->ICSIDate->EditValue ?>"<?php echo $patient_opd_follow_up->ICSIDate->editAttributes() ?>>
<?php if (!$patient_opd_follow_up->ICSIDate->ReadOnly && !$patient_opd_follow_up->ICSIDate->Disabled && !isset($patient_opd_follow_up->ICSIDate->EditAttrs["readonly"]) && !isset($patient_opd_follow_up->ICSIDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_opd_follow_upedit_js">
ew.createDateTimePicker("fpatient_opd_follow_upedit", "x_ICSIDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $patient_opd_follow_up->ICSIDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->PatientSearch->Visible) { // PatientSearch ?>
	<div id="r_PatientSearch" class="form-group row">
		<label id="elh_patient_opd_follow_up_PatientSearch" for="x_PatientSearch" class="<?php echo $patient_opd_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_PatientSearch" class="patient_opd_follow_upedit" type="text/html"><span><?php echo $patient_opd_follow_up->PatientSearch->caption() ?><?php echo ($patient_opd_follow_up->PatientSearch->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->PatientSearch->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_PatientSearch" class="patient_opd_follow_upedit" type="text/html">
<span id="el_patient_opd_follow_up_PatientSearch">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatientSearch"><?php echo strval($patient_opd_follow_up->PatientSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($patient_opd_follow_up->PatientSearch->ViewValue) : $patient_opd_follow_up->PatientSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_opd_follow_up->PatientSearch->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($patient_opd_follow_up->PatientSearch->ReadOnly || $patient_opd_follow_up->PatientSearch->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatientSearch',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_opd_follow_up->PatientSearch->Lookup->getParamTag("p_x_PatientSearch") ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_PatientSearch" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_opd_follow_up->PatientSearch->displayValueSeparatorAttribute() ?>" name="x_PatientSearch" id="x_PatientSearch" value="<?php echo $patient_opd_follow_up->PatientSearch->CurrentValue ?>"<?php echo $patient_opd_follow_up->PatientSearch->editAttributes() ?>>
</span>
</script>
<?php echo $patient_opd_follow_up->PatientSearch->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->TemplateDrNotes->Visible) { // TemplateDrNotes ?>
	<div id="r_TemplateDrNotes" class="form-group row">
		<label id="elh_patient_opd_follow_up_TemplateDrNotes" for="x_TemplateDrNotes" class="<?php echo $patient_opd_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_TemplateDrNotes" class="patient_opd_follow_upedit" type="text/html"><span><?php echo $patient_opd_follow_up->TemplateDrNotes->caption() ?><?php echo ($patient_opd_follow_up->TemplateDrNotes->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->TemplateDrNotes->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_TemplateDrNotes" class="patient_opd_follow_upedit" type="text/html">
<span id="el_patient_opd_follow_up_TemplateDrNotes">
<?php $patient_opd_follow_up->TemplateDrNotes->EditAttrs["onchange"] = "ew.autoFill(this);" . @$patient_opd_follow_up->TemplateDrNotes->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_opd_follow_up" data-field="x_TemplateDrNotes" data-value-separator="<?php echo $patient_opd_follow_up->TemplateDrNotes->displayValueSeparatorAttribute() ?>" id="x_TemplateDrNotes" name="x_TemplateDrNotes"<?php echo $patient_opd_follow_up->TemplateDrNotes->editAttributes() ?>>
		<?php echo $patient_opd_follow_up->TemplateDrNotes->selectOptionListHtml("x_TemplateDrNotes") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_user_template") && !$patient_opd_follow_up->TemplateDrNotes->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateDrNotes" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_opd_follow_up->TemplateDrNotes->caption() ?>" data-title="<?php echo $patient_opd_follow_up->TemplateDrNotes->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateDrNotes',url:'mas_user_templateaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $patient_opd_follow_up->TemplateDrNotes->Lookup->getParamTag("p_x_TemplateDrNotes") ?>
</span>
</script>
<?php echo $patient_opd_follow_up->TemplateDrNotes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->reportheader->Visible) { // reportheader ?>
	<div id="r_reportheader" class="form-group row">
		<label id="elh_patient_opd_follow_up_reportheader" class="<?php echo $patient_opd_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_reportheader" class="patient_opd_follow_upedit" type="text/html"><span><?php echo $patient_opd_follow_up->reportheader->caption() ?><?php echo ($patient_opd_follow_up->reportheader->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->reportheader->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_reportheader" class="patient_opd_follow_upedit" type="text/html">
<span id="el_patient_opd_follow_up_reportheader">
<div id="tp_x_reportheader" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_opd_follow_up" data-field="x_reportheader" data-value-separator="<?php echo $patient_opd_follow_up->reportheader->displayValueSeparatorAttribute() ?>" name="x_reportheader[]" id="x_reportheader[]" value="{value}"<?php echo $patient_opd_follow_up->reportheader->editAttributes() ?>></div>
<div id="dsl_x_reportheader" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_opd_follow_up->reportheader->checkBoxListHtml(FALSE, "x_reportheader[]") ?>
</div></div>
</span>
</script>
<?php echo $patient_opd_follow_up->reportheader->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->Purpose->Visible) { // Purpose ?>
	<div id="r_Purpose" class="form-group row">
		<label id="elh_patient_opd_follow_up_Purpose" for="x_Purpose" class="<?php echo $patient_opd_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_Purpose" class="patient_opd_follow_upedit" type="text/html"><span><?php echo $patient_opd_follow_up->Purpose->caption() ?><?php echo ($patient_opd_follow_up->Purpose->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->Purpose->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_Purpose" class="patient_opd_follow_upedit" type="text/html">
<span id="el_patient_opd_follow_up_Purpose">
<textarea data-table="patient_opd_follow_up" data-field="x_Purpose" name="x_Purpose" id="x_Purpose" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->Purpose->getPlaceHolder()) ?>"<?php echo $patient_opd_follow_up->Purpose->editAttributes() ?>><?php echo $patient_opd_follow_up->Purpose->EditValue ?></textarea>
</span>
</script>
<?php echo $patient_opd_follow_up->Purpose->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->DrName->Visible) { // DrName ?>
	<div id="r_DrName" class="form-group row">
		<label id="elh_patient_opd_follow_up_DrName" for="x_DrName" class="<?php echo $patient_opd_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_DrName" class="patient_opd_follow_upedit" type="text/html"><span><?php echo $patient_opd_follow_up->DrName->caption() ?><?php echo ($patient_opd_follow_up->DrName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_edit->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->DrName->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_DrName" class="patient_opd_follow_upedit" type="text/html">
<span id="el_patient_opd_follow_up_DrName">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DrName"><?php echo strval($patient_opd_follow_up->DrName->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($patient_opd_follow_up->DrName->ViewValue) : $patient_opd_follow_up->DrName->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_opd_follow_up->DrName->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($patient_opd_follow_up->DrName->ReadOnly || $patient_opd_follow_up->DrName->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_DrName',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_opd_follow_up->DrName->Lookup->getParamTag("p_x_DrName") ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_DrName" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_opd_follow_up->DrName->displayValueSeparatorAttribute() ?>" name="x_DrName" id="x_DrName" value="<?php echo $patient_opd_follow_up->DrName->CurrentValue ?>"<?php echo $patient_opd_follow_up->DrName->editAttributes() ?>>
</span>
</script>
<?php echo $patient_opd_follow_up->DrName->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_patient_opd_follow_upedit" class="ew-custom-template"></div>
<script id="tpm_patient_opd_follow_upedit" type="text/html">
<div id="ct_patient_opd_follow_up_edit"><style>
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 100%;
	}
	.content-wrapper {
		background: #f4f6f9;
	}
	.form-control-plaintext {
		display: unset;
		width: unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 65px;
		left: 90%;
		margin-left: -45px;
	}
	.widget-user .card-footer {
		padding-top: 0px;
	}
	.card-footer {
		padding: .05rem 0.025rem;
		background-color: rgba(17,17,17,0.03);
		border-top: 0 solid #f4f4f4;
	}
	.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 18px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
.widget-user .widget-user-image {
	position: absolute;
	top: 5px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-header {
	padding: 1rem;
	height: 100px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
.input-group {
	position: relative;
	display: flex;
	flex-wrap: nowrap;
	align-items: stretch;
	width: 100%;
}
</style>
	<?php
	$fk_id = $_GET["fk_id"] ;
	$fk_patient_id = $_GET["fk_patient_id"] ;
	$fk_mrnNo = $_GET["fk_mrnNo"] ;
	$dbhelper = &DbHelper();
	$Tid = $_GET["id"] ;
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_opd_follow_up where id='".$Tid."'; ";
	$results1AA = $dbhelper->ExecuteRows($sql);
	$Tid = $results1AA[0]["PatientId"];
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Tid."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["profilePic"] == "")
	{
		$PatientProfilePic = "hims\profile-picture.png";
	}else{
		$PatientProfilePic = $results1[0]["profilePic"];
	}
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Tid."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Tid."'; ";
	$results2 = $dbhelper->ExecuteRows($sql);
	if($results2[0]["profilePic"] == "")
	{
		$PatientProfilePic = "hims\profile-picture.png";
	}else{
		$PatientProfilePic = $results2[0]["profilePic"];
	}
	if($results1[0]["profilePic"] == "")
	{
		$PartnerProfilePic = "hims\profile-picture.png";
	}else{
		$PartnerProfilePic = $results1[0]["profilePic"];
	}
	?>
{{include tmpl="#tpc_patient_opd_follow_up_PatientSearch"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_PatientSearch"/}}	
	<div class="row">
<div id="patientdataview" class="col-md-12">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span id="SemPatientId" class="ew-cell">Patient Id : <?php echo $results2[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span id="SemPatientPatientName" class="ew-cell">Patient Name : <?php echo $results2[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span id="SemPatientGender" class="ew-cell">Gender : <?php echo $results2[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span id="SemPatientBloodGroup" class="ew-cell">Blood Group : <?php echo $results2[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient"  class="img-circle elevation-2" src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				<div class="col-sm-4">
					<div class="description-block">
					  <h5 id="SemPatientEmail" class="description-header">MRN No : <?php echo $fk_mrnNo; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span id="SemPatientAge" class="ew-cell">Age : <?php echo AgeCalculationb($results2[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 id="SemPatientMobile" class="description-header">Mobile : <?php echo $results2[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
</div>
<?php
$Refferrr = getSRefer($results2[0]["id"]);
if($Refferrr != '')
{
	echo 'Referred By : ' . $Refferrr .'<br>';
}
?>
<p id="profilePic" hidden>{{include tmpl="#tpc_patient_opd_follow_up_profilePic"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_profilePic"/}}</p>
<p id="SurfaceArea" hidden>{{include tmpl="#tpx_SurfaceArea"/}}</p>
<p id="BodyMassIndex" hidden>{{include tmpl="#tpx_BodyMassIndex"/}}</p>
<p id="idmrnnokk" hidden>{{include tmpl="#tpc_patient_opd_follow_up_mrnno"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_mrnno"/}}</p>
<div hidden>
  <p>{{include tmpl="#tpc_patient_opd_follow_up_Reception"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_Reception"/}}</p> 
  <p>{{include tmpl="#tpc_patient_opd_follow_up_PatientId"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_PatientId"/}}</p> 
  <p>{{include tmpl="#tpc_patient_opd_follow_up_PatientName"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_PatientName"/}}</p> 
  <p>{{include tmpl="#tpc_patient_opd_follow_up_Age"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_Age"/}}</p> 
  <p>{{include tmpl="#tpc_patient_opd_follow_up_Gender"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_Gender"/}}</p>
  <p>{{include tmpl="#tpc_patient_opd_follow_up_PatID"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_PatID"/}}</p>
  <p>{{include tmpl="#tpc_patient_opd_follow_up_MobileNumber"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_MobileNumber"/}}</p> 
</div>
{{include tmpl="#tpc_patient_opd_follow_up_reportheader"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_reportheader"/}}
<div class="row">
{{include tmpl="#tpc_patient_opd_follow_up_TemplateDrNotes"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_TemplateDrNotes"/}}
</div>
<div class="row">
		 <div class="col-lg-12">
			<div class="card">             
			  <div class="card-body">
{{include tmpl="#tpc_patient_opd_follow_up_procedurenotes"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_procedurenotes"/}}
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<div class="row">
		 <div class="col-lg-6">
			<div class="card">
			  <div class="card-body">
			   <div class="row">
			  <div class="col-lg-4">
			  		{{include tmpl="#tpc_patient_opd_follow_up_NextReviewDate"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_NextReviewDate"/}}
			  </div>
			  <div class="col-lg-4">
			   		{{include tmpl="#tpc_patient_opd_follow_up_Purpose"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_Purpose"/}}
			   </div>
			   <div class="col-lg-4">
			   		{{include tmpl="#tpc_patient_opd_follow_up_DrName"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_DrName"/}}
			   </div>
			   </div>
			  <br>
			    {{include tmpl="#tpc_patient_opd_follow_up_Procedure"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_Procedure"/}} <br>
			      {{include tmpl="#tpc_patient_opd_follow_up_ProcedureDateTime"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_ProcedureDateTime"/}} <br>
			   {{include tmpl="#tpc_patient_opd_follow_up_SerologyPositive"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_SerologyPositive"/}} <br>
			    {{include tmpl="#tpc_patient_opd_follow_up_Allergy"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_Allergy"/}} <br>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card">
			  <div class="card-body">
			  {{include tmpl="#tpc_patient_opd_follow_up_ICSIAdvised"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_ICSIAdvised"/}} <br>
			  			  {{include tmpl="#tpc_patient_opd_follow_up_ICSIDate"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_ICSIDate"/}} <br>
			   {{include tmpl="#tpc_patient_opd_follow_up_DeliveryRegistered"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_DeliveryRegistered"/}} <br>
			    {{include tmpl="#tpc_patient_opd_follow_up_LMP"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_LMP"/}} <br>
			    {{include tmpl="#tpc_patient_opd_follow_up_EDD"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_EDD"/}} <br>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<?php
	$dbhelper = &DbHelper();
	$Tid = $_GET["fk_patient_id"] ;
	$Reception = $_GET["fk_id"] ;
	$PatientId = $_GET["fk_patient_id"] ;
	$mrnno = $_GET["fk_mrnNo"] ;
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_vitals where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$vitalsURL = "patient_vitalsadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$vitalsURL = "patient_vitalsedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_history where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$historyURL = "patient_historyadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$historyURL = "patient_historyedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_provisional_diagnosis where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$provisionaldiagnosisURL = "patient_provisional_diagnosisadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$provisionaldiagnosisURL = "patient_provisional_diagnosisedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_prescription where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$prescriptionURL = "patient_prescriptionlist.php?action=gridadd&showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$prescriptionURL = "patient_prescriptionlist.php?action=gridedit&showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_final_diagnosis where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$finaldiagnosisURL = "patient_final_diagnosisadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$finaldiagnosisURL = "patient_final_diagnosisedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_follow_up where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$followupURL = "patient_follow_upadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$followupURL = "patient_follow_upedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_ot_delivery_register where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$deliveryregisterURL = "patient_ot_delivery_registeradd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$deliveryregisterURL = "patient_ot_delivery_registeredit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_ot_surgery_register where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$surgeryregisterURL = "patient_ot_surgery_registeradd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$surgeryregisterURL = "patient_ot_surgery_registeredit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
?>
<div class="row">
		 <div class="col-lg-6">
			<div class="card">             
			  <div class="card-body">
			  	<table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr>
							<td>
								<a href="<?php echo $vitalsURL; ?>" class="btn btn-sm btn-success float-left">Vitals</a>
							</td>
							<td>
								<a href="<?php echo $historyURL; ?>" class="btn btn-sm btn-warning float-left">History</a>
							</td>
						</tr>
						<tr>
							<td>
								<a href="<?php echo $provisionaldiagnosisURL; ?>" class="btn btn-sm btn-danger float-left">Provisional Diagnosis</a>
							</td>
							<td>
								<a href="<?php echo $prescriptionURL; ?>" class="btn btn-sm btn-info float-left">Prescription</a>
							</td>
						</tr>						
					</tbody>
				</table>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card">             
			  <div class="card-body">
			  		<table  style="width: 100%;"  class="ew-table">
			  			<tbody>
						<tr>
							<td>
								<a href="<?php echo $finaldiagnosisURL; ?>" class="btn btn-sm btn-success float-left">Final Diagnosis</a>
							</td>
							<td>
								<a href="<?php echo $followupURL; ?>" class="btn btn-sm btn-warning float-left">Follow Up</a>
							</td>
						</tr>
						<tr>
							<td>
								<a href="<?php echo $deliveryregisterURL; ?>" class="btn btn-sm btn-danger float-left">Delivery Register</a>
							</td>
							<td>
								<a href="<?php echo $surgeryregisterURL; ?>" class="btn btn-sm btn-info float-left">Surgery Register</a>
							</td>
						</tr>
			  			</tbody>
			  		</table>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
</div>
</script>
<?php
	if (in_array("patient_an_registration", explode(",", $patient_opd_follow_up->getCurrentDetailTable())) && $patient_an_registration->DetailEdit) {
?>
<?php if ($patient_opd_follow_up->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("patient_an_registration", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_an_registrationgrid.php" ?>
<?php } ?>
<?php if (!$patient_opd_follow_up_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_opd_follow_up_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_opd_follow_up_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($patient_opd_follow_up->Rows) ?> };
ew.applyTemplate("tpd_patient_opd_follow_upedit", "tpm_patient_opd_follow_upedit", "patient_opd_follow_upedit", "<?php echo $patient_opd_follow_up->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.patient_opd_follow_upedit_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$patient_opd_follow_up_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$patient_opd_follow_up_edit->terminate();
?>