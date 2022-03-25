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
$aa_appointment_scheduler_add = new aa_appointment_scheduler_add();

// Run the page
$aa_appointment_scheduler_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$aa_appointment_scheduler_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var faa_appointment_scheduleradd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	faa_appointment_scheduleradd = currentForm = new ew.Form("faa_appointment_scheduleradd", "add");

	// Validate form
	faa_appointment_scheduleradd.validate = function() {
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
			<?php if ($aa_appointment_scheduler_add->start_date->Required) { ?>
				elm = this.getElements("x" + infix + "_start_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $aa_appointment_scheduler_add->start_date->caption(), $aa_appointment_scheduler_add->start_date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_start_date");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($aa_appointment_scheduler_add->start_date->errorMessage()) ?>");
			<?php if ($aa_appointment_scheduler_add->end_date->Required) { ?>
				elm = this.getElements("x" + infix + "_end_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $aa_appointment_scheduler_add->end_date->caption(), $aa_appointment_scheduler_add->end_date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_end_date");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($aa_appointment_scheduler_add->end_date->errorMessage()) ?>");
			<?php if ($aa_appointment_scheduler_add->patientID->Required) { ?>
				elm = this.getElements("x" + infix + "_patientID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $aa_appointment_scheduler_add->patientID->caption(), $aa_appointment_scheduler_add->patientID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($aa_appointment_scheduler_add->patientName->Required) { ?>
				elm = this.getElements("x" + infix + "_patientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $aa_appointment_scheduler_add->patientName->caption(), $aa_appointment_scheduler_add->patientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($aa_appointment_scheduler_add->DoctorID->Required) { ?>
				elm = this.getElements("x" + infix + "_DoctorID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $aa_appointment_scheduler_add->DoctorID->caption(), $aa_appointment_scheduler_add->DoctorID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($aa_appointment_scheduler_add->DoctorName->Required) { ?>
				elm = this.getElements("x" + infix + "_DoctorName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $aa_appointment_scheduler_add->DoctorName->caption(), $aa_appointment_scheduler_add->DoctorName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($aa_appointment_scheduler_add->AppointmentStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_AppointmentStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $aa_appointment_scheduler_add->AppointmentStatus->caption(), $aa_appointment_scheduler_add->AppointmentStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($aa_appointment_scheduler_add->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $aa_appointment_scheduler_add->status->caption(), $aa_appointment_scheduler_add->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($aa_appointment_scheduler_add->DoctorCode->Required) { ?>
				elm = this.getElements("x" + infix + "_DoctorCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $aa_appointment_scheduler_add->DoctorCode->caption(), $aa_appointment_scheduler_add->DoctorCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($aa_appointment_scheduler_add->Department->Required) { ?>
				elm = this.getElements("x" + infix + "_Department");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $aa_appointment_scheduler_add->Department->caption(), $aa_appointment_scheduler_add->Department->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($aa_appointment_scheduler_add->scheduler_id->Required) { ?>
				elm = this.getElements("x" + infix + "_scheduler_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $aa_appointment_scheduler_add->scheduler_id->caption(), $aa_appointment_scheduler_add->scheduler_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($aa_appointment_scheduler_add->text->Required) { ?>
				elm = this.getElements("x" + infix + "_text");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $aa_appointment_scheduler_add->text->caption(), $aa_appointment_scheduler_add->text->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($aa_appointment_scheduler_add->appointment_status->Required) { ?>
				elm = this.getElements("x" + infix + "_appointment_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $aa_appointment_scheduler_add->appointment_status->caption(), $aa_appointment_scheduler_add->appointment_status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($aa_appointment_scheduler_add->PId->Required) { ?>
				elm = this.getElements("x" + infix + "_PId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $aa_appointment_scheduler_add->PId->caption(), $aa_appointment_scheduler_add->PId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($aa_appointment_scheduler_add->PId->errorMessage()) ?>");
			<?php if ($aa_appointment_scheduler_add->MobileNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_MobileNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $aa_appointment_scheduler_add->MobileNumber->caption(), $aa_appointment_scheduler_add->MobileNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($aa_appointment_scheduler_add->SchEmail->Required) { ?>
				elm = this.getElements("x" + infix + "_SchEmail");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $aa_appointment_scheduler_add->SchEmail->caption(), $aa_appointment_scheduler_add->SchEmail->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($aa_appointment_scheduler_add->appointment_type->Required) { ?>
				elm = this.getElements("x" + infix + "_appointment_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $aa_appointment_scheduler_add->appointment_type->caption(), $aa_appointment_scheduler_add->appointment_type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($aa_appointment_scheduler_add->Notified->Required) { ?>
				elm = this.getElements("x" + infix + "_Notified[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $aa_appointment_scheduler_add->Notified->caption(), $aa_appointment_scheduler_add->Notified->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($aa_appointment_scheduler_add->Purpose->Required) { ?>
				elm = this.getElements("x" + infix + "_Purpose");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $aa_appointment_scheduler_add->Purpose->caption(), $aa_appointment_scheduler_add->Purpose->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($aa_appointment_scheduler_add->Notes->Required) { ?>
				elm = this.getElements("x" + infix + "_Notes");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $aa_appointment_scheduler_add->Notes->caption(), $aa_appointment_scheduler_add->Notes->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($aa_appointment_scheduler_add->PatientType->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $aa_appointment_scheduler_add->PatientType->caption(), $aa_appointment_scheduler_add->PatientType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($aa_appointment_scheduler_add->Referal->Required) { ?>
				elm = this.getElements("x" + infix + "_Referal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $aa_appointment_scheduler_add->Referal->caption(), $aa_appointment_scheduler_add->Referal->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($aa_appointment_scheduler_add->paymentType->Required) { ?>
				elm = this.getElements("x" + infix + "_paymentType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $aa_appointment_scheduler_add->paymentType->caption(), $aa_appointment_scheduler_add->paymentType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($aa_appointment_scheduler_add->tittle->Required) { ?>
				elm = this.getElements("x" + infix + "_tittle");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $aa_appointment_scheduler_add->tittle->caption(), $aa_appointment_scheduler_add->tittle->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($aa_appointment_scheduler_add->gendar->Required) { ?>
				elm = this.getElements("x" + infix + "_gendar");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $aa_appointment_scheduler_add->gendar->caption(), $aa_appointment_scheduler_add->gendar->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($aa_appointment_scheduler_add->Dob->Required) { ?>
				elm = this.getElements("x" + infix + "_Dob");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $aa_appointment_scheduler_add->Dob->caption(), $aa_appointment_scheduler_add->Dob->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($aa_appointment_scheduler_add->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $aa_appointment_scheduler_add->Age->caption(), $aa_appointment_scheduler_add->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($aa_appointment_scheduler_add->WhereDidYouHear->Required) { ?>
				elm = this.getElements("x" + infix + "_WhereDidYouHear[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $aa_appointment_scheduler_add->WhereDidYouHear->caption(), $aa_appointment_scheduler_add->WhereDidYouHear->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($aa_appointment_scheduler_add->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $aa_appointment_scheduler_add->HospID->caption(), $aa_appointment_scheduler_add->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($aa_appointment_scheduler_add->createdBy->Required) { ?>
				elm = this.getElements("x" + infix + "_createdBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $aa_appointment_scheduler_add->createdBy->caption(), $aa_appointment_scheduler_add->createdBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($aa_appointment_scheduler_add->createdDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_createdDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $aa_appointment_scheduler_add->createdDateTime->caption(), $aa_appointment_scheduler_add->createdDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($aa_appointment_scheduler_add->PatientTypee->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientTypee");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $aa_appointment_scheduler_add->PatientTypee->caption(), $aa_appointment_scheduler_add->PatientTypee->RequiredErrorMessage)) ?>");
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
	faa_appointment_scheduleradd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	faa_appointment_scheduleradd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	faa_appointment_scheduleradd.lists["x_patientID"] = <?php echo $aa_appointment_scheduler_add->patientID->Lookup->toClientList($aa_appointment_scheduler_add) ?>;
	faa_appointment_scheduleradd.lists["x_patientID"].options = <?php echo JsonEncode($aa_appointment_scheduler_add->patientID->lookupOptions()) ?>;
	faa_appointment_scheduleradd.lists["x_DoctorName"] = <?php echo $aa_appointment_scheduler_add->DoctorName->Lookup->toClientList($aa_appointment_scheduler_add) ?>;
	faa_appointment_scheduleradd.lists["x_DoctorName"].options = <?php echo JsonEncode($aa_appointment_scheduler_add->DoctorName->lookupOptions()) ?>;
	faa_appointment_scheduleradd.lists["x_status[]"] = <?php echo $aa_appointment_scheduler_add->status->Lookup->toClientList($aa_appointment_scheduler_add) ?>;
	faa_appointment_scheduleradd.lists["x_status[]"].options = <?php echo JsonEncode($aa_appointment_scheduler_add->status->options(FALSE, TRUE)) ?>;
	faa_appointment_scheduleradd.lists["x_appointment_type"] = <?php echo $aa_appointment_scheduler_add->appointment_type->Lookup->toClientList($aa_appointment_scheduler_add) ?>;
	faa_appointment_scheduleradd.lists["x_appointment_type"].options = <?php echo JsonEncode($aa_appointment_scheduler_add->appointment_type->options(FALSE, TRUE)) ?>;
	faa_appointment_scheduleradd.lists["x_Notified[]"] = <?php echo $aa_appointment_scheduler_add->Notified->Lookup->toClientList($aa_appointment_scheduler_add) ?>;
	faa_appointment_scheduleradd.lists["x_Notified[]"].options = <?php echo JsonEncode($aa_appointment_scheduler_add->Notified->options(FALSE, TRUE)) ?>;
	faa_appointment_scheduleradd.lists["x_PatientType"] = <?php echo $aa_appointment_scheduler_add->PatientType->Lookup->toClientList($aa_appointment_scheduler_add) ?>;
	faa_appointment_scheduleradd.lists["x_PatientType"].options = <?php echo JsonEncode($aa_appointment_scheduler_add->PatientType->options(FALSE, TRUE)) ?>;
	faa_appointment_scheduleradd.lists["x_Referal"] = <?php echo $aa_appointment_scheduler_add->Referal->Lookup->toClientList($aa_appointment_scheduler_add) ?>;
	faa_appointment_scheduleradd.lists["x_Referal"].options = <?php echo JsonEncode($aa_appointment_scheduler_add->Referal->lookupOptions()) ?>;
	faa_appointment_scheduleradd.lists["x_tittle"] = <?php echo $aa_appointment_scheduler_add->tittle->Lookup->toClientList($aa_appointment_scheduler_add) ?>;
	faa_appointment_scheduleradd.lists["x_tittle"].options = <?php echo JsonEncode($aa_appointment_scheduler_add->tittle->lookupOptions()) ?>;
	faa_appointment_scheduleradd.lists["x_gendar"] = <?php echo $aa_appointment_scheduler_add->gendar->Lookup->toClientList($aa_appointment_scheduler_add) ?>;
	faa_appointment_scheduleradd.lists["x_gendar"].options = <?php echo JsonEncode($aa_appointment_scheduler_add->gendar->lookupOptions()) ?>;
	faa_appointment_scheduleradd.lists["x_WhereDidYouHear[]"] = <?php echo $aa_appointment_scheduler_add->WhereDidYouHear->Lookup->toClientList($aa_appointment_scheduler_add) ?>;
	faa_appointment_scheduleradd.lists["x_WhereDidYouHear[]"].options = <?php echo JsonEncode($aa_appointment_scheduler_add->WhereDidYouHear->lookupOptions()) ?>;
	faa_appointment_scheduleradd.lists["x_PatientTypee"] = <?php echo $aa_appointment_scheduler_add->PatientTypee->Lookup->toClientList($aa_appointment_scheduler_add) ?>;
	faa_appointment_scheduleradd.lists["x_PatientTypee"].options = <?php echo JsonEncode($aa_appointment_scheduler_add->PatientTypee->lookupOptions()) ?>;
	loadjs.done("faa_appointment_scheduleradd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $aa_appointment_scheduler_add->showPageHeader(); ?>
<?php
$aa_appointment_scheduler_add->showMessage();
?>
<form name="faa_appointment_scheduleradd" id="faa_appointment_scheduleradd" class="<?php echo $aa_appointment_scheduler_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="aa_appointment_scheduler">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$aa_appointment_scheduler_add->IsModal ?>">
<?php if ($aa_appointment_scheduler->getCurrentMasterTable() == "doctors") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="doctors">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($aa_appointment_scheduler_add->DoctorID->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($aa_appointment_scheduler_add->start_date->Visible) { // start_date ?>
	<div id="r_start_date" class="form-group row">
		<label id="elh_aa_appointment_scheduler_start_date" for="x_start_date" class="<?php echo $aa_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_aa_appointment_scheduler_start_date" type="text/html"><?php echo $aa_appointment_scheduler_add->start_date->caption() ?><?php echo $aa_appointment_scheduler_add->start_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $aa_appointment_scheduler_add->RightColumnClass ?>"><div <?php echo $aa_appointment_scheduler_add->start_date->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_start_date" type="text/html"><span id="el_aa_appointment_scheduler_start_date">
<input type="text" data-table="aa_appointment_scheduler" data-field="x_start_date" data-format="11" name="x_start_date" id="x_start_date" placeholder="<?php echo HtmlEncode($aa_appointment_scheduler_add->start_date->getPlaceHolder()) ?>" value="<?php echo $aa_appointment_scheduler_add->start_date->EditValue ?>"<?php echo $aa_appointment_scheduler_add->start_date->editAttributes() ?>>
<?php if (!$aa_appointment_scheduler_add->start_date->ReadOnly && !$aa_appointment_scheduler_add->start_date->Disabled && !isset($aa_appointment_scheduler_add->start_date->EditAttrs["readonly"]) && !isset($aa_appointment_scheduler_add->start_date->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="aa_appointment_scheduleradd_js">
loadjs.ready(["faa_appointment_scheduleradd", "datetimepicker"], function() {
	ew.createDateTimePicker("faa_appointment_scheduleradd", "x_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $aa_appointment_scheduler_add->start_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aa_appointment_scheduler_add->end_date->Visible) { // end_date ?>
	<div id="r_end_date" class="form-group row">
		<label id="elh_aa_appointment_scheduler_end_date" for="x_end_date" class="<?php echo $aa_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_aa_appointment_scheduler_end_date" type="text/html"><?php echo $aa_appointment_scheduler_add->end_date->caption() ?><?php echo $aa_appointment_scheduler_add->end_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $aa_appointment_scheduler_add->RightColumnClass ?>"><div <?php echo $aa_appointment_scheduler_add->end_date->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_end_date" type="text/html"><span id="el_aa_appointment_scheduler_end_date">
<input type="text" data-table="aa_appointment_scheduler" data-field="x_end_date" data-format="11" name="x_end_date" id="x_end_date" placeholder="<?php echo HtmlEncode($aa_appointment_scheduler_add->end_date->getPlaceHolder()) ?>" value="<?php echo $aa_appointment_scheduler_add->end_date->EditValue ?>"<?php echo $aa_appointment_scheduler_add->end_date->editAttributes() ?>>
<?php if (!$aa_appointment_scheduler_add->end_date->ReadOnly && !$aa_appointment_scheduler_add->end_date->Disabled && !isset($aa_appointment_scheduler_add->end_date->EditAttrs["readonly"]) && !isset($aa_appointment_scheduler_add->end_date->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="aa_appointment_scheduleradd_js">
loadjs.ready(["faa_appointment_scheduleradd", "datetimepicker"], function() {
	ew.createDateTimePicker("faa_appointment_scheduleradd", "x_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $aa_appointment_scheduler_add->end_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aa_appointment_scheduler_add->patientID->Visible) { // patientID ?>
	<div id="r_patientID" class="form-group row">
		<label id="elh_aa_appointment_scheduler_patientID" for="x_patientID" class="<?php echo $aa_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_aa_appointment_scheduler_patientID" type="text/html"><?php echo $aa_appointment_scheduler_add->patientID->caption() ?><?php echo $aa_appointment_scheduler_add->patientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $aa_appointment_scheduler_add->RightColumnClass ?>"><div <?php echo $aa_appointment_scheduler_add->patientID->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_patientID" type="text/html"><span id="el_aa_appointment_scheduler_patientID">
<?php $aa_appointment_scheduler_add->patientID->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_patientID"><?php echo EmptyValue(strval($aa_appointment_scheduler_add->patientID->ViewValue)) ? $Language->phrase("PleaseSelect") : $aa_appointment_scheduler_add->patientID->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($aa_appointment_scheduler_add->patientID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($aa_appointment_scheduler_add->patientID->ReadOnly || $aa_appointment_scheduler_add->patientID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_patientID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $aa_appointment_scheduler_add->patientID->Lookup->getParamTag($aa_appointment_scheduler_add, "p_x_patientID") ?>
<input type="hidden" data-table="aa_appointment_scheduler" data-field="x_patientID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $aa_appointment_scheduler_add->patientID->displayValueSeparatorAttribute() ?>" name="x_patientID" id="x_patientID" value="<?php echo $aa_appointment_scheduler_add->patientID->CurrentValue ?>"<?php echo $aa_appointment_scheduler_add->patientID->editAttributes() ?>>
</span></script>
<?php echo $aa_appointment_scheduler_add->patientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aa_appointment_scheduler_add->patientName->Visible) { // patientName ?>
	<div id="r_patientName" class="form-group row">
		<label id="elh_aa_appointment_scheduler_patientName" for="x_patientName" class="<?php echo $aa_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_aa_appointment_scheduler_patientName" type="text/html"><?php echo $aa_appointment_scheduler_add->patientName->caption() ?><?php echo $aa_appointment_scheduler_add->patientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $aa_appointment_scheduler_add->RightColumnClass ?>"><div <?php echo $aa_appointment_scheduler_add->patientName->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_patientName" type="text/html"><span id="el_aa_appointment_scheduler_patientName">
<input type="text" data-table="aa_appointment_scheduler" data-field="x_patientName" name="x_patientName" id="x_patientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($aa_appointment_scheduler_add->patientName->getPlaceHolder()) ?>" value="<?php echo $aa_appointment_scheduler_add->patientName->EditValue ?>"<?php echo $aa_appointment_scheduler_add->patientName->editAttributes() ?>>
</span></script>
<?php echo $aa_appointment_scheduler_add->patientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aa_appointment_scheduler_add->DoctorID->Visible) { // DoctorID ?>
	<div id="r_DoctorID" class="form-group row">
		<label id="elh_aa_appointment_scheduler_DoctorID" for="x_DoctorID" class="<?php echo $aa_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_aa_appointment_scheduler_DoctorID" type="text/html"><?php echo $aa_appointment_scheduler_add->DoctorID->caption() ?><?php echo $aa_appointment_scheduler_add->DoctorID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $aa_appointment_scheduler_add->RightColumnClass ?>"><div <?php echo $aa_appointment_scheduler_add->DoctorID->cellAttributes() ?>>
<?php if ($aa_appointment_scheduler_add->DoctorID->getSessionValue() != "") { ?>
<script id="tpx_aa_appointment_scheduler_DoctorID" type="text/html"><span id="el_aa_appointment_scheduler_DoctorID">
<span<?php echo $aa_appointment_scheduler_add->DoctorID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($aa_appointment_scheduler_add->DoctorID->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_DoctorID" name="x_DoctorID" value="<?php echo HtmlEncode($aa_appointment_scheduler_add->DoctorID->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_aa_appointment_scheduler_DoctorID" type="text/html"><span id="el_aa_appointment_scheduler_DoctorID">
<input type="text" data-table="aa_appointment_scheduler" data-field="x_DoctorID" name="x_DoctorID" id="x_DoctorID" size="3" maxlength="5" placeholder="<?php echo HtmlEncode($aa_appointment_scheduler_add->DoctorID->getPlaceHolder()) ?>" value="<?php echo $aa_appointment_scheduler_add->DoctorID->EditValue ?>"<?php echo $aa_appointment_scheduler_add->DoctorID->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $aa_appointment_scheduler_add->DoctorID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aa_appointment_scheduler_add->DoctorName->Visible) { // DoctorName ?>
	<div id="r_DoctorName" class="form-group row">
		<label id="elh_aa_appointment_scheduler_DoctorName" for="x_DoctorName" class="<?php echo $aa_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_aa_appointment_scheduler_DoctorName" type="text/html"><?php echo $aa_appointment_scheduler_add->DoctorName->caption() ?><?php echo $aa_appointment_scheduler_add->DoctorName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $aa_appointment_scheduler_add->RightColumnClass ?>"><div <?php echo $aa_appointment_scheduler_add->DoctorName->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_DoctorName" type="text/html"><span id="el_aa_appointment_scheduler_DoctorName">
<?php $aa_appointment_scheduler_add->DoctorName->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DoctorName"><?php echo EmptyValue(strval($aa_appointment_scheduler_add->DoctorName->ViewValue)) ? $Language->phrase("PleaseSelect") : $aa_appointment_scheduler_add->DoctorName->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($aa_appointment_scheduler_add->DoctorName->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($aa_appointment_scheduler_add->DoctorName->ReadOnly || $aa_appointment_scheduler_add->DoctorName->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_DoctorName',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $aa_appointment_scheduler_add->DoctorName->Lookup->getParamTag($aa_appointment_scheduler_add, "p_x_DoctorName") ?>
<input type="hidden" data-table="aa_appointment_scheduler" data-field="x_DoctorName" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $aa_appointment_scheduler_add->DoctorName->displayValueSeparatorAttribute() ?>" name="x_DoctorName" id="x_DoctorName" value="<?php echo $aa_appointment_scheduler_add->DoctorName->CurrentValue ?>"<?php echo $aa_appointment_scheduler_add->DoctorName->editAttributes() ?>>
</span></script>
<?php echo $aa_appointment_scheduler_add->DoctorName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aa_appointment_scheduler_add->AppointmentStatus->Visible) { // AppointmentStatus ?>
	<div id="r_AppointmentStatus" class="form-group row">
		<label id="elh_aa_appointment_scheduler_AppointmentStatus" for="x_AppointmentStatus" class="<?php echo $aa_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_aa_appointment_scheduler_AppointmentStatus" type="text/html"><?php echo $aa_appointment_scheduler_add->AppointmentStatus->caption() ?><?php echo $aa_appointment_scheduler_add->AppointmentStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $aa_appointment_scheduler_add->RightColumnClass ?>"><div <?php echo $aa_appointment_scheduler_add->AppointmentStatus->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_AppointmentStatus" type="text/html"><span id="el_aa_appointment_scheduler_AppointmentStatus">
<input type="text" data-table="aa_appointment_scheduler" data-field="x_AppointmentStatus" name="x_AppointmentStatus" id="x_AppointmentStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($aa_appointment_scheduler_add->AppointmentStatus->getPlaceHolder()) ?>" value="<?php echo $aa_appointment_scheduler_add->AppointmentStatus->EditValue ?>"<?php echo $aa_appointment_scheduler_add->AppointmentStatus->editAttributes() ?>>
</span></script>
<?php echo $aa_appointment_scheduler_add->AppointmentStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aa_appointment_scheduler_add->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_aa_appointment_scheduler_status" class="<?php echo $aa_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_aa_appointment_scheduler_status" type="text/html"><?php echo $aa_appointment_scheduler_add->status->caption() ?><?php echo $aa_appointment_scheduler_add->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $aa_appointment_scheduler_add->RightColumnClass ?>"><div <?php echo $aa_appointment_scheduler_add->status->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_status" type="text/html"><span id="el_aa_appointment_scheduler_status">
<div id="tp_x_status" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="aa_appointment_scheduler" data-field="x_status" data-value-separator="<?php echo $aa_appointment_scheduler_add->status->displayValueSeparatorAttribute() ?>" name="x_status[]" id="x_status[]" value="{value}"<?php echo $aa_appointment_scheduler_add->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $aa_appointment_scheduler_add->status->checkBoxListHtml(FALSE, "x_status[]") ?>
</div></div>
</span></script>
<?php echo $aa_appointment_scheduler_add->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aa_appointment_scheduler_add->DoctorCode->Visible) { // DoctorCode ?>
	<div id="r_DoctorCode" class="form-group row">
		<label id="elh_aa_appointment_scheduler_DoctorCode" for="x_DoctorCode" class="<?php echo $aa_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_aa_appointment_scheduler_DoctorCode" type="text/html"><?php echo $aa_appointment_scheduler_add->DoctorCode->caption() ?><?php echo $aa_appointment_scheduler_add->DoctorCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $aa_appointment_scheduler_add->RightColumnClass ?>"><div <?php echo $aa_appointment_scheduler_add->DoctorCode->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_DoctorCode" type="text/html"><span id="el_aa_appointment_scheduler_DoctorCode">
<input type="text" data-table="aa_appointment_scheduler" data-field="x_DoctorCode" name="x_DoctorCode" id="x_DoctorCode" size="5" maxlength="7" placeholder="<?php echo HtmlEncode($aa_appointment_scheduler_add->DoctorCode->getPlaceHolder()) ?>" value="<?php echo $aa_appointment_scheduler_add->DoctorCode->EditValue ?>"<?php echo $aa_appointment_scheduler_add->DoctorCode->editAttributes() ?>>
</span></script>
<?php echo $aa_appointment_scheduler_add->DoctorCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aa_appointment_scheduler_add->Department->Visible) { // Department ?>
	<div id="r_Department" class="form-group row">
		<label id="elh_aa_appointment_scheduler_Department" for="x_Department" class="<?php echo $aa_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_aa_appointment_scheduler_Department" type="text/html"><?php echo $aa_appointment_scheduler_add->Department->caption() ?><?php echo $aa_appointment_scheduler_add->Department->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $aa_appointment_scheduler_add->RightColumnClass ?>"><div <?php echo $aa_appointment_scheduler_add->Department->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_Department" type="text/html"><span id="el_aa_appointment_scheduler_Department">
<input type="text" data-table="aa_appointment_scheduler" data-field="x_Department" name="x_Department" id="x_Department" size="8" maxlength="15" placeholder="<?php echo HtmlEncode($aa_appointment_scheduler_add->Department->getPlaceHolder()) ?>" value="<?php echo $aa_appointment_scheduler_add->Department->EditValue ?>"<?php echo $aa_appointment_scheduler_add->Department->editAttributes() ?>>
</span></script>
<?php echo $aa_appointment_scheduler_add->Department->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aa_appointment_scheduler_add->scheduler_id->Visible) { // scheduler_id ?>
	<div id="r_scheduler_id" class="form-group row">
		<label id="elh_aa_appointment_scheduler_scheduler_id" for="x_scheduler_id" class="<?php echo $aa_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_aa_appointment_scheduler_scheduler_id" type="text/html"><?php echo $aa_appointment_scheduler_add->scheduler_id->caption() ?><?php echo $aa_appointment_scheduler_add->scheduler_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $aa_appointment_scheduler_add->RightColumnClass ?>"><div <?php echo $aa_appointment_scheduler_add->scheduler_id->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_scheduler_id" type="text/html"><span id="el_aa_appointment_scheduler_scheduler_id">
<input type="text" data-table="aa_appointment_scheduler" data-field="x_scheduler_id" name="x_scheduler_id" id="x_scheduler_id" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($aa_appointment_scheduler_add->scheduler_id->getPlaceHolder()) ?>" value="<?php echo $aa_appointment_scheduler_add->scheduler_id->EditValue ?>"<?php echo $aa_appointment_scheduler_add->scheduler_id->editAttributes() ?>>
</span></script>
<?php echo $aa_appointment_scheduler_add->scheduler_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aa_appointment_scheduler_add->text->Visible) { // text ?>
	<div id="r_text" class="form-group row">
		<label id="elh_aa_appointment_scheduler_text" for="x_text" class="<?php echo $aa_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_aa_appointment_scheduler_text" type="text/html"><?php echo $aa_appointment_scheduler_add->text->caption() ?><?php echo $aa_appointment_scheduler_add->text->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $aa_appointment_scheduler_add->RightColumnClass ?>"><div <?php echo $aa_appointment_scheduler_add->text->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_text" type="text/html"><span id="el_aa_appointment_scheduler_text">
<input type="text" data-table="aa_appointment_scheduler" data-field="x_text" name="x_text" id="x_text" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($aa_appointment_scheduler_add->text->getPlaceHolder()) ?>" value="<?php echo $aa_appointment_scheduler_add->text->EditValue ?>"<?php echo $aa_appointment_scheduler_add->text->editAttributes() ?>>
</span></script>
<?php echo $aa_appointment_scheduler_add->text->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aa_appointment_scheduler_add->appointment_status->Visible) { // appointment_status ?>
	<div id="r_appointment_status" class="form-group row">
		<label id="elh_aa_appointment_scheduler_appointment_status" for="x_appointment_status" class="<?php echo $aa_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_aa_appointment_scheduler_appointment_status" type="text/html"><?php echo $aa_appointment_scheduler_add->appointment_status->caption() ?><?php echo $aa_appointment_scheduler_add->appointment_status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $aa_appointment_scheduler_add->RightColumnClass ?>"><div <?php echo $aa_appointment_scheduler_add->appointment_status->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_appointment_status" type="text/html"><span id="el_aa_appointment_scheduler_appointment_status">
<input type="text" data-table="aa_appointment_scheduler" data-field="x_appointment_status" name="x_appointment_status" id="x_appointment_status" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($aa_appointment_scheduler_add->appointment_status->getPlaceHolder()) ?>" value="<?php echo $aa_appointment_scheduler_add->appointment_status->EditValue ?>"<?php echo $aa_appointment_scheduler_add->appointment_status->editAttributes() ?>>
</span></script>
<?php echo $aa_appointment_scheduler_add->appointment_status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aa_appointment_scheduler_add->PId->Visible) { // PId ?>
	<div id="r_PId" class="form-group row">
		<label id="elh_aa_appointment_scheduler_PId" for="x_PId" class="<?php echo $aa_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_aa_appointment_scheduler_PId" type="text/html"><?php echo $aa_appointment_scheduler_add->PId->caption() ?><?php echo $aa_appointment_scheduler_add->PId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $aa_appointment_scheduler_add->RightColumnClass ?>"><div <?php echo $aa_appointment_scheduler_add->PId->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_PId" type="text/html"><span id="el_aa_appointment_scheduler_PId">
<input type="text" data-table="aa_appointment_scheduler" data-field="x_PId" name="x_PId" id="x_PId" size="30" placeholder="<?php echo HtmlEncode($aa_appointment_scheduler_add->PId->getPlaceHolder()) ?>" value="<?php echo $aa_appointment_scheduler_add->PId->EditValue ?>"<?php echo $aa_appointment_scheduler_add->PId->editAttributes() ?>>
</span></script>
<?php echo $aa_appointment_scheduler_add->PId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aa_appointment_scheduler_add->MobileNumber->Visible) { // MobileNumber ?>
	<div id="r_MobileNumber" class="form-group row">
		<label id="elh_aa_appointment_scheduler_MobileNumber" for="x_MobileNumber" class="<?php echo $aa_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_aa_appointment_scheduler_MobileNumber" type="text/html"><?php echo $aa_appointment_scheduler_add->MobileNumber->caption() ?><?php echo $aa_appointment_scheduler_add->MobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $aa_appointment_scheduler_add->RightColumnClass ?>"><div <?php echo $aa_appointment_scheduler_add->MobileNumber->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_MobileNumber" type="text/html"><span id="el_aa_appointment_scheduler_MobileNumber">
<input type="text" data-table="aa_appointment_scheduler" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($aa_appointment_scheduler_add->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $aa_appointment_scheduler_add->MobileNumber->EditValue ?>"<?php echo $aa_appointment_scheduler_add->MobileNumber->editAttributes() ?>>
</span></script>
<?php echo $aa_appointment_scheduler_add->MobileNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aa_appointment_scheduler_add->SchEmail->Visible) { // SchEmail ?>
	<div id="r_SchEmail" class="form-group row">
		<label id="elh_aa_appointment_scheduler_SchEmail" for="x_SchEmail" class="<?php echo $aa_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_aa_appointment_scheduler_SchEmail" type="text/html"><?php echo $aa_appointment_scheduler_add->SchEmail->caption() ?><?php echo $aa_appointment_scheduler_add->SchEmail->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $aa_appointment_scheduler_add->RightColumnClass ?>"><div <?php echo $aa_appointment_scheduler_add->SchEmail->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_SchEmail" type="text/html"><span id="el_aa_appointment_scheduler_SchEmail">
<input type="text" data-table="aa_appointment_scheduler" data-field="x_SchEmail" name="x_SchEmail" id="x_SchEmail" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($aa_appointment_scheduler_add->SchEmail->getPlaceHolder()) ?>" value="<?php echo $aa_appointment_scheduler_add->SchEmail->EditValue ?>"<?php echo $aa_appointment_scheduler_add->SchEmail->editAttributes() ?>>
</span></script>
<?php echo $aa_appointment_scheduler_add->SchEmail->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aa_appointment_scheduler_add->appointment_type->Visible) { // appointment_type ?>
	<div id="r_appointment_type" class="form-group row">
		<label id="elh_aa_appointment_scheduler_appointment_type" class="<?php echo $aa_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_aa_appointment_scheduler_appointment_type" type="text/html"><?php echo $aa_appointment_scheduler_add->appointment_type->caption() ?><?php echo $aa_appointment_scheduler_add->appointment_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $aa_appointment_scheduler_add->RightColumnClass ?>"><div <?php echo $aa_appointment_scheduler_add->appointment_type->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_appointment_type" type="text/html"><span id="el_aa_appointment_scheduler_appointment_type">
<div id="tp_x_appointment_type" class="ew-template"><input type="radio" class="custom-control-input" data-table="aa_appointment_scheduler" data-field="x_appointment_type" data-value-separator="<?php echo $aa_appointment_scheduler_add->appointment_type->displayValueSeparatorAttribute() ?>" name="x_appointment_type" id="x_appointment_type" value="{value}"<?php echo $aa_appointment_scheduler_add->appointment_type->editAttributes() ?>></div>
<div id="dsl_x_appointment_type" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $aa_appointment_scheduler_add->appointment_type->radioButtonListHtml(FALSE, "x_appointment_type") ?>
</div></div>
</span></script>
<?php echo $aa_appointment_scheduler_add->appointment_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aa_appointment_scheduler_add->Notified->Visible) { // Notified ?>
	<div id="r_Notified" class="form-group row">
		<label id="elh_aa_appointment_scheduler_Notified" class="<?php echo $aa_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_aa_appointment_scheduler_Notified" type="text/html"><?php echo $aa_appointment_scheduler_add->Notified->caption() ?><?php echo $aa_appointment_scheduler_add->Notified->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $aa_appointment_scheduler_add->RightColumnClass ?>"><div <?php echo $aa_appointment_scheduler_add->Notified->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_Notified" type="text/html"><span id="el_aa_appointment_scheduler_Notified">
<div id="tp_x_Notified" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="aa_appointment_scheduler" data-field="x_Notified" data-value-separator="<?php echo $aa_appointment_scheduler_add->Notified->displayValueSeparatorAttribute() ?>" name="x_Notified[]" id="x_Notified[]" value="{value}"<?php echo $aa_appointment_scheduler_add->Notified->editAttributes() ?>></div>
<div id="dsl_x_Notified" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $aa_appointment_scheduler_add->Notified->checkBoxListHtml(FALSE, "x_Notified[]") ?>
</div></div>
</span></script>
<?php echo $aa_appointment_scheduler_add->Notified->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aa_appointment_scheduler_add->Purpose->Visible) { // Purpose ?>
	<div id="r_Purpose" class="form-group row">
		<label id="elh_aa_appointment_scheduler_Purpose" for="x_Purpose" class="<?php echo $aa_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_aa_appointment_scheduler_Purpose" type="text/html"><?php echo $aa_appointment_scheduler_add->Purpose->caption() ?><?php echo $aa_appointment_scheduler_add->Purpose->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $aa_appointment_scheduler_add->RightColumnClass ?>"><div <?php echo $aa_appointment_scheduler_add->Purpose->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_Purpose" type="text/html"><span id="el_aa_appointment_scheduler_Purpose">
<input type="text" data-table="aa_appointment_scheduler" data-field="x_Purpose" name="x_Purpose" id="x_Purpose" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($aa_appointment_scheduler_add->Purpose->getPlaceHolder()) ?>" value="<?php echo $aa_appointment_scheduler_add->Purpose->EditValue ?>"<?php echo $aa_appointment_scheduler_add->Purpose->editAttributes() ?>>
</span></script>
<?php echo $aa_appointment_scheduler_add->Purpose->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aa_appointment_scheduler_add->Notes->Visible) { // Notes ?>
	<div id="r_Notes" class="form-group row">
		<label id="elh_aa_appointment_scheduler_Notes" for="x_Notes" class="<?php echo $aa_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_aa_appointment_scheduler_Notes" type="text/html"><?php echo $aa_appointment_scheduler_add->Notes->caption() ?><?php echo $aa_appointment_scheduler_add->Notes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $aa_appointment_scheduler_add->RightColumnClass ?>"><div <?php echo $aa_appointment_scheduler_add->Notes->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_Notes" type="text/html"><span id="el_aa_appointment_scheduler_Notes">
<input type="text" data-table="aa_appointment_scheduler" data-field="x_Notes" name="x_Notes" id="x_Notes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($aa_appointment_scheduler_add->Notes->getPlaceHolder()) ?>" value="<?php echo $aa_appointment_scheduler_add->Notes->EditValue ?>"<?php echo $aa_appointment_scheduler_add->Notes->editAttributes() ?>>
</span></script>
<?php echo $aa_appointment_scheduler_add->Notes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aa_appointment_scheduler_add->PatientType->Visible) { // PatientType ?>
	<div id="r_PatientType" class="form-group row">
		<label id="elh_aa_appointment_scheduler_PatientType" class="<?php echo $aa_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_aa_appointment_scheduler_PatientType" type="text/html"><?php echo $aa_appointment_scheduler_add->PatientType->caption() ?><?php echo $aa_appointment_scheduler_add->PatientType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $aa_appointment_scheduler_add->RightColumnClass ?>"><div <?php echo $aa_appointment_scheduler_add->PatientType->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_PatientType" type="text/html"><span id="el_aa_appointment_scheduler_PatientType">
<?php $aa_appointment_scheduler_add->PatientType->EditAttrs->prepend("onclick", "ew.updateOptions.call(this);"); ?>
<div id="tp_x_PatientType" class="ew-template"><input type="radio" class="custom-control-input" data-table="aa_appointment_scheduler" data-field="x_PatientType" data-value-separator="<?php echo $aa_appointment_scheduler_add->PatientType->displayValueSeparatorAttribute() ?>" name="x_PatientType" id="x_PatientType" value="{value}"<?php echo $aa_appointment_scheduler_add->PatientType->editAttributes() ?>></div>
<div id="dsl_x_PatientType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $aa_appointment_scheduler_add->PatientType->radioButtonListHtml(FALSE, "x_PatientType") ?>
</div></div>
</span></script>
<?php echo $aa_appointment_scheduler_add->PatientType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aa_appointment_scheduler_add->Referal->Visible) { // Referal ?>
	<div id="r_Referal" class="form-group row">
		<label id="elh_aa_appointment_scheduler_Referal" for="x_Referal" class="<?php echo $aa_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_aa_appointment_scheduler_Referal" type="text/html"><?php echo $aa_appointment_scheduler_add->Referal->caption() ?><?php echo $aa_appointment_scheduler_add->Referal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $aa_appointment_scheduler_add->RightColumnClass ?>"><div <?php echo $aa_appointment_scheduler_add->Referal->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_Referal" type="text/html"><span id="el_aa_appointment_scheduler_Referal">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Referal"><?php echo EmptyValue(strval($aa_appointment_scheduler_add->Referal->ViewValue)) ? $Language->phrase("PleaseSelect") : $aa_appointment_scheduler_add->Referal->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($aa_appointment_scheduler_add->Referal->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($aa_appointment_scheduler_add->Referal->ReadOnly || $aa_appointment_scheduler_add->Referal->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Referal',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "mas_reference_type") && !$aa_appointment_scheduler_add->Referal->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Referal" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $aa_appointment_scheduler_add->Referal->caption() ?>" data-title="<?php echo $aa_appointment_scheduler_add->Referal->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Referal',url:'mas_reference_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $aa_appointment_scheduler_add->Referal->Lookup->getParamTag($aa_appointment_scheduler_add, "p_x_Referal") ?>
<input type="hidden" data-table="aa_appointment_scheduler" data-field="x_Referal" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $aa_appointment_scheduler_add->Referal->displayValueSeparatorAttribute() ?>" name="x_Referal" id="x_Referal" value="<?php echo $aa_appointment_scheduler_add->Referal->CurrentValue ?>"<?php echo $aa_appointment_scheduler_add->Referal->editAttributes() ?>>
</span></script>
<?php echo $aa_appointment_scheduler_add->Referal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aa_appointment_scheduler_add->paymentType->Visible) { // paymentType ?>
	<div id="r_paymentType" class="form-group row">
		<label id="elh_aa_appointment_scheduler_paymentType" for="x_paymentType" class="<?php echo $aa_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_aa_appointment_scheduler_paymentType" type="text/html"><?php echo $aa_appointment_scheduler_add->paymentType->caption() ?><?php echo $aa_appointment_scheduler_add->paymentType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $aa_appointment_scheduler_add->RightColumnClass ?>"><div <?php echo $aa_appointment_scheduler_add->paymentType->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_paymentType" type="text/html"><span id="el_aa_appointment_scheduler_paymentType">
<input type="text" data-table="aa_appointment_scheduler" data-field="x_paymentType" name="x_paymentType" id="x_paymentType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($aa_appointment_scheduler_add->paymentType->getPlaceHolder()) ?>" value="<?php echo $aa_appointment_scheduler_add->paymentType->EditValue ?>"<?php echo $aa_appointment_scheduler_add->paymentType->editAttributes() ?>>
</span></script>
<?php echo $aa_appointment_scheduler_add->paymentType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aa_appointment_scheduler_add->tittle->Visible) { // tittle ?>
	<div id="r_tittle" class="form-group row">
		<label id="elh_aa_appointment_scheduler_tittle" for="x_tittle" class="<?php echo $aa_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_aa_appointment_scheduler_tittle" type="text/html"><?php echo $aa_appointment_scheduler_add->tittle->caption() ?><?php echo $aa_appointment_scheduler_add->tittle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $aa_appointment_scheduler_add->RightColumnClass ?>"><div <?php echo $aa_appointment_scheduler_add->tittle->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_tittle" type="text/html"><span id="el_aa_appointment_scheduler_tittle">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="aa_appointment_scheduler" data-field="x_tittle" data-value-separator="<?php echo $aa_appointment_scheduler_add->tittle->displayValueSeparatorAttribute() ?>" id="x_tittle" name="x_tittle"<?php echo $aa_appointment_scheduler_add->tittle->editAttributes() ?>>
			<?php echo $aa_appointment_scheduler_add->tittle->selectOptionListHtml("x_tittle") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "sys_tittle") && !$aa_appointment_scheduler_add->tittle->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_tittle" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $aa_appointment_scheduler_add->tittle->caption() ?>" data-title="<?php echo $aa_appointment_scheduler_add->tittle->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_tittle',url:'sys_tittleaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $aa_appointment_scheduler_add->tittle->Lookup->getParamTag($aa_appointment_scheduler_add, "p_x_tittle") ?>
</span></script>
<?php echo $aa_appointment_scheduler_add->tittle->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aa_appointment_scheduler_add->gendar->Visible) { // gendar ?>
	<div id="r_gendar" class="form-group row">
		<label id="elh_aa_appointment_scheduler_gendar" for="x_gendar" class="<?php echo $aa_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_aa_appointment_scheduler_gendar" type="text/html"><?php echo $aa_appointment_scheduler_add->gendar->caption() ?><?php echo $aa_appointment_scheduler_add->gendar->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $aa_appointment_scheduler_add->RightColumnClass ?>"><div <?php echo $aa_appointment_scheduler_add->gendar->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_gendar" type="text/html"><span id="el_aa_appointment_scheduler_gendar">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="aa_appointment_scheduler" data-field="x_gendar" data-value-separator="<?php echo $aa_appointment_scheduler_add->gendar->displayValueSeparatorAttribute() ?>" id="x_gendar" name="x_gendar"<?php echo $aa_appointment_scheduler_add->gendar->editAttributes() ?>>
			<?php echo $aa_appointment_scheduler_add->gendar->selectOptionListHtml("x_gendar") ?>
		</select>
</div>
<?php echo $aa_appointment_scheduler_add->gendar->Lookup->getParamTag($aa_appointment_scheduler_add, "p_x_gendar") ?>
</span></script>
<?php echo $aa_appointment_scheduler_add->gendar->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aa_appointment_scheduler_add->Dob->Visible) { // Dob ?>
	<div id="r_Dob" class="form-group row">
		<label id="elh_aa_appointment_scheduler_Dob" for="x_Dob" class="<?php echo $aa_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_aa_appointment_scheduler_Dob" type="text/html"><?php echo $aa_appointment_scheduler_add->Dob->caption() ?><?php echo $aa_appointment_scheduler_add->Dob->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $aa_appointment_scheduler_add->RightColumnClass ?>"><div <?php echo $aa_appointment_scheduler_add->Dob->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_Dob" type="text/html"><span id="el_aa_appointment_scheduler_Dob">
<input type="text" data-table="aa_appointment_scheduler" data-field="x_Dob" name="x_Dob" id="x_Dob" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($aa_appointment_scheduler_add->Dob->getPlaceHolder()) ?>" value="<?php echo $aa_appointment_scheduler_add->Dob->EditValue ?>"<?php echo $aa_appointment_scheduler_add->Dob->editAttributes() ?>>
<?php if (!$aa_appointment_scheduler_add->Dob->ReadOnly && !$aa_appointment_scheduler_add->Dob->Disabled && !isset($aa_appointment_scheduler_add->Dob->EditAttrs["readonly"]) && !isset($aa_appointment_scheduler_add->Dob->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="aa_appointment_scheduleradd_js">
loadjs.ready(["faa_appointment_scheduleradd", "datetimepicker"], function() {
	ew.createDateTimePicker("faa_appointment_scheduleradd", "x_Dob", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $aa_appointment_scheduler_add->Dob->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aa_appointment_scheduler_add->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_aa_appointment_scheduler_Age" for="x_Age" class="<?php echo $aa_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_aa_appointment_scheduler_Age" type="text/html"><?php echo $aa_appointment_scheduler_add->Age->caption() ?><?php echo $aa_appointment_scheduler_add->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $aa_appointment_scheduler_add->RightColumnClass ?>"><div <?php echo $aa_appointment_scheduler_add->Age->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_Age" type="text/html"><span id="el_aa_appointment_scheduler_Age">
<input type="text" data-table="aa_appointment_scheduler" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($aa_appointment_scheduler_add->Age->getPlaceHolder()) ?>" value="<?php echo $aa_appointment_scheduler_add->Age->EditValue ?>"<?php echo $aa_appointment_scheduler_add->Age->editAttributes() ?>>
</span></script>
<?php echo $aa_appointment_scheduler_add->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aa_appointment_scheduler_add->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<div id="r_WhereDidYouHear" class="form-group row">
		<label id="elh_aa_appointment_scheduler_WhereDidYouHear" class="<?php echo $aa_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_aa_appointment_scheduler_WhereDidYouHear" type="text/html"><?php echo $aa_appointment_scheduler_add->WhereDidYouHear->caption() ?><?php echo $aa_appointment_scheduler_add->WhereDidYouHear->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $aa_appointment_scheduler_add->RightColumnClass ?>"><div <?php echo $aa_appointment_scheduler_add->WhereDidYouHear->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_WhereDidYouHear" type="text/html"><span id="el_aa_appointment_scheduler_WhereDidYouHear">
<div id="tp_x_WhereDidYouHear" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="aa_appointment_scheduler" data-field="x_WhereDidYouHear" data-value-separator="<?php echo $aa_appointment_scheduler_add->WhereDidYouHear->displayValueSeparatorAttribute() ?>" name="x_WhereDidYouHear[]" id="x_WhereDidYouHear[]" value="{value}"<?php echo $aa_appointment_scheduler_add->WhereDidYouHear->editAttributes() ?>></div>
<div id="dsl_x_WhereDidYouHear" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $aa_appointment_scheduler_add->WhereDidYouHear->checkBoxListHtml(FALSE, "x_WhereDidYouHear[]") ?>
</div></div>
<?php echo $aa_appointment_scheduler_add->WhereDidYouHear->Lookup->getParamTag($aa_appointment_scheduler_add, "p_x_WhereDidYouHear") ?>
</span></script>
<?php echo $aa_appointment_scheduler_add->WhereDidYouHear->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aa_appointment_scheduler_add->PatientTypee->Visible) { // PatientTypee ?>
	<div id="r_PatientTypee" class="form-group row">
		<label id="elh_aa_appointment_scheduler_PatientTypee" for="x_PatientTypee" class="<?php echo $aa_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_aa_appointment_scheduler_PatientTypee" type="text/html"><?php echo $aa_appointment_scheduler_add->PatientTypee->caption() ?><?php echo $aa_appointment_scheduler_add->PatientTypee->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $aa_appointment_scheduler_add->RightColumnClass ?>"><div <?php echo $aa_appointment_scheduler_add->PatientTypee->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_PatientTypee" type="text/html"><span id="el_aa_appointment_scheduler_PatientTypee">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="aa_appointment_scheduler" data-field="x_PatientTypee" data-value-separator="<?php echo $aa_appointment_scheduler_add->PatientTypee->displayValueSeparatorAttribute() ?>" id="x_PatientTypee" name="x_PatientTypee"<?php echo $aa_appointment_scheduler_add->PatientTypee->editAttributes() ?>>
			<?php echo $aa_appointment_scheduler_add->PatientTypee->selectOptionListHtml("x_PatientTypee") ?>
		</select>
</div>
<?php echo $aa_appointment_scheduler_add->PatientTypee->Lookup->getParamTag($aa_appointment_scheduler_add, "p_x_PatientTypee") ?>
</span></script>
<?php echo $aa_appointment_scheduler_add->PatientTypee->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_aa_appointment_scheduleradd" class="ew-custom-template"></div>
<script id="tpm_aa_appointment_scheduleradd" type="text/html">
<div id="ct_aa_appointment_scheduler_add">
<table class="ew-table" style="width:100%;">
	 <tbody>
		<tr><td class="bg-warning text-warning">{{include tmpl="#tpc_aa_appointment_scheduler_start_date"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_start_date")/}}</td><td class="bg-warning text-warning">{{include tmpl="#tpc_aa_appointment_scheduler_end_date"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_end_date")/}}</td><td>{{include tmpl="#tpc_aa_appointment_scheduler_PatientType"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_PatientType")/}}</td></tr>
	</tbody>
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>
	 	<tr>
		<td>{{include tmpl="#tpc_aa_appointment_scheduler_patientID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_patientID")/}}</td><td>{{include tmpl="#tpc_aa_appointment_scheduler_patientName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_patientName")/}}</td>
		<td>{{include tmpl="#tpc_aa_appointment_scheduler_PatientTypee"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_PatientTypee")/}}</td>
	</tr>
	</tbody>
</table>
<table id="addNewPatient" class="ew-table"  style="width:100%;background-color:#FF33A8;">
	 <tbody>	
		<tr>
			<td  name="addNewPatient">{{include tmpl="#tpc_aa_appointment_scheduler_tittle"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_tittle")/}}</td>
			<td>
			{{include tmpl="#tpc_aa_appointment_scheduler_gendar"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_gendar")/}}
</td>
			<td>
			{{include tmpl="#tpc_aa_appointment_scheduler_Dob"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_Dob")/}}
			</td>
			<td>
			{{include tmpl="#tpc_aa_appointment_scheduler_Age"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_Age")/}}
			</td>
			<td>
			<a href="patientadd.php?pagetoredirect=appointment_scheduler" id="addNewPatientSer" name="addNewPatientSer" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">More</a>
			</td>
		</tr>
	</tbody>	
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>
		<tr><td>{{include tmpl="#tpc_aa_appointment_scheduler_PId"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_PId")/}}</td><td>{{include tmpl="#tpc_aa_appointment_scheduler_MobileNumber"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_MobileNumber")/}}</td></tr>
		<tr><td>{{include tmpl="#tpc_aa_appointment_scheduler_SchEmail"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_SchEmail")/}}</td><td>{{include tmpl="#tpc_aa_appointment_scheduler_Notes"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_Notes")/}}</td></tr>
	</tbody>
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>
		<tr><td class="bg-success text-success">{{include tmpl="#tpc_aa_appointment_scheduler_DoctorID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_DoctorID")/}}</td><td class="bg-success text-success">{{include tmpl="#tpc_aa_appointment_scheduler_DoctorName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_DoctorName")/}}</td>
		<td class="bg-success text-success">{{include tmpl="#tpc_aa_appointment_scheduler_DoctorCode"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_DoctorCode")/}}</td><td class="bg-success text-success">{{include tmpl="#tpc_aa_appointment_scheduler_Department"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_Department")/}}</td></tr>
	</tbody>
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>
		<tr><td class="bg-danger text-danger">{{include tmpl="#tpc_aa_appointment_scheduler_Referal"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_Referal")/}}</td><td class="bg-danger text-danger">{{include tmpl="#tpc_aa_appointment_scheduler_Purpose"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_Purpose")/}}</td></tr>
	</tbody>
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>	
		<tr>
			<td>{{include tmpl="#tpc_aa_appointment_scheduler_WhereDidYouHear"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_WhereDidYouHear")/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_aa_appointment_scheduler_status"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_status")/}}</td>
		</tr>
	</tbody>
</table>
</div>
</script>

<?php if (!$aa_appointment_scheduler_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $aa_appointment_scheduler_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $aa_appointment_scheduler_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($aa_appointment_scheduler->Rows) ?> };
	ew.applyTemplate("tpd_aa_appointment_scheduleradd", "tpm_aa_appointment_scheduleradd", "aa_appointment_scheduleradd", "<?php echo $aa_appointment_scheduler->CustomExport ?>", ew.templateData.rows[0]);
	$("script.aa_appointment_scheduleradd_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$aa_appointment_scheduler_add->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	$("#addNewPatient").hide(),document.getElementById("f_appointment_scheduleradd").style.width="100%",$("#x_DoctorID").prop("readonly",!0),$("#x_Department").prop("readonly",!0),$("#x_PId").prop("readonly",!0),$("#x_DoctorCode").attr("readonly",!0);
});
</script>
<?php include_once "footer.php"; ?>
<?php
$aa_appointment_scheduler_add->terminate();
?>