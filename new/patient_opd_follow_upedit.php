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
<?php include_once "header.php"; ?>
<script>
var fpatient_opd_follow_upedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpatient_opd_follow_upedit = currentForm = new ew.Form("fpatient_opd_follow_upedit", "edit");

	// Validate form
	fpatient_opd_follow_upedit.validate = function() {
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
			<?php if ($patient_opd_follow_up_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up_edit->id->caption(), $patient_opd_follow_up_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_opd_follow_up_edit->procedurenotes->Required) { ?>
				elm = this.getElements("x" + infix + "_procedurenotes");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up_edit->procedurenotes->caption(), $patient_opd_follow_up_edit->procedurenotes->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_opd_follow_up_edit->NextReviewDate->Required) { ?>
				elm = this.getElements("x" + infix + "_NextReviewDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up_edit->NextReviewDate->caption(), $patient_opd_follow_up_edit->NextReviewDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NextReviewDate");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_opd_follow_up_edit->NextReviewDate->errorMessage()) ?>");
			<?php if ($patient_opd_follow_up_edit->ICSIAdvised->Required) { ?>
				elm = this.getElements("x" + infix + "_ICSIAdvised[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up_edit->ICSIAdvised->caption(), $patient_opd_follow_up_edit->ICSIAdvised->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_opd_follow_up_edit->DeliveryRegistered->Required) { ?>
				elm = this.getElements("x" + infix + "_DeliveryRegistered[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up_edit->DeliveryRegistered->caption(), $patient_opd_follow_up_edit->DeliveryRegistered->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_opd_follow_up_edit->EDD->Required) { ?>
				elm = this.getElements("x" + infix + "_EDD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up_edit->EDD->caption(), $patient_opd_follow_up_edit->EDD->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EDD");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_opd_follow_up_edit->EDD->errorMessage()) ?>");
			<?php if ($patient_opd_follow_up_edit->SerologyPositive->Required) { ?>
				elm = this.getElements("x" + infix + "_SerologyPositive[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up_edit->SerologyPositive->caption(), $patient_opd_follow_up_edit->SerologyPositive->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_opd_follow_up_edit->Allergy->Required) { ?>
				elm = this.getElements("x" + infix + "_Allergy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up_edit->Allergy->caption(), $patient_opd_follow_up_edit->Allergy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_opd_follow_up_edit->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up_edit->status->caption(), $patient_opd_follow_up_edit->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_opd_follow_up_edit->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up_edit->modifiedby->caption(), $patient_opd_follow_up_edit->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_opd_follow_up_edit->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up_edit->modifieddatetime->caption(), $patient_opd_follow_up_edit->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_opd_follow_up_edit->LMP->Required) { ?>
				elm = this.getElements("x" + infix + "_LMP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up_edit->LMP->caption(), $patient_opd_follow_up_edit->LMP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LMP");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_opd_follow_up_edit->LMP->errorMessage()) ?>");
			<?php if ($patient_opd_follow_up_edit->Procedure->Required) { ?>
				elm = this.getElements("x" + infix + "_Procedure");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up_edit->Procedure->caption(), $patient_opd_follow_up_edit->Procedure->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_opd_follow_up_edit->ProcedureDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ProcedureDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up_edit->ProcedureDateTime->caption(), $patient_opd_follow_up_edit->ProcedureDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_opd_follow_up_edit->ICSIDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ICSIDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up_edit->ICSIDate->caption(), $patient_opd_follow_up_edit->ICSIDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ICSIDate");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_opd_follow_up_edit->ICSIDate->errorMessage()) ?>");
			<?php if ($patient_opd_follow_up_edit->PatientSearch->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientSearch");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up_edit->PatientSearch->caption(), $patient_opd_follow_up_edit->PatientSearch->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_opd_follow_up_edit->TemplateDrNotes->Required) { ?>
				elm = this.getElements("x" + infix + "_TemplateDrNotes");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up_edit->TemplateDrNotes->caption(), $patient_opd_follow_up_edit->TemplateDrNotes->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_opd_follow_up_edit->reportheader->Required) { ?>
				elm = this.getElements("x" + infix + "_reportheader[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up_edit->reportheader->caption(), $patient_opd_follow_up_edit->reportheader->RequiredErrorMessage)) ?>");
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
	fpatient_opd_follow_upedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_opd_follow_upedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpatient_opd_follow_upedit.lists["x_ICSIAdvised[]"] = <?php echo $patient_opd_follow_up_edit->ICSIAdvised->Lookup->toClientList($patient_opd_follow_up_edit) ?>;
	fpatient_opd_follow_upedit.lists["x_ICSIAdvised[]"].options = <?php echo JsonEncode($patient_opd_follow_up_edit->ICSIAdvised->options(FALSE, TRUE)) ?>;
	fpatient_opd_follow_upedit.lists["x_DeliveryRegistered[]"] = <?php echo $patient_opd_follow_up_edit->DeliveryRegistered->Lookup->toClientList($patient_opd_follow_up_edit) ?>;
	fpatient_opd_follow_upedit.lists["x_DeliveryRegistered[]"].options = <?php echo JsonEncode($patient_opd_follow_up_edit->DeliveryRegistered->options(FALSE, TRUE)) ?>;
	fpatient_opd_follow_upedit.lists["x_SerologyPositive[]"] = <?php echo $patient_opd_follow_up_edit->SerologyPositive->Lookup->toClientList($patient_opd_follow_up_edit) ?>;
	fpatient_opd_follow_upedit.lists["x_SerologyPositive[]"].options = <?php echo JsonEncode($patient_opd_follow_up_edit->SerologyPositive->options(FALSE, TRUE)) ?>;
	fpatient_opd_follow_upedit.lists["x_Allergy"] = <?php echo $patient_opd_follow_up_edit->Allergy->Lookup->toClientList($patient_opd_follow_up_edit) ?>;
	fpatient_opd_follow_upedit.lists["x_Allergy"].options = <?php echo JsonEncode($patient_opd_follow_up_edit->Allergy->lookupOptions()) ?>;
	fpatient_opd_follow_upedit.autoSuggests["x_Allergy"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpatient_opd_follow_upedit.lists["x_status"] = <?php echo $patient_opd_follow_up_edit->status->Lookup->toClientList($patient_opd_follow_up_edit) ?>;
	fpatient_opd_follow_upedit.lists["x_status"].options = <?php echo JsonEncode($patient_opd_follow_up_edit->status->lookupOptions()) ?>;
	fpatient_opd_follow_upedit.lists["x_PatientSearch"] = <?php echo $patient_opd_follow_up_edit->PatientSearch->Lookup->toClientList($patient_opd_follow_up_edit) ?>;
	fpatient_opd_follow_upedit.lists["x_PatientSearch"].options = <?php echo JsonEncode($patient_opd_follow_up_edit->PatientSearch->lookupOptions()) ?>;
	fpatient_opd_follow_upedit.lists["x_TemplateDrNotes"] = <?php echo $patient_opd_follow_up_edit->TemplateDrNotes->Lookup->toClientList($patient_opd_follow_up_edit) ?>;
	fpatient_opd_follow_upedit.lists["x_TemplateDrNotes"].options = <?php echo JsonEncode($patient_opd_follow_up_edit->TemplateDrNotes->lookupOptions()) ?>;
	fpatient_opd_follow_upedit.lists["x_reportheader[]"] = <?php echo $patient_opd_follow_up_edit->reportheader->Lookup->toClientList($patient_opd_follow_up_edit) ?>;
	fpatient_opd_follow_upedit.lists["x_reportheader[]"].options = <?php echo JsonEncode($patient_opd_follow_up_edit->reportheader->options(FALSE, TRUE)) ?>;
	loadjs.done("fpatient_opd_follow_upedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_opd_follow_up_edit->showPageHeader(); ?>
<?php
$patient_opd_follow_up_edit->showMessage();
?>
<form name="fpatient_opd_follow_upedit" id="fpatient_opd_follow_upedit" class="<?php echo $patient_opd_follow_up_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_opd_follow_up">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$patient_opd_follow_up_edit->IsModal ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($patient_opd_follow_up_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_patient_opd_follow_up_id" class="<?php echo $patient_opd_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_id" type="text/html"><?php echo $patient_opd_follow_up_edit->id->caption() ?><?php echo $patient_opd_follow_up_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_edit->id->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_id" type="text/html"><span id="el_patient_opd_follow_up_id">
<span<?php echo $patient_opd_follow_up_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_opd_follow_up_edit->id->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($patient_opd_follow_up_edit->id->CurrentValue) ?>">
<?php echo $patient_opd_follow_up_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_edit->procedurenotes->Visible) { // procedurenotes ?>
	<div id="r_procedurenotes" class="form-group row">
		<label id="elh_patient_opd_follow_up_procedurenotes" class="<?php echo $patient_opd_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_procedurenotes" type="text/html"><?php echo $patient_opd_follow_up_edit->procedurenotes->caption() ?><?php echo $patient_opd_follow_up_edit->procedurenotes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_edit->procedurenotes->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_procedurenotes" type="text/html"><span id="el_patient_opd_follow_up_procedurenotes">
<?php $patient_opd_follow_up_edit->procedurenotes->EditAttrs->appendClass("editor"); ?>
<textarea data-table="patient_opd_follow_up" data-field="x_procedurenotes" name="x_procedurenotes" id="x_procedurenotes" cols="35" rows="22" placeholder="<?php echo HtmlEncode($patient_opd_follow_up_edit->procedurenotes->getPlaceHolder()) ?>"<?php echo $patient_opd_follow_up_edit->procedurenotes->editAttributes() ?>><?php echo $patient_opd_follow_up_edit->procedurenotes->EditValue ?></textarea>
</span></script>
<script type="text/html" class="patient_opd_follow_upedit_js">
loadjs.ready(["fpatient_opd_follow_upedit", "editor"], function() {
	ew.createEditor("fpatient_opd_follow_upedit", "x_procedurenotes", 35, 22, <?php echo $patient_opd_follow_up_edit->procedurenotes->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
<?php echo $patient_opd_follow_up_edit->procedurenotes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_edit->NextReviewDate->Visible) { // NextReviewDate ?>
	<div id="r_NextReviewDate" class="form-group row">
		<label id="elh_patient_opd_follow_up_NextReviewDate" for="x_NextReviewDate" class="<?php echo $patient_opd_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_NextReviewDate" type="text/html"><?php echo $patient_opd_follow_up_edit->NextReviewDate->caption() ?><?php echo $patient_opd_follow_up_edit->NextReviewDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_edit->NextReviewDate->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_NextReviewDate" type="text/html"><span id="el_patient_opd_follow_up_NextReviewDate">
<input type="text" data-table="patient_opd_follow_up" data-field="x_NextReviewDate" data-format="7" name="x_NextReviewDate" id="x_NextReviewDate" placeholder="<?php echo HtmlEncode($patient_opd_follow_up_edit->NextReviewDate->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up_edit->NextReviewDate->EditValue ?>"<?php echo $patient_opd_follow_up_edit->NextReviewDate->editAttributes() ?>>
<?php if (!$patient_opd_follow_up_edit->NextReviewDate->ReadOnly && !$patient_opd_follow_up_edit->NextReviewDate->Disabled && !isset($patient_opd_follow_up_edit->NextReviewDate->EditAttrs["readonly"]) && !isset($patient_opd_follow_up_edit->NextReviewDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_opd_follow_upedit_js">
loadjs.ready(["fpatient_opd_follow_upedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_opd_follow_upedit", "x_NextReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $patient_opd_follow_up_edit->NextReviewDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_edit->ICSIAdvised->Visible) { // ICSIAdvised ?>
	<div id="r_ICSIAdvised" class="form-group row">
		<label id="elh_patient_opd_follow_up_ICSIAdvised" class="<?php echo $patient_opd_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_ICSIAdvised" type="text/html"><?php echo $patient_opd_follow_up_edit->ICSIAdvised->caption() ?><?php echo $patient_opd_follow_up_edit->ICSIAdvised->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_edit->ICSIAdvised->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_ICSIAdvised" type="text/html"><span id="el_patient_opd_follow_up_ICSIAdvised">
<div id="tp_x_ICSIAdvised" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_opd_follow_up" data-field="x_ICSIAdvised" data-value-separator="<?php echo $patient_opd_follow_up_edit->ICSIAdvised->displayValueSeparatorAttribute() ?>" name="x_ICSIAdvised[]" id="x_ICSIAdvised[]" value="{value}"<?php echo $patient_opd_follow_up_edit->ICSIAdvised->editAttributes() ?>></div>
<div id="dsl_x_ICSIAdvised" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_opd_follow_up_edit->ICSIAdvised->checkBoxListHtml(FALSE, "x_ICSIAdvised[]") ?>
</div></div>
</span></script>
<?php echo $patient_opd_follow_up_edit->ICSIAdvised->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_edit->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
	<div id="r_DeliveryRegistered" class="form-group row">
		<label id="elh_patient_opd_follow_up_DeliveryRegistered" class="<?php echo $patient_opd_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_DeliveryRegistered" type="text/html"><?php echo $patient_opd_follow_up_edit->DeliveryRegistered->caption() ?><?php echo $patient_opd_follow_up_edit->DeliveryRegistered->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_edit->DeliveryRegistered->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_DeliveryRegistered" type="text/html"><span id="el_patient_opd_follow_up_DeliveryRegistered">
<div id="tp_x_DeliveryRegistered" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_opd_follow_up" data-field="x_DeliveryRegistered" data-value-separator="<?php echo $patient_opd_follow_up_edit->DeliveryRegistered->displayValueSeparatorAttribute() ?>" name="x_DeliveryRegistered[]" id="x_DeliveryRegistered[]" value="{value}"<?php echo $patient_opd_follow_up_edit->DeliveryRegistered->editAttributes() ?>></div>
<div id="dsl_x_DeliveryRegistered" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_opd_follow_up_edit->DeliveryRegistered->checkBoxListHtml(FALSE, "x_DeliveryRegistered[]") ?>
</div></div>
</span></script>
<?php echo $patient_opd_follow_up_edit->DeliveryRegistered->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_edit->EDD->Visible) { // EDD ?>
	<div id="r_EDD" class="form-group row">
		<label id="elh_patient_opd_follow_up_EDD" for="x_EDD" class="<?php echo $patient_opd_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_EDD" type="text/html"><?php echo $patient_opd_follow_up_edit->EDD->caption() ?><?php echo $patient_opd_follow_up_edit->EDD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_edit->EDD->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_EDD" type="text/html"><span id="el_patient_opd_follow_up_EDD">
<input type="text" data-table="patient_opd_follow_up" data-field="x_EDD" data-format="7" name="x_EDD" id="x_EDD" placeholder="<?php echo HtmlEncode($patient_opd_follow_up_edit->EDD->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up_edit->EDD->EditValue ?>"<?php echo $patient_opd_follow_up_edit->EDD->editAttributes() ?>>
<?php if (!$patient_opd_follow_up_edit->EDD->ReadOnly && !$patient_opd_follow_up_edit->EDD->Disabled && !isset($patient_opd_follow_up_edit->EDD->EditAttrs["readonly"]) && !isset($patient_opd_follow_up_edit->EDD->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_opd_follow_upedit_js">
loadjs.ready(["fpatient_opd_follow_upedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_opd_follow_upedit", "x_EDD", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $patient_opd_follow_up_edit->EDD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_edit->SerologyPositive->Visible) { // SerologyPositive ?>
	<div id="r_SerologyPositive" class="form-group row">
		<label id="elh_patient_opd_follow_up_SerologyPositive" class="<?php echo $patient_opd_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_SerologyPositive" type="text/html"><?php echo $patient_opd_follow_up_edit->SerologyPositive->caption() ?><?php echo $patient_opd_follow_up_edit->SerologyPositive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_edit->SerologyPositive->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_SerologyPositive" type="text/html"><span id="el_patient_opd_follow_up_SerologyPositive">
<div id="tp_x_SerologyPositive" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_opd_follow_up" data-field="x_SerologyPositive" data-value-separator="<?php echo $patient_opd_follow_up_edit->SerologyPositive->displayValueSeparatorAttribute() ?>" name="x_SerologyPositive[]" id="x_SerologyPositive[]" value="{value}"<?php echo $patient_opd_follow_up_edit->SerologyPositive->editAttributes() ?>></div>
<div id="dsl_x_SerologyPositive" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_opd_follow_up_edit->SerologyPositive->checkBoxListHtml(FALSE, "x_SerologyPositive[]") ?>
</div></div>
</span></script>
<?php echo $patient_opd_follow_up_edit->SerologyPositive->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_edit->Allergy->Visible) { // Allergy ?>
	<div id="r_Allergy" class="form-group row">
		<label id="elh_patient_opd_follow_up_Allergy" class="<?php echo $patient_opd_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_Allergy" type="text/html"><?php echo $patient_opd_follow_up_edit->Allergy->caption() ?><?php echo $patient_opd_follow_up_edit->Allergy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_edit->Allergy->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_Allergy" type="text/html"><span id="el_patient_opd_follow_up_Allergy">
<?php
$onchange = $patient_opd_follow_up_edit->Allergy->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_opd_follow_up_edit->Allergy->EditAttrs["onchange"] = "";
?>
<span id="as_x_Allergy">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x_Allergy" id="sv_x_Allergy" value="<?php echo RemoveHtml($patient_opd_follow_up_edit->Allergy->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up_edit->Allergy->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_opd_follow_up_edit->Allergy->getPlaceHolder()) ?>"<?php echo $patient_opd_follow_up_edit->Allergy->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_opd_follow_up_edit->Allergy->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_Allergy',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo ($patient_opd_follow_up_edit->Allergy->ReadOnly || $patient_opd_follow_up_edit->Allergy->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Allergy" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_opd_follow_up_edit->Allergy->displayValueSeparatorAttribute() ?>" name="x_Allergy" id="x_Allergy" value="<?php echo HtmlEncode($patient_opd_follow_up_edit->Allergy->CurrentValue) ?>"<?php echo $onchange ?>>
<?php echo $patient_opd_follow_up_edit->Allergy->Lookup->getParamTag($patient_opd_follow_up_edit, "p_x_Allergy") ?>
</span></script>
<script type="text/html" class="patient_opd_follow_upedit_js">
loadjs.ready(["fpatient_opd_follow_upedit"], function() {
	fpatient_opd_follow_upedit.createAutoSuggest({"id":"x_Allergy","forceSelect":false});
});
</script>
<?php echo $patient_opd_follow_up_edit->Allergy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_edit->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_patient_opd_follow_up_status" for="x_status" class="<?php echo $patient_opd_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_status" type="text/html"><?php echo $patient_opd_follow_up_edit->status->caption() ?><?php echo $patient_opd_follow_up_edit->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_edit->status->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_status" type="text/html"><span id="el_patient_opd_follow_up_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_opd_follow_up" data-field="x_status" data-value-separator="<?php echo $patient_opd_follow_up_edit->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $patient_opd_follow_up_edit->status->editAttributes() ?>>
			<?php echo $patient_opd_follow_up_edit->status->selectOptionListHtml("x_status") ?>
		</select>
</div>
<?php echo $patient_opd_follow_up_edit->status->Lookup->getParamTag($patient_opd_follow_up_edit, "p_x_status") ?>
</span></script>
<?php echo $patient_opd_follow_up_edit->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_edit->LMP->Visible) { // LMP ?>
	<div id="r_LMP" class="form-group row">
		<label id="elh_patient_opd_follow_up_LMP" for="x_LMP" class="<?php echo $patient_opd_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_LMP" type="text/html"><?php echo $patient_opd_follow_up_edit->LMP->caption() ?><?php echo $patient_opd_follow_up_edit->LMP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_edit->LMP->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_LMP" type="text/html"><span id="el_patient_opd_follow_up_LMP">
<input type="text" data-table="patient_opd_follow_up" data-field="x_LMP" data-format="7" name="x_LMP" id="x_LMP" placeholder="<?php echo HtmlEncode($patient_opd_follow_up_edit->LMP->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up_edit->LMP->EditValue ?>"<?php echo $patient_opd_follow_up_edit->LMP->editAttributes() ?>>
<?php if (!$patient_opd_follow_up_edit->LMP->ReadOnly && !$patient_opd_follow_up_edit->LMP->Disabled && !isset($patient_opd_follow_up_edit->LMP->EditAttrs["readonly"]) && !isset($patient_opd_follow_up_edit->LMP->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_opd_follow_upedit_js">
loadjs.ready(["fpatient_opd_follow_upedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_opd_follow_upedit", "x_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $patient_opd_follow_up_edit->LMP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_edit->Procedure->Visible) { // Procedure ?>
	<div id="r_Procedure" class="form-group row">
		<label id="elh_patient_opd_follow_up_Procedure" for="x_Procedure" class="<?php echo $patient_opd_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_Procedure" type="text/html"><?php echo $patient_opd_follow_up_edit->Procedure->caption() ?><?php echo $patient_opd_follow_up_edit->Procedure->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_edit->Procedure->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_Procedure" type="text/html"><span id="el_patient_opd_follow_up_Procedure">
<textarea data-table="patient_opd_follow_up" data-field="x_Procedure" name="x_Procedure" id="x_Procedure" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_opd_follow_up_edit->Procedure->getPlaceHolder()) ?>"<?php echo $patient_opd_follow_up_edit->Procedure->editAttributes() ?>><?php echo $patient_opd_follow_up_edit->Procedure->EditValue ?></textarea>
</span></script>
<?php echo $patient_opd_follow_up_edit->Procedure->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_edit->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
	<div id="r_ProcedureDateTime" class="form-group row">
		<label id="elh_patient_opd_follow_up_ProcedureDateTime" for="x_ProcedureDateTime" class="<?php echo $patient_opd_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_ProcedureDateTime" type="text/html"><?php echo $patient_opd_follow_up_edit->ProcedureDateTime->caption() ?><?php echo $patient_opd_follow_up_edit->ProcedureDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_edit->ProcedureDateTime->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_ProcedureDateTime" type="text/html"><span id="el_patient_opd_follow_up_ProcedureDateTime">
<input type="text" data-table="patient_opd_follow_up" data-field="x_ProcedureDateTime" data-format="11" name="x_ProcedureDateTime" id="x_ProcedureDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up_edit->ProcedureDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up_edit->ProcedureDateTime->EditValue ?>"<?php echo $patient_opd_follow_up_edit->ProcedureDateTime->editAttributes() ?>>
<?php if (!$patient_opd_follow_up_edit->ProcedureDateTime->ReadOnly && !$patient_opd_follow_up_edit->ProcedureDateTime->Disabled && !isset($patient_opd_follow_up_edit->ProcedureDateTime->EditAttrs["readonly"]) && !isset($patient_opd_follow_up_edit->ProcedureDateTime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_opd_follow_upedit_js">
loadjs.ready(["fpatient_opd_follow_upedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_opd_follow_upedit", "x_ProcedureDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $patient_opd_follow_up_edit->ProcedureDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_edit->ICSIDate->Visible) { // ICSIDate ?>
	<div id="r_ICSIDate" class="form-group row">
		<label id="elh_patient_opd_follow_up_ICSIDate" for="x_ICSIDate" class="<?php echo $patient_opd_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_ICSIDate" type="text/html"><?php echo $patient_opd_follow_up_edit->ICSIDate->caption() ?><?php echo $patient_opd_follow_up_edit->ICSIDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_edit->ICSIDate->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_ICSIDate" type="text/html"><span id="el_patient_opd_follow_up_ICSIDate">
<input type="text" data-table="patient_opd_follow_up" data-field="x_ICSIDate" data-format="7" name="x_ICSIDate" id="x_ICSIDate" placeholder="<?php echo HtmlEncode($patient_opd_follow_up_edit->ICSIDate->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up_edit->ICSIDate->EditValue ?>"<?php echo $patient_opd_follow_up_edit->ICSIDate->editAttributes() ?>>
<?php if (!$patient_opd_follow_up_edit->ICSIDate->ReadOnly && !$patient_opd_follow_up_edit->ICSIDate->Disabled && !isset($patient_opd_follow_up_edit->ICSIDate->EditAttrs["readonly"]) && !isset($patient_opd_follow_up_edit->ICSIDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_opd_follow_upedit_js">
loadjs.ready(["fpatient_opd_follow_upedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_opd_follow_upedit", "x_ICSIDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $patient_opd_follow_up_edit->ICSIDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_edit->PatientSearch->Visible) { // PatientSearch ?>
	<div id="r_PatientSearch" class="form-group row">
		<label id="elh_patient_opd_follow_up_PatientSearch" for="x_PatientSearch" class="<?php echo $patient_opd_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_PatientSearch" type="text/html"><?php echo $patient_opd_follow_up_edit->PatientSearch->caption() ?><?php echo $patient_opd_follow_up_edit->PatientSearch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_edit->PatientSearch->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_PatientSearch" type="text/html"><span id="el_patient_opd_follow_up_PatientSearch">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatientSearch"><?php echo EmptyValue(strval($patient_opd_follow_up_edit->PatientSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $patient_opd_follow_up_edit->PatientSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_opd_follow_up_edit->PatientSearch->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($patient_opd_follow_up_edit->PatientSearch->ReadOnly || $patient_opd_follow_up_edit->PatientSearch->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatientSearch',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_opd_follow_up_edit->PatientSearch->Lookup->getParamTag($patient_opd_follow_up_edit, "p_x_PatientSearch") ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_PatientSearch" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_opd_follow_up_edit->PatientSearch->displayValueSeparatorAttribute() ?>" name="x_PatientSearch" id="x_PatientSearch" value="<?php echo $patient_opd_follow_up_edit->PatientSearch->CurrentValue ?>"<?php echo $patient_opd_follow_up_edit->PatientSearch->editAttributes() ?>>
</span></script>
<?php echo $patient_opd_follow_up_edit->PatientSearch->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_edit->TemplateDrNotes->Visible) { // TemplateDrNotes ?>
	<div id="r_TemplateDrNotes" class="form-group row">
		<label id="elh_patient_opd_follow_up_TemplateDrNotes" for="x_TemplateDrNotes" class="<?php echo $patient_opd_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_TemplateDrNotes" type="text/html"><?php echo $patient_opd_follow_up_edit->TemplateDrNotes->caption() ?><?php echo $patient_opd_follow_up_edit->TemplateDrNotes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_edit->TemplateDrNotes->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_TemplateDrNotes" type="text/html"><span id="el_patient_opd_follow_up_TemplateDrNotes">
<?php $patient_opd_follow_up_edit->TemplateDrNotes->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_opd_follow_up" data-field="x_TemplateDrNotes" data-value-separator="<?php echo $patient_opd_follow_up_edit->TemplateDrNotes->displayValueSeparatorAttribute() ?>" id="x_TemplateDrNotes" name="x_TemplateDrNotes"<?php echo $patient_opd_follow_up_edit->TemplateDrNotes->editAttributes() ?>>
			<?php echo $patient_opd_follow_up_edit->TemplateDrNotes->selectOptionListHtml("x_TemplateDrNotes") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_user_template") && !$patient_opd_follow_up_edit->TemplateDrNotes->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateDrNotes" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_opd_follow_up_edit->TemplateDrNotes->caption() ?>" data-title="<?php echo $patient_opd_follow_up_edit->TemplateDrNotes->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateDrNotes',url:'mas_user_templateaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $patient_opd_follow_up_edit->TemplateDrNotes->Lookup->getParamTag($patient_opd_follow_up_edit, "p_x_TemplateDrNotes") ?>
</span></script>
<?php echo $patient_opd_follow_up_edit->TemplateDrNotes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_edit->reportheader->Visible) { // reportheader ?>
	<div id="r_reportheader" class="form-group row">
		<label id="elh_patient_opd_follow_up_reportheader" class="<?php echo $patient_opd_follow_up_edit->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_reportheader" type="text/html"><?php echo $patient_opd_follow_up_edit->reportheader->caption() ?><?php echo $patient_opd_follow_up_edit->reportheader->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_opd_follow_up_edit->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_edit->reportheader->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_reportheader" type="text/html"><span id="el_patient_opd_follow_up_reportheader">
<div id="tp_x_reportheader" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_opd_follow_up" data-field="x_reportheader" data-value-separator="<?php echo $patient_opd_follow_up_edit->reportheader->displayValueSeparatorAttribute() ?>" name="x_reportheader[]" id="x_reportheader[]" value="{value}"<?php echo $patient_opd_follow_up_edit->reportheader->editAttributes() ?>></div>
<div id="dsl_x_reportheader" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_opd_follow_up_edit->reportheader->checkBoxListHtml(FALSE, "x_reportheader[]") ?>
</div></div>
</span></script>
<?php echo $patient_opd_follow_up_edit->reportheader->CustomMsg ?></div></div>
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
{{include tmpl="#tpc_patient_opd_follow_up_PatientSearch"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_opd_follow_up_PatientSearch")/}}	
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
<p id="profilePic" hidden>{{include tmpl="#tpc_patient_opd_follow_up_profilePic"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_opd_follow_up_profilePic")/}}</p>
<p id="SurfaceArea" hidden>{{include tmpl=~getTemplate("#tpx_SurfaceArea")/}}</p>
<p id="BodyMassIndex" hidden>{{include tmpl=~getTemplate("#tpx_BodyMassIndex")/}}</p>
<p id="idmrnnokk" hidden>{{include tmpl="#tpc_patient_opd_follow_up_mrnno"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_opd_follow_up_mrnno")/}}</p>
<div hidden>
  <p>{{include tmpl="#tpc_patient_opd_follow_up_Reception"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_opd_follow_up_Reception")/}}</p> 
  <p>{{include tmpl="#tpc_patient_opd_follow_up_PatientId"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_opd_follow_up_PatientId")/}}</p> 
  <p>{{include tmpl="#tpc_patient_opd_follow_up_PatientName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_opd_follow_up_PatientName")/}}</p> 
  <p>{{include tmpl="#tpc_patient_opd_follow_up_Age"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_opd_follow_up_Age")/}}</p> 
  <p>{{include tmpl="#tpc_patient_opd_follow_up_Gender"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_opd_follow_up_Gender")/}}</p>
  <p>{{include tmpl="#tpc_patient_opd_follow_up_PatID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_opd_follow_up_PatID")/}}</p>
  <p>{{include tmpl="#tpc_patient_opd_follow_up_MobileNumber"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_opd_follow_up_MobileNumber")/}}</p> 
</div>
{{include tmpl="#tpc_patient_opd_follow_up_reportheader"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_opd_follow_up_reportheader")/}}
<div class="row">
{{include tmpl="#tpc_patient_opd_follow_up_TemplateDrNotes"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_opd_follow_up_TemplateDrNotes")/}}
</div>
<div class="row">
		 <div class="col-lg-12">
			<div class="card">             
			  <div class="card-body">
{{include tmpl="#tpc_patient_opd_follow_up_procedurenotes"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_opd_follow_up_procedurenotes")/}}
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
			  {{include tmpl="#tpc_patient_opd_follow_up_NextReviewDate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_opd_follow_up_NextReviewDate")/}} <br>
			    {{include tmpl="#tpc_patient_opd_follow_up_Procedure"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_opd_follow_up_Procedure")/}} <br>
			      {{include tmpl="#tpc_patient_opd_follow_up_ProcedureDateTime"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_opd_follow_up_ProcedureDateTime")/}} <br>
			   {{include tmpl="#tpc_patient_opd_follow_up_SerologyPositive"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_opd_follow_up_SerologyPositive")/}} <br>
			    {{include tmpl="#tpc_patient_opd_follow_up_Allergy"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_opd_follow_up_Allergy")/}} <br>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card">
			  <div class="card-body">
			  {{include tmpl="#tpc_patient_opd_follow_up_ICSIAdvised"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_opd_follow_up_ICSIAdvised")/}} <br>
			  			  {{include tmpl="#tpc_patient_opd_follow_up_ICSIDate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_opd_follow_up_ICSIDate")/}} <br>
			   {{include tmpl="#tpc_patient_opd_follow_up_DeliveryRegistered"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_opd_follow_up_DeliveryRegistered")/}} <br>
			    {{include tmpl="#tpc_patient_opd_follow_up_LMP"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_opd_follow_up_LMP")/}} <br>
			    {{include tmpl="#tpc_patient_opd_follow_up_EDD"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_opd_follow_up_EDD")/}} <br>
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
<?php if ($patient_opd_follow_up->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("patient_an_registration", "TblCaption") ?></h4>
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
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($patient_opd_follow_up->Rows) ?> };
	ew.applyTemplate("tpd_patient_opd_follow_upedit", "tpm_patient_opd_follow_upedit", "patient_opd_follow_upedit", "<?php echo $patient_opd_follow_up->CustomExport ?>", ew.templateData.rows[0]);
	$("script.patient_opd_follow_upedit_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$patient_opd_follow_up_edit->showPageFooter();
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
$patient_opd_follow_up_edit->terminate();
?>