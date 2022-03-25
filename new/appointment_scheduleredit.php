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
$appointment_scheduler_edit = new appointment_scheduler_edit();

// Run the page
$appointment_scheduler_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$appointment_scheduler_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fappointment_scheduleredit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fappointment_scheduleredit = currentForm = new ew.Form("fappointment_scheduleredit", "edit");

	// Validate form
	fappointment_scheduleredit.validate = function() {
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
			<?php if ($appointment_scheduler_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_edit->id->caption(), $appointment_scheduler_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_edit->start_date->Required) { ?>
				elm = this.getElements("x" + infix + "_start_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_edit->start_date->caption(), $appointment_scheduler_edit->start_date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_start_date");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($appointment_scheduler_edit->start_date->errorMessage()) ?>");
			<?php if ($appointment_scheduler_edit->end_date->Required) { ?>
				elm = this.getElements("x" + infix + "_end_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_edit->end_date->caption(), $appointment_scheduler_edit->end_date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_end_date");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($appointment_scheduler_edit->end_date->errorMessage()) ?>");
			<?php if ($appointment_scheduler_edit->patientID->Required) { ?>
				elm = this.getElements("x" + infix + "_patientID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_edit->patientID->caption(), $appointment_scheduler_edit->patientID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_edit->patientName->Required) { ?>
				elm = this.getElements("x" + infix + "_patientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_edit->patientName->caption(), $appointment_scheduler_edit->patientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_edit->DoctorID->Required) { ?>
				elm = this.getElements("x" + infix + "_DoctorID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_edit->DoctorID->caption(), $appointment_scheduler_edit->DoctorID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_edit->DoctorName->Required) { ?>
				elm = this.getElements("x" + infix + "_DoctorName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_edit->DoctorName->caption(), $appointment_scheduler_edit->DoctorName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_edit->AppointmentStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_AppointmentStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_edit->AppointmentStatus->caption(), $appointment_scheduler_edit->AppointmentStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_edit->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_edit->status->caption(), $appointment_scheduler_edit->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_edit->DoctorCode->Required) { ?>
				elm = this.getElements("x" + infix + "_DoctorCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_edit->DoctorCode->caption(), $appointment_scheduler_edit->DoctorCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_edit->Department->Required) { ?>
				elm = this.getElements("x" + infix + "_Department");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_edit->Department->caption(), $appointment_scheduler_edit->Department->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_edit->scheduler_id->Required) { ?>
				elm = this.getElements("x" + infix + "_scheduler_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_edit->scheduler_id->caption(), $appointment_scheduler_edit->scheduler_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_edit->text->Required) { ?>
				elm = this.getElements("x" + infix + "_text");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_edit->text->caption(), $appointment_scheduler_edit->text->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_edit->appointment_status->Required) { ?>
				elm = this.getElements("x" + infix + "_appointment_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_edit->appointment_status->caption(), $appointment_scheduler_edit->appointment_status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_edit->PId->Required) { ?>
				elm = this.getElements("x" + infix + "_PId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_edit->PId->caption(), $appointment_scheduler_edit->PId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($appointment_scheduler_edit->PId->errorMessage()) ?>");
			<?php if ($appointment_scheduler_edit->MobileNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_MobileNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_edit->MobileNumber->caption(), $appointment_scheduler_edit->MobileNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_edit->SchEmail->Required) { ?>
				elm = this.getElements("x" + infix + "_SchEmail");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_edit->SchEmail->caption(), $appointment_scheduler_edit->SchEmail->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_edit->appointment_type->Required) { ?>
				elm = this.getElements("x" + infix + "_appointment_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_edit->appointment_type->caption(), $appointment_scheduler_edit->appointment_type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_edit->Notified->Required) { ?>
				elm = this.getElements("x" + infix + "_Notified[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_edit->Notified->caption(), $appointment_scheduler_edit->Notified->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_edit->Purpose->Required) { ?>
				elm = this.getElements("x" + infix + "_Purpose");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_edit->Purpose->caption(), $appointment_scheduler_edit->Purpose->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_edit->Notes->Required) { ?>
				elm = this.getElements("x" + infix + "_Notes");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_edit->Notes->caption(), $appointment_scheduler_edit->Notes->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_edit->PatientType->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_edit->PatientType->caption(), $appointment_scheduler_edit->PatientType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_edit->Referal->Required) { ?>
				elm = this.getElements("x" + infix + "_Referal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_edit->Referal->caption(), $appointment_scheduler_edit->Referal->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_edit->paymentType->Required) { ?>
				elm = this.getElements("x" + infix + "_paymentType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_edit->paymentType->caption(), $appointment_scheduler_edit->paymentType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_edit->tittle->Required) { ?>
				elm = this.getElements("x" + infix + "_tittle");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_edit->tittle->caption(), $appointment_scheduler_edit->tittle->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_edit->gendar->Required) { ?>
				elm = this.getElements("x" + infix + "_gendar");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_edit->gendar->caption(), $appointment_scheduler_edit->gendar->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_edit->Dob->Required) { ?>
				elm = this.getElements("x" + infix + "_Dob");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_edit->Dob->caption(), $appointment_scheduler_edit->Dob->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_edit->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_edit->Age->caption(), $appointment_scheduler_edit->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_edit->WhereDidYouHear->Required) { ?>
				elm = this.getElements("x" + infix + "_WhereDidYouHear[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_edit->WhereDidYouHear->caption(), $appointment_scheduler_edit->WhereDidYouHear->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_edit->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_edit->HospID->caption(), $appointment_scheduler_edit->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_edit->createdBy->Required) { ?>
				elm = this.getElements("x" + infix + "_createdBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_edit->createdBy->caption(), $appointment_scheduler_edit->createdBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_edit->createdDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_createdDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_edit->createdDateTime->caption(), $appointment_scheduler_edit->createdDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_edit->PatientTypee->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientTypee");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_edit->PatientTypee->caption(), $appointment_scheduler_edit->PatientTypee->RequiredErrorMessage)) ?>");
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
	fappointment_scheduleredit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fappointment_scheduleredit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fappointment_scheduleredit.lists["x_patientID"] = <?php echo $appointment_scheduler_edit->patientID->Lookup->toClientList($appointment_scheduler_edit) ?>;
	fappointment_scheduleredit.lists["x_patientID"].options = <?php echo JsonEncode($appointment_scheduler_edit->patientID->lookupOptions()) ?>;
	fappointment_scheduleredit.lists["x_DoctorName"] = <?php echo $appointment_scheduler_edit->DoctorName->Lookup->toClientList($appointment_scheduler_edit) ?>;
	fappointment_scheduleredit.lists["x_DoctorName"].options = <?php echo JsonEncode($appointment_scheduler_edit->DoctorName->lookupOptions()) ?>;
	fappointment_scheduleredit.lists["x_status[]"] = <?php echo $appointment_scheduler_edit->status->Lookup->toClientList($appointment_scheduler_edit) ?>;
	fappointment_scheduleredit.lists["x_status[]"].options = <?php echo JsonEncode($appointment_scheduler_edit->status->options(FALSE, TRUE)) ?>;
	fappointment_scheduleredit.lists["x_appointment_type"] = <?php echo $appointment_scheduler_edit->appointment_type->Lookup->toClientList($appointment_scheduler_edit) ?>;
	fappointment_scheduleredit.lists["x_appointment_type"].options = <?php echo JsonEncode($appointment_scheduler_edit->appointment_type->options(FALSE, TRUE)) ?>;
	fappointment_scheduleredit.lists["x_Notified[]"] = <?php echo $appointment_scheduler_edit->Notified->Lookup->toClientList($appointment_scheduler_edit) ?>;
	fappointment_scheduleredit.lists["x_Notified[]"].options = <?php echo JsonEncode($appointment_scheduler_edit->Notified->options(FALSE, TRUE)) ?>;
	fappointment_scheduleredit.lists["x_PatientType"] = <?php echo $appointment_scheduler_edit->PatientType->Lookup->toClientList($appointment_scheduler_edit) ?>;
	fappointment_scheduleredit.lists["x_PatientType"].options = <?php echo JsonEncode($appointment_scheduler_edit->PatientType->options(FALSE, TRUE)) ?>;
	fappointment_scheduleredit.lists["x_Referal"] = <?php echo $appointment_scheduler_edit->Referal->Lookup->toClientList($appointment_scheduler_edit) ?>;
	fappointment_scheduleredit.lists["x_Referal"].options = <?php echo JsonEncode($appointment_scheduler_edit->Referal->lookupOptions()) ?>;
	fappointment_scheduleredit.lists["x_tittle"] = <?php echo $appointment_scheduler_edit->tittle->Lookup->toClientList($appointment_scheduler_edit) ?>;
	fappointment_scheduleredit.lists["x_tittle"].options = <?php echo JsonEncode($appointment_scheduler_edit->tittle->lookupOptions()) ?>;
	fappointment_scheduleredit.lists["x_gendar"] = <?php echo $appointment_scheduler_edit->gendar->Lookup->toClientList($appointment_scheduler_edit) ?>;
	fappointment_scheduleredit.lists["x_gendar"].options = <?php echo JsonEncode($appointment_scheduler_edit->gendar->lookupOptions()) ?>;
	fappointment_scheduleredit.lists["x_WhereDidYouHear[]"] = <?php echo $appointment_scheduler_edit->WhereDidYouHear->Lookup->toClientList($appointment_scheduler_edit) ?>;
	fappointment_scheduleredit.lists["x_WhereDidYouHear[]"].options = <?php echo JsonEncode($appointment_scheduler_edit->WhereDidYouHear->lookupOptions()) ?>;
	fappointment_scheduleredit.lists["x_PatientTypee"] = <?php echo $appointment_scheduler_edit->PatientTypee->Lookup->toClientList($appointment_scheduler_edit) ?>;
	fappointment_scheduleredit.lists["x_PatientTypee"].options = <?php echo JsonEncode($appointment_scheduler_edit->PatientTypee->lookupOptions()) ?>;
	loadjs.done("fappointment_scheduleredit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $appointment_scheduler_edit->showPageHeader(); ?>
<?php
$appointment_scheduler_edit->showMessage();
?>
<form name="fappointment_scheduleredit" id="fappointment_scheduleredit" class="<?php echo $appointment_scheduler_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="appointment_scheduler">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$appointment_scheduler_edit->IsModal ?>">
<?php if ($appointment_scheduler->getCurrentMasterTable() == "doctors") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="doctors">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($appointment_scheduler_edit->DoctorID->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($appointment_scheduler_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_appointment_scheduler_id" class="<?php echo $appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc_appointment_scheduler_id" type="text/html"><?php echo $appointment_scheduler_edit->id->caption() ?><?php echo $appointment_scheduler_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_scheduler_edit->RightColumnClass ?>"><div <?php echo $appointment_scheduler_edit->id->cellAttributes() ?>>
<script id="tpx_appointment_scheduler_id" type="text/html"><span id="el_appointment_scheduler_id">
<span<?php echo $appointment_scheduler_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_scheduler_edit->id->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="appointment_scheduler" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($appointment_scheduler_edit->id->CurrentValue) ?>">
<?php echo $appointment_scheduler_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_scheduler_edit->start_date->Visible) { // start_date ?>
	<div id="r_start_date" class="form-group row">
		<label id="elh_appointment_scheduler_start_date" for="x_start_date" class="<?php echo $appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc_appointment_scheduler_start_date" type="text/html"><?php echo $appointment_scheduler_edit->start_date->caption() ?><?php echo $appointment_scheduler_edit->start_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_scheduler_edit->RightColumnClass ?>"><div <?php echo $appointment_scheduler_edit->start_date->cellAttributes() ?>>
<script id="tpx_appointment_scheduler_start_date" type="text/html"><span id="el_appointment_scheduler_start_date">
<input type="text" data-table="appointment_scheduler" data-field="x_start_date" data-format="11" name="x_start_date" id="x_start_date" placeholder="<?php echo HtmlEncode($appointment_scheduler_edit->start_date->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_edit->start_date->EditValue ?>"<?php echo $appointment_scheduler_edit->start_date->editAttributes() ?>>
<?php if (!$appointment_scheduler_edit->start_date->ReadOnly && !$appointment_scheduler_edit->start_date->Disabled && !isset($appointment_scheduler_edit->start_date->EditAttrs["readonly"]) && !isset($appointment_scheduler_edit->start_date->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="appointment_scheduleredit_js">
loadjs.ready(["fappointment_scheduleredit", "datetimepicker"], function() {
	ew.createDateTimePicker("fappointment_scheduleredit", "x_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $appointment_scheduler_edit->start_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_scheduler_edit->end_date->Visible) { // end_date ?>
	<div id="r_end_date" class="form-group row">
		<label id="elh_appointment_scheduler_end_date" for="x_end_date" class="<?php echo $appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc_appointment_scheduler_end_date" type="text/html"><?php echo $appointment_scheduler_edit->end_date->caption() ?><?php echo $appointment_scheduler_edit->end_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_scheduler_edit->RightColumnClass ?>"><div <?php echo $appointment_scheduler_edit->end_date->cellAttributes() ?>>
<script id="tpx_appointment_scheduler_end_date" type="text/html"><span id="el_appointment_scheduler_end_date">
<input type="text" data-table="appointment_scheduler" data-field="x_end_date" data-format="11" name="x_end_date" id="x_end_date" placeholder="<?php echo HtmlEncode($appointment_scheduler_edit->end_date->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_edit->end_date->EditValue ?>"<?php echo $appointment_scheduler_edit->end_date->editAttributes() ?>>
<?php if (!$appointment_scheduler_edit->end_date->ReadOnly && !$appointment_scheduler_edit->end_date->Disabled && !isset($appointment_scheduler_edit->end_date->EditAttrs["readonly"]) && !isset($appointment_scheduler_edit->end_date->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="appointment_scheduleredit_js">
loadjs.ready(["fappointment_scheduleredit", "datetimepicker"], function() {
	ew.createDateTimePicker("fappointment_scheduleredit", "x_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $appointment_scheduler_edit->end_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_scheduler_edit->patientID->Visible) { // patientID ?>
	<div id="r_patientID" class="form-group row">
		<label id="elh_appointment_scheduler_patientID" for="x_patientID" class="<?php echo $appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc_appointment_scheduler_patientID" type="text/html"><?php echo $appointment_scheduler_edit->patientID->caption() ?><?php echo $appointment_scheduler_edit->patientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_scheduler_edit->RightColumnClass ?>"><div <?php echo $appointment_scheduler_edit->patientID->cellAttributes() ?>>
<script id="tpx_appointment_scheduler_patientID" type="text/html"><span id="el_appointment_scheduler_patientID">
<?php $appointment_scheduler_edit->patientID->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_patientID"><?php echo EmptyValue(strval($appointment_scheduler_edit->patientID->ViewValue)) ? $Language->phrase("PleaseSelect") : $appointment_scheduler_edit->patientID->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($appointment_scheduler_edit->patientID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($appointment_scheduler_edit->patientID->ReadOnly || $appointment_scheduler_edit->patientID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_patientID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $appointment_scheduler_edit->patientID->Lookup->getParamTag($appointment_scheduler_edit, "p_x_patientID") ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_patientID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $appointment_scheduler_edit->patientID->displayValueSeparatorAttribute() ?>" name="x_patientID" id="x_patientID" value="<?php echo $appointment_scheduler_edit->patientID->CurrentValue ?>"<?php echo $appointment_scheduler_edit->patientID->editAttributes() ?>>
</span></script>
<?php echo $appointment_scheduler_edit->patientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_scheduler_edit->patientName->Visible) { // patientName ?>
	<div id="r_patientName" class="form-group row">
		<label id="elh_appointment_scheduler_patientName" for="x_patientName" class="<?php echo $appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc_appointment_scheduler_patientName" type="text/html"><?php echo $appointment_scheduler_edit->patientName->caption() ?><?php echo $appointment_scheduler_edit->patientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_scheduler_edit->RightColumnClass ?>"><div <?php echo $appointment_scheduler_edit->patientName->cellAttributes() ?>>
<script id="tpx_appointment_scheduler_patientName" type="text/html"><span id="el_appointment_scheduler_patientName">
<input type="text" data-table="appointment_scheduler" data-field="x_patientName" name="x_patientName" id="x_patientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_edit->patientName->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_edit->patientName->EditValue ?>"<?php echo $appointment_scheduler_edit->patientName->editAttributes() ?>>
</span></script>
<?php echo $appointment_scheduler_edit->patientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_scheduler_edit->DoctorID->Visible) { // DoctorID ?>
	<div id="r_DoctorID" class="form-group row">
		<label id="elh_appointment_scheduler_DoctorID" for="x_DoctorID" class="<?php echo $appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc_appointment_scheduler_DoctorID" type="text/html"><?php echo $appointment_scheduler_edit->DoctorID->caption() ?><?php echo $appointment_scheduler_edit->DoctorID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_scheduler_edit->RightColumnClass ?>"><div <?php echo $appointment_scheduler_edit->DoctorID->cellAttributes() ?>>
<?php if ($appointment_scheduler_edit->DoctorID->getSessionValue() != "") { ?>
<script id="tpx_appointment_scheduler_DoctorID" type="text/html"><span id="el_appointment_scheduler_DoctorID">
<span<?php echo $appointment_scheduler_edit->DoctorID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_scheduler_edit->DoctorID->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_DoctorID" name="x_DoctorID" value="<?php echo HtmlEncode($appointment_scheduler_edit->DoctorID->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_appointment_scheduler_DoctorID" type="text/html"><span id="el_appointment_scheduler_DoctorID">
<input type="text" data-table="appointment_scheduler" data-field="x_DoctorID" name="x_DoctorID" id="x_DoctorID" size="3" maxlength="5" placeholder="<?php echo HtmlEncode($appointment_scheduler_edit->DoctorID->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_edit->DoctorID->EditValue ?>"<?php echo $appointment_scheduler_edit->DoctorID->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $appointment_scheduler_edit->DoctorID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_scheduler_edit->DoctorName->Visible) { // DoctorName ?>
	<div id="r_DoctorName" class="form-group row">
		<label id="elh_appointment_scheduler_DoctorName" for="x_DoctorName" class="<?php echo $appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc_appointment_scheduler_DoctorName" type="text/html"><?php echo $appointment_scheduler_edit->DoctorName->caption() ?><?php echo $appointment_scheduler_edit->DoctorName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_scheduler_edit->RightColumnClass ?>"><div <?php echo $appointment_scheduler_edit->DoctorName->cellAttributes() ?>>
<script id="tpx_appointment_scheduler_DoctorName" type="text/html"><span id="el_appointment_scheduler_DoctorName">
<?php $appointment_scheduler_edit->DoctorName->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DoctorName"><?php echo EmptyValue(strval($appointment_scheduler_edit->DoctorName->ViewValue)) ? $Language->phrase("PleaseSelect") : $appointment_scheduler_edit->DoctorName->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($appointment_scheduler_edit->DoctorName->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($appointment_scheduler_edit->DoctorName->ReadOnly || $appointment_scheduler_edit->DoctorName->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_DoctorName',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $appointment_scheduler_edit->DoctorName->Lookup->getParamTag($appointment_scheduler_edit, "p_x_DoctorName") ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorName" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $appointment_scheduler_edit->DoctorName->displayValueSeparatorAttribute() ?>" name="x_DoctorName" id="x_DoctorName" value="<?php echo $appointment_scheduler_edit->DoctorName->CurrentValue ?>"<?php echo $appointment_scheduler_edit->DoctorName->editAttributes() ?>>
</span></script>
<?php echo $appointment_scheduler_edit->DoctorName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_scheduler_edit->AppointmentStatus->Visible) { // AppointmentStatus ?>
	<div id="r_AppointmentStatus" class="form-group row">
		<label id="elh_appointment_scheduler_AppointmentStatus" for="x_AppointmentStatus" class="<?php echo $appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc_appointment_scheduler_AppointmentStatus" type="text/html"><?php echo $appointment_scheduler_edit->AppointmentStatus->caption() ?><?php echo $appointment_scheduler_edit->AppointmentStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_scheduler_edit->RightColumnClass ?>"><div <?php echo $appointment_scheduler_edit->AppointmentStatus->cellAttributes() ?>>
<script id="tpx_appointment_scheduler_AppointmentStatus" type="text/html"><span id="el_appointment_scheduler_AppointmentStatus">
<input type="text" data-table="appointment_scheduler" data-field="x_AppointmentStatus" name="x_AppointmentStatus" id="x_AppointmentStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_edit->AppointmentStatus->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_edit->AppointmentStatus->EditValue ?>"<?php echo $appointment_scheduler_edit->AppointmentStatus->editAttributes() ?>>
</span></script>
<?php echo $appointment_scheduler_edit->AppointmentStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_scheduler_edit->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_appointment_scheduler_status" class="<?php echo $appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc_appointment_scheduler_status" type="text/html"><?php echo $appointment_scheduler_edit->status->caption() ?><?php echo $appointment_scheduler_edit->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_scheduler_edit->RightColumnClass ?>"><div <?php echo $appointment_scheduler_edit->status->cellAttributes() ?>>
<script id="tpx_appointment_scheduler_status" type="text/html"><span id="el_appointment_scheduler_status">
<div id="tp_x_status" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="appointment_scheduler" data-field="x_status" data-value-separator="<?php echo $appointment_scheduler_edit->status->displayValueSeparatorAttribute() ?>" name="x_status[]" id="x_status[]" value="{value}"<?php echo $appointment_scheduler_edit->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $appointment_scheduler_edit->status->checkBoxListHtml(FALSE, "x_status[]") ?>
</div></div>
</span></script>
<?php echo $appointment_scheduler_edit->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_scheduler_edit->DoctorCode->Visible) { // DoctorCode ?>
	<div id="r_DoctorCode" class="form-group row">
		<label id="elh_appointment_scheduler_DoctorCode" for="x_DoctorCode" class="<?php echo $appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc_appointment_scheduler_DoctorCode" type="text/html"><?php echo $appointment_scheduler_edit->DoctorCode->caption() ?><?php echo $appointment_scheduler_edit->DoctorCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_scheduler_edit->RightColumnClass ?>"><div <?php echo $appointment_scheduler_edit->DoctorCode->cellAttributes() ?>>
<script id="tpx_appointment_scheduler_DoctorCode" type="text/html"><span id="el_appointment_scheduler_DoctorCode">
<input type="text" data-table="appointment_scheduler" data-field="x_DoctorCode" name="x_DoctorCode" id="x_DoctorCode" size="5" maxlength="7" placeholder="<?php echo HtmlEncode($appointment_scheduler_edit->DoctorCode->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_edit->DoctorCode->EditValue ?>"<?php echo $appointment_scheduler_edit->DoctorCode->editAttributes() ?>>
</span></script>
<?php echo $appointment_scheduler_edit->DoctorCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_scheduler_edit->Department->Visible) { // Department ?>
	<div id="r_Department" class="form-group row">
		<label id="elh_appointment_scheduler_Department" for="x_Department" class="<?php echo $appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc_appointment_scheduler_Department" type="text/html"><?php echo $appointment_scheduler_edit->Department->caption() ?><?php echo $appointment_scheduler_edit->Department->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_scheduler_edit->RightColumnClass ?>"><div <?php echo $appointment_scheduler_edit->Department->cellAttributes() ?>>
<script id="tpx_appointment_scheduler_Department" type="text/html"><span id="el_appointment_scheduler_Department">
<input type="text" data-table="appointment_scheduler" data-field="x_Department" name="x_Department" id="x_Department" size="8" maxlength="15" placeholder="<?php echo HtmlEncode($appointment_scheduler_edit->Department->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_edit->Department->EditValue ?>"<?php echo $appointment_scheduler_edit->Department->editAttributes() ?>>
</span></script>
<?php echo $appointment_scheduler_edit->Department->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_scheduler_edit->scheduler_id->Visible) { // scheduler_id ?>
	<div id="r_scheduler_id" class="form-group row">
		<label id="elh_appointment_scheduler_scheduler_id" for="x_scheduler_id" class="<?php echo $appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc_appointment_scheduler_scheduler_id" type="text/html"><?php echo $appointment_scheduler_edit->scheduler_id->caption() ?><?php echo $appointment_scheduler_edit->scheduler_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_scheduler_edit->RightColumnClass ?>"><div <?php echo $appointment_scheduler_edit->scheduler_id->cellAttributes() ?>>
<script id="tpx_appointment_scheduler_scheduler_id" type="text/html"><span id="el_appointment_scheduler_scheduler_id">
<span<?php echo $appointment_scheduler_edit->scheduler_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_scheduler_edit->scheduler_id->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="appointment_scheduler" data-field="x_scheduler_id" name="x_scheduler_id" id="x_scheduler_id" value="<?php echo HtmlEncode($appointment_scheduler_edit->scheduler_id->CurrentValue) ?>">
<?php echo $appointment_scheduler_edit->scheduler_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_scheduler_edit->text->Visible) { // text ?>
	<div id="r_text" class="form-group row">
		<label id="elh_appointment_scheduler_text" for="x_text" class="<?php echo $appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc_appointment_scheduler_text" type="text/html"><?php echo $appointment_scheduler_edit->text->caption() ?><?php echo $appointment_scheduler_edit->text->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_scheduler_edit->RightColumnClass ?>"><div <?php echo $appointment_scheduler_edit->text->cellAttributes() ?>>
<script id="tpx_appointment_scheduler_text" type="text/html"><span id="el_appointment_scheduler_text">
<input type="text" data-table="appointment_scheduler" data-field="x_text" name="x_text" id="x_text" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_edit->text->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_edit->text->EditValue ?>"<?php echo $appointment_scheduler_edit->text->editAttributes() ?>>
</span></script>
<?php echo $appointment_scheduler_edit->text->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_scheduler_edit->appointment_status->Visible) { // appointment_status ?>
	<div id="r_appointment_status" class="form-group row">
		<label id="elh_appointment_scheduler_appointment_status" for="x_appointment_status" class="<?php echo $appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc_appointment_scheduler_appointment_status" type="text/html"><?php echo $appointment_scheduler_edit->appointment_status->caption() ?><?php echo $appointment_scheduler_edit->appointment_status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_scheduler_edit->RightColumnClass ?>"><div <?php echo $appointment_scheduler_edit->appointment_status->cellAttributes() ?>>
<script id="tpx_appointment_scheduler_appointment_status" type="text/html"><span id="el_appointment_scheduler_appointment_status">
<input type="text" data-table="appointment_scheduler" data-field="x_appointment_status" name="x_appointment_status" id="x_appointment_status" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_edit->appointment_status->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_edit->appointment_status->EditValue ?>"<?php echo $appointment_scheduler_edit->appointment_status->editAttributes() ?>>
</span></script>
<?php echo $appointment_scheduler_edit->appointment_status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_scheduler_edit->PId->Visible) { // PId ?>
	<div id="r_PId" class="form-group row">
		<label id="elh_appointment_scheduler_PId" for="x_PId" class="<?php echo $appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc_appointment_scheduler_PId" type="text/html"><?php echo $appointment_scheduler_edit->PId->caption() ?><?php echo $appointment_scheduler_edit->PId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_scheduler_edit->RightColumnClass ?>"><div <?php echo $appointment_scheduler_edit->PId->cellAttributes() ?>>
<script id="tpx_appointment_scheduler_PId" type="text/html"><span id="el_appointment_scheduler_PId">
<input type="text" data-table="appointment_scheduler" data-field="x_PId" name="x_PId" id="x_PId" size="30" placeholder="<?php echo HtmlEncode($appointment_scheduler_edit->PId->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_edit->PId->EditValue ?>"<?php echo $appointment_scheduler_edit->PId->editAttributes() ?>>
</span></script>
<?php echo $appointment_scheduler_edit->PId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_scheduler_edit->MobileNumber->Visible) { // MobileNumber ?>
	<div id="r_MobileNumber" class="form-group row">
		<label id="elh_appointment_scheduler_MobileNumber" for="x_MobileNumber" class="<?php echo $appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc_appointment_scheduler_MobileNumber" type="text/html"><?php echo $appointment_scheduler_edit->MobileNumber->caption() ?><?php echo $appointment_scheduler_edit->MobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_scheduler_edit->RightColumnClass ?>"><div <?php echo $appointment_scheduler_edit->MobileNumber->cellAttributes() ?>>
<script id="tpx_appointment_scheduler_MobileNumber" type="text/html"><span id="el_appointment_scheduler_MobileNumber">
<input type="text" data-table="appointment_scheduler" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_edit->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_edit->MobileNumber->EditValue ?>"<?php echo $appointment_scheduler_edit->MobileNumber->editAttributes() ?>>
</span></script>
<?php echo $appointment_scheduler_edit->MobileNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_scheduler_edit->SchEmail->Visible) { // SchEmail ?>
	<div id="r_SchEmail" class="form-group row">
		<label id="elh_appointment_scheduler_SchEmail" for="x_SchEmail" class="<?php echo $appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc_appointment_scheduler_SchEmail" type="text/html"><?php echo $appointment_scheduler_edit->SchEmail->caption() ?><?php echo $appointment_scheduler_edit->SchEmail->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_scheduler_edit->RightColumnClass ?>"><div <?php echo $appointment_scheduler_edit->SchEmail->cellAttributes() ?>>
<script id="tpx_appointment_scheduler_SchEmail" type="text/html"><span id="el_appointment_scheduler_SchEmail">
<input type="text" data-table="appointment_scheduler" data-field="x_SchEmail" name="x_SchEmail" id="x_SchEmail" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_edit->SchEmail->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_edit->SchEmail->EditValue ?>"<?php echo $appointment_scheduler_edit->SchEmail->editAttributes() ?>>
</span></script>
<?php echo $appointment_scheduler_edit->SchEmail->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_scheduler_edit->appointment_type->Visible) { // appointment_type ?>
	<div id="r_appointment_type" class="form-group row">
		<label id="elh_appointment_scheduler_appointment_type" class="<?php echo $appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc_appointment_scheduler_appointment_type" type="text/html"><?php echo $appointment_scheduler_edit->appointment_type->caption() ?><?php echo $appointment_scheduler_edit->appointment_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_scheduler_edit->RightColumnClass ?>"><div <?php echo $appointment_scheduler_edit->appointment_type->cellAttributes() ?>>
<script id="tpx_appointment_scheduler_appointment_type" type="text/html"><span id="el_appointment_scheduler_appointment_type">
<div id="tp_x_appointment_type" class="ew-template"><input type="radio" class="custom-control-input" data-table="appointment_scheduler" data-field="x_appointment_type" data-value-separator="<?php echo $appointment_scheduler_edit->appointment_type->displayValueSeparatorAttribute() ?>" name="x_appointment_type" id="x_appointment_type" value="{value}"<?php echo $appointment_scheduler_edit->appointment_type->editAttributes() ?>></div>
<div id="dsl_x_appointment_type" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $appointment_scheduler_edit->appointment_type->radioButtonListHtml(FALSE, "x_appointment_type") ?>
</div></div>
</span></script>
<?php echo $appointment_scheduler_edit->appointment_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_scheduler_edit->Notified->Visible) { // Notified ?>
	<div id="r_Notified" class="form-group row">
		<label id="elh_appointment_scheduler_Notified" class="<?php echo $appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc_appointment_scheduler_Notified" type="text/html"><?php echo $appointment_scheduler_edit->Notified->caption() ?><?php echo $appointment_scheduler_edit->Notified->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_scheduler_edit->RightColumnClass ?>"><div <?php echo $appointment_scheduler_edit->Notified->cellAttributes() ?>>
<script id="tpx_appointment_scheduler_Notified" type="text/html"><span id="el_appointment_scheduler_Notified">
<div id="tp_x_Notified" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="appointment_scheduler" data-field="x_Notified" data-value-separator="<?php echo $appointment_scheduler_edit->Notified->displayValueSeparatorAttribute() ?>" name="x_Notified[]" id="x_Notified[]" value="{value}"<?php echo $appointment_scheduler_edit->Notified->editAttributes() ?>></div>
<div id="dsl_x_Notified" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $appointment_scheduler_edit->Notified->checkBoxListHtml(FALSE, "x_Notified[]") ?>
</div></div>
</span></script>
<?php echo $appointment_scheduler_edit->Notified->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_scheduler_edit->Purpose->Visible) { // Purpose ?>
	<div id="r_Purpose" class="form-group row">
		<label id="elh_appointment_scheduler_Purpose" for="x_Purpose" class="<?php echo $appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc_appointment_scheduler_Purpose" type="text/html"><?php echo $appointment_scheduler_edit->Purpose->caption() ?><?php echo $appointment_scheduler_edit->Purpose->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_scheduler_edit->RightColumnClass ?>"><div <?php echo $appointment_scheduler_edit->Purpose->cellAttributes() ?>>
<script id="tpx_appointment_scheduler_Purpose" type="text/html"><span id="el_appointment_scheduler_Purpose">
<input type="text" data-table="appointment_scheduler" data-field="x_Purpose" name="x_Purpose" id="x_Purpose" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_edit->Purpose->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_edit->Purpose->EditValue ?>"<?php echo $appointment_scheduler_edit->Purpose->editAttributes() ?>>
</span></script>
<?php echo $appointment_scheduler_edit->Purpose->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_scheduler_edit->Notes->Visible) { // Notes ?>
	<div id="r_Notes" class="form-group row">
		<label id="elh_appointment_scheduler_Notes" for="x_Notes" class="<?php echo $appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc_appointment_scheduler_Notes" type="text/html"><?php echo $appointment_scheduler_edit->Notes->caption() ?><?php echo $appointment_scheduler_edit->Notes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_scheduler_edit->RightColumnClass ?>"><div <?php echo $appointment_scheduler_edit->Notes->cellAttributes() ?>>
<script id="tpx_appointment_scheduler_Notes" type="text/html"><span id="el_appointment_scheduler_Notes">
<input type="text" data-table="appointment_scheduler" data-field="x_Notes" name="x_Notes" id="x_Notes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_edit->Notes->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_edit->Notes->EditValue ?>"<?php echo $appointment_scheduler_edit->Notes->editAttributes() ?>>
</span></script>
<?php echo $appointment_scheduler_edit->Notes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_scheduler_edit->PatientType->Visible) { // PatientType ?>
	<div id="r_PatientType" class="form-group row">
		<label id="elh_appointment_scheduler_PatientType" class="<?php echo $appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc_appointment_scheduler_PatientType" type="text/html"><?php echo $appointment_scheduler_edit->PatientType->caption() ?><?php echo $appointment_scheduler_edit->PatientType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_scheduler_edit->RightColumnClass ?>"><div <?php echo $appointment_scheduler_edit->PatientType->cellAttributes() ?>>
<script id="tpx_appointment_scheduler_PatientType" type="text/html"><span id="el_appointment_scheduler_PatientType">
<?php $appointment_scheduler_edit->PatientType->EditAttrs->prepend("onclick", "ew.updateOptions.call(this);"); ?>
<div id="tp_x_PatientType" class="ew-template"><input type="radio" class="custom-control-input" data-table="appointment_scheduler" data-field="x_PatientType" data-value-separator="<?php echo $appointment_scheduler_edit->PatientType->displayValueSeparatorAttribute() ?>" name="x_PatientType" id="x_PatientType" value="{value}"<?php echo $appointment_scheduler_edit->PatientType->editAttributes() ?>></div>
<div id="dsl_x_PatientType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $appointment_scheduler_edit->PatientType->radioButtonListHtml(FALSE, "x_PatientType") ?>
</div></div>
</span></script>
<?php echo $appointment_scheduler_edit->PatientType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_scheduler_edit->Referal->Visible) { // Referal ?>
	<div id="r_Referal" class="form-group row">
		<label id="elh_appointment_scheduler_Referal" for="x_Referal" class="<?php echo $appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc_appointment_scheduler_Referal" type="text/html"><?php echo $appointment_scheduler_edit->Referal->caption() ?><?php echo $appointment_scheduler_edit->Referal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_scheduler_edit->RightColumnClass ?>"><div <?php echo $appointment_scheduler_edit->Referal->cellAttributes() ?>>
<script id="tpx_appointment_scheduler_Referal" type="text/html"><span id="el_appointment_scheduler_Referal">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Referal"><?php echo EmptyValue(strval($appointment_scheduler_edit->Referal->ViewValue)) ? $Language->phrase("PleaseSelect") : $appointment_scheduler_edit->Referal->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($appointment_scheduler_edit->Referal->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($appointment_scheduler_edit->Referal->ReadOnly || $appointment_scheduler_edit->Referal->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Referal',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "mas_reference_type") && !$appointment_scheduler_edit->Referal->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Referal" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $appointment_scheduler_edit->Referal->caption() ?>" data-title="<?php echo $appointment_scheduler_edit->Referal->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Referal',url:'mas_reference_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $appointment_scheduler_edit->Referal->Lookup->getParamTag($appointment_scheduler_edit, "p_x_Referal") ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Referal" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $appointment_scheduler_edit->Referal->displayValueSeparatorAttribute() ?>" name="x_Referal" id="x_Referal" value="<?php echo $appointment_scheduler_edit->Referal->CurrentValue ?>"<?php echo $appointment_scheduler_edit->Referal->editAttributes() ?>>
</span></script>
<?php echo $appointment_scheduler_edit->Referal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_scheduler_edit->paymentType->Visible) { // paymentType ?>
	<div id="r_paymentType" class="form-group row">
		<label id="elh_appointment_scheduler_paymentType" for="x_paymentType" class="<?php echo $appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc_appointment_scheduler_paymentType" type="text/html"><?php echo $appointment_scheduler_edit->paymentType->caption() ?><?php echo $appointment_scheduler_edit->paymentType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_scheduler_edit->RightColumnClass ?>"><div <?php echo $appointment_scheduler_edit->paymentType->cellAttributes() ?>>
<script id="tpx_appointment_scheduler_paymentType" type="text/html"><span id="el_appointment_scheduler_paymentType">
<input type="text" data-table="appointment_scheduler" data-field="x_paymentType" name="x_paymentType" id="x_paymentType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_edit->paymentType->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_edit->paymentType->EditValue ?>"<?php echo $appointment_scheduler_edit->paymentType->editAttributes() ?>>
</span></script>
<?php echo $appointment_scheduler_edit->paymentType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_scheduler_edit->tittle->Visible) { // tittle ?>
	<div id="r_tittle" class="form-group row">
		<label id="elh_appointment_scheduler_tittle" for="x_tittle" class="<?php echo $appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc_appointment_scheduler_tittle" type="text/html"><?php echo $appointment_scheduler_edit->tittle->caption() ?><?php echo $appointment_scheduler_edit->tittle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_scheduler_edit->RightColumnClass ?>"><div <?php echo $appointment_scheduler_edit->tittle->cellAttributes() ?>>
<script id="tpx_appointment_scheduler_tittle" type="text/html"><span id="el_appointment_scheduler_tittle">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="appointment_scheduler" data-field="x_tittle" data-value-separator="<?php echo $appointment_scheduler_edit->tittle->displayValueSeparatorAttribute() ?>" id="x_tittle" name="x_tittle"<?php echo $appointment_scheduler_edit->tittle->editAttributes() ?>>
			<?php echo $appointment_scheduler_edit->tittle->selectOptionListHtml("x_tittle") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "sys_tittle") && !$appointment_scheduler_edit->tittle->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_tittle" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $appointment_scheduler_edit->tittle->caption() ?>" data-title="<?php echo $appointment_scheduler_edit->tittle->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_tittle',url:'sys_tittleaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $appointment_scheduler_edit->tittle->Lookup->getParamTag($appointment_scheduler_edit, "p_x_tittle") ?>
</span></script>
<?php echo $appointment_scheduler_edit->tittle->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_scheduler_edit->gendar->Visible) { // gendar ?>
	<div id="r_gendar" class="form-group row">
		<label id="elh_appointment_scheduler_gendar" for="x_gendar" class="<?php echo $appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc_appointment_scheduler_gendar" type="text/html"><?php echo $appointment_scheduler_edit->gendar->caption() ?><?php echo $appointment_scheduler_edit->gendar->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_scheduler_edit->RightColumnClass ?>"><div <?php echo $appointment_scheduler_edit->gendar->cellAttributes() ?>>
<script id="tpx_appointment_scheduler_gendar" type="text/html"><span id="el_appointment_scheduler_gendar">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="appointment_scheduler" data-field="x_gendar" data-value-separator="<?php echo $appointment_scheduler_edit->gendar->displayValueSeparatorAttribute() ?>" id="x_gendar" name="x_gendar"<?php echo $appointment_scheduler_edit->gendar->editAttributes() ?>>
			<?php echo $appointment_scheduler_edit->gendar->selectOptionListHtml("x_gendar") ?>
		</select>
</div>
<?php echo $appointment_scheduler_edit->gendar->Lookup->getParamTag($appointment_scheduler_edit, "p_x_gendar") ?>
</span></script>
<?php echo $appointment_scheduler_edit->gendar->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_scheduler_edit->Dob->Visible) { // Dob ?>
	<div id="r_Dob" class="form-group row">
		<label id="elh_appointment_scheduler_Dob" for="x_Dob" class="<?php echo $appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc_appointment_scheduler_Dob" type="text/html"><?php echo $appointment_scheduler_edit->Dob->caption() ?><?php echo $appointment_scheduler_edit->Dob->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_scheduler_edit->RightColumnClass ?>"><div <?php echo $appointment_scheduler_edit->Dob->cellAttributes() ?>>
<script id="tpx_appointment_scheduler_Dob" type="text/html"><span id="el_appointment_scheduler_Dob">
<input type="text" data-table="appointment_scheduler" data-field="x_Dob" name="x_Dob" id="x_Dob" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_edit->Dob->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_edit->Dob->EditValue ?>"<?php echo $appointment_scheduler_edit->Dob->editAttributes() ?>>
<?php if (!$appointment_scheduler_edit->Dob->ReadOnly && !$appointment_scheduler_edit->Dob->Disabled && !isset($appointment_scheduler_edit->Dob->EditAttrs["readonly"]) && !isset($appointment_scheduler_edit->Dob->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="appointment_scheduleredit_js">
loadjs.ready(["fappointment_scheduleredit", "datetimepicker"], function() {
	ew.createDateTimePicker("fappointment_scheduleredit", "x_Dob", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $appointment_scheduler_edit->Dob->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_scheduler_edit->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_appointment_scheduler_Age" for="x_Age" class="<?php echo $appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc_appointment_scheduler_Age" type="text/html"><?php echo $appointment_scheduler_edit->Age->caption() ?><?php echo $appointment_scheduler_edit->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_scheduler_edit->RightColumnClass ?>"><div <?php echo $appointment_scheduler_edit->Age->cellAttributes() ?>>
<script id="tpx_appointment_scheduler_Age" type="text/html"><span id="el_appointment_scheduler_Age">
<input type="text" data-table="appointment_scheduler" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_edit->Age->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_edit->Age->EditValue ?>"<?php echo $appointment_scheduler_edit->Age->editAttributes() ?>>
</span></script>
<?php echo $appointment_scheduler_edit->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_scheduler_edit->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<div id="r_WhereDidYouHear" class="form-group row">
		<label id="elh_appointment_scheduler_WhereDidYouHear" class="<?php echo $appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc_appointment_scheduler_WhereDidYouHear" type="text/html"><?php echo $appointment_scheduler_edit->WhereDidYouHear->caption() ?><?php echo $appointment_scheduler_edit->WhereDidYouHear->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_scheduler_edit->RightColumnClass ?>"><div <?php echo $appointment_scheduler_edit->WhereDidYouHear->cellAttributes() ?>>
<script id="tpx_appointment_scheduler_WhereDidYouHear" type="text/html"><span id="el_appointment_scheduler_WhereDidYouHear">
<div id="tp_x_WhereDidYouHear" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="appointment_scheduler" data-field="x_WhereDidYouHear" data-value-separator="<?php echo $appointment_scheduler_edit->WhereDidYouHear->displayValueSeparatorAttribute() ?>" name="x_WhereDidYouHear[]" id="x_WhereDidYouHear[]" value="{value}"<?php echo $appointment_scheduler_edit->WhereDidYouHear->editAttributes() ?>></div>
<div id="dsl_x_WhereDidYouHear" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $appointment_scheduler_edit->WhereDidYouHear->checkBoxListHtml(FALSE, "x_WhereDidYouHear[]") ?>
</div></div>
<?php echo $appointment_scheduler_edit->WhereDidYouHear->Lookup->getParamTag($appointment_scheduler_edit, "p_x_WhereDidYouHear") ?>
</span></script>
<?php echo $appointment_scheduler_edit->WhereDidYouHear->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_scheduler_edit->PatientTypee->Visible) { // PatientTypee ?>
	<div id="r_PatientTypee" class="form-group row">
		<label id="elh_appointment_scheduler_PatientTypee" for="x_PatientTypee" class="<?php echo $appointment_scheduler_edit->LeftColumnClass ?>"><script id="tpc_appointment_scheduler_PatientTypee" type="text/html"><?php echo $appointment_scheduler_edit->PatientTypee->caption() ?><?php echo $appointment_scheduler_edit->PatientTypee->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_scheduler_edit->RightColumnClass ?>"><div <?php echo $appointment_scheduler_edit->PatientTypee->cellAttributes() ?>>
<script id="tpx_appointment_scheduler_PatientTypee" type="text/html"><span id="el_appointment_scheduler_PatientTypee">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="appointment_scheduler" data-field="x_PatientTypee" data-value-separator="<?php echo $appointment_scheduler_edit->PatientTypee->displayValueSeparatorAttribute() ?>" id="x_PatientTypee" name="x_PatientTypee"<?php echo $appointment_scheduler_edit->PatientTypee->editAttributes() ?>>
			<?php echo $appointment_scheduler_edit->PatientTypee->selectOptionListHtml("x_PatientTypee") ?>
		</select>
</div>
<?php echo $appointment_scheduler_edit->PatientTypee->Lookup->getParamTag($appointment_scheduler_edit, "p_x_PatientTypee") ?>
</span></script>
<?php echo $appointment_scheduler_edit->PatientTypee->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_appointment_scheduleredit" class="ew-custom-template"></div>
<script id="tpm_appointment_scheduleredit" type="text/html">
<div id="ct_appointment_scheduler_edit"><style type="text/css" >
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
		<tr><td class="bg-warning text-warning">{{include tmpl="#tpc_appointment_scheduler_start_date"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_appointment_scheduler_start_date")/}}</td><td class="bg-warning text-warning">{{include tmpl="#tpc_appointment_scheduler_end_date"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_appointment_scheduler_end_date")/}}</td><td>{{include tmpl="#tpc_appointment_scheduler_PatientType"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_appointment_scheduler_PatientType")/}}</td></tr>
	</tbody>
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>
	 	<tr>
		<td>{{include tmpl="#tpc_appointment_scheduler_patientID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_appointment_scheduler_patientID")/}}</td><td>{{include tmpl="#tpc_appointment_scheduler_patientName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_appointment_scheduler_patientName")/}}</td>
		<td>{{include tmpl="#tpc_appointment_scheduler_PatientTypee"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_appointment_scheduler_PatientTypee")/}}</td>
	</tr>
	</tbody>
</table>
<table id="addNewPatient" class="ew-table"  style="width:100%;background-color:#FF33A8;">
	 <tbody>	
		<tr>
			<td  name="addNewPatient">{{include tmpl="#tpc_appointment_scheduler_tittle"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_appointment_scheduler_tittle")/}}</td>
			<td>
			{{include tmpl="#tpc_appointment_scheduler_gendar"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_appointment_scheduler_gendar")/}}
</td>
			<td>
			{{include tmpl="#tpc_appointment_scheduler_Dob"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_appointment_scheduler_Dob")/}}
			</td>
			<td>
			{{include tmpl="#tpc_appointment_scheduler_Age"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_appointment_scheduler_Age")/}}
			</td>
			<td>
			<a href="patientadd.php?pagetoredirect=appointment_scheduler" id="addNewPatientSer" name="addNewPatientSer" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">More</a>
			</td>
		</tr>
	</tbody>	
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>
		<tr><td>{{include tmpl="#tpc_appointment_scheduler_PId"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_appointment_scheduler_PId")/}}</td><td>{{include tmpl="#tpc_appointment_scheduler_MobileNumber"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_appointment_scheduler_MobileNumber")/}}</td></tr>
		<tr><td>{{include tmpl="#tpc_appointment_scheduler_SchEmail"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_appointment_scheduler_SchEmail")/}}</td><td>{{include tmpl="#tpc_appointment_scheduler_Notes"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_appointment_scheduler_Notes")/}}</td></tr>
	</tbody>
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>
		<tr><td class="bg-success text-success">{{include tmpl="#tpc_appointment_scheduler_DoctorID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_appointment_scheduler_DoctorID")/}}</td><td class="bg-success text-success">{{include tmpl="#tpc_appointment_scheduler_DoctorName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_appointment_scheduler_DoctorName")/}}</td>
		<td class="bg-success text-success">{{include tmpl="#tpc_appointment_scheduler_DoctorCode"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_appointment_scheduler_DoctorCode")/}}</td><td class="bg-success text-success">{{include tmpl="#tpc_appointment_scheduler_Department"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_appointment_scheduler_Department")/}}</td></tr>
	</tbody>
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>
		<tr><td class="bg-danger text-danger">{{include tmpl="#tpc_appointment_scheduler_Referal"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_appointment_scheduler_Referal")/}}</td><td class="bg-danger text-danger">{{include tmpl="#tpc_appointment_scheduler_Purpose"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_appointment_scheduler_Purpose")/}}</td></tr>
	</tbody>
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>	
		<tr>
			<td>{{include tmpl="#tpc_appointment_scheduler_WhereDidYouHear"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_appointment_scheduler_WhereDidYouHear")/}}</td>
		</tr>
				<tr>
			<td>{{include tmpl="#tpc_appointment_scheduler_status"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_appointment_scheduler_status")/}}</td>
		</tr>
	</tbody>
</table>
</div>
</script>

<?php if (!$appointment_scheduler_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $appointment_scheduler_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $appointment_scheduler_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($appointment_scheduler->Rows) ?> };
	ew.applyTemplate("tpd_appointment_scheduleredit", "tpm_appointment_scheduleredit", "appointment_scheduleredit", "<?php echo $appointment_scheduler->CustomExport ?>", ew.templateData.rows[0]);
	$("script.appointment_scheduleredit_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$appointment_scheduler_edit->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	$("#addNewPatient").hide(),$("#x_DoctorID").prop("readonly",!0),$("#x_Department").prop("readonly",!0),$("#x_PId").prop("readonly",!0),$("#x_DoctorCode").attr("readonly",!0);
});
</script>
<?php include_once "footer.php"; ?>
<?php
$appointment_scheduler_edit->terminate();
?>