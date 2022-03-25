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
$_appointment_scheduler_edit = new _appointment_scheduler_edit();

// Run the page
$_appointment_scheduler_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$_appointment_scheduler_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var f_appointment_scheduleredit = currentForm = new ew.Form("f_appointment_scheduleredit", "edit");

// Validate form
f_appointment_scheduleredit.validate = function() {
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
		<?php if ($_appointment_scheduler_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->id->caption(), $_appointment_scheduler->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_edit->start_date->Required) { ?>
			elm = this.getElements("x" + infix + "_start_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->start_date->caption(), $_appointment_scheduler->start_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_start_date");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($_appointment_scheduler->start_date->errorMessage()) ?>");
		<?php if ($_appointment_scheduler_edit->end_date->Required) { ?>
			elm = this.getElements("x" + infix + "_end_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->end_date->caption(), $_appointment_scheduler->end_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_end_date");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($_appointment_scheduler->end_date->errorMessage()) ?>");
		<?php if ($_appointment_scheduler_edit->patientID->Required) { ?>
			elm = this.getElements("x" + infix + "_patientID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->patientID->caption(), $_appointment_scheduler->patientID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_edit->patientName->Required) { ?>
			elm = this.getElements("x" + infix + "_patientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->patientName->caption(), $_appointment_scheduler->patientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_edit->DoctorID->Required) { ?>
			elm = this.getElements("x" + infix + "_DoctorID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->DoctorID->caption(), $_appointment_scheduler->DoctorID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_edit->DoctorName->Required) { ?>
			elm = this.getElements("x" + infix + "_DoctorName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->DoctorName->caption(), $_appointment_scheduler->DoctorName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_edit->AppointmentStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_AppointmentStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->AppointmentStatus->caption(), $_appointment_scheduler->AppointmentStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_edit->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->status->caption(), $_appointment_scheduler->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_edit->DoctorCode->Required) { ?>
			elm = this.getElements("x" + infix + "_DoctorCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->DoctorCode->caption(), $_appointment_scheduler->DoctorCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_edit->Department->Required) { ?>
			elm = this.getElements("x" + infix + "_Department");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->Department->caption(), $_appointment_scheduler->Department->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_edit->scheduler_id->Required) { ?>
			elm = this.getElements("x" + infix + "_scheduler_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->scheduler_id->caption(), $_appointment_scheduler->scheduler_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_edit->text->Required) { ?>
			elm = this.getElements("x" + infix + "_text");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->text->caption(), $_appointment_scheduler->text->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_edit->appointment_status->Required) { ?>
			elm = this.getElements("x" + infix + "_appointment_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->appointment_status->caption(), $_appointment_scheduler->appointment_status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_edit->PId->Required) { ?>
			elm = this.getElements("x" + infix + "_PId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->PId->caption(), $_appointment_scheduler->PId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($_appointment_scheduler->PId->errorMessage()) ?>");
		<?php if ($_appointment_scheduler_edit->MobileNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_MobileNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->MobileNumber->caption(), $_appointment_scheduler->MobileNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_edit->SchEmail->Required) { ?>
			elm = this.getElements("x" + infix + "_SchEmail");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->SchEmail->caption(), $_appointment_scheduler->SchEmail->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_edit->appointment_type->Required) { ?>
			elm = this.getElements("x" + infix + "_appointment_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->appointment_type->caption(), $_appointment_scheduler->appointment_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_edit->Notified->Required) { ?>
			elm = this.getElements("x" + infix + "_Notified[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->Notified->caption(), $_appointment_scheduler->Notified->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_edit->Purpose->Required) { ?>
			elm = this.getElements("x" + infix + "_Purpose");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->Purpose->caption(), $_appointment_scheduler->Purpose->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_edit->Notes->Required) { ?>
			elm = this.getElements("x" + infix + "_Notes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->Notes->caption(), $_appointment_scheduler->Notes->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_edit->PatientType->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->PatientType->caption(), $_appointment_scheduler->PatientType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_edit->Referal->Required) { ?>
			elm = this.getElements("x" + infix + "_Referal");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->Referal->caption(), $_appointment_scheduler->Referal->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_edit->paymentType->Required) { ?>
			elm = this.getElements("x" + infix + "_paymentType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->paymentType->caption(), $_appointment_scheduler->paymentType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_edit->tittle->Required) { ?>
			elm = this.getElements("x" + infix + "_tittle");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->tittle->caption(), $_appointment_scheduler->tittle->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_edit->gendar->Required) { ?>
			elm = this.getElements("x" + infix + "_gendar");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->gendar->caption(), $_appointment_scheduler->gendar->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_edit->Dob->Required) { ?>
			elm = this.getElements("x" + infix + "_Dob");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->Dob->caption(), $_appointment_scheduler->Dob->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_edit->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->Age->caption(), $_appointment_scheduler->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_edit->WhereDidYouHear->Required) { ?>
			elm = this.getElements("x" + infix + "_WhereDidYouHear[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->WhereDidYouHear->caption(), $_appointment_scheduler->WhereDidYouHear->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->HospID->caption(), $_appointment_scheduler->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_edit->createdBy->Required) { ?>
			elm = this.getElements("x" + infix + "_createdBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->createdBy->caption(), $_appointment_scheduler->createdBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_edit->createdDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_createdDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->createdDateTime->caption(), $_appointment_scheduler->createdDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_edit->PatientTypee->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientTypee");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->PatientTypee->caption(), $_appointment_scheduler->PatientTypee->RequiredErrorMessage)) ?>");
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
f_appointment_scheduleredit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
f_appointment_scheduleredit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
f_appointment_scheduleredit.lists["x_patientID"] = <?php echo $_appointment_scheduler_edit->patientID->Lookup->toClientList() ?>;
f_appointment_scheduleredit.lists["x_patientID"].options = <?php echo JsonEncode($_appointment_scheduler_edit->patientID->lookupOptions()) ?>;
f_appointment_scheduleredit.lists["x_DoctorName"] = <?php echo $_appointment_scheduler_edit->DoctorName->Lookup->toClientList() ?>;
f_appointment_scheduleredit.lists["x_DoctorName"].options = <?php echo JsonEncode($_appointment_scheduler_edit->DoctorName->lookupOptions()) ?>;
f_appointment_scheduleredit.lists["x_status[]"] = <?php echo $_appointment_scheduler_edit->status->Lookup->toClientList() ?>;
f_appointment_scheduleredit.lists["x_status[]"].options = <?php echo JsonEncode($_appointment_scheduler_edit->status->options(FALSE, TRUE)) ?>;
f_appointment_scheduleredit.lists["x_appointment_type"] = <?php echo $_appointment_scheduler_edit->appointment_type->Lookup->toClientList() ?>;
f_appointment_scheduleredit.lists["x_appointment_type"].options = <?php echo JsonEncode($_appointment_scheduler_edit->appointment_type->options(FALSE, TRUE)) ?>;
f_appointment_scheduleredit.lists["x_Notified[]"] = <?php echo $_appointment_scheduler_edit->Notified->Lookup->toClientList() ?>;
f_appointment_scheduleredit.lists["x_Notified[]"].options = <?php echo JsonEncode($_appointment_scheduler_edit->Notified->options(FALSE, TRUE)) ?>;
f_appointment_scheduleredit.lists["x_PatientType"] = <?php echo $_appointment_scheduler_edit->PatientType->Lookup->toClientList() ?>;
f_appointment_scheduleredit.lists["x_PatientType"].options = <?php echo JsonEncode($_appointment_scheduler_edit->PatientType->options(FALSE, TRUE)) ?>;
f_appointment_scheduleredit.lists["x_Referal"] = <?php echo $_appointment_scheduler_edit->Referal->Lookup->toClientList() ?>;
f_appointment_scheduleredit.lists["x_Referal"].options = <?php echo JsonEncode($_appointment_scheduler_edit->Referal->lookupOptions()) ?>;
f_appointment_scheduleredit.lists["x_tittle"] = <?php echo $_appointment_scheduler_edit->tittle->Lookup->toClientList() ?>;
f_appointment_scheduleredit.lists["x_tittle"].options = <?php echo JsonEncode($_appointment_scheduler_edit->tittle->lookupOptions()) ?>;
f_appointment_scheduleredit.lists["x_gendar"] = <?php echo $_appointment_scheduler_edit->gendar->Lookup->toClientList() ?>;
f_appointment_scheduleredit.lists["x_gendar"].options = <?php echo JsonEncode($_appointment_scheduler_edit->gendar->lookupOptions()) ?>;
f_appointment_scheduleredit.lists["x_WhereDidYouHear[]"] = <?php echo $_appointment_scheduler_edit->WhereDidYouHear->Lookup->toClientList() ?>;
f_appointment_scheduleredit.lists["x_WhereDidYouHear[]"].options = <?php echo JsonEncode($_appointment_scheduler_edit->WhereDidYouHear->lookupOptions()) ?>;
f_appointment_scheduleredit.lists["x_PatientTypee"] = <?php echo $_appointment_scheduler_edit->PatientTypee->Lookup->toClientList() ?>;
f_appointment_scheduleredit.lists["x_PatientTypee"].options = <?php echo JsonEncode($_appointment_scheduler_edit->PatientTypee->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $_appointment_scheduler_edit->showPageHeader(); ?>
<?php
$_appointment_scheduler_edit->showMessage();
?>
<form name="f_appointment_scheduleredit" id="f_appointment_scheduleredit" class="<?php echo $_appointment_scheduler_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($_appointment_scheduler_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $_appointment_scheduler_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="_appointment_scheduler">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$_appointment_scheduler_edit->IsModal ?>">
<?php if ($_appointment_scheduler->getCurrentMasterTable() == "doctors") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="doctors">
<input type="hidden" name="fk_id" value="<?php echo $_appointment_scheduler->DoctorID->getSessionValue() ?>">
<?php } ?>
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($_appointment_scheduler->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh__appointment_scheduler_id" class="<?php echo $_appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc__appointment_scheduler_id" class="_appointment_scheduleredit" type="text/html"><span><?php echo $_appointment_scheduler->id->caption() ?><?php echo ($_appointment_scheduler->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $_appointment_scheduler->id->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_id" class="_appointment_scheduleredit" type="text/html">
<span id="el__appointment_scheduler_id">
<span<?php echo $_appointment_scheduler->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($_appointment_scheduler->id->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($_appointment_scheduler->id->CurrentValue) ?>">
<?php echo $_appointment_scheduler->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($_appointment_scheduler->start_date->Visible) { // start_date ?>
	<div id="r_start_date" class="form-group row">
		<label id="elh__appointment_scheduler_start_date" for="x_start_date" class="<?php echo $_appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc__appointment_scheduler_start_date" class="_appointment_scheduleredit" type="text/html"><span><?php echo $_appointment_scheduler->start_date->caption() ?><?php echo ($_appointment_scheduler->start_date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $_appointment_scheduler->start_date->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_start_date" class="_appointment_scheduleredit" type="text/html">
<span id="el__appointment_scheduler_start_date">
<input type="text" data-table="_appointment_scheduler" data-field="x_start_date" data-format="11" name="x_start_date" id="x_start_date" placeholder="<?php echo HtmlEncode($_appointment_scheduler->start_date->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->start_date->EditValue ?>"<?php echo $_appointment_scheduler->start_date->editAttributes() ?>>
<?php if (!$_appointment_scheduler->start_date->ReadOnly && !$_appointment_scheduler->start_date->Disabled && !isset($_appointment_scheduler->start_date->EditAttrs["readonly"]) && !isset($_appointment_scheduler->start_date->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="_appointment_scheduleredit_js">
ew.createDateTimePicker("f_appointment_scheduleredit", "x_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php echo $_appointment_scheduler->start_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($_appointment_scheduler->end_date->Visible) { // end_date ?>
	<div id="r_end_date" class="form-group row">
		<label id="elh__appointment_scheduler_end_date" for="x_end_date" class="<?php echo $_appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc__appointment_scheduler_end_date" class="_appointment_scheduleredit" type="text/html"><span><?php echo $_appointment_scheduler->end_date->caption() ?><?php echo ($_appointment_scheduler->end_date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $_appointment_scheduler->end_date->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_end_date" class="_appointment_scheduleredit" type="text/html">
<span id="el__appointment_scheduler_end_date">
<input type="text" data-table="_appointment_scheduler" data-field="x_end_date" data-format="11" name="x_end_date" id="x_end_date" placeholder="<?php echo HtmlEncode($_appointment_scheduler->end_date->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->end_date->EditValue ?>"<?php echo $_appointment_scheduler->end_date->editAttributes() ?>>
<?php if (!$_appointment_scheduler->end_date->ReadOnly && !$_appointment_scheduler->end_date->Disabled && !isset($_appointment_scheduler->end_date->EditAttrs["readonly"]) && !isset($_appointment_scheduler->end_date->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="_appointment_scheduleredit_js">
ew.createDateTimePicker("f_appointment_scheduleredit", "x_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php echo $_appointment_scheduler->end_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($_appointment_scheduler->patientID->Visible) { // patientID ?>
	<div id="r_patientID" class="form-group row">
		<label id="elh__appointment_scheduler_patientID" for="x_patientID" class="<?php echo $_appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc__appointment_scheduler_patientID" class="_appointment_scheduleredit" type="text/html"><span><?php echo $_appointment_scheduler->patientID->caption() ?><?php echo ($_appointment_scheduler->patientID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $_appointment_scheduler->patientID->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_patientID" class="_appointment_scheduleredit" type="text/html">
<span id="el__appointment_scheduler_patientID">
<?php $_appointment_scheduler->patientID->EditAttrs["onchange"] = "ew.autoFill(this);" . @$_appointment_scheduler->patientID->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_patientID"><?php echo strval($_appointment_scheduler->patientID->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($_appointment_scheduler->patientID->ViewValue) : $_appointment_scheduler->patientID->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($_appointment_scheduler->patientID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($_appointment_scheduler->patientID->ReadOnly || $_appointment_scheduler->patientID->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_patientID',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $_appointment_scheduler->patientID->Lookup->getParamTag("p_x_patientID") ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_patientID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $_appointment_scheduler->patientID->displayValueSeparatorAttribute() ?>" name="x_patientID" id="x_patientID" value="<?php echo $_appointment_scheduler->patientID->CurrentValue ?>"<?php echo $_appointment_scheduler->patientID->editAttributes() ?>>
</span>
</script>
<?php echo $_appointment_scheduler->patientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($_appointment_scheduler->patientName->Visible) { // patientName ?>
	<div id="r_patientName" class="form-group row">
		<label id="elh__appointment_scheduler_patientName" for="x_patientName" class="<?php echo $_appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc__appointment_scheduler_patientName" class="_appointment_scheduleredit" type="text/html"><span><?php echo $_appointment_scheduler->patientName->caption() ?><?php echo ($_appointment_scheduler->patientName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $_appointment_scheduler->patientName->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_patientName" class="_appointment_scheduleredit" type="text/html">
<span id="el__appointment_scheduler_patientName">
<input type="text" data-table="_appointment_scheduler" data-field="x_patientName" name="x_patientName" id="x_patientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->patientName->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->patientName->EditValue ?>"<?php echo $_appointment_scheduler->patientName->editAttributes() ?>>
</span>
</script>
<?php echo $_appointment_scheduler->patientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($_appointment_scheduler->DoctorID->Visible) { // DoctorID ?>
	<div id="r_DoctorID" class="form-group row">
		<label id="elh__appointment_scheduler_DoctorID" for="x_DoctorID" class="<?php echo $_appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc__appointment_scheduler_DoctorID" class="_appointment_scheduleredit" type="text/html"><span><?php echo $_appointment_scheduler->DoctorID->caption() ?><?php echo ($_appointment_scheduler->DoctorID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $_appointment_scheduler->DoctorID->cellAttributes() ?>>
<?php if ($_appointment_scheduler->DoctorID->getSessionValue() <> "") { ?>
<script id="tpx__appointment_scheduler_DoctorID" class="_appointment_scheduleredit" type="text/html">
<span id="el__appointment_scheduler_DoctorID">
<span<?php echo $_appointment_scheduler->DoctorID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($_appointment_scheduler->DoctorID->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x_DoctorID" name="x_DoctorID" value="<?php echo HtmlEncode($_appointment_scheduler->DoctorID->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx__appointment_scheduler_DoctorID" class="_appointment_scheduleredit" type="text/html">
<span id="el__appointment_scheduler_DoctorID">
<input type="text" data-table="_appointment_scheduler" data-field="x_DoctorID" name="x_DoctorID" id="x_DoctorID" size="3" maxlength="5" placeholder="<?php echo HtmlEncode($_appointment_scheduler->DoctorID->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->DoctorID->EditValue ?>"<?php echo $_appointment_scheduler->DoctorID->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php echo $_appointment_scheduler->DoctorID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($_appointment_scheduler->DoctorName->Visible) { // DoctorName ?>
	<div id="r_DoctorName" class="form-group row">
		<label id="elh__appointment_scheduler_DoctorName" for="x_DoctorName" class="<?php echo $_appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc__appointment_scheduler_DoctorName" class="_appointment_scheduleredit" type="text/html"><span><?php echo $_appointment_scheduler->DoctorName->caption() ?><?php echo ($_appointment_scheduler->DoctorName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $_appointment_scheduler->DoctorName->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_DoctorName" class="_appointment_scheduleredit" type="text/html">
<span id="el__appointment_scheduler_DoctorName">
<?php $_appointment_scheduler->DoctorName->EditAttrs["onchange"] = "ew.autoFill(this);" . @$_appointment_scheduler->DoctorName->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DoctorName"><?php echo strval($_appointment_scheduler->DoctorName->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($_appointment_scheduler->DoctorName->ViewValue) : $_appointment_scheduler->DoctorName->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($_appointment_scheduler->DoctorName->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($_appointment_scheduler->DoctorName->ReadOnly || $_appointment_scheduler->DoctorName->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_DoctorName',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $_appointment_scheduler->DoctorName->Lookup->getParamTag("p_x_DoctorName") ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_DoctorName" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $_appointment_scheduler->DoctorName->displayValueSeparatorAttribute() ?>" name="x_DoctorName" id="x_DoctorName" value="<?php echo $_appointment_scheduler->DoctorName->CurrentValue ?>"<?php echo $_appointment_scheduler->DoctorName->editAttributes() ?>>
</span>
</script>
<?php echo $_appointment_scheduler->DoctorName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($_appointment_scheduler->AppointmentStatus->Visible) { // AppointmentStatus ?>
	<div id="r_AppointmentStatus" class="form-group row">
		<label id="elh__appointment_scheduler_AppointmentStatus" for="x_AppointmentStatus" class="<?php echo $_appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc__appointment_scheduler_AppointmentStatus" class="_appointment_scheduleredit" type="text/html"><span><?php echo $_appointment_scheduler->AppointmentStatus->caption() ?><?php echo ($_appointment_scheduler->AppointmentStatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $_appointment_scheduler->AppointmentStatus->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_AppointmentStatus" class="_appointment_scheduleredit" type="text/html">
<span id="el__appointment_scheduler_AppointmentStatus">
<input type="text" data-table="_appointment_scheduler" data-field="x_AppointmentStatus" name="x_AppointmentStatus" id="x_AppointmentStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->AppointmentStatus->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->AppointmentStatus->EditValue ?>"<?php echo $_appointment_scheduler->AppointmentStatus->editAttributes() ?>>
</span>
</script>
<?php echo $_appointment_scheduler->AppointmentStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($_appointment_scheduler->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh__appointment_scheduler_status" class="<?php echo $_appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc__appointment_scheduler_status" class="_appointment_scheduleredit" type="text/html"><span><?php echo $_appointment_scheduler->status->caption() ?><?php echo ($_appointment_scheduler->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $_appointment_scheduler->status->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_status" class="_appointment_scheduleredit" type="text/html">
<span id="el__appointment_scheduler_status">
<div id="tp_x_status" class="ew-template"><input type="checkbox" class="form-check-input" data-table="_appointment_scheduler" data-field="x_status" data-value-separator="<?php echo $_appointment_scheduler->status->displayValueSeparatorAttribute() ?>" name="x_status[]" id="x_status[]" value="{value}"<?php echo $_appointment_scheduler->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $_appointment_scheduler->status->checkBoxListHtml(FALSE, "x_status[]") ?>
</div></div>
</span>
</script>
<?php echo $_appointment_scheduler->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($_appointment_scheduler->DoctorCode->Visible) { // DoctorCode ?>
	<div id="r_DoctorCode" class="form-group row">
		<label id="elh__appointment_scheduler_DoctorCode" for="x_DoctorCode" class="<?php echo $_appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc__appointment_scheduler_DoctorCode" class="_appointment_scheduleredit" type="text/html"><span><?php echo $_appointment_scheduler->DoctorCode->caption() ?><?php echo ($_appointment_scheduler->DoctorCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $_appointment_scheduler->DoctorCode->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_DoctorCode" class="_appointment_scheduleredit" type="text/html">
<span id="el__appointment_scheduler_DoctorCode">
<input type="text" data-table="_appointment_scheduler" data-field="x_DoctorCode" name="x_DoctorCode" id="x_DoctorCode" size="5" maxlength="7" placeholder="<?php echo HtmlEncode($_appointment_scheduler->DoctorCode->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->DoctorCode->EditValue ?>"<?php echo $_appointment_scheduler->DoctorCode->editAttributes() ?>>
</span>
</script>
<?php echo $_appointment_scheduler->DoctorCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($_appointment_scheduler->Department->Visible) { // Department ?>
	<div id="r_Department" class="form-group row">
		<label id="elh__appointment_scheduler_Department" for="x_Department" class="<?php echo $_appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc__appointment_scheduler_Department" class="_appointment_scheduleredit" type="text/html"><span><?php echo $_appointment_scheduler->Department->caption() ?><?php echo ($_appointment_scheduler->Department->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $_appointment_scheduler->Department->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_Department" class="_appointment_scheduleredit" type="text/html">
<span id="el__appointment_scheduler_Department">
<input type="text" data-table="_appointment_scheduler" data-field="x_Department" name="x_Department" id="x_Department" size="8" maxlength="15" placeholder="<?php echo HtmlEncode($_appointment_scheduler->Department->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->Department->EditValue ?>"<?php echo $_appointment_scheduler->Department->editAttributes() ?>>
</span>
</script>
<?php echo $_appointment_scheduler->Department->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($_appointment_scheduler->scheduler_id->Visible) { // scheduler_id ?>
	<div id="r_scheduler_id" class="form-group row">
		<label id="elh__appointment_scheduler_scheduler_id" for="x_scheduler_id" class="<?php echo $_appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc__appointment_scheduler_scheduler_id" class="_appointment_scheduleredit" type="text/html"><span><?php echo $_appointment_scheduler->scheduler_id->caption() ?><?php echo ($_appointment_scheduler->scheduler_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $_appointment_scheduler->scheduler_id->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_scheduler_id" class="_appointment_scheduleredit" type="text/html">
<span id="el__appointment_scheduler_scheduler_id">
<span<?php echo $_appointment_scheduler->scheduler_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($_appointment_scheduler->scheduler_id->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_scheduler_id" name="x_scheduler_id" id="x_scheduler_id" value="<?php echo HtmlEncode($_appointment_scheduler->scheduler_id->CurrentValue) ?>">
<?php echo $_appointment_scheduler->scheduler_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($_appointment_scheduler->text->Visible) { // text ?>
	<div id="r_text" class="form-group row">
		<label id="elh__appointment_scheduler_text" for="x_text" class="<?php echo $_appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc__appointment_scheduler_text" class="_appointment_scheduleredit" type="text/html"><span><?php echo $_appointment_scheduler->text->caption() ?><?php echo ($_appointment_scheduler->text->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $_appointment_scheduler->text->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_text" class="_appointment_scheduleredit" type="text/html">
<span id="el__appointment_scheduler_text">
<input type="text" data-table="_appointment_scheduler" data-field="x_text" name="x_text" id="x_text" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->text->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->text->EditValue ?>"<?php echo $_appointment_scheduler->text->editAttributes() ?>>
</span>
</script>
<?php echo $_appointment_scheduler->text->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($_appointment_scheduler->appointment_status->Visible) { // appointment_status ?>
	<div id="r_appointment_status" class="form-group row">
		<label id="elh__appointment_scheduler_appointment_status" for="x_appointment_status" class="<?php echo $_appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc__appointment_scheduler_appointment_status" class="_appointment_scheduleredit" type="text/html"><span><?php echo $_appointment_scheduler->appointment_status->caption() ?><?php echo ($_appointment_scheduler->appointment_status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $_appointment_scheduler->appointment_status->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_appointment_status" class="_appointment_scheduleredit" type="text/html">
<span id="el__appointment_scheduler_appointment_status">
<input type="text" data-table="_appointment_scheduler" data-field="x_appointment_status" name="x_appointment_status" id="x_appointment_status" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->appointment_status->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->appointment_status->EditValue ?>"<?php echo $_appointment_scheduler->appointment_status->editAttributes() ?>>
</span>
</script>
<?php echo $_appointment_scheduler->appointment_status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($_appointment_scheduler->PId->Visible) { // PId ?>
	<div id="r_PId" class="form-group row">
		<label id="elh__appointment_scheduler_PId" for="x_PId" class="<?php echo $_appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc__appointment_scheduler_PId" class="_appointment_scheduleredit" type="text/html"><span><?php echo $_appointment_scheduler->PId->caption() ?><?php echo ($_appointment_scheduler->PId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $_appointment_scheduler->PId->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_PId" class="_appointment_scheduleredit" type="text/html">
<span id="el__appointment_scheduler_PId">
<input type="text" data-table="_appointment_scheduler" data-field="x_PId" name="x_PId" id="x_PId" size="30" placeholder="<?php echo HtmlEncode($_appointment_scheduler->PId->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->PId->EditValue ?>"<?php echo $_appointment_scheduler->PId->editAttributes() ?>>
</span>
</script>
<?php echo $_appointment_scheduler->PId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($_appointment_scheduler->MobileNumber->Visible) { // MobileNumber ?>
	<div id="r_MobileNumber" class="form-group row">
		<label id="elh__appointment_scheduler_MobileNumber" for="x_MobileNumber" class="<?php echo $_appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc__appointment_scheduler_MobileNumber" class="_appointment_scheduleredit" type="text/html"><span><?php echo $_appointment_scheduler->MobileNumber->caption() ?><?php echo ($_appointment_scheduler->MobileNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $_appointment_scheduler->MobileNumber->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_MobileNumber" class="_appointment_scheduleredit" type="text/html">
<span id="el__appointment_scheduler_MobileNumber">
<input type="text" data-table="_appointment_scheduler" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->MobileNumber->EditValue ?>"<?php echo $_appointment_scheduler->MobileNumber->editAttributes() ?>>
</span>
</script>
<?php echo $_appointment_scheduler->MobileNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($_appointment_scheduler->SchEmail->Visible) { // SchEmail ?>
	<div id="r_SchEmail" class="form-group row">
		<label id="elh__appointment_scheduler_SchEmail" for="x_SchEmail" class="<?php echo $_appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc__appointment_scheduler_SchEmail" class="_appointment_scheduleredit" type="text/html"><span><?php echo $_appointment_scheduler->SchEmail->caption() ?><?php echo ($_appointment_scheduler->SchEmail->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $_appointment_scheduler->SchEmail->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_SchEmail" class="_appointment_scheduleredit" type="text/html">
<span id="el__appointment_scheduler_SchEmail">
<input type="text" data-table="_appointment_scheduler" data-field="x_SchEmail" name="x_SchEmail" id="x_SchEmail" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->SchEmail->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->SchEmail->EditValue ?>"<?php echo $_appointment_scheduler->SchEmail->editAttributes() ?>>
</span>
</script>
<?php echo $_appointment_scheduler->SchEmail->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($_appointment_scheduler->appointment_type->Visible) { // appointment_type ?>
	<div id="r_appointment_type" class="form-group row">
		<label id="elh__appointment_scheduler_appointment_type" class="<?php echo $_appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc__appointment_scheduler_appointment_type" class="_appointment_scheduleredit" type="text/html"><span><?php echo $_appointment_scheduler->appointment_type->caption() ?><?php echo ($_appointment_scheduler->appointment_type->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $_appointment_scheduler->appointment_type->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_appointment_type" class="_appointment_scheduleredit" type="text/html">
<span id="el__appointment_scheduler_appointment_type">
<div id="tp_x_appointment_type" class="ew-template"><input type="radio" class="form-check-input" data-table="_appointment_scheduler" data-field="x_appointment_type" data-value-separator="<?php echo $_appointment_scheduler->appointment_type->displayValueSeparatorAttribute() ?>" name="x_appointment_type" id="x_appointment_type" value="{value}"<?php echo $_appointment_scheduler->appointment_type->editAttributes() ?>></div>
<div id="dsl_x_appointment_type" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $_appointment_scheduler->appointment_type->radioButtonListHtml(FALSE, "x_appointment_type") ?>
</div></div>
</span>
</script>
<?php echo $_appointment_scheduler->appointment_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($_appointment_scheduler->Notified->Visible) { // Notified ?>
	<div id="r_Notified" class="form-group row">
		<label id="elh__appointment_scheduler_Notified" class="<?php echo $_appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc__appointment_scheduler_Notified" class="_appointment_scheduleredit" type="text/html"><span><?php echo $_appointment_scheduler->Notified->caption() ?><?php echo ($_appointment_scheduler->Notified->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $_appointment_scheduler->Notified->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_Notified" class="_appointment_scheduleredit" type="text/html">
<span id="el__appointment_scheduler_Notified">
<div id="tp_x_Notified" class="ew-template"><input type="checkbox" class="form-check-input" data-table="_appointment_scheduler" data-field="x_Notified" data-value-separator="<?php echo $_appointment_scheduler->Notified->displayValueSeparatorAttribute() ?>" name="x_Notified[]" id="x_Notified[]" value="{value}"<?php echo $_appointment_scheduler->Notified->editAttributes() ?>></div>
<div id="dsl_x_Notified" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $_appointment_scheduler->Notified->checkBoxListHtml(FALSE, "x_Notified[]") ?>
</div></div>
</span>
</script>
<?php echo $_appointment_scheduler->Notified->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($_appointment_scheduler->Purpose->Visible) { // Purpose ?>
	<div id="r_Purpose" class="form-group row">
		<label id="elh__appointment_scheduler_Purpose" for="x_Purpose" class="<?php echo $_appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc__appointment_scheduler_Purpose" class="_appointment_scheduleredit" type="text/html"><span><?php echo $_appointment_scheduler->Purpose->caption() ?><?php echo ($_appointment_scheduler->Purpose->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $_appointment_scheduler->Purpose->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_Purpose" class="_appointment_scheduleredit" type="text/html">
<span id="el__appointment_scheduler_Purpose">
<input type="text" data-table="_appointment_scheduler" data-field="x_Purpose" name="x_Purpose" id="x_Purpose" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->Purpose->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->Purpose->EditValue ?>"<?php echo $_appointment_scheduler->Purpose->editAttributes() ?>>
</span>
</script>
<?php echo $_appointment_scheduler->Purpose->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($_appointment_scheduler->Notes->Visible) { // Notes ?>
	<div id="r_Notes" class="form-group row">
		<label id="elh__appointment_scheduler_Notes" for="x_Notes" class="<?php echo $_appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc__appointment_scheduler_Notes" class="_appointment_scheduleredit" type="text/html"><span><?php echo $_appointment_scheduler->Notes->caption() ?><?php echo ($_appointment_scheduler->Notes->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $_appointment_scheduler->Notes->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_Notes" class="_appointment_scheduleredit" type="text/html">
<span id="el__appointment_scheduler_Notes">
<input type="text" data-table="_appointment_scheduler" data-field="x_Notes" name="x_Notes" id="x_Notes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->Notes->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->Notes->EditValue ?>"<?php echo $_appointment_scheduler->Notes->editAttributes() ?>>
</span>
</script>
<?php echo $_appointment_scheduler->Notes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($_appointment_scheduler->PatientType->Visible) { // PatientType ?>
	<div id="r_PatientType" class="form-group row">
		<label id="elh__appointment_scheduler_PatientType" class="<?php echo $_appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc__appointment_scheduler_PatientType" class="_appointment_scheduleredit" type="text/html"><span><?php echo $_appointment_scheduler->PatientType->caption() ?><?php echo ($_appointment_scheduler->PatientType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $_appointment_scheduler->PatientType->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_PatientType" class="_appointment_scheduleredit" type="text/html">
<span id="el__appointment_scheduler_PatientType">
<?php $_appointment_scheduler->PatientType->EditAttrs["onclick"] = "ew.updateOptions.call(this); " . @$_appointment_scheduler->PatientType->EditAttrs["onclick"]; ?>
<div id="tp_x_PatientType" class="ew-template"><input type="radio" class="form-check-input" data-table="_appointment_scheduler" data-field="x_PatientType" data-value-separator="<?php echo $_appointment_scheduler->PatientType->displayValueSeparatorAttribute() ?>" name="x_PatientType" id="x_PatientType" value="{value}"<?php echo $_appointment_scheduler->PatientType->editAttributes() ?>></div>
<div id="dsl_x_PatientType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $_appointment_scheduler->PatientType->radioButtonListHtml(FALSE, "x_PatientType") ?>
</div></div>
</span>
</script>
<?php echo $_appointment_scheduler->PatientType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($_appointment_scheduler->Referal->Visible) { // Referal ?>
	<div id="r_Referal" class="form-group row">
		<label id="elh__appointment_scheduler_Referal" for="x_Referal" class="<?php echo $_appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc__appointment_scheduler_Referal" class="_appointment_scheduleredit" type="text/html"><span><?php echo $_appointment_scheduler->Referal->caption() ?><?php echo ($_appointment_scheduler->Referal->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $_appointment_scheduler->Referal->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_Referal" class="_appointment_scheduleredit" type="text/html">
<span id="el__appointment_scheduler_Referal">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Referal"><?php echo strval($_appointment_scheduler->Referal->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($_appointment_scheduler->Referal->ViewValue) : $_appointment_scheduler->Referal->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($_appointment_scheduler->Referal->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($_appointment_scheduler->Referal->ReadOnly || $_appointment_scheduler->Referal->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_Referal',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
<?php if (AllowAdd(CurrentProjectID() . "mas_reference_type") && !$_appointment_scheduler->Referal->ReadOnly) { ?>
<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Referal" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $_appointment_scheduler->Referal->caption() ?>" data-title="<?php echo $_appointment_scheduler->Referal->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Referal',url:'mas_reference_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button>
<?php } ?>
	</div>
</div>
<?php echo $_appointment_scheduler->Referal->Lookup->getParamTag("p_x_Referal") ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Referal" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $_appointment_scheduler->Referal->displayValueSeparatorAttribute() ?>" name="x_Referal" id="x_Referal" value="<?php echo $_appointment_scheduler->Referal->CurrentValue ?>"<?php echo $_appointment_scheduler->Referal->editAttributes() ?>>
</span>
</script>
<?php echo $_appointment_scheduler->Referal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($_appointment_scheduler->paymentType->Visible) { // paymentType ?>
	<div id="r_paymentType" class="form-group row">
		<label id="elh__appointment_scheduler_paymentType" for="x_paymentType" class="<?php echo $_appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc__appointment_scheduler_paymentType" class="_appointment_scheduleredit" type="text/html"><span><?php echo $_appointment_scheduler->paymentType->caption() ?><?php echo ($_appointment_scheduler->paymentType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $_appointment_scheduler->paymentType->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_paymentType" class="_appointment_scheduleredit" type="text/html">
<span id="el__appointment_scheduler_paymentType">
<input type="text" data-table="_appointment_scheduler" data-field="x_paymentType" name="x_paymentType" id="x_paymentType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->paymentType->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->paymentType->EditValue ?>"<?php echo $_appointment_scheduler->paymentType->editAttributes() ?>>
</span>
</script>
<?php echo $_appointment_scheduler->paymentType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($_appointment_scheduler->tittle->Visible) { // tittle ?>
	<div id="r_tittle" class="form-group row">
		<label id="elh__appointment_scheduler_tittle" for="x_tittle" class="<?php echo $_appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc__appointment_scheduler_tittle" class="_appointment_scheduleredit" type="text/html"><span><?php echo $_appointment_scheduler->tittle->caption() ?><?php echo ($_appointment_scheduler->tittle->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $_appointment_scheduler->tittle->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_tittle" class="_appointment_scheduleredit" type="text/html">
<span id="el__appointment_scheduler_tittle">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="_appointment_scheduler" data-field="x_tittle" data-value-separator="<?php echo $_appointment_scheduler->tittle->displayValueSeparatorAttribute() ?>" id="x_tittle" name="x_tittle"<?php echo $_appointment_scheduler->tittle->editAttributes() ?>>
		<?php echo $_appointment_scheduler->tittle->selectOptionListHtml("x_tittle") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "sys_tittle") && !$_appointment_scheduler->tittle->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_tittle" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $_appointment_scheduler->tittle->caption() ?>" data-title="<?php echo $_appointment_scheduler->tittle->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_tittle',url:'sys_tittleaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $_appointment_scheduler->tittle->Lookup->getParamTag("p_x_tittle") ?>
</span>
</script>
<?php echo $_appointment_scheduler->tittle->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($_appointment_scheduler->gendar->Visible) { // gendar ?>
	<div id="r_gendar" class="form-group row">
		<label id="elh__appointment_scheduler_gendar" for="x_gendar" class="<?php echo $_appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc__appointment_scheduler_gendar" class="_appointment_scheduleredit" type="text/html"><span><?php echo $_appointment_scheduler->gendar->caption() ?><?php echo ($_appointment_scheduler->gendar->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $_appointment_scheduler->gendar->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_gendar" class="_appointment_scheduleredit" type="text/html">
<span id="el__appointment_scheduler_gendar">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="_appointment_scheduler" data-field="x_gendar" data-value-separator="<?php echo $_appointment_scheduler->gendar->displayValueSeparatorAttribute() ?>" id="x_gendar" name="x_gendar"<?php echo $_appointment_scheduler->gendar->editAttributes() ?>>
		<?php echo $_appointment_scheduler->gendar->selectOptionListHtml("x_gendar") ?>
	</select>
</div>
<?php echo $_appointment_scheduler->gendar->Lookup->getParamTag("p_x_gendar") ?>
</span>
</script>
<?php echo $_appointment_scheduler->gendar->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($_appointment_scheduler->Dob->Visible) { // Dob ?>
	<div id="r_Dob" class="form-group row">
		<label id="elh__appointment_scheduler_Dob" for="x_Dob" class="<?php echo $_appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc__appointment_scheduler_Dob" class="_appointment_scheduleredit" type="text/html"><span><?php echo $_appointment_scheduler->Dob->caption() ?><?php echo ($_appointment_scheduler->Dob->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $_appointment_scheduler->Dob->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_Dob" class="_appointment_scheduleredit" type="text/html">
<span id="el__appointment_scheduler_Dob">
<input type="text" data-table="_appointment_scheduler" data-field="x_Dob" name="x_Dob" id="x_Dob" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->Dob->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->Dob->EditValue ?>"<?php echo $_appointment_scheduler->Dob->editAttributes() ?>>
<?php if (!$_appointment_scheduler->Dob->ReadOnly && !$_appointment_scheduler->Dob->Disabled && !isset($_appointment_scheduler->Dob->EditAttrs["readonly"]) && !isset($_appointment_scheduler->Dob->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="_appointment_scheduleredit_js">
ew.createDateTimePicker("f_appointment_scheduleredit", "x_Dob", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $_appointment_scheduler->Dob->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($_appointment_scheduler->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh__appointment_scheduler_Age" for="x_Age" class="<?php echo $_appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc__appointment_scheduler_Age" class="_appointment_scheduleredit" type="text/html"><span><?php echo $_appointment_scheduler->Age->caption() ?><?php echo ($_appointment_scheduler->Age->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $_appointment_scheduler->Age->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_Age" class="_appointment_scheduleredit" type="text/html">
<span id="el__appointment_scheduler_Age">
<input type="text" data-table="_appointment_scheduler" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->Age->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->Age->EditValue ?>"<?php echo $_appointment_scheduler->Age->editAttributes() ?>>
</span>
</script>
<?php echo $_appointment_scheduler->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($_appointment_scheduler->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<div id="r_WhereDidYouHear" class="form-group row">
		<label id="elh__appointment_scheduler_WhereDidYouHear" class="<?php echo $_appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc__appointment_scheduler_WhereDidYouHear" class="_appointment_scheduleredit" type="text/html"><span><?php echo $_appointment_scheduler->WhereDidYouHear->caption() ?><?php echo ($_appointment_scheduler->WhereDidYouHear->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $_appointment_scheduler->WhereDidYouHear->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_WhereDidYouHear" class="_appointment_scheduleredit" type="text/html">
<span id="el__appointment_scheduler_WhereDidYouHear">
<div id="tp_x_WhereDidYouHear" class="ew-template"><input type="checkbox" class="form-check-input" data-table="_appointment_scheduler" data-field="x_WhereDidYouHear" data-value-separator="<?php echo $_appointment_scheduler->WhereDidYouHear->displayValueSeparatorAttribute() ?>" name="x_WhereDidYouHear[]" id="x_WhereDidYouHear[]" value="{value}"<?php echo $_appointment_scheduler->WhereDidYouHear->editAttributes() ?>></div>
<div id="dsl_x_WhereDidYouHear" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $_appointment_scheduler->WhereDidYouHear->checkBoxListHtml(FALSE, "x_WhereDidYouHear[]") ?>
</div></div>
<?php echo $_appointment_scheduler->WhereDidYouHear->Lookup->getParamTag("p_x_WhereDidYouHear") ?>
</span>
</script>
<?php echo $_appointment_scheduler->WhereDidYouHear->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($_appointment_scheduler->PatientTypee->Visible) { // PatientTypee ?>
	<div id="r_PatientTypee" class="form-group row">
		<label id="elh__appointment_scheduler_PatientTypee" for="x_PatientTypee" class="<?php echo $_appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc__appointment_scheduler_PatientTypee" class="_appointment_scheduleredit" type="text/html"><span><?php echo $_appointment_scheduler->PatientTypee->caption() ?><?php echo ($_appointment_scheduler->PatientTypee->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $_appointment_scheduler_edit->RightColumnClass ?>"><div<?php echo $_appointment_scheduler->PatientTypee->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_PatientTypee" class="_appointment_scheduleredit" type="text/html">
<span id="el__appointment_scheduler_PatientTypee">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="_appointment_scheduler" data-field="x_PatientTypee" data-value-separator="<?php echo $_appointment_scheduler->PatientTypee->displayValueSeparatorAttribute() ?>" id="x_PatientTypee" name="x_PatientTypee"<?php echo $_appointment_scheduler->PatientTypee->editAttributes() ?>>
		<?php echo $_appointment_scheduler->PatientTypee->selectOptionListHtml("x_PatientTypee") ?>
	</select>
</div>
<?php echo $_appointment_scheduler->PatientTypee->Lookup->getParamTag("p_x_PatientTypee") ?>
</span>
</script>
<?php echo $_appointment_scheduler->PatientTypee->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd__appointment_scheduleredit" class="ew-custom-template"></div>
<script id="tpm__appointment_scheduleredit" type="text/html">
<div id="ct__appointment_scheduler_edit"><style type="text/css" >
.form-control {
	display: table;
	max-width: none;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
input[type=text]:not([size]):not([name=pageno]):not(.cke_dialog_ui_input_text):not(.form-control-plaintext), input[type=password]:not([size]) {
	min-width: 92%;
}
@media (min-width: 576px)
input[type=text]:not([size]):not([name=pageno]):not(.cke_dialog_ui_input_text):not(.form-control-plaintext), input[type=password]:not([size]) {
	min-width: 92%;
}
.input-group>.form-control.ew-lookup-text {
	width: 80%;
}
@media (min-width: 576px)
.input-group>.form-control.ew-lookup-text {
	width: 80%;
}
.input-group {
	position: relative;
	display: flex;
	flex-wrap: nowrap;
	align-items: stretch;
	width: 80%;
}
</style>
<table class="ew-table" style="width:100%;">
	 <tbody>
		<tr><td class="bg-warning text-warning">{{include tmpl="#tpc__appointment_scheduler_start_date"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_start_date"/}}</td><td class="bg-warning text-warning">{{include tmpl="#tpc__appointment_scheduler_end_date"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_end_date"/}}</td><td>{{include tmpl="#tpc__appointment_scheduler_PatientType"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_PatientType"/}}</td></tr>
	</tbody>
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>
	 	<tr>
		<td>{{include tmpl="#tpc__appointment_scheduler_patientID"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_patientID"/}}</td><td>{{include tmpl="#tpc__appointment_scheduler_patientName"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_patientName"/}}</td>
		<td>{{include tmpl="#tpc__appointment_scheduler_PatientTypee"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_PatientTypee"/}}</td>
	</tr>
	</tbody>
</table>
<table id="addNewPatient" class="ew-table"  style="width:100%;background-color:#FF33A8;">
	 <tbody>	
		<tr>
			<td  name="addNewPatient">{{include tmpl="#tpc__appointment_scheduler_tittle"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_tittle"/}}</td>
			<td>
			{{include tmpl="#tpc__appointment_scheduler_gendar"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_gendar"/}}
</td>
			<td>
			{{include tmpl="#tpc__appointment_scheduler_Dob"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_Dob"/}}
			</td>
			<td>
			{{include tmpl="#tpc__appointment_scheduler_Age"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_Age"/}}
			</td>
			<td>
			<a href="patientadd.php?pagetoredirect=appointment_scheduler" id="addNewPatientSer" name="addNewPatientSer" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">More</a>
			</td>
		</tr>
	</tbody>	
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>
		<tr><td>{{include tmpl="#tpc__appointment_scheduler_PId"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_PId"/}}</td><td>{{include tmpl="#tpc__appointment_scheduler_MobileNumber"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_MobileNumber"/}}</td></tr>
		<tr><td>{{include tmpl="#tpc__appointment_scheduler_SchEmail"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_SchEmail"/}}</td><td>{{include tmpl="#tpc__appointment_scheduler_Notes"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_Notes"/}}</td></tr>
	</tbody>
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>
		<tr><td class="bg-success text-success">{{include tmpl="#tpc__appointment_scheduler_DoctorID"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_DoctorID"/}}</td><td class="bg-success text-success">{{include tmpl="#tpc__appointment_scheduler_DoctorName"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_DoctorName"/}}</td>
		<td class="bg-success text-success">{{include tmpl="#tpc__appointment_scheduler_DoctorCode"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_DoctorCode"/}}</td><td class="bg-success text-success">{{include tmpl="#tpc__appointment_scheduler_Department"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_Department"/}}</td></tr>
	</tbody>
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>
		<tr><td class="bg-danger text-danger">{{include tmpl="#tpc__appointment_scheduler_Referal"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_Referal"/}}</td><td class="bg-danger text-danger">{{include tmpl="#tpc__appointment_scheduler_Purpose"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_Purpose"/}}</td></tr>
	</tbody>
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>	
		<tr>
			<td>{{include tmpl="#tpc__appointment_scheduler_WhereDidYouHear"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_WhereDidYouHear"/}}</td>
		</tr>
				<tr>
			<td>{{include tmpl="#tpc__appointment_scheduler_status"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_status"/}}</td>
		</tr>
	</tbody>
</table>
</div>
</script>
<?php if (!$_appointment_scheduler_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $_appointment_scheduler_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $_appointment_scheduler_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($_appointment_scheduler->Rows) ?> };
ew.applyTemplate("tpd__appointment_scheduleredit", "tpm__appointment_scheduleredit", "_appointment_scheduleredit", "<?php echo $_appointment_scheduler->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script._appointment_scheduleredit_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$_appointment_scheduler_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");
// Write your table-specific startup script here
// document.write("page loaded");

$('#addNewPatient').hide();

//document.getElementById("f_appointment_scheduleradd").style.width = "100%";
$('#x_DoctorID').prop('readonly', true);
$('#x_Department').prop('readonly', true);
$('#x_PId').prop('readonly', true);
$('#x_DoctorCode').attr('readonly', true);
</script>
<?php include_once "footer.php" ?>
<?php
$_appointment_scheduler_edit->terminate();
?>