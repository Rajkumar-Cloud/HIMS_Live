<?php
namespace PHPMaker2020\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($appointment_scheduler_grid))
	$appointment_scheduler_grid = new appointment_scheduler_grid();

// Run the page
$appointment_scheduler_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$appointment_scheduler_grid->Page_Render();
?>
<?php if (!$appointment_scheduler_grid->isExport()) { ?>
<script>
var fappointment_schedulergrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fappointment_schedulergrid = new ew.Form("fappointment_schedulergrid", "grid");
	fappointment_schedulergrid.formKeyCountName = '<?php echo $appointment_scheduler_grid->FormKeyCountName ?>';

	// Validate form
	fappointment_schedulergrid.validate = function() {
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
			var checkrow = (gridinsert) ? !this.emptyRow(infix) : true;
			if (checkrow) {
				addcnt++;
			<?php if ($appointment_scheduler_grid->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_grid->id->caption(), $appointment_scheduler_grid->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_grid->start_date->Required) { ?>
				elm = this.getElements("x" + infix + "_start_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_grid->start_date->caption(), $appointment_scheduler_grid->start_date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_start_date");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($appointment_scheduler_grid->start_date->errorMessage()) ?>");
			<?php if ($appointment_scheduler_grid->end_date->Required) { ?>
				elm = this.getElements("x" + infix + "_end_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_grid->end_date->caption(), $appointment_scheduler_grid->end_date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_end_date");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($appointment_scheduler_grid->end_date->errorMessage()) ?>");
			<?php if ($appointment_scheduler_grid->patientID->Required) { ?>
				elm = this.getElements("x" + infix + "_patientID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_grid->patientID->caption(), $appointment_scheduler_grid->patientID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_grid->patientName->Required) { ?>
				elm = this.getElements("x" + infix + "_patientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_grid->patientName->caption(), $appointment_scheduler_grid->patientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_grid->DoctorID->Required) { ?>
				elm = this.getElements("x" + infix + "_DoctorID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_grid->DoctorID->caption(), $appointment_scheduler_grid->DoctorID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_grid->DoctorName->Required) { ?>
				elm = this.getElements("x" + infix + "_DoctorName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_grid->DoctorName->caption(), $appointment_scheduler_grid->DoctorName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_grid->AppointmentStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_AppointmentStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_grid->AppointmentStatus->caption(), $appointment_scheduler_grid->AppointmentStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_grid->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_grid->status->caption(), $appointment_scheduler_grid->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_grid->DoctorCode->Required) { ?>
				elm = this.getElements("x" + infix + "_DoctorCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_grid->DoctorCode->caption(), $appointment_scheduler_grid->DoctorCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_grid->Department->Required) { ?>
				elm = this.getElements("x" + infix + "_Department");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_grid->Department->caption(), $appointment_scheduler_grid->Department->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_grid->scheduler_id->Required) { ?>
				elm = this.getElements("x" + infix + "_scheduler_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_grid->scheduler_id->caption(), $appointment_scheduler_grid->scheduler_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_grid->text->Required) { ?>
				elm = this.getElements("x" + infix + "_text");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_grid->text->caption(), $appointment_scheduler_grid->text->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_grid->appointment_status->Required) { ?>
				elm = this.getElements("x" + infix + "_appointment_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_grid->appointment_status->caption(), $appointment_scheduler_grid->appointment_status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_grid->PId->Required) { ?>
				elm = this.getElements("x" + infix + "_PId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_grid->PId->caption(), $appointment_scheduler_grid->PId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($appointment_scheduler_grid->PId->errorMessage()) ?>");
			<?php if ($appointment_scheduler_grid->MobileNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_MobileNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_grid->MobileNumber->caption(), $appointment_scheduler_grid->MobileNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_grid->SchEmail->Required) { ?>
				elm = this.getElements("x" + infix + "_SchEmail");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_grid->SchEmail->caption(), $appointment_scheduler_grid->SchEmail->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_grid->appointment_type->Required) { ?>
				elm = this.getElements("x" + infix + "_appointment_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_grid->appointment_type->caption(), $appointment_scheduler_grid->appointment_type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_grid->Notified->Required) { ?>
				elm = this.getElements("x" + infix + "_Notified[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_grid->Notified->caption(), $appointment_scheduler_grid->Notified->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_grid->Purpose->Required) { ?>
				elm = this.getElements("x" + infix + "_Purpose");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_grid->Purpose->caption(), $appointment_scheduler_grid->Purpose->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_grid->Notes->Required) { ?>
				elm = this.getElements("x" + infix + "_Notes");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_grid->Notes->caption(), $appointment_scheduler_grid->Notes->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_grid->PatientType->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_grid->PatientType->caption(), $appointment_scheduler_grid->PatientType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_grid->Referal->Required) { ?>
				elm = this.getElements("x" + infix + "_Referal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_grid->Referal->caption(), $appointment_scheduler_grid->Referal->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_grid->paymentType->Required) { ?>
				elm = this.getElements("x" + infix + "_paymentType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_grid->paymentType->caption(), $appointment_scheduler_grid->paymentType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_grid->WhereDidYouHear->Required) { ?>
				elm = this.getElements("x" + infix + "_WhereDidYouHear[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_grid->WhereDidYouHear->caption(), $appointment_scheduler_grid->WhereDidYouHear->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_grid->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_grid->HospID->caption(), $appointment_scheduler_grid->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_grid->createdBy->Required) { ?>
				elm = this.getElements("x" + infix + "_createdBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_grid->createdBy->caption(), $appointment_scheduler_grid->createdBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_grid->createdDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_createdDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_grid->createdDateTime->caption(), $appointment_scheduler_grid->createdDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_scheduler_grid->PatientTypee->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientTypee");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_scheduler_grid->PatientTypee->caption(), $appointment_scheduler_grid->PatientTypee->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	fappointment_schedulergrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "start_date", false)) return false;
		if (ew.valueChanged(fobj, infix, "end_date", false)) return false;
		if (ew.valueChanged(fobj, infix, "patientID", false)) return false;
		if (ew.valueChanged(fobj, infix, "patientName", false)) return false;
		if (ew.valueChanged(fobj, infix, "DoctorID", false)) return false;
		if (ew.valueChanged(fobj, infix, "DoctorName", false)) return false;
		if (ew.valueChanged(fobj, infix, "AppointmentStatus", false)) return false;
		if (ew.valueChanged(fobj, infix, "status[]", false)) return false;
		if (ew.valueChanged(fobj, infix, "DoctorCode", false)) return false;
		if (ew.valueChanged(fobj, infix, "Department", false)) return false;
		if (ew.valueChanged(fobj, infix, "scheduler_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "text", false)) return false;
		if (ew.valueChanged(fobj, infix, "appointment_status", false)) return false;
		if (ew.valueChanged(fobj, infix, "PId", false)) return false;
		if (ew.valueChanged(fobj, infix, "MobileNumber", false)) return false;
		if (ew.valueChanged(fobj, infix, "SchEmail", false)) return false;
		if (ew.valueChanged(fobj, infix, "appointment_type", false)) return false;
		if (ew.valueChanged(fobj, infix, "Notified[]", false)) return false;
		if (ew.valueChanged(fobj, infix, "Purpose", false)) return false;
		if (ew.valueChanged(fobj, infix, "Notes", false)) return false;
		if (ew.valueChanged(fobj, infix, "PatientType", false)) return false;
		if (ew.valueChanged(fobj, infix, "Referal", false)) return false;
		if (ew.valueChanged(fobj, infix, "paymentType", false)) return false;
		if (ew.valueChanged(fobj, infix, "WhereDidYouHear[]", false)) return false;
		if (ew.valueChanged(fobj, infix, "PatientTypee", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fappointment_schedulergrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fappointment_schedulergrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fappointment_schedulergrid.lists["x_patientID"] = <?php echo $appointment_scheduler_grid->patientID->Lookup->toClientList($appointment_scheduler_grid) ?>;
	fappointment_schedulergrid.lists["x_patientID"].options = <?php echo JsonEncode($appointment_scheduler_grid->patientID->lookupOptions()) ?>;
	fappointment_schedulergrid.lists["x_DoctorName"] = <?php echo $appointment_scheduler_grid->DoctorName->Lookup->toClientList($appointment_scheduler_grid) ?>;
	fappointment_schedulergrid.lists["x_DoctorName"].options = <?php echo JsonEncode($appointment_scheduler_grid->DoctorName->lookupOptions()) ?>;
	fappointment_schedulergrid.lists["x_status[]"] = <?php echo $appointment_scheduler_grid->status->Lookup->toClientList($appointment_scheduler_grid) ?>;
	fappointment_schedulergrid.lists["x_status[]"].options = <?php echo JsonEncode($appointment_scheduler_grid->status->options(FALSE, TRUE)) ?>;
	fappointment_schedulergrid.lists["x_appointment_type"] = <?php echo $appointment_scheduler_grid->appointment_type->Lookup->toClientList($appointment_scheduler_grid) ?>;
	fappointment_schedulergrid.lists["x_appointment_type"].options = <?php echo JsonEncode($appointment_scheduler_grid->appointment_type->options(FALSE, TRUE)) ?>;
	fappointment_schedulergrid.lists["x_Notified[]"] = <?php echo $appointment_scheduler_grid->Notified->Lookup->toClientList($appointment_scheduler_grid) ?>;
	fappointment_schedulergrid.lists["x_Notified[]"].options = <?php echo JsonEncode($appointment_scheduler_grid->Notified->options(FALSE, TRUE)) ?>;
	fappointment_schedulergrid.lists["x_PatientType"] = <?php echo $appointment_scheduler_grid->PatientType->Lookup->toClientList($appointment_scheduler_grid) ?>;
	fappointment_schedulergrid.lists["x_PatientType"].options = <?php echo JsonEncode($appointment_scheduler_grid->PatientType->options(FALSE, TRUE)) ?>;
	fappointment_schedulergrid.lists["x_Referal"] = <?php echo $appointment_scheduler_grid->Referal->Lookup->toClientList($appointment_scheduler_grid) ?>;
	fappointment_schedulergrid.lists["x_Referal"].options = <?php echo JsonEncode($appointment_scheduler_grid->Referal->lookupOptions()) ?>;
	fappointment_schedulergrid.lists["x_WhereDidYouHear[]"] = <?php echo $appointment_scheduler_grid->WhereDidYouHear->Lookup->toClientList($appointment_scheduler_grid) ?>;
	fappointment_schedulergrid.lists["x_WhereDidYouHear[]"].options = <?php echo JsonEncode($appointment_scheduler_grid->WhereDidYouHear->lookupOptions()) ?>;
	fappointment_schedulergrid.lists["x_PatientTypee"] = <?php echo $appointment_scheduler_grid->PatientTypee->Lookup->toClientList($appointment_scheduler_grid) ?>;
	fappointment_schedulergrid.lists["x_PatientTypee"].options = <?php echo JsonEncode($appointment_scheduler_grid->PatientTypee->lookupOptions()) ?>;
	loadjs.done("fappointment_schedulergrid");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<?php } ?>
<?php
$appointment_scheduler_grid->renderOtherOptions();
?>
<?php if ($appointment_scheduler_grid->TotalRecords > 0 || $appointment_scheduler->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($appointment_scheduler_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> appointment_scheduler">
<?php if ($appointment_scheduler_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $appointment_scheduler_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fappointment_schedulergrid" class="ew-form ew-list-form form-inline">
<div id="gmp_appointment_scheduler" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_appointment_schedulergrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$appointment_scheduler->RowType = ROWTYPE_HEADER;

// Render list options
$appointment_scheduler_grid->renderListOptions();

// Render list options (header, left)
$appointment_scheduler_grid->ListOptions->render("header", "left");
?>
<?php if ($appointment_scheduler_grid->id->Visible) { // id ?>
	<?php if ($appointment_scheduler_grid->SortUrl($appointment_scheduler_grid->id) == "") { ?>
		<th data-name="id" class="<?php echo $appointment_scheduler_grid->id->headerCellClass() ?>"><div id="elh_appointment_scheduler_id" class="appointment_scheduler_id"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $appointment_scheduler_grid->id->headerCellClass() ?>"><div><div id="elh_appointment_scheduler_id" class="appointment_scheduler_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_grid->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_grid->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_grid->start_date->Visible) { // start_date ?>
	<?php if ($appointment_scheduler_grid->SortUrl($appointment_scheduler_grid->start_date) == "") { ?>
		<th data-name="start_date" class="<?php echo $appointment_scheduler_grid->start_date->headerCellClass() ?>"><div id="elh_appointment_scheduler_start_date" class="appointment_scheduler_start_date"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->start_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="start_date" class="<?php echo $appointment_scheduler_grid->start_date->headerCellClass() ?>"><div><div id="elh_appointment_scheduler_start_date" class="appointment_scheduler_start_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->start_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_grid->start_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_grid->start_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_grid->end_date->Visible) { // end_date ?>
	<?php if ($appointment_scheduler_grid->SortUrl($appointment_scheduler_grid->end_date) == "") { ?>
		<th data-name="end_date" class="<?php echo $appointment_scheduler_grid->end_date->headerCellClass() ?>"><div id="elh_appointment_scheduler_end_date" class="appointment_scheduler_end_date"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->end_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="end_date" class="<?php echo $appointment_scheduler_grid->end_date->headerCellClass() ?>"><div><div id="elh_appointment_scheduler_end_date" class="appointment_scheduler_end_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->end_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_grid->end_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_grid->end_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_grid->patientID->Visible) { // patientID ?>
	<?php if ($appointment_scheduler_grid->SortUrl($appointment_scheduler_grid->patientID) == "") { ?>
		<th data-name="patientID" class="<?php echo $appointment_scheduler_grid->patientID->headerCellClass() ?>"><div id="elh_appointment_scheduler_patientID" class="appointment_scheduler_patientID"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->patientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patientID" class="<?php echo $appointment_scheduler_grid->patientID->headerCellClass() ?>"><div><div id="elh_appointment_scheduler_patientID" class="appointment_scheduler_patientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->patientID->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_grid->patientID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_grid->patientID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_grid->patientName->Visible) { // patientName ?>
	<?php if ($appointment_scheduler_grid->SortUrl($appointment_scheduler_grid->patientName) == "") { ?>
		<th data-name="patientName" class="<?php echo $appointment_scheduler_grid->patientName->headerCellClass() ?>"><div id="elh_appointment_scheduler_patientName" class="appointment_scheduler_patientName"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->patientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patientName" class="<?php echo $appointment_scheduler_grid->patientName->headerCellClass() ?>"><div><div id="elh_appointment_scheduler_patientName" class="appointment_scheduler_patientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->patientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_grid->patientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_grid->patientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_grid->DoctorID->Visible) { // DoctorID ?>
	<?php if ($appointment_scheduler_grid->SortUrl($appointment_scheduler_grid->DoctorID) == "") { ?>
		<th data-name="DoctorID" class="<?php echo $appointment_scheduler_grid->DoctorID->headerCellClass() ?>"><div id="elh_appointment_scheduler_DoctorID" class="appointment_scheduler_DoctorID"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->DoctorID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DoctorID" class="<?php echo $appointment_scheduler_grid->DoctorID->headerCellClass() ?>"><div><div id="elh_appointment_scheduler_DoctorID" class="appointment_scheduler_DoctorID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->DoctorID->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_grid->DoctorID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_grid->DoctorID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_grid->DoctorName->Visible) { // DoctorName ?>
	<?php if ($appointment_scheduler_grid->SortUrl($appointment_scheduler_grid->DoctorName) == "") { ?>
		<th data-name="DoctorName" class="<?php echo $appointment_scheduler_grid->DoctorName->headerCellClass() ?>"><div id="elh_appointment_scheduler_DoctorName" class="appointment_scheduler_DoctorName"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->DoctorName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DoctorName" class="<?php echo $appointment_scheduler_grid->DoctorName->headerCellClass() ?>"><div><div id="elh_appointment_scheduler_DoctorName" class="appointment_scheduler_DoctorName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->DoctorName->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_grid->DoctorName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_grid->DoctorName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_grid->AppointmentStatus->Visible) { // AppointmentStatus ?>
	<?php if ($appointment_scheduler_grid->SortUrl($appointment_scheduler_grid->AppointmentStatus) == "") { ?>
		<th data-name="AppointmentStatus" class="<?php echo $appointment_scheduler_grid->AppointmentStatus->headerCellClass() ?>"><div id="elh_appointment_scheduler_AppointmentStatus" class="appointment_scheduler_AppointmentStatus"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->AppointmentStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AppointmentStatus" class="<?php echo $appointment_scheduler_grid->AppointmentStatus->headerCellClass() ?>"><div><div id="elh_appointment_scheduler_AppointmentStatus" class="appointment_scheduler_AppointmentStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->AppointmentStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_grid->AppointmentStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_grid->AppointmentStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_grid->status->Visible) { // status ?>
	<?php if ($appointment_scheduler_grid->SortUrl($appointment_scheduler_grid->status) == "") { ?>
		<th data-name="status" class="<?php echo $appointment_scheduler_grid->status->headerCellClass() ?>"><div id="elh_appointment_scheduler_status" class="appointment_scheduler_status"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $appointment_scheduler_grid->status->headerCellClass() ?>"><div><div id="elh_appointment_scheduler_status" class="appointment_scheduler_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_grid->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_grid->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_grid->DoctorCode->Visible) { // DoctorCode ?>
	<?php if ($appointment_scheduler_grid->SortUrl($appointment_scheduler_grid->DoctorCode) == "") { ?>
		<th data-name="DoctorCode" class="<?php echo $appointment_scheduler_grid->DoctorCode->headerCellClass() ?>"><div id="elh_appointment_scheduler_DoctorCode" class="appointment_scheduler_DoctorCode"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->DoctorCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DoctorCode" class="<?php echo $appointment_scheduler_grid->DoctorCode->headerCellClass() ?>"><div><div id="elh_appointment_scheduler_DoctorCode" class="appointment_scheduler_DoctorCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->DoctorCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_grid->DoctorCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_grid->DoctorCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_grid->Department->Visible) { // Department ?>
	<?php if ($appointment_scheduler_grid->SortUrl($appointment_scheduler_grid->Department) == "") { ?>
		<th data-name="Department" class="<?php echo $appointment_scheduler_grid->Department->headerCellClass() ?>"><div id="elh_appointment_scheduler_Department" class="appointment_scheduler_Department"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->Department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Department" class="<?php echo $appointment_scheduler_grid->Department->headerCellClass() ?>"><div><div id="elh_appointment_scheduler_Department" class="appointment_scheduler_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->Department->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_grid->Department->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_grid->Department->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_grid->scheduler_id->Visible) { // scheduler_id ?>
	<?php if ($appointment_scheduler_grid->SortUrl($appointment_scheduler_grid->scheduler_id) == "") { ?>
		<th data-name="scheduler_id" class="<?php echo $appointment_scheduler_grid->scheduler_id->headerCellClass() ?>"><div id="elh_appointment_scheduler_scheduler_id" class="appointment_scheduler_scheduler_id"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->scheduler_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="scheduler_id" class="<?php echo $appointment_scheduler_grid->scheduler_id->headerCellClass() ?>"><div><div id="elh_appointment_scheduler_scheduler_id" class="appointment_scheduler_scheduler_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->scheduler_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_grid->scheduler_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_grid->scheduler_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_grid->text->Visible) { // text ?>
	<?php if ($appointment_scheduler_grid->SortUrl($appointment_scheduler_grid->text) == "") { ?>
		<th data-name="text" class="<?php echo $appointment_scheduler_grid->text->headerCellClass() ?>"><div id="elh_appointment_scheduler_text" class="appointment_scheduler_text"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->text->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="text" class="<?php echo $appointment_scheduler_grid->text->headerCellClass() ?>"><div><div id="elh_appointment_scheduler_text" class="appointment_scheduler_text">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->text->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_grid->text->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_grid->text->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_grid->appointment_status->Visible) { // appointment_status ?>
	<?php if ($appointment_scheduler_grid->SortUrl($appointment_scheduler_grid->appointment_status) == "") { ?>
		<th data-name="appointment_status" class="<?php echo $appointment_scheduler_grid->appointment_status->headerCellClass() ?>"><div id="elh_appointment_scheduler_appointment_status" class="appointment_scheduler_appointment_status"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->appointment_status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="appointment_status" class="<?php echo $appointment_scheduler_grid->appointment_status->headerCellClass() ?>"><div><div id="elh_appointment_scheduler_appointment_status" class="appointment_scheduler_appointment_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->appointment_status->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_grid->appointment_status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_grid->appointment_status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_grid->PId->Visible) { // PId ?>
	<?php if ($appointment_scheduler_grid->SortUrl($appointment_scheduler_grid->PId) == "") { ?>
		<th data-name="PId" class="<?php echo $appointment_scheduler_grid->PId->headerCellClass() ?>"><div id="elh_appointment_scheduler_PId" class="appointment_scheduler_PId"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->PId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PId" class="<?php echo $appointment_scheduler_grid->PId->headerCellClass() ?>"><div><div id="elh_appointment_scheduler_PId" class="appointment_scheduler_PId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->PId->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_grid->PId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_grid->PId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_grid->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($appointment_scheduler_grid->SortUrl($appointment_scheduler_grid->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $appointment_scheduler_grid->MobileNumber->headerCellClass() ?>"><div id="elh_appointment_scheduler_MobileNumber" class="appointment_scheduler_MobileNumber"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $appointment_scheduler_grid->MobileNumber->headerCellClass() ?>"><div><div id="elh_appointment_scheduler_MobileNumber" class="appointment_scheduler_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->MobileNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_grid->MobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_grid->MobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_grid->SchEmail->Visible) { // SchEmail ?>
	<?php if ($appointment_scheduler_grid->SortUrl($appointment_scheduler_grid->SchEmail) == "") { ?>
		<th data-name="SchEmail" class="<?php echo $appointment_scheduler_grid->SchEmail->headerCellClass() ?>"><div id="elh_appointment_scheduler_SchEmail" class="appointment_scheduler_SchEmail"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->SchEmail->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SchEmail" class="<?php echo $appointment_scheduler_grid->SchEmail->headerCellClass() ?>"><div><div id="elh_appointment_scheduler_SchEmail" class="appointment_scheduler_SchEmail">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->SchEmail->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_grid->SchEmail->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_grid->SchEmail->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_grid->appointment_type->Visible) { // appointment_type ?>
	<?php if ($appointment_scheduler_grid->SortUrl($appointment_scheduler_grid->appointment_type) == "") { ?>
		<th data-name="appointment_type" class="<?php echo $appointment_scheduler_grid->appointment_type->headerCellClass() ?>"><div id="elh_appointment_scheduler_appointment_type" class="appointment_scheduler_appointment_type"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->appointment_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="appointment_type" class="<?php echo $appointment_scheduler_grid->appointment_type->headerCellClass() ?>"><div><div id="elh_appointment_scheduler_appointment_type" class="appointment_scheduler_appointment_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->appointment_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_grid->appointment_type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_grid->appointment_type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_grid->Notified->Visible) { // Notified ?>
	<?php if ($appointment_scheduler_grid->SortUrl($appointment_scheduler_grid->Notified) == "") { ?>
		<th data-name="Notified" class="<?php echo $appointment_scheduler_grid->Notified->headerCellClass() ?>"><div id="elh_appointment_scheduler_Notified" class="appointment_scheduler_Notified"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->Notified->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Notified" class="<?php echo $appointment_scheduler_grid->Notified->headerCellClass() ?>"><div><div id="elh_appointment_scheduler_Notified" class="appointment_scheduler_Notified">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->Notified->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_grid->Notified->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_grid->Notified->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_grid->Purpose->Visible) { // Purpose ?>
	<?php if ($appointment_scheduler_grid->SortUrl($appointment_scheduler_grid->Purpose) == "") { ?>
		<th data-name="Purpose" class="<?php echo $appointment_scheduler_grid->Purpose->headerCellClass() ?>"><div id="elh_appointment_scheduler_Purpose" class="appointment_scheduler_Purpose"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->Purpose->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Purpose" class="<?php echo $appointment_scheduler_grid->Purpose->headerCellClass() ?>"><div><div id="elh_appointment_scheduler_Purpose" class="appointment_scheduler_Purpose">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->Purpose->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_grid->Purpose->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_grid->Purpose->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_grid->Notes->Visible) { // Notes ?>
	<?php if ($appointment_scheduler_grid->SortUrl($appointment_scheduler_grid->Notes) == "") { ?>
		<th data-name="Notes" class="<?php echo $appointment_scheduler_grid->Notes->headerCellClass() ?>"><div id="elh_appointment_scheduler_Notes" class="appointment_scheduler_Notes"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->Notes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Notes" class="<?php echo $appointment_scheduler_grid->Notes->headerCellClass() ?>"><div><div id="elh_appointment_scheduler_Notes" class="appointment_scheduler_Notes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->Notes->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_grid->Notes->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_grid->Notes->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_grid->PatientType->Visible) { // PatientType ?>
	<?php if ($appointment_scheduler_grid->SortUrl($appointment_scheduler_grid->PatientType) == "") { ?>
		<th data-name="PatientType" class="<?php echo $appointment_scheduler_grid->PatientType->headerCellClass() ?>"><div id="elh_appointment_scheduler_PatientType" class="appointment_scheduler_PatientType"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->PatientType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientType" class="<?php echo $appointment_scheduler_grid->PatientType->headerCellClass() ?>"><div><div id="elh_appointment_scheduler_PatientType" class="appointment_scheduler_PatientType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->PatientType->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_grid->PatientType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_grid->PatientType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_grid->Referal->Visible) { // Referal ?>
	<?php if ($appointment_scheduler_grid->SortUrl($appointment_scheduler_grid->Referal) == "") { ?>
		<th data-name="Referal" class="<?php echo $appointment_scheduler_grid->Referal->headerCellClass() ?>"><div id="elh_appointment_scheduler_Referal" class="appointment_scheduler_Referal"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->Referal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Referal" class="<?php echo $appointment_scheduler_grid->Referal->headerCellClass() ?>"><div><div id="elh_appointment_scheduler_Referal" class="appointment_scheduler_Referal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->Referal->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_grid->Referal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_grid->Referal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_grid->paymentType->Visible) { // paymentType ?>
	<?php if ($appointment_scheduler_grid->SortUrl($appointment_scheduler_grid->paymentType) == "") { ?>
		<th data-name="paymentType" class="<?php echo $appointment_scheduler_grid->paymentType->headerCellClass() ?>"><div id="elh_appointment_scheduler_paymentType" class="appointment_scheduler_paymentType"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->paymentType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="paymentType" class="<?php echo $appointment_scheduler_grid->paymentType->headerCellClass() ?>"><div><div id="elh_appointment_scheduler_paymentType" class="appointment_scheduler_paymentType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->paymentType->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_grid->paymentType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_grid->paymentType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_grid->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<?php if ($appointment_scheduler_grid->SortUrl($appointment_scheduler_grid->WhereDidYouHear) == "") { ?>
		<th data-name="WhereDidYouHear" class="<?php echo $appointment_scheduler_grid->WhereDidYouHear->headerCellClass() ?>"><div id="elh_appointment_scheduler_WhereDidYouHear" class="appointment_scheduler_WhereDidYouHear"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->WhereDidYouHear->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WhereDidYouHear" class="<?php echo $appointment_scheduler_grid->WhereDidYouHear->headerCellClass() ?>"><div><div id="elh_appointment_scheduler_WhereDidYouHear" class="appointment_scheduler_WhereDidYouHear">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->WhereDidYouHear->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_grid->WhereDidYouHear->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_grid->WhereDidYouHear->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_grid->HospID->Visible) { // HospID ?>
	<?php if ($appointment_scheduler_grid->SortUrl($appointment_scheduler_grid->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $appointment_scheduler_grid->HospID->headerCellClass() ?>"><div id="elh_appointment_scheduler_HospID" class="appointment_scheduler_HospID"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $appointment_scheduler_grid->HospID->headerCellClass() ?>"><div><div id="elh_appointment_scheduler_HospID" class="appointment_scheduler_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_grid->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_grid->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_grid->createdBy->Visible) { // createdBy ?>
	<?php if ($appointment_scheduler_grid->SortUrl($appointment_scheduler_grid->createdBy) == "") { ?>
		<th data-name="createdBy" class="<?php echo $appointment_scheduler_grid->createdBy->headerCellClass() ?>"><div id="elh_appointment_scheduler_createdBy" class="appointment_scheduler_createdBy"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->createdBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdBy" class="<?php echo $appointment_scheduler_grid->createdBy->headerCellClass() ?>"><div><div id="elh_appointment_scheduler_createdBy" class="appointment_scheduler_createdBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->createdBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_grid->createdBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_grid->createdBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_grid->createdDateTime->Visible) { // createdDateTime ?>
	<?php if ($appointment_scheduler_grid->SortUrl($appointment_scheduler_grid->createdDateTime) == "") { ?>
		<th data-name="createdDateTime" class="<?php echo $appointment_scheduler_grid->createdDateTime->headerCellClass() ?>"><div id="elh_appointment_scheduler_createdDateTime" class="appointment_scheduler_createdDateTime"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->createdDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdDateTime" class="<?php echo $appointment_scheduler_grid->createdDateTime->headerCellClass() ?>"><div><div id="elh_appointment_scheduler_createdDateTime" class="appointment_scheduler_createdDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->createdDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_grid->createdDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_grid->createdDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_grid->PatientTypee->Visible) { // PatientTypee ?>
	<?php if ($appointment_scheduler_grid->SortUrl($appointment_scheduler_grid->PatientTypee) == "") { ?>
		<th data-name="PatientTypee" class="<?php echo $appointment_scheduler_grid->PatientTypee->headerCellClass() ?>"><div id="elh_appointment_scheduler_PatientTypee" class="appointment_scheduler_PatientTypee"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->PatientTypee->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientTypee" class="<?php echo $appointment_scheduler_grid->PatientTypee->headerCellClass() ?>"><div><div id="elh_appointment_scheduler_PatientTypee" class="appointment_scheduler_PatientTypee">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_grid->PatientTypee->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_grid->PatientTypee->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_grid->PatientTypee->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$appointment_scheduler_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$appointment_scheduler_grid->StartRecord = 1;
$appointment_scheduler_grid->StopRecord = $appointment_scheduler_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($appointment_scheduler->isConfirm() || $appointment_scheduler_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($appointment_scheduler_grid->FormKeyCountName) && ($appointment_scheduler_grid->isGridAdd() || $appointment_scheduler_grid->isGridEdit() || $appointment_scheduler->isConfirm())) {
		$appointment_scheduler_grid->KeyCount = $CurrentForm->getValue($appointment_scheduler_grid->FormKeyCountName);
		$appointment_scheduler_grid->StopRecord = $appointment_scheduler_grid->StartRecord + $appointment_scheduler_grid->KeyCount - 1;
	}
}
$appointment_scheduler_grid->RecordCount = $appointment_scheduler_grid->StartRecord - 1;
if ($appointment_scheduler_grid->Recordset && !$appointment_scheduler_grid->Recordset->EOF) {
	$appointment_scheduler_grid->Recordset->moveFirst();
	$selectLimit = $appointment_scheduler_grid->UseSelectLimit;
	if (!$selectLimit && $appointment_scheduler_grid->StartRecord > 1)
		$appointment_scheduler_grid->Recordset->move($appointment_scheduler_grid->StartRecord - 1);
} elseif (!$appointment_scheduler->AllowAddDeleteRow && $appointment_scheduler_grid->StopRecord == 0) {
	$appointment_scheduler_grid->StopRecord = $appointment_scheduler->GridAddRowCount;
}

// Initialize aggregate
$appointment_scheduler->RowType = ROWTYPE_AGGREGATEINIT;
$appointment_scheduler->resetAttributes();
$appointment_scheduler_grid->renderRow();
if ($appointment_scheduler_grid->isGridAdd())
	$appointment_scheduler_grid->RowIndex = 0;
if ($appointment_scheduler_grid->isGridEdit())
	$appointment_scheduler_grid->RowIndex = 0;
while ($appointment_scheduler_grid->RecordCount < $appointment_scheduler_grid->StopRecord) {
	$appointment_scheduler_grid->RecordCount++;
	if ($appointment_scheduler_grid->RecordCount >= $appointment_scheduler_grid->StartRecord) {
		$appointment_scheduler_grid->RowCount++;
		if ($appointment_scheduler_grid->isGridAdd() || $appointment_scheduler_grid->isGridEdit() || $appointment_scheduler->isConfirm()) {
			$appointment_scheduler_grid->RowIndex++;
			$CurrentForm->Index = $appointment_scheduler_grid->RowIndex;
			if ($CurrentForm->hasValue($appointment_scheduler_grid->FormActionName) && ($appointment_scheduler->isConfirm() || $appointment_scheduler_grid->EventCancelled))
				$appointment_scheduler_grid->RowAction = strval($CurrentForm->getValue($appointment_scheduler_grid->FormActionName));
			elseif ($appointment_scheduler_grid->isGridAdd())
				$appointment_scheduler_grid->RowAction = "insert";
			else
				$appointment_scheduler_grid->RowAction = "";
		}

		// Set up key count
		$appointment_scheduler_grid->KeyCount = $appointment_scheduler_grid->RowIndex;

		// Init row class and style
		$appointment_scheduler->resetAttributes();
		$appointment_scheduler->CssClass = "";
		if ($appointment_scheduler_grid->isGridAdd()) {
			if ($appointment_scheduler->CurrentMode == "copy") {
				$appointment_scheduler_grid->loadRowValues($appointment_scheduler_grid->Recordset); // Load row values
				$appointment_scheduler_grid->setRecordKey($appointment_scheduler_grid->RowOldKey, $appointment_scheduler_grid->Recordset); // Set old record key
			} else {
				$appointment_scheduler_grid->loadRowValues(); // Load default values
				$appointment_scheduler_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$appointment_scheduler_grid->loadRowValues($appointment_scheduler_grid->Recordset); // Load row values
		}
		$appointment_scheduler->RowType = ROWTYPE_VIEW; // Render view
		if ($appointment_scheduler_grid->isGridAdd()) // Grid add
			$appointment_scheduler->RowType = ROWTYPE_ADD; // Render add
		if ($appointment_scheduler_grid->isGridAdd() && $appointment_scheduler->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$appointment_scheduler_grid->restoreCurrentRowFormValues($appointment_scheduler_grid->RowIndex); // Restore form values
		if ($appointment_scheduler_grid->isGridEdit()) { // Grid edit
			if ($appointment_scheduler->EventCancelled)
				$appointment_scheduler_grid->restoreCurrentRowFormValues($appointment_scheduler_grid->RowIndex); // Restore form values
			if ($appointment_scheduler_grid->RowAction == "insert")
				$appointment_scheduler->RowType = ROWTYPE_ADD; // Render add
			else
				$appointment_scheduler->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($appointment_scheduler_grid->isGridEdit() && ($appointment_scheduler->RowType == ROWTYPE_EDIT || $appointment_scheduler->RowType == ROWTYPE_ADD) && $appointment_scheduler->EventCancelled) // Update failed
			$appointment_scheduler_grid->restoreCurrentRowFormValues($appointment_scheduler_grid->RowIndex); // Restore form values
		if ($appointment_scheduler->RowType == ROWTYPE_EDIT) // Edit row
			$appointment_scheduler_grid->EditRowCount++;
		if ($appointment_scheduler->isConfirm()) // Confirm row
			$appointment_scheduler_grid->restoreCurrentRowFormValues($appointment_scheduler_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$appointment_scheduler->RowAttrs->merge(["data-rowindex" => $appointment_scheduler_grid->RowCount, "id" => "r" . $appointment_scheduler_grid->RowCount . "_appointment_scheduler", "data-rowtype" => $appointment_scheduler->RowType]);

		// Render row
		$appointment_scheduler_grid->renderRow();

		// Render list options
		$appointment_scheduler_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($appointment_scheduler_grid->RowAction != "delete" && $appointment_scheduler_grid->RowAction != "insertdelete" && !($appointment_scheduler_grid->RowAction == "insert" && $appointment_scheduler->isConfirm() && $appointment_scheduler_grid->emptyRow())) {
?>
	<tr <?php echo $appointment_scheduler->rowAttributes() ?>>
<?php

// Render list options (body, left)
$appointment_scheduler_grid->ListOptions->render("body", "left", $appointment_scheduler_grid->RowCount);
?>
	<?php if ($appointment_scheduler_grid->id->Visible) { // id ?>
		<td data-name="id" <?php echo $appointment_scheduler_grid->id->cellAttributes() ?>>
<?php if ($appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_id" class="form-group"></span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_id" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_id" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($appointment_scheduler_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_id" class="form-group">
<span<?php echo $appointment_scheduler_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_scheduler_grid->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_id" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_id" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($appointment_scheduler_grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_id">
<span<?php echo $appointment_scheduler_grid->id->viewAttributes() ?>><?php echo $appointment_scheduler_grid->id->getViewValue() ?></span>
</span>
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_id" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_id" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($appointment_scheduler_grid->id->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_id" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_id" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($appointment_scheduler_grid->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_id" name="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_id" id="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($appointment_scheduler_grid->id->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_id" name="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_id" id="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($appointment_scheduler_grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->start_date->Visible) { // start_date ?>
		<td data-name="start_date" <?php echo $appointment_scheduler_grid->start_date->cellAttributes() ?>>
<?php if ($appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_start_date" class="form-group">
<input type="text" data-table="appointment_scheduler" data-field="x_start_date" data-format="11" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_start_date" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_start_date" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->start_date->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->start_date->EditValue ?>"<?php echo $appointment_scheduler_grid->start_date->editAttributes() ?>>
<?php if (!$appointment_scheduler_grid->start_date->ReadOnly && !$appointment_scheduler_grid->start_date->Disabled && !isset($appointment_scheduler_grid->start_date->EditAttrs["readonly"]) && !isset($appointment_scheduler_grid->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fappointment_schedulergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fappointment_schedulergrid", "x<?php echo $appointment_scheduler_grid->RowIndex ?>_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_start_date" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_start_date" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_start_date" value="<?php echo HtmlEncode($appointment_scheduler_grid->start_date->OldValue) ?>">
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_start_date" class="form-group">
<input type="text" data-table="appointment_scheduler" data-field="x_start_date" data-format="11" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_start_date" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_start_date" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->start_date->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->start_date->EditValue ?>"<?php echo $appointment_scheduler_grid->start_date->editAttributes() ?>>
<?php if (!$appointment_scheduler_grid->start_date->ReadOnly && !$appointment_scheduler_grid->start_date->Disabled && !isset($appointment_scheduler_grid->start_date->EditAttrs["readonly"]) && !isset($appointment_scheduler_grid->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fappointment_schedulergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fappointment_schedulergrid", "x<?php echo $appointment_scheduler_grid->RowIndex ?>_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_start_date">
<span<?php echo $appointment_scheduler_grid->start_date->viewAttributes() ?>><?php echo $appointment_scheduler_grid->start_date->getViewValue() ?></span>
</span>
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_start_date" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_start_date" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_start_date" value="<?php echo HtmlEncode($appointment_scheduler_grid->start_date->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_start_date" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_start_date" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_start_date" value="<?php echo HtmlEncode($appointment_scheduler_grid->start_date->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_start_date" name="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_start_date" id="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_start_date" value="<?php echo HtmlEncode($appointment_scheduler_grid->start_date->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_start_date" name="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_start_date" id="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_start_date" value="<?php echo HtmlEncode($appointment_scheduler_grid->start_date->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->end_date->Visible) { // end_date ?>
		<td data-name="end_date" <?php echo $appointment_scheduler_grid->end_date->cellAttributes() ?>>
<?php if ($appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_end_date" class="form-group">
<input type="text" data-table="appointment_scheduler" data-field="x_end_date" data-format="11" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_end_date" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_end_date" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->end_date->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->end_date->EditValue ?>"<?php echo $appointment_scheduler_grid->end_date->editAttributes() ?>>
<?php if (!$appointment_scheduler_grid->end_date->ReadOnly && !$appointment_scheduler_grid->end_date->Disabled && !isset($appointment_scheduler_grid->end_date->EditAttrs["readonly"]) && !isset($appointment_scheduler_grid->end_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fappointment_schedulergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fappointment_schedulergrid", "x<?php echo $appointment_scheduler_grid->RowIndex ?>_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_end_date" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_end_date" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_end_date" value="<?php echo HtmlEncode($appointment_scheduler_grid->end_date->OldValue) ?>">
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_end_date" class="form-group">
<input type="text" data-table="appointment_scheduler" data-field="x_end_date" data-format="11" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_end_date" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_end_date" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->end_date->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->end_date->EditValue ?>"<?php echo $appointment_scheduler_grid->end_date->editAttributes() ?>>
<?php if (!$appointment_scheduler_grid->end_date->ReadOnly && !$appointment_scheduler_grid->end_date->Disabled && !isset($appointment_scheduler_grid->end_date->EditAttrs["readonly"]) && !isset($appointment_scheduler_grid->end_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fappointment_schedulergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fappointment_schedulergrid", "x<?php echo $appointment_scheduler_grid->RowIndex ?>_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_end_date">
<span<?php echo $appointment_scheduler_grid->end_date->viewAttributes() ?>><?php echo $appointment_scheduler_grid->end_date->getViewValue() ?></span>
</span>
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_end_date" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_end_date" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_end_date" value="<?php echo HtmlEncode($appointment_scheduler_grid->end_date->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_end_date" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_end_date" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_end_date" value="<?php echo HtmlEncode($appointment_scheduler_grid->end_date->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_end_date" name="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_end_date" id="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_end_date" value="<?php echo HtmlEncode($appointment_scheduler_grid->end_date->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_end_date" name="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_end_date" id="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_end_date" value="<?php echo HtmlEncode($appointment_scheduler_grid->end_date->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->patientID->Visible) { // patientID ?>
		<td data-name="patientID" <?php echo $appointment_scheduler_grid->patientID->cellAttributes() ?>>
<?php if ($appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_patientID" class="form-group">
<?php $appointment_scheduler_grid->patientID->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $appointment_scheduler_grid->RowIndex ?>_patientID"><?php echo EmptyValue(strval($appointment_scheduler_grid->patientID->ViewValue)) ? $Language->phrase("PleaseSelect") : $appointment_scheduler_grid->patientID->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($appointment_scheduler_grid->patientID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($appointment_scheduler_grid->patientID->ReadOnly || $appointment_scheduler_grid->patientID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $appointment_scheduler_grid->RowIndex ?>_patientID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $appointment_scheduler_grid->patientID->Lookup->getParamTag($appointment_scheduler_grid, "p_x" . $appointment_scheduler_grid->RowIndex . "_patientID") ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_patientID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $appointment_scheduler_grid->patientID->displayValueSeparatorAttribute() ?>" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_patientID" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_patientID" value="<?php echo $appointment_scheduler_grid->patientID->CurrentValue ?>"<?php echo $appointment_scheduler_grid->patientID->editAttributes() ?>>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_patientID" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_patientID" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_patientID" value="<?php echo HtmlEncode($appointment_scheduler_grid->patientID->OldValue) ?>">
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_patientID" class="form-group">
<?php $appointment_scheduler_grid->patientID->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $appointment_scheduler_grid->RowIndex ?>_patientID"><?php echo EmptyValue(strval($appointment_scheduler_grid->patientID->ViewValue)) ? $Language->phrase("PleaseSelect") : $appointment_scheduler_grid->patientID->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($appointment_scheduler_grid->patientID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($appointment_scheduler_grid->patientID->ReadOnly || $appointment_scheduler_grid->patientID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $appointment_scheduler_grid->RowIndex ?>_patientID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $appointment_scheduler_grid->patientID->Lookup->getParamTag($appointment_scheduler_grid, "p_x" . $appointment_scheduler_grid->RowIndex . "_patientID") ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_patientID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $appointment_scheduler_grid->patientID->displayValueSeparatorAttribute() ?>" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_patientID" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_patientID" value="<?php echo $appointment_scheduler_grid->patientID->CurrentValue ?>"<?php echo $appointment_scheduler_grid->patientID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_patientID">
<span<?php echo $appointment_scheduler_grid->patientID->viewAttributes() ?>><?php echo $appointment_scheduler_grid->patientID->getViewValue() ?></span>
</span>
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_patientID" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_patientID" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_patientID" value="<?php echo HtmlEncode($appointment_scheduler_grid->patientID->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_patientID" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_patientID" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_patientID" value="<?php echo HtmlEncode($appointment_scheduler_grid->patientID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_patientID" name="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_patientID" id="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_patientID" value="<?php echo HtmlEncode($appointment_scheduler_grid->patientID->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_patientID" name="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_patientID" id="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_patientID" value="<?php echo HtmlEncode($appointment_scheduler_grid->patientID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->patientName->Visible) { // patientName ?>
		<td data-name="patientName" <?php echo $appointment_scheduler_grid->patientName->cellAttributes() ?>>
<?php if ($appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_patientName" class="form-group">
<input type="text" data-table="appointment_scheduler" data-field="x_patientName" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_patientName" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_patientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->patientName->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->patientName->EditValue ?>"<?php echo $appointment_scheduler_grid->patientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_patientName" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_patientName" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_patientName" value="<?php echo HtmlEncode($appointment_scheduler_grid->patientName->OldValue) ?>">
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_patientName" class="form-group">
<input type="text" data-table="appointment_scheduler" data-field="x_patientName" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_patientName" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_patientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->patientName->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->patientName->EditValue ?>"<?php echo $appointment_scheduler_grid->patientName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_patientName">
<span<?php echo $appointment_scheduler_grid->patientName->viewAttributes() ?>><?php echo $appointment_scheduler_grid->patientName->getViewValue() ?></span>
</span>
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_patientName" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_patientName" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_patientName" value="<?php echo HtmlEncode($appointment_scheduler_grid->patientName->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_patientName" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_patientName" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_patientName" value="<?php echo HtmlEncode($appointment_scheduler_grid->patientName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_patientName" name="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_patientName" id="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_patientName" value="<?php echo HtmlEncode($appointment_scheduler_grid->patientName->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_patientName" name="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_patientName" id="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_patientName" value="<?php echo HtmlEncode($appointment_scheduler_grid->patientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->DoctorID->Visible) { // DoctorID ?>
		<td data-name="DoctorID" <?php echo $appointment_scheduler_grid->DoctorID->cellAttributes() ?>>
<?php if ($appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($appointment_scheduler_grid->DoctorID->getSessionValue() != "") { ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_DoctorID" class="form-group">
<span<?php echo $appointment_scheduler_grid->DoctorID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_scheduler_grid->DoctorID->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorID" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorID" value="<?php echo HtmlEncode($appointment_scheduler_grid->DoctorID->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_DoctorID" class="form-group">
<input type="text" data-table="appointment_scheduler" data-field="x_DoctorID" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorID" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorID" size="3" maxlength="5" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->DoctorID->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->DoctorID->EditValue ?>"<?php echo $appointment_scheduler_grid->DoctorID->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorID" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorID" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorID" value="<?php echo HtmlEncode($appointment_scheduler_grid->DoctorID->OldValue) ?>">
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($appointment_scheduler_grid->DoctorID->getSessionValue() != "") { ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_DoctorID" class="form-group">
<span<?php echo $appointment_scheduler_grid->DoctorID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_scheduler_grid->DoctorID->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorID" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorID" value="<?php echo HtmlEncode($appointment_scheduler_grid->DoctorID->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_DoctorID" class="form-group">
<input type="text" data-table="appointment_scheduler" data-field="x_DoctorID" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorID" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorID" size="3" maxlength="5" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->DoctorID->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->DoctorID->EditValue ?>"<?php echo $appointment_scheduler_grid->DoctorID->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_DoctorID">
<span<?php echo $appointment_scheduler_grid->DoctorID->viewAttributes() ?>><?php echo $appointment_scheduler_grid->DoctorID->getViewValue() ?></span>
</span>
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorID" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorID" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorID" value="<?php echo HtmlEncode($appointment_scheduler_grid->DoctorID->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorID" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorID" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorID" value="<?php echo HtmlEncode($appointment_scheduler_grid->DoctorID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorID" name="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorID" id="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorID" value="<?php echo HtmlEncode($appointment_scheduler_grid->DoctorID->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorID" name="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorID" id="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorID" value="<?php echo HtmlEncode($appointment_scheduler_grid->DoctorID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->DoctorName->Visible) { // DoctorName ?>
		<td data-name="DoctorName" <?php echo $appointment_scheduler_grid->DoctorName->cellAttributes() ?>>
<?php if ($appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_DoctorName" class="form-group">
<?php $appointment_scheduler_grid->DoctorName->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorName"><?php echo EmptyValue(strval($appointment_scheduler_grid->DoctorName->ViewValue)) ? $Language->phrase("PleaseSelect") : $appointment_scheduler_grid->DoctorName->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($appointment_scheduler_grid->DoctorName->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($appointment_scheduler_grid->DoctorName->ReadOnly || $appointment_scheduler_grid->DoctorName->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorName',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $appointment_scheduler_grid->DoctorName->Lookup->getParamTag($appointment_scheduler_grid, "p_x" . $appointment_scheduler_grid->RowIndex . "_DoctorName") ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorName" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $appointment_scheduler_grid->DoctorName->displayValueSeparatorAttribute() ?>" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorName" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorName" value="<?php echo $appointment_scheduler_grid->DoctorName->CurrentValue ?>"<?php echo $appointment_scheduler_grid->DoctorName->editAttributes() ?>>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorName" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorName" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorName" value="<?php echo HtmlEncode($appointment_scheduler_grid->DoctorName->OldValue) ?>">
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_DoctorName" class="form-group">
<?php $appointment_scheduler_grid->DoctorName->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorName"><?php echo EmptyValue(strval($appointment_scheduler_grid->DoctorName->ViewValue)) ? $Language->phrase("PleaseSelect") : $appointment_scheduler_grid->DoctorName->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($appointment_scheduler_grid->DoctorName->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($appointment_scheduler_grid->DoctorName->ReadOnly || $appointment_scheduler_grid->DoctorName->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorName',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $appointment_scheduler_grid->DoctorName->Lookup->getParamTag($appointment_scheduler_grid, "p_x" . $appointment_scheduler_grid->RowIndex . "_DoctorName") ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorName" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $appointment_scheduler_grid->DoctorName->displayValueSeparatorAttribute() ?>" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorName" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorName" value="<?php echo $appointment_scheduler_grid->DoctorName->CurrentValue ?>"<?php echo $appointment_scheduler_grid->DoctorName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_DoctorName">
<span<?php echo $appointment_scheduler_grid->DoctorName->viewAttributes() ?>><?php echo $appointment_scheduler_grid->DoctorName->getViewValue() ?></span>
</span>
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorName" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorName" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorName" value="<?php echo HtmlEncode($appointment_scheduler_grid->DoctorName->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorName" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorName" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorName" value="<?php echo HtmlEncode($appointment_scheduler_grid->DoctorName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorName" name="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorName" id="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorName" value="<?php echo HtmlEncode($appointment_scheduler_grid->DoctorName->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorName" name="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorName" id="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorName" value="<?php echo HtmlEncode($appointment_scheduler_grid->DoctorName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->AppointmentStatus->Visible) { // AppointmentStatus ?>
		<td data-name="AppointmentStatus" <?php echo $appointment_scheduler_grid->AppointmentStatus->cellAttributes() ?>>
<?php if ($appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_AppointmentStatus" class="form-group">
<input type="text" data-table="appointment_scheduler" data-field="x_AppointmentStatus" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->AppointmentStatus->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->AppointmentStatus->EditValue ?>"<?php echo $appointment_scheduler_grid->AppointmentStatus->editAttributes() ?>>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_AppointmentStatus" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" value="<?php echo HtmlEncode($appointment_scheduler_grid->AppointmentStatus->OldValue) ?>">
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_AppointmentStatus" class="form-group">
<input type="text" data-table="appointment_scheduler" data-field="x_AppointmentStatus" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->AppointmentStatus->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->AppointmentStatus->EditValue ?>"<?php echo $appointment_scheduler_grid->AppointmentStatus->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_AppointmentStatus">
<span<?php echo $appointment_scheduler_grid->AppointmentStatus->viewAttributes() ?>><?php echo $appointment_scheduler_grid->AppointmentStatus->getViewValue() ?></span>
</span>
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_AppointmentStatus" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" value="<?php echo HtmlEncode($appointment_scheduler_grid->AppointmentStatus->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_AppointmentStatus" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" value="<?php echo HtmlEncode($appointment_scheduler_grid->AppointmentStatus->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_AppointmentStatus" name="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" id="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" value="<?php echo HtmlEncode($appointment_scheduler_grid->AppointmentStatus->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_AppointmentStatus" name="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" id="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" value="<?php echo HtmlEncode($appointment_scheduler_grid->AppointmentStatus->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->status->Visible) { // status ?>
		<td data-name="status" <?php echo $appointment_scheduler_grid->status->cellAttributes() ?>>
<?php if ($appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_status" class="form-group">
<div id="tp_x<?php echo $appointment_scheduler_grid->RowIndex ?>_status" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="appointment_scheduler" data-field="x_status" data-value-separator="<?php echo $appointment_scheduler_grid->status->displayValueSeparatorAttribute() ?>" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_status[]" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_status[]" value="{value}"<?php echo $appointment_scheduler_grid->status->editAttributes() ?>></div>
<div id="dsl_x<?php echo $appointment_scheduler_grid->RowIndex ?>_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $appointment_scheduler_grid->status->checkBoxListHtml(FALSE, "x{$appointment_scheduler_grid->RowIndex}_status[]") ?>
</div></div>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_status" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_status[]" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_status[]" value="<?php echo HtmlEncode($appointment_scheduler_grid->status->OldValue) ?>">
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_status" class="form-group">
<div id="tp_x<?php echo $appointment_scheduler_grid->RowIndex ?>_status" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="appointment_scheduler" data-field="x_status" data-value-separator="<?php echo $appointment_scheduler_grid->status->displayValueSeparatorAttribute() ?>" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_status[]" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_status[]" value="{value}"<?php echo $appointment_scheduler_grid->status->editAttributes() ?>></div>
<div id="dsl_x<?php echo $appointment_scheduler_grid->RowIndex ?>_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $appointment_scheduler_grid->status->checkBoxListHtml(FALSE, "x{$appointment_scheduler_grid->RowIndex}_status[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_status">
<span<?php echo $appointment_scheduler_grid->status->viewAttributes() ?>><?php echo $appointment_scheduler_grid->status->getViewValue() ?></span>
</span>
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_status" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_status" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($appointment_scheduler_grid->status->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_status" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_status[]" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_status[]" value="<?php echo HtmlEncode($appointment_scheduler_grid->status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_status" name="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_status" id="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($appointment_scheduler_grid->status->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_status" name="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_status[]" id="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_status[]" value="<?php echo HtmlEncode($appointment_scheduler_grid->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->DoctorCode->Visible) { // DoctorCode ?>
		<td data-name="DoctorCode" <?php echo $appointment_scheduler_grid->DoctorCode->cellAttributes() ?>>
<?php if ($appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_DoctorCode" class="form-group">
<input type="text" data-table="appointment_scheduler" data-field="x_DoctorCode" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorCode" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorCode" size="5" maxlength="7" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->DoctorCode->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->DoctorCode->EditValue ?>"<?php echo $appointment_scheduler_grid->DoctorCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorCode" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorCode" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorCode" value="<?php echo HtmlEncode($appointment_scheduler_grid->DoctorCode->OldValue) ?>">
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_DoctorCode" class="form-group">
<input type="text" data-table="appointment_scheduler" data-field="x_DoctorCode" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorCode" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorCode" size="5" maxlength="7" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->DoctorCode->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->DoctorCode->EditValue ?>"<?php echo $appointment_scheduler_grid->DoctorCode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_DoctorCode">
<span<?php echo $appointment_scheduler_grid->DoctorCode->viewAttributes() ?>><?php echo $appointment_scheduler_grid->DoctorCode->getViewValue() ?></span>
</span>
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorCode" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorCode" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorCode" value="<?php echo HtmlEncode($appointment_scheduler_grid->DoctorCode->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorCode" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorCode" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorCode" value="<?php echo HtmlEncode($appointment_scheduler_grid->DoctorCode->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorCode" name="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorCode" id="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorCode" value="<?php echo HtmlEncode($appointment_scheduler_grid->DoctorCode->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorCode" name="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorCode" id="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorCode" value="<?php echo HtmlEncode($appointment_scheduler_grid->DoctorCode->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->Department->Visible) { // Department ?>
		<td data-name="Department" <?php echo $appointment_scheduler_grid->Department->cellAttributes() ?>>
<?php if ($appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_Department" class="form-group">
<input type="text" data-table="appointment_scheduler" data-field="x_Department" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Department" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Department" size="8" maxlength="15" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->Department->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->Department->EditValue ?>"<?php echo $appointment_scheduler_grid->Department->editAttributes() ?>>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Department" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_Department" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($appointment_scheduler_grid->Department->OldValue) ?>">
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_Department" class="form-group">
<input type="text" data-table="appointment_scheduler" data-field="x_Department" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Department" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Department" size="8" maxlength="15" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->Department->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->Department->EditValue ?>"<?php echo $appointment_scheduler_grid->Department->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_Department">
<span<?php echo $appointment_scheduler_grid->Department->viewAttributes() ?>><?php echo $appointment_scheduler_grid->Department->getViewValue() ?></span>
</span>
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Department" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Department" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($appointment_scheduler_grid->Department->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_Department" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_Department" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($appointment_scheduler_grid->Department->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Department" name="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_Department" id="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($appointment_scheduler_grid->Department->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_Department" name="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_Department" id="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($appointment_scheduler_grid->Department->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->scheduler_id->Visible) { // scheduler_id ?>
		<td data-name="scheduler_id" <?php echo $appointment_scheduler_grid->scheduler_id->cellAttributes() ?>>
<?php if ($appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_scheduler_id" class="form-group">
<input type="text" data-table="appointment_scheduler" data-field="x_scheduler_id" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_scheduler_id" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_scheduler_id" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->scheduler_id->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->scheduler_id->EditValue ?>"<?php echo $appointment_scheduler_grid->scheduler_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_scheduler_id" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_scheduler_id" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_scheduler_id" value="<?php echo HtmlEncode($appointment_scheduler_grid->scheduler_id->OldValue) ?>">
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_scheduler_id" class="form-group">
<span<?php echo $appointment_scheduler_grid->scheduler_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_scheduler_grid->scheduler_id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_scheduler_id" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_scheduler_id" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_scheduler_id" value="<?php echo HtmlEncode($appointment_scheduler_grid->scheduler_id->CurrentValue) ?>">
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_scheduler_id">
<span<?php echo $appointment_scheduler_grid->scheduler_id->viewAttributes() ?>><?php echo $appointment_scheduler_grid->scheduler_id->getViewValue() ?></span>
</span>
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_scheduler_id" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_scheduler_id" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_scheduler_id" value="<?php echo HtmlEncode($appointment_scheduler_grid->scheduler_id->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_scheduler_id" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_scheduler_id" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_scheduler_id" value="<?php echo HtmlEncode($appointment_scheduler_grid->scheduler_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_scheduler_id" name="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_scheduler_id" id="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_scheduler_id" value="<?php echo HtmlEncode($appointment_scheduler_grid->scheduler_id->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_scheduler_id" name="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_scheduler_id" id="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_scheduler_id" value="<?php echo HtmlEncode($appointment_scheduler_grid->scheduler_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->text->Visible) { // text ?>
		<td data-name="text" <?php echo $appointment_scheduler_grid->text->cellAttributes() ?>>
<?php if ($appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_text" class="form-group">
<input type="text" data-table="appointment_scheduler" data-field="x_text" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_text" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_text" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->text->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->text->EditValue ?>"<?php echo $appointment_scheduler_grid->text->editAttributes() ?>>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_text" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_text" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_text" value="<?php echo HtmlEncode($appointment_scheduler_grid->text->OldValue) ?>">
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_text" class="form-group">
<input type="text" data-table="appointment_scheduler" data-field="x_text" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_text" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_text" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->text->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->text->EditValue ?>"<?php echo $appointment_scheduler_grid->text->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_text">
<span<?php echo $appointment_scheduler_grid->text->viewAttributes() ?>><?php echo $appointment_scheduler_grid->text->getViewValue() ?></span>
</span>
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_text" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_text" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_text" value="<?php echo HtmlEncode($appointment_scheduler_grid->text->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_text" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_text" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_text" value="<?php echo HtmlEncode($appointment_scheduler_grid->text->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_text" name="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_text" id="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_text" value="<?php echo HtmlEncode($appointment_scheduler_grid->text->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_text" name="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_text" id="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_text" value="<?php echo HtmlEncode($appointment_scheduler_grid->text->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->appointment_status->Visible) { // appointment_status ?>
		<td data-name="appointment_status" <?php echo $appointment_scheduler_grid->appointment_status->cellAttributes() ?>>
<?php if ($appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_appointment_status" class="form-group">
<input type="text" data-table="appointment_scheduler" data-field="x_appointment_status" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_status" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_status" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->appointment_status->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->appointment_status->EditValue ?>"<?php echo $appointment_scheduler_grid->appointment_status->editAttributes() ?>>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_appointment_status" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_status" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_status" value="<?php echo HtmlEncode($appointment_scheduler_grid->appointment_status->OldValue) ?>">
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_appointment_status" class="form-group">
<input type="text" data-table="appointment_scheduler" data-field="x_appointment_status" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_status" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_status" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->appointment_status->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->appointment_status->EditValue ?>"<?php echo $appointment_scheduler_grid->appointment_status->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_appointment_status">
<span<?php echo $appointment_scheduler_grid->appointment_status->viewAttributes() ?>><?php echo $appointment_scheduler_grid->appointment_status->getViewValue() ?></span>
</span>
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_appointment_status" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_status" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_status" value="<?php echo HtmlEncode($appointment_scheduler_grid->appointment_status->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_appointment_status" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_status" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_status" value="<?php echo HtmlEncode($appointment_scheduler_grid->appointment_status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_appointment_status" name="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_status" id="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_status" value="<?php echo HtmlEncode($appointment_scheduler_grid->appointment_status->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_appointment_status" name="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_status" id="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_status" value="<?php echo HtmlEncode($appointment_scheduler_grid->appointment_status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->PId->Visible) { // PId ?>
		<td data-name="PId" <?php echo $appointment_scheduler_grid->PId->cellAttributes() ?>>
<?php if ($appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_PId" class="form-group">
<input type="text" data-table="appointment_scheduler" data-field="x_PId" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_PId" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_PId" size="30" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->PId->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->PId->EditValue ?>"<?php echo $appointment_scheduler_grid->PId->editAttributes() ?>>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_PId" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_PId" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_PId" value="<?php echo HtmlEncode($appointment_scheduler_grid->PId->OldValue) ?>">
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_PId" class="form-group">
<input type="text" data-table="appointment_scheduler" data-field="x_PId" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_PId" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_PId" size="30" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->PId->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->PId->EditValue ?>"<?php echo $appointment_scheduler_grid->PId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_PId">
<span<?php echo $appointment_scheduler_grid->PId->viewAttributes() ?>><?php echo $appointment_scheduler_grid->PId->getViewValue() ?></span>
</span>
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_PId" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_PId" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_PId" value="<?php echo HtmlEncode($appointment_scheduler_grid->PId->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_PId" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_PId" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_PId" value="<?php echo HtmlEncode($appointment_scheduler_grid->PId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_PId" name="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_PId" id="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_PId" value="<?php echo HtmlEncode($appointment_scheduler_grid->PId->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_PId" name="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_PId" id="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_PId" value="<?php echo HtmlEncode($appointment_scheduler_grid->PId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber" <?php echo $appointment_scheduler_grid->MobileNumber->cellAttributes() ?>>
<?php if ($appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_MobileNumber" class="form-group">
<input type="text" data-table="appointment_scheduler" data-field="x_MobileNumber" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_MobileNumber" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->MobileNumber->EditValue ?>"<?php echo $appointment_scheduler_grid->MobileNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_MobileNumber" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_MobileNumber" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($appointment_scheduler_grid->MobileNumber->OldValue) ?>">
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_MobileNumber" class="form-group">
<input type="text" data-table="appointment_scheduler" data-field="x_MobileNumber" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_MobileNumber" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->MobileNumber->EditValue ?>"<?php echo $appointment_scheduler_grid->MobileNumber->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_MobileNumber">
<span<?php echo $appointment_scheduler_grid->MobileNumber->viewAttributes() ?>><?php echo $appointment_scheduler_grid->MobileNumber->getViewValue() ?></span>
</span>
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_MobileNumber" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_MobileNumber" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($appointment_scheduler_grid->MobileNumber->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_MobileNumber" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_MobileNumber" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($appointment_scheduler_grid->MobileNumber->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_MobileNumber" name="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_MobileNumber" id="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($appointment_scheduler_grid->MobileNumber->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_MobileNumber" name="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_MobileNumber" id="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($appointment_scheduler_grid->MobileNumber->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->SchEmail->Visible) { // SchEmail ?>
		<td data-name="SchEmail" <?php echo $appointment_scheduler_grid->SchEmail->cellAttributes() ?>>
<?php if ($appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_SchEmail" class="form-group">
<input type="text" data-table="appointment_scheduler" data-field="x_SchEmail" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_SchEmail" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_SchEmail" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->SchEmail->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->SchEmail->EditValue ?>"<?php echo $appointment_scheduler_grid->SchEmail->editAttributes() ?>>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_SchEmail" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_SchEmail" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_SchEmail" value="<?php echo HtmlEncode($appointment_scheduler_grid->SchEmail->OldValue) ?>">
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_SchEmail" class="form-group">
<input type="text" data-table="appointment_scheduler" data-field="x_SchEmail" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_SchEmail" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_SchEmail" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->SchEmail->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->SchEmail->EditValue ?>"<?php echo $appointment_scheduler_grid->SchEmail->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_SchEmail">
<span<?php echo $appointment_scheduler_grid->SchEmail->viewAttributes() ?>><?php echo $appointment_scheduler_grid->SchEmail->getViewValue() ?></span>
</span>
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_SchEmail" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_SchEmail" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_SchEmail" value="<?php echo HtmlEncode($appointment_scheduler_grid->SchEmail->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_SchEmail" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_SchEmail" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_SchEmail" value="<?php echo HtmlEncode($appointment_scheduler_grid->SchEmail->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_SchEmail" name="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_SchEmail" id="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_SchEmail" value="<?php echo HtmlEncode($appointment_scheduler_grid->SchEmail->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_SchEmail" name="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_SchEmail" id="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_SchEmail" value="<?php echo HtmlEncode($appointment_scheduler_grid->SchEmail->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->appointment_type->Visible) { // appointment_type ?>
		<td data-name="appointment_type" <?php echo $appointment_scheduler_grid->appointment_type->cellAttributes() ?>>
<?php if ($appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_appointment_type" class="form-group">
<div id="tp_x<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_type" class="ew-template"><input type="radio" class="custom-control-input" data-table="appointment_scheduler" data-field="x_appointment_type" data-value-separator="<?php echo $appointment_scheduler_grid->appointment_type->displayValueSeparatorAttribute() ?>" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_type" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_type" value="{value}"<?php echo $appointment_scheduler_grid->appointment_type->editAttributes() ?>></div>
<div id="dsl_x<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_type" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $appointment_scheduler_grid->appointment_type->radioButtonListHtml(FALSE, "x{$appointment_scheduler_grid->RowIndex}_appointment_type") ?>
</div></div>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_appointment_type" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_type" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_type" value="<?php echo HtmlEncode($appointment_scheduler_grid->appointment_type->OldValue) ?>">
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_appointment_type" class="form-group">
<div id="tp_x<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_type" class="ew-template"><input type="radio" class="custom-control-input" data-table="appointment_scheduler" data-field="x_appointment_type" data-value-separator="<?php echo $appointment_scheduler_grid->appointment_type->displayValueSeparatorAttribute() ?>" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_type" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_type" value="{value}"<?php echo $appointment_scheduler_grid->appointment_type->editAttributes() ?>></div>
<div id="dsl_x<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_type" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $appointment_scheduler_grid->appointment_type->radioButtonListHtml(FALSE, "x{$appointment_scheduler_grid->RowIndex}_appointment_type") ?>
</div></div>
</span>
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_appointment_type">
<span<?php echo $appointment_scheduler_grid->appointment_type->viewAttributes() ?>><?php echo $appointment_scheduler_grid->appointment_type->getViewValue() ?></span>
</span>
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_appointment_type" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_type" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_type" value="<?php echo HtmlEncode($appointment_scheduler_grid->appointment_type->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_appointment_type" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_type" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_type" value="<?php echo HtmlEncode($appointment_scheduler_grid->appointment_type->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_appointment_type" name="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_type" id="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_type" value="<?php echo HtmlEncode($appointment_scheduler_grid->appointment_type->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_appointment_type" name="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_type" id="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_type" value="<?php echo HtmlEncode($appointment_scheduler_grid->appointment_type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->Notified->Visible) { // Notified ?>
		<td data-name="Notified" <?php echo $appointment_scheduler_grid->Notified->cellAttributes() ?>>
<?php if ($appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_Notified" class="form-group">
<div id="tp_x<?php echo $appointment_scheduler_grid->RowIndex ?>_Notified" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="appointment_scheduler" data-field="x_Notified" data-value-separator="<?php echo $appointment_scheduler_grid->Notified->displayValueSeparatorAttribute() ?>" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Notified[]" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Notified[]" value="{value}"<?php echo $appointment_scheduler_grid->Notified->editAttributes() ?>></div>
<div id="dsl_x<?php echo $appointment_scheduler_grid->RowIndex ?>_Notified" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $appointment_scheduler_grid->Notified->checkBoxListHtml(FALSE, "x{$appointment_scheduler_grid->RowIndex}_Notified[]") ?>
</div></div>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Notified" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_Notified[]" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_Notified[]" value="<?php echo HtmlEncode($appointment_scheduler_grid->Notified->OldValue) ?>">
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_Notified" class="form-group">
<div id="tp_x<?php echo $appointment_scheduler_grid->RowIndex ?>_Notified" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="appointment_scheduler" data-field="x_Notified" data-value-separator="<?php echo $appointment_scheduler_grid->Notified->displayValueSeparatorAttribute() ?>" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Notified[]" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Notified[]" value="{value}"<?php echo $appointment_scheduler_grid->Notified->editAttributes() ?>></div>
<div id="dsl_x<?php echo $appointment_scheduler_grid->RowIndex ?>_Notified" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $appointment_scheduler_grid->Notified->checkBoxListHtml(FALSE, "x{$appointment_scheduler_grid->RowIndex}_Notified[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_Notified">
<span<?php echo $appointment_scheduler_grid->Notified->viewAttributes() ?>><?php echo $appointment_scheduler_grid->Notified->getViewValue() ?></span>
</span>
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Notified" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Notified" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Notified" value="<?php echo HtmlEncode($appointment_scheduler_grid->Notified->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_Notified" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_Notified[]" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_Notified[]" value="<?php echo HtmlEncode($appointment_scheduler_grid->Notified->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Notified" name="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_Notified" id="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_Notified" value="<?php echo HtmlEncode($appointment_scheduler_grid->Notified->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_Notified" name="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_Notified[]" id="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_Notified[]" value="<?php echo HtmlEncode($appointment_scheduler_grid->Notified->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->Purpose->Visible) { // Purpose ?>
		<td data-name="Purpose" <?php echo $appointment_scheduler_grid->Purpose->cellAttributes() ?>>
<?php if ($appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_Purpose" class="form-group">
<input type="text" data-table="appointment_scheduler" data-field="x_Purpose" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Purpose" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Purpose" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->Purpose->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->Purpose->EditValue ?>"<?php echo $appointment_scheduler_grid->Purpose->editAttributes() ?>>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Purpose" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_Purpose" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_Purpose" value="<?php echo HtmlEncode($appointment_scheduler_grid->Purpose->OldValue) ?>">
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_Purpose" class="form-group">
<input type="text" data-table="appointment_scheduler" data-field="x_Purpose" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Purpose" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Purpose" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->Purpose->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->Purpose->EditValue ?>"<?php echo $appointment_scheduler_grid->Purpose->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_Purpose">
<span<?php echo $appointment_scheduler_grid->Purpose->viewAttributes() ?>><?php echo $appointment_scheduler_grid->Purpose->getViewValue() ?></span>
</span>
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Purpose" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Purpose" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Purpose" value="<?php echo HtmlEncode($appointment_scheduler_grid->Purpose->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_Purpose" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_Purpose" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_Purpose" value="<?php echo HtmlEncode($appointment_scheduler_grid->Purpose->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Purpose" name="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_Purpose" id="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_Purpose" value="<?php echo HtmlEncode($appointment_scheduler_grid->Purpose->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_Purpose" name="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_Purpose" id="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_Purpose" value="<?php echo HtmlEncode($appointment_scheduler_grid->Purpose->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->Notes->Visible) { // Notes ?>
		<td data-name="Notes" <?php echo $appointment_scheduler_grid->Notes->cellAttributes() ?>>
<?php if ($appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_Notes" class="form-group">
<input type="text" data-table="appointment_scheduler" data-field="x_Notes" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Notes" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Notes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->Notes->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->Notes->EditValue ?>"<?php echo $appointment_scheduler_grid->Notes->editAttributes() ?>>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Notes" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_Notes" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_Notes" value="<?php echo HtmlEncode($appointment_scheduler_grid->Notes->OldValue) ?>">
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_Notes" class="form-group">
<input type="text" data-table="appointment_scheduler" data-field="x_Notes" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Notes" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Notes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->Notes->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->Notes->EditValue ?>"<?php echo $appointment_scheduler_grid->Notes->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_Notes">
<span<?php echo $appointment_scheduler_grid->Notes->viewAttributes() ?>><?php echo $appointment_scheduler_grid->Notes->getViewValue() ?></span>
</span>
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Notes" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Notes" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Notes" value="<?php echo HtmlEncode($appointment_scheduler_grid->Notes->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_Notes" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_Notes" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_Notes" value="<?php echo HtmlEncode($appointment_scheduler_grid->Notes->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Notes" name="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_Notes" id="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_Notes" value="<?php echo HtmlEncode($appointment_scheduler_grid->Notes->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_Notes" name="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_Notes" id="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_Notes" value="<?php echo HtmlEncode($appointment_scheduler_grid->Notes->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->PatientType->Visible) { // PatientType ?>
		<td data-name="PatientType" <?php echo $appointment_scheduler_grid->PatientType->cellAttributes() ?>>
<?php if ($appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_PatientType" class="form-group">
<?php $appointment_scheduler_grid->PatientType->EditAttrs->prepend("onclick", "ew.updateOptions.call(this);"); ?>
<div id="tp_x<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientType" class="ew-template"><input type="radio" class="custom-control-input" data-table="appointment_scheduler" data-field="x_PatientType" data-value-separator="<?php echo $appointment_scheduler_grid->PatientType->displayValueSeparatorAttribute() ?>" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientType" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientType" value="{value}"<?php echo $appointment_scheduler_grid->PatientType->editAttributes() ?>></div>
<div id="dsl_x<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $appointment_scheduler_grid->PatientType->radioButtonListHtml(FALSE, "x{$appointment_scheduler_grid->RowIndex}_PatientType") ?>
</div></div>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_PatientType" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientType" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientType" value="<?php echo HtmlEncode($appointment_scheduler_grid->PatientType->OldValue) ?>">
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_PatientType" class="form-group">
<?php $appointment_scheduler_grid->PatientType->EditAttrs->prepend("onclick", "ew.updateOptions.call(this);"); ?>
<div id="tp_x<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientType" class="ew-template"><input type="radio" class="custom-control-input" data-table="appointment_scheduler" data-field="x_PatientType" data-value-separator="<?php echo $appointment_scheduler_grid->PatientType->displayValueSeparatorAttribute() ?>" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientType" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientType" value="{value}"<?php echo $appointment_scheduler_grid->PatientType->editAttributes() ?>></div>
<div id="dsl_x<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $appointment_scheduler_grid->PatientType->radioButtonListHtml(FALSE, "x{$appointment_scheduler_grid->RowIndex}_PatientType") ?>
</div></div>
</span>
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_PatientType">
<span<?php echo $appointment_scheduler_grid->PatientType->viewAttributes() ?>><?php echo $appointment_scheduler_grid->PatientType->getViewValue() ?></span>
</span>
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_PatientType" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientType" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientType" value="<?php echo HtmlEncode($appointment_scheduler_grid->PatientType->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_PatientType" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientType" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientType" value="<?php echo HtmlEncode($appointment_scheduler_grid->PatientType->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_PatientType" name="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientType" id="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientType" value="<?php echo HtmlEncode($appointment_scheduler_grid->PatientType->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_PatientType" name="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientType" id="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientType" value="<?php echo HtmlEncode($appointment_scheduler_grid->PatientType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->Referal->Visible) { // Referal ?>
		<td data-name="Referal" <?php echo $appointment_scheduler_grid->Referal->cellAttributes() ?>>
<?php if ($appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_Referal" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $appointment_scheduler_grid->RowIndex ?>_Referal"><?php echo EmptyValue(strval($appointment_scheduler_grid->Referal->ViewValue)) ? $Language->phrase("PleaseSelect") : $appointment_scheduler_grid->Referal->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($appointment_scheduler_grid->Referal->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($appointment_scheduler_grid->Referal->ReadOnly || $appointment_scheduler_grid->Referal->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $appointment_scheduler_grid->RowIndex ?>_Referal',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "mas_reference_type") && !$appointment_scheduler_grid->Referal->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $appointment_scheduler_grid->RowIndex ?>_Referal" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $appointment_scheduler_grid->Referal->caption() ?>" data-title="<?php echo $appointment_scheduler_grid->Referal->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $appointment_scheduler_grid->RowIndex ?>_Referal',url:'mas_reference_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $appointment_scheduler_grid->Referal->Lookup->getParamTag($appointment_scheduler_grid, "p_x" . $appointment_scheduler_grid->RowIndex . "_Referal") ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Referal" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $appointment_scheduler_grid->Referal->displayValueSeparatorAttribute() ?>" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Referal" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Referal" value="<?php echo $appointment_scheduler_grid->Referal->CurrentValue ?>"<?php echo $appointment_scheduler_grid->Referal->editAttributes() ?>>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Referal" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_Referal" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_Referal" value="<?php echo HtmlEncode($appointment_scheduler_grid->Referal->OldValue) ?>">
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_Referal" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $appointment_scheduler_grid->RowIndex ?>_Referal"><?php echo EmptyValue(strval($appointment_scheduler_grid->Referal->ViewValue)) ? $Language->phrase("PleaseSelect") : $appointment_scheduler_grid->Referal->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($appointment_scheduler_grid->Referal->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($appointment_scheduler_grid->Referal->ReadOnly || $appointment_scheduler_grid->Referal->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $appointment_scheduler_grid->RowIndex ?>_Referal',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "mas_reference_type") && !$appointment_scheduler_grid->Referal->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $appointment_scheduler_grid->RowIndex ?>_Referal" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $appointment_scheduler_grid->Referal->caption() ?>" data-title="<?php echo $appointment_scheduler_grid->Referal->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $appointment_scheduler_grid->RowIndex ?>_Referal',url:'mas_reference_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $appointment_scheduler_grid->Referal->Lookup->getParamTag($appointment_scheduler_grid, "p_x" . $appointment_scheduler_grid->RowIndex . "_Referal") ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Referal" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $appointment_scheduler_grid->Referal->displayValueSeparatorAttribute() ?>" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Referal" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Referal" value="<?php echo $appointment_scheduler_grid->Referal->CurrentValue ?>"<?php echo $appointment_scheduler_grid->Referal->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_Referal">
<span<?php echo $appointment_scheduler_grid->Referal->viewAttributes() ?>><?php echo $appointment_scheduler_grid->Referal->getViewValue() ?></span>
</span>
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Referal" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Referal" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Referal" value="<?php echo HtmlEncode($appointment_scheduler_grid->Referal->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_Referal" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_Referal" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_Referal" value="<?php echo HtmlEncode($appointment_scheduler_grid->Referal->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Referal" name="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_Referal" id="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_Referal" value="<?php echo HtmlEncode($appointment_scheduler_grid->Referal->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_Referal" name="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_Referal" id="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_Referal" value="<?php echo HtmlEncode($appointment_scheduler_grid->Referal->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->paymentType->Visible) { // paymentType ?>
		<td data-name="paymentType" <?php echo $appointment_scheduler_grid->paymentType->cellAttributes() ?>>
<?php if ($appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_paymentType" class="form-group">
<input type="text" data-table="appointment_scheduler" data-field="x_paymentType" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_paymentType" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_paymentType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->paymentType->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->paymentType->EditValue ?>"<?php echo $appointment_scheduler_grid->paymentType->editAttributes() ?>>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_paymentType" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_paymentType" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_paymentType" value="<?php echo HtmlEncode($appointment_scheduler_grid->paymentType->OldValue) ?>">
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_paymentType" class="form-group">
<input type="text" data-table="appointment_scheduler" data-field="x_paymentType" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_paymentType" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_paymentType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->paymentType->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->paymentType->EditValue ?>"<?php echo $appointment_scheduler_grid->paymentType->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_paymentType">
<span<?php echo $appointment_scheduler_grid->paymentType->viewAttributes() ?>><?php echo $appointment_scheduler_grid->paymentType->getViewValue() ?></span>
</span>
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_paymentType" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_paymentType" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_paymentType" value="<?php echo HtmlEncode($appointment_scheduler_grid->paymentType->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_paymentType" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_paymentType" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_paymentType" value="<?php echo HtmlEncode($appointment_scheduler_grid->paymentType->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_paymentType" name="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_paymentType" id="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_paymentType" value="<?php echo HtmlEncode($appointment_scheduler_grid->paymentType->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_paymentType" name="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_paymentType" id="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_paymentType" value="<?php echo HtmlEncode($appointment_scheduler_grid->paymentType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
		<td data-name="WhereDidYouHear" <?php echo $appointment_scheduler_grid->WhereDidYouHear->cellAttributes() ?>>
<?php if ($appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_WhereDidYouHear" class="form-group">
<div id="tp_x<?php echo $appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="appointment_scheduler" data-field="x_WhereDidYouHear" data-value-separator="<?php echo $appointment_scheduler_grid->WhereDidYouHear->displayValueSeparatorAttribute() ?>" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear[]" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear[]" value="{value}"<?php echo $appointment_scheduler_grid->WhereDidYouHear->editAttributes() ?>></div>
<div id="dsl_x<?php echo $appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $appointment_scheduler_grid->WhereDidYouHear->checkBoxListHtml(FALSE, "x{$appointment_scheduler_grid->RowIndex}_WhereDidYouHear[]") ?>
</div></div>
<?php echo $appointment_scheduler_grid->WhereDidYouHear->Lookup->getParamTag($appointment_scheduler_grid, "p_x" . $appointment_scheduler_grid->RowIndex . "_WhereDidYouHear") ?>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_WhereDidYouHear" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear[]" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear[]" value="<?php echo HtmlEncode($appointment_scheduler_grid->WhereDidYouHear->OldValue) ?>">
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_WhereDidYouHear" class="form-group">
<div id="tp_x<?php echo $appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="appointment_scheduler" data-field="x_WhereDidYouHear" data-value-separator="<?php echo $appointment_scheduler_grid->WhereDidYouHear->displayValueSeparatorAttribute() ?>" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear[]" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear[]" value="{value}"<?php echo $appointment_scheduler_grid->WhereDidYouHear->editAttributes() ?>></div>
<div id="dsl_x<?php echo $appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $appointment_scheduler_grid->WhereDidYouHear->checkBoxListHtml(FALSE, "x{$appointment_scheduler_grid->RowIndex}_WhereDidYouHear[]") ?>
</div></div>
<?php echo $appointment_scheduler_grid->WhereDidYouHear->Lookup->getParamTag($appointment_scheduler_grid, "p_x" . $appointment_scheduler_grid->RowIndex . "_WhereDidYouHear") ?>
</span>
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_WhereDidYouHear">
<span<?php echo $appointment_scheduler_grid->WhereDidYouHear->viewAttributes() ?>><?php echo $appointment_scheduler_grid->WhereDidYouHear->getViewValue() ?></span>
</span>
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_WhereDidYouHear" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear" value="<?php echo HtmlEncode($appointment_scheduler_grid->WhereDidYouHear->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_WhereDidYouHear" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear[]" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear[]" value="<?php echo HtmlEncode($appointment_scheduler_grid->WhereDidYouHear->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_WhereDidYouHear" name="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear" id="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear" value="<?php echo HtmlEncode($appointment_scheduler_grid->WhereDidYouHear->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_WhereDidYouHear" name="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear[]" id="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear[]" value="<?php echo HtmlEncode($appointment_scheduler_grid->WhereDidYouHear->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $appointment_scheduler_grid->HospID->cellAttributes() ?>>
<?php if ($appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_HospID" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_HospID" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($appointment_scheduler_grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_HospID">
<span<?php echo $appointment_scheduler_grid->HospID->viewAttributes() ?>><?php echo $appointment_scheduler_grid->HospID->getViewValue() ?></span>
</span>
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_HospID" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_HospID" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($appointment_scheduler_grid->HospID->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_HospID" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_HospID" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($appointment_scheduler_grid->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_HospID" name="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_HospID" id="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($appointment_scheduler_grid->HospID->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_HospID" name="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_HospID" id="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($appointment_scheduler_grid->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->createdBy->Visible) { // createdBy ?>
		<td data-name="createdBy" <?php echo $appointment_scheduler_grid->createdBy->cellAttributes() ?>>
<?php if ($appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_createdBy" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_createdBy" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_createdBy" value="<?php echo HtmlEncode($appointment_scheduler_grid->createdBy->OldValue) ?>">
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_createdBy">
<span<?php echo $appointment_scheduler_grid->createdBy->viewAttributes() ?>><?php echo $appointment_scheduler_grid->createdBy->getViewValue() ?></span>
</span>
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_createdBy" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_createdBy" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_createdBy" value="<?php echo HtmlEncode($appointment_scheduler_grid->createdBy->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_createdBy" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_createdBy" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_createdBy" value="<?php echo HtmlEncode($appointment_scheduler_grid->createdBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_createdBy" name="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_createdBy" id="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_createdBy" value="<?php echo HtmlEncode($appointment_scheduler_grid->createdBy->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_createdBy" name="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_createdBy" id="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_createdBy" value="<?php echo HtmlEncode($appointment_scheduler_grid->createdBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->createdDateTime->Visible) { // createdDateTime ?>
		<td data-name="createdDateTime" <?php echo $appointment_scheduler_grid->createdDateTime->cellAttributes() ?>>
<?php if ($appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_createdDateTime" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_createdDateTime" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_createdDateTime" value="<?php echo HtmlEncode($appointment_scheduler_grid->createdDateTime->OldValue) ?>">
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_createdDateTime">
<span<?php echo $appointment_scheduler_grid->createdDateTime->viewAttributes() ?>><?php echo $appointment_scheduler_grid->createdDateTime->getViewValue() ?></span>
</span>
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_createdDateTime" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_createdDateTime" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_createdDateTime" value="<?php echo HtmlEncode($appointment_scheduler_grid->createdDateTime->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_createdDateTime" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_createdDateTime" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_createdDateTime" value="<?php echo HtmlEncode($appointment_scheduler_grid->createdDateTime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_createdDateTime" name="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_createdDateTime" id="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_createdDateTime" value="<?php echo HtmlEncode($appointment_scheduler_grid->createdDateTime->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_createdDateTime" name="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_createdDateTime" id="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_createdDateTime" value="<?php echo HtmlEncode($appointment_scheduler_grid->createdDateTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->PatientTypee->Visible) { // PatientTypee ?>
		<td data-name="PatientTypee" <?php echo $appointment_scheduler_grid->PatientTypee->cellAttributes() ?>>
<?php if ($appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_PatientTypee" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="appointment_scheduler" data-field="x_PatientTypee" data-value-separator="<?php echo $appointment_scheduler_grid->PatientTypee->displayValueSeparatorAttribute() ?>" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientTypee" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientTypee"<?php echo $appointment_scheduler_grid->PatientTypee->editAttributes() ?>>
			<?php echo $appointment_scheduler_grid->PatientTypee->selectOptionListHtml("x{$appointment_scheduler_grid->RowIndex}_PatientTypee") ?>
		</select>
</div>
<?php echo $appointment_scheduler_grid->PatientTypee->Lookup->getParamTag($appointment_scheduler_grid, "p_x" . $appointment_scheduler_grid->RowIndex . "_PatientTypee") ?>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_PatientTypee" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientTypee" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientTypee" value="<?php echo HtmlEncode($appointment_scheduler_grid->PatientTypee->OldValue) ?>">
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_PatientTypee" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="appointment_scheduler" data-field="x_PatientTypee" data-value-separator="<?php echo $appointment_scheduler_grid->PatientTypee->displayValueSeparatorAttribute() ?>" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientTypee" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientTypee"<?php echo $appointment_scheduler_grid->PatientTypee->editAttributes() ?>>
			<?php echo $appointment_scheduler_grid->PatientTypee->selectOptionListHtml("x{$appointment_scheduler_grid->RowIndex}_PatientTypee") ?>
		</select>
</div>
<?php echo $appointment_scheduler_grid->PatientTypee->Lookup->getParamTag($appointment_scheduler_grid, "p_x" . $appointment_scheduler_grid->RowIndex . "_PatientTypee") ?>
</span>
<?php } ?>
<?php if ($appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $appointment_scheduler_grid->RowCount ?>_appointment_scheduler_PatientTypee">
<span<?php echo $appointment_scheduler_grid->PatientTypee->viewAttributes() ?>><?php echo $appointment_scheduler_grid->PatientTypee->getViewValue() ?></span>
</span>
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_PatientTypee" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientTypee" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientTypee" value="<?php echo HtmlEncode($appointment_scheduler_grid->PatientTypee->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_PatientTypee" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientTypee" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientTypee" value="<?php echo HtmlEncode($appointment_scheduler_grid->PatientTypee->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_PatientTypee" name="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientTypee" id="fappointment_schedulergrid$x<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientTypee" value="<?php echo HtmlEncode($appointment_scheduler_grid->PatientTypee->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_PatientTypee" name="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientTypee" id="fappointment_schedulergrid$o<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientTypee" value="<?php echo HtmlEncode($appointment_scheduler_grid->PatientTypee->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$appointment_scheduler_grid->ListOptions->render("body", "right", $appointment_scheduler_grid->RowCount);
?>
	</tr>
<?php if ($appointment_scheduler->RowType == ROWTYPE_ADD || $appointment_scheduler->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fappointment_schedulergrid", "load"], function() {
	fappointment_schedulergrid.updateLists(<?php echo $appointment_scheduler_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$appointment_scheduler_grid->isGridAdd() || $appointment_scheduler->CurrentMode == "copy")
		if (!$appointment_scheduler_grid->Recordset->EOF)
			$appointment_scheduler_grid->Recordset->moveNext();
}
?>
<?php
	if ($appointment_scheduler->CurrentMode == "add" || $appointment_scheduler->CurrentMode == "copy" || $appointment_scheduler->CurrentMode == "edit") {
		$appointment_scheduler_grid->RowIndex = '$rowindex$';
		$appointment_scheduler_grid->loadRowValues();

		// Set row properties
		$appointment_scheduler->resetAttributes();
		$appointment_scheduler->RowAttrs->merge(["data-rowindex" => $appointment_scheduler_grid->RowIndex, "id" => "r0_appointment_scheduler", "data-rowtype" => ROWTYPE_ADD]);
		$appointment_scheduler->RowAttrs->appendClass("ew-template");
		$appointment_scheduler->RowType = ROWTYPE_ADD;

		// Render row
		$appointment_scheduler_grid->renderRow();

		// Render list options
		$appointment_scheduler_grid->renderListOptions();
		$appointment_scheduler_grid->StartRowCount = 0;
?>
	<tr <?php echo $appointment_scheduler->rowAttributes() ?>>
<?php

// Render list options (body, left)
$appointment_scheduler_grid->ListOptions->render("body", "left", $appointment_scheduler_grid->RowIndex);
?>
	<?php if ($appointment_scheduler_grid->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_id" class="form-group appointment_scheduler_id"></span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_id" class="form-group appointment_scheduler_id">
<span<?php echo $appointment_scheduler_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_scheduler_grid->id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_id" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_id" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($appointment_scheduler_grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_id" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_id" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($appointment_scheduler_grid->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->start_date->Visible) { // start_date ?>
		<td data-name="start_date">
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_start_date" class="form-group appointment_scheduler_start_date">
<input type="text" data-table="appointment_scheduler" data-field="x_start_date" data-format="11" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_start_date" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_start_date" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->start_date->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->start_date->EditValue ?>"<?php echo $appointment_scheduler_grid->start_date->editAttributes() ?>>
<?php if (!$appointment_scheduler_grid->start_date->ReadOnly && !$appointment_scheduler_grid->start_date->Disabled && !isset($appointment_scheduler_grid->start_date->EditAttrs["readonly"]) && !isset($appointment_scheduler_grid->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fappointment_schedulergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fappointment_schedulergrid", "x<?php echo $appointment_scheduler_grid->RowIndex ?>_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_start_date" class="form-group appointment_scheduler_start_date">
<span<?php echo $appointment_scheduler_grid->start_date->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_scheduler_grid->start_date->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_start_date" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_start_date" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_start_date" value="<?php echo HtmlEncode($appointment_scheduler_grid->start_date->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_start_date" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_start_date" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_start_date" value="<?php echo HtmlEncode($appointment_scheduler_grid->start_date->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->end_date->Visible) { // end_date ?>
		<td data-name="end_date">
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_end_date" class="form-group appointment_scheduler_end_date">
<input type="text" data-table="appointment_scheduler" data-field="x_end_date" data-format="11" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_end_date" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_end_date" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->end_date->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->end_date->EditValue ?>"<?php echo $appointment_scheduler_grid->end_date->editAttributes() ?>>
<?php if (!$appointment_scheduler_grid->end_date->ReadOnly && !$appointment_scheduler_grid->end_date->Disabled && !isset($appointment_scheduler_grid->end_date->EditAttrs["readonly"]) && !isset($appointment_scheduler_grid->end_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fappointment_schedulergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fappointment_schedulergrid", "x<?php echo $appointment_scheduler_grid->RowIndex ?>_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_end_date" class="form-group appointment_scheduler_end_date">
<span<?php echo $appointment_scheduler_grid->end_date->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_scheduler_grid->end_date->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_end_date" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_end_date" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_end_date" value="<?php echo HtmlEncode($appointment_scheduler_grid->end_date->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_end_date" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_end_date" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_end_date" value="<?php echo HtmlEncode($appointment_scheduler_grid->end_date->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->patientID->Visible) { // patientID ?>
		<td data-name="patientID">
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_patientID" class="form-group appointment_scheduler_patientID">
<?php $appointment_scheduler_grid->patientID->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $appointment_scheduler_grid->RowIndex ?>_patientID"><?php echo EmptyValue(strval($appointment_scheduler_grid->patientID->ViewValue)) ? $Language->phrase("PleaseSelect") : $appointment_scheduler_grid->patientID->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($appointment_scheduler_grid->patientID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($appointment_scheduler_grid->patientID->ReadOnly || $appointment_scheduler_grid->patientID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $appointment_scheduler_grid->RowIndex ?>_patientID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $appointment_scheduler_grid->patientID->Lookup->getParamTag($appointment_scheduler_grid, "p_x" . $appointment_scheduler_grid->RowIndex . "_patientID") ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_patientID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $appointment_scheduler_grid->patientID->displayValueSeparatorAttribute() ?>" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_patientID" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_patientID" value="<?php echo $appointment_scheduler_grid->patientID->CurrentValue ?>"<?php echo $appointment_scheduler_grid->patientID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_patientID" class="form-group appointment_scheduler_patientID">
<span<?php echo $appointment_scheduler_grid->patientID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_scheduler_grid->patientID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_patientID" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_patientID" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_patientID" value="<?php echo HtmlEncode($appointment_scheduler_grid->patientID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_patientID" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_patientID" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_patientID" value="<?php echo HtmlEncode($appointment_scheduler_grid->patientID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->patientName->Visible) { // patientName ?>
		<td data-name="patientName">
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_patientName" class="form-group appointment_scheduler_patientName">
<input type="text" data-table="appointment_scheduler" data-field="x_patientName" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_patientName" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_patientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->patientName->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->patientName->EditValue ?>"<?php echo $appointment_scheduler_grid->patientName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_patientName" class="form-group appointment_scheduler_patientName">
<span<?php echo $appointment_scheduler_grid->patientName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_scheduler_grid->patientName->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_patientName" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_patientName" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_patientName" value="<?php echo HtmlEncode($appointment_scheduler_grid->patientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_patientName" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_patientName" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_patientName" value="<?php echo HtmlEncode($appointment_scheduler_grid->patientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->DoctorID->Visible) { // DoctorID ?>
		<td data-name="DoctorID">
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<?php if ($appointment_scheduler_grid->DoctorID->getSessionValue() != "") { ?>
<span id="el$rowindex$_appointment_scheduler_DoctorID" class="form-group appointment_scheduler_DoctorID">
<span<?php echo $appointment_scheduler_grid->DoctorID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_scheduler_grid->DoctorID->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorID" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorID" value="<?php echo HtmlEncode($appointment_scheduler_grid->DoctorID->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_DoctorID" class="form-group appointment_scheduler_DoctorID">
<input type="text" data-table="appointment_scheduler" data-field="x_DoctorID" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorID" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorID" size="3" maxlength="5" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->DoctorID->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->DoctorID->EditValue ?>"<?php echo $appointment_scheduler_grid->DoctorID->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_DoctorID" class="form-group appointment_scheduler_DoctorID">
<span<?php echo $appointment_scheduler_grid->DoctorID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_scheduler_grid->DoctorID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorID" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorID" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorID" value="<?php echo HtmlEncode($appointment_scheduler_grid->DoctorID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorID" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorID" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorID" value="<?php echo HtmlEncode($appointment_scheduler_grid->DoctorID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->DoctorName->Visible) { // DoctorName ?>
		<td data-name="DoctorName">
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_DoctorName" class="form-group appointment_scheduler_DoctorName">
<?php $appointment_scheduler_grid->DoctorName->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorName"><?php echo EmptyValue(strval($appointment_scheduler_grid->DoctorName->ViewValue)) ? $Language->phrase("PleaseSelect") : $appointment_scheduler_grid->DoctorName->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($appointment_scheduler_grid->DoctorName->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($appointment_scheduler_grid->DoctorName->ReadOnly || $appointment_scheduler_grid->DoctorName->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorName',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $appointment_scheduler_grid->DoctorName->Lookup->getParamTag($appointment_scheduler_grid, "p_x" . $appointment_scheduler_grid->RowIndex . "_DoctorName") ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorName" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $appointment_scheduler_grid->DoctorName->displayValueSeparatorAttribute() ?>" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorName" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorName" value="<?php echo $appointment_scheduler_grid->DoctorName->CurrentValue ?>"<?php echo $appointment_scheduler_grid->DoctorName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_DoctorName" class="form-group appointment_scheduler_DoctorName">
<span<?php echo $appointment_scheduler_grid->DoctorName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_scheduler_grid->DoctorName->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorName" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorName" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorName" value="<?php echo HtmlEncode($appointment_scheduler_grid->DoctorName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorName" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorName" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorName" value="<?php echo HtmlEncode($appointment_scheduler_grid->DoctorName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->AppointmentStatus->Visible) { // AppointmentStatus ?>
		<td data-name="AppointmentStatus">
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_AppointmentStatus" class="form-group appointment_scheduler_AppointmentStatus">
<input type="text" data-table="appointment_scheduler" data-field="x_AppointmentStatus" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->AppointmentStatus->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->AppointmentStatus->EditValue ?>"<?php echo $appointment_scheduler_grid->AppointmentStatus->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_AppointmentStatus" class="form-group appointment_scheduler_AppointmentStatus">
<span<?php echo $appointment_scheduler_grid->AppointmentStatus->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_scheduler_grid->AppointmentStatus->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_AppointmentStatus" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" value="<?php echo HtmlEncode($appointment_scheduler_grid->AppointmentStatus->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_AppointmentStatus" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" value="<?php echo HtmlEncode($appointment_scheduler_grid->AppointmentStatus->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->status->Visible) { // status ?>
		<td data-name="status">
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_status" class="form-group appointment_scheduler_status">
<div id="tp_x<?php echo $appointment_scheduler_grid->RowIndex ?>_status" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="appointment_scheduler" data-field="x_status" data-value-separator="<?php echo $appointment_scheduler_grid->status->displayValueSeparatorAttribute() ?>" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_status[]" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_status[]" value="{value}"<?php echo $appointment_scheduler_grid->status->editAttributes() ?>></div>
<div id="dsl_x<?php echo $appointment_scheduler_grid->RowIndex ?>_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $appointment_scheduler_grid->status->checkBoxListHtml(FALSE, "x{$appointment_scheduler_grid->RowIndex}_status[]") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_status" class="form-group appointment_scheduler_status">
<span<?php echo $appointment_scheduler_grid->status->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_scheduler_grid->status->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_status" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_status" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($appointment_scheduler_grid->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_status" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_status[]" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_status[]" value="<?php echo HtmlEncode($appointment_scheduler_grid->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->DoctorCode->Visible) { // DoctorCode ?>
		<td data-name="DoctorCode">
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_DoctorCode" class="form-group appointment_scheduler_DoctorCode">
<input type="text" data-table="appointment_scheduler" data-field="x_DoctorCode" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorCode" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorCode" size="5" maxlength="7" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->DoctorCode->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->DoctorCode->EditValue ?>"<?php echo $appointment_scheduler_grid->DoctorCode->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_DoctorCode" class="form-group appointment_scheduler_DoctorCode">
<span<?php echo $appointment_scheduler_grid->DoctorCode->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_scheduler_grid->DoctorCode->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorCode" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorCode" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorCode" value="<?php echo HtmlEncode($appointment_scheduler_grid->DoctorCode->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorCode" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorCode" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_DoctorCode" value="<?php echo HtmlEncode($appointment_scheduler_grid->DoctorCode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->Department->Visible) { // Department ?>
		<td data-name="Department">
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_Department" class="form-group appointment_scheduler_Department">
<input type="text" data-table="appointment_scheduler" data-field="x_Department" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Department" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Department" size="8" maxlength="15" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->Department->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->Department->EditValue ?>"<?php echo $appointment_scheduler_grid->Department->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_Department" class="form-group appointment_scheduler_Department">
<span<?php echo $appointment_scheduler_grid->Department->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_scheduler_grid->Department->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Department" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Department" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($appointment_scheduler_grid->Department->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Department" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_Department" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($appointment_scheduler_grid->Department->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->scheduler_id->Visible) { // scheduler_id ?>
		<td data-name="scheduler_id">
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_scheduler_id" class="form-group appointment_scheduler_scheduler_id">
<input type="text" data-table="appointment_scheduler" data-field="x_scheduler_id" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_scheduler_id" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_scheduler_id" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->scheduler_id->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->scheduler_id->EditValue ?>"<?php echo $appointment_scheduler_grid->scheduler_id->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_scheduler_id" class="form-group appointment_scheduler_scheduler_id">
<span<?php echo $appointment_scheduler_grid->scheduler_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_scheduler_grid->scheduler_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_scheduler_id" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_scheduler_id" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_scheduler_id" value="<?php echo HtmlEncode($appointment_scheduler_grid->scheduler_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_scheduler_id" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_scheduler_id" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_scheduler_id" value="<?php echo HtmlEncode($appointment_scheduler_grid->scheduler_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->text->Visible) { // text ?>
		<td data-name="text">
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_text" class="form-group appointment_scheduler_text">
<input type="text" data-table="appointment_scheduler" data-field="x_text" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_text" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_text" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->text->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->text->EditValue ?>"<?php echo $appointment_scheduler_grid->text->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_text" class="form-group appointment_scheduler_text">
<span<?php echo $appointment_scheduler_grid->text->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_scheduler_grid->text->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_text" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_text" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_text" value="<?php echo HtmlEncode($appointment_scheduler_grid->text->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_text" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_text" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_text" value="<?php echo HtmlEncode($appointment_scheduler_grid->text->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->appointment_status->Visible) { // appointment_status ?>
		<td data-name="appointment_status">
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_appointment_status" class="form-group appointment_scheduler_appointment_status">
<input type="text" data-table="appointment_scheduler" data-field="x_appointment_status" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_status" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_status" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->appointment_status->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->appointment_status->EditValue ?>"<?php echo $appointment_scheduler_grid->appointment_status->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_appointment_status" class="form-group appointment_scheduler_appointment_status">
<span<?php echo $appointment_scheduler_grid->appointment_status->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_scheduler_grid->appointment_status->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_appointment_status" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_status" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_status" value="<?php echo HtmlEncode($appointment_scheduler_grid->appointment_status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_appointment_status" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_status" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_status" value="<?php echo HtmlEncode($appointment_scheduler_grid->appointment_status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->PId->Visible) { // PId ?>
		<td data-name="PId">
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_PId" class="form-group appointment_scheduler_PId">
<input type="text" data-table="appointment_scheduler" data-field="x_PId" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_PId" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_PId" size="30" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->PId->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->PId->EditValue ?>"<?php echo $appointment_scheduler_grid->PId->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_PId" class="form-group appointment_scheduler_PId">
<span<?php echo $appointment_scheduler_grid->PId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_scheduler_grid->PId->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_PId" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_PId" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_PId" value="<?php echo HtmlEncode($appointment_scheduler_grid->PId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_PId" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_PId" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_PId" value="<?php echo HtmlEncode($appointment_scheduler_grid->PId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber">
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_MobileNumber" class="form-group appointment_scheduler_MobileNumber">
<input type="text" data-table="appointment_scheduler" data-field="x_MobileNumber" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_MobileNumber" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->MobileNumber->EditValue ?>"<?php echo $appointment_scheduler_grid->MobileNumber->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_MobileNumber" class="form-group appointment_scheduler_MobileNumber">
<span<?php echo $appointment_scheduler_grid->MobileNumber->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_scheduler_grid->MobileNumber->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_MobileNumber" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_MobileNumber" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($appointment_scheduler_grid->MobileNumber->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_MobileNumber" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_MobileNumber" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($appointment_scheduler_grid->MobileNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->SchEmail->Visible) { // SchEmail ?>
		<td data-name="SchEmail">
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_SchEmail" class="form-group appointment_scheduler_SchEmail">
<input type="text" data-table="appointment_scheduler" data-field="x_SchEmail" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_SchEmail" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_SchEmail" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->SchEmail->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->SchEmail->EditValue ?>"<?php echo $appointment_scheduler_grid->SchEmail->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_SchEmail" class="form-group appointment_scheduler_SchEmail">
<span<?php echo $appointment_scheduler_grid->SchEmail->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_scheduler_grid->SchEmail->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_SchEmail" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_SchEmail" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_SchEmail" value="<?php echo HtmlEncode($appointment_scheduler_grid->SchEmail->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_SchEmail" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_SchEmail" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_SchEmail" value="<?php echo HtmlEncode($appointment_scheduler_grid->SchEmail->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->appointment_type->Visible) { // appointment_type ?>
		<td data-name="appointment_type">
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_appointment_type" class="form-group appointment_scheduler_appointment_type">
<div id="tp_x<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_type" class="ew-template"><input type="radio" class="custom-control-input" data-table="appointment_scheduler" data-field="x_appointment_type" data-value-separator="<?php echo $appointment_scheduler_grid->appointment_type->displayValueSeparatorAttribute() ?>" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_type" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_type" value="{value}"<?php echo $appointment_scheduler_grid->appointment_type->editAttributes() ?>></div>
<div id="dsl_x<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_type" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $appointment_scheduler_grid->appointment_type->radioButtonListHtml(FALSE, "x{$appointment_scheduler_grid->RowIndex}_appointment_type") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_appointment_type" class="form-group appointment_scheduler_appointment_type">
<span<?php echo $appointment_scheduler_grid->appointment_type->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_scheduler_grid->appointment_type->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_appointment_type" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_type" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_type" value="<?php echo HtmlEncode($appointment_scheduler_grid->appointment_type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_appointment_type" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_type" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_appointment_type" value="<?php echo HtmlEncode($appointment_scheduler_grid->appointment_type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->Notified->Visible) { // Notified ?>
		<td data-name="Notified">
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_Notified" class="form-group appointment_scheduler_Notified">
<div id="tp_x<?php echo $appointment_scheduler_grid->RowIndex ?>_Notified" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="appointment_scheduler" data-field="x_Notified" data-value-separator="<?php echo $appointment_scheduler_grid->Notified->displayValueSeparatorAttribute() ?>" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Notified[]" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Notified[]" value="{value}"<?php echo $appointment_scheduler_grid->Notified->editAttributes() ?>></div>
<div id="dsl_x<?php echo $appointment_scheduler_grid->RowIndex ?>_Notified" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $appointment_scheduler_grid->Notified->checkBoxListHtml(FALSE, "x{$appointment_scheduler_grid->RowIndex}_Notified[]") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_Notified" class="form-group appointment_scheduler_Notified">
<span<?php echo $appointment_scheduler_grid->Notified->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_scheduler_grid->Notified->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Notified" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Notified" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Notified" value="<?php echo HtmlEncode($appointment_scheduler_grid->Notified->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Notified" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_Notified[]" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_Notified[]" value="<?php echo HtmlEncode($appointment_scheduler_grid->Notified->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->Purpose->Visible) { // Purpose ?>
		<td data-name="Purpose">
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_Purpose" class="form-group appointment_scheduler_Purpose">
<input type="text" data-table="appointment_scheduler" data-field="x_Purpose" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Purpose" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Purpose" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->Purpose->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->Purpose->EditValue ?>"<?php echo $appointment_scheduler_grid->Purpose->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_Purpose" class="form-group appointment_scheduler_Purpose">
<span<?php echo $appointment_scheduler_grid->Purpose->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_scheduler_grid->Purpose->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Purpose" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Purpose" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Purpose" value="<?php echo HtmlEncode($appointment_scheduler_grid->Purpose->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Purpose" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_Purpose" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_Purpose" value="<?php echo HtmlEncode($appointment_scheduler_grid->Purpose->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->Notes->Visible) { // Notes ?>
		<td data-name="Notes">
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_Notes" class="form-group appointment_scheduler_Notes">
<input type="text" data-table="appointment_scheduler" data-field="x_Notes" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Notes" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Notes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->Notes->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->Notes->EditValue ?>"<?php echo $appointment_scheduler_grid->Notes->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_Notes" class="form-group appointment_scheduler_Notes">
<span<?php echo $appointment_scheduler_grid->Notes->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_scheduler_grid->Notes->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Notes" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Notes" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Notes" value="<?php echo HtmlEncode($appointment_scheduler_grid->Notes->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Notes" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_Notes" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_Notes" value="<?php echo HtmlEncode($appointment_scheduler_grid->Notes->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->PatientType->Visible) { // PatientType ?>
		<td data-name="PatientType">
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_PatientType" class="form-group appointment_scheduler_PatientType">
<?php $appointment_scheduler_grid->PatientType->EditAttrs->prepend("onclick", "ew.updateOptions.call(this);"); ?>
<div id="tp_x<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientType" class="ew-template"><input type="radio" class="custom-control-input" data-table="appointment_scheduler" data-field="x_PatientType" data-value-separator="<?php echo $appointment_scheduler_grid->PatientType->displayValueSeparatorAttribute() ?>" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientType" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientType" value="{value}"<?php echo $appointment_scheduler_grid->PatientType->editAttributes() ?>></div>
<div id="dsl_x<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $appointment_scheduler_grid->PatientType->radioButtonListHtml(FALSE, "x{$appointment_scheduler_grid->RowIndex}_PatientType") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_PatientType" class="form-group appointment_scheduler_PatientType">
<span<?php echo $appointment_scheduler_grid->PatientType->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_scheduler_grid->PatientType->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_PatientType" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientType" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientType" value="<?php echo HtmlEncode($appointment_scheduler_grid->PatientType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_PatientType" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientType" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientType" value="<?php echo HtmlEncode($appointment_scheduler_grid->PatientType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->Referal->Visible) { // Referal ?>
		<td data-name="Referal">
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_Referal" class="form-group appointment_scheduler_Referal">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $appointment_scheduler_grid->RowIndex ?>_Referal"><?php echo EmptyValue(strval($appointment_scheduler_grid->Referal->ViewValue)) ? $Language->phrase("PleaseSelect") : $appointment_scheduler_grid->Referal->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($appointment_scheduler_grid->Referal->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($appointment_scheduler_grid->Referal->ReadOnly || $appointment_scheduler_grid->Referal->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $appointment_scheduler_grid->RowIndex ?>_Referal',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "mas_reference_type") && !$appointment_scheduler_grid->Referal->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $appointment_scheduler_grid->RowIndex ?>_Referal" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $appointment_scheduler_grid->Referal->caption() ?>" data-title="<?php echo $appointment_scheduler_grid->Referal->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $appointment_scheduler_grid->RowIndex ?>_Referal',url:'mas_reference_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $appointment_scheduler_grid->Referal->Lookup->getParamTag($appointment_scheduler_grid, "p_x" . $appointment_scheduler_grid->RowIndex . "_Referal") ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Referal" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $appointment_scheduler_grid->Referal->displayValueSeparatorAttribute() ?>" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Referal" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Referal" value="<?php echo $appointment_scheduler_grid->Referal->CurrentValue ?>"<?php echo $appointment_scheduler_grid->Referal->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_Referal" class="form-group appointment_scheduler_Referal">
<span<?php echo $appointment_scheduler_grid->Referal->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_scheduler_grid->Referal->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Referal" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Referal" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_Referal" value="<?php echo HtmlEncode($appointment_scheduler_grid->Referal->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Referal" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_Referal" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_Referal" value="<?php echo HtmlEncode($appointment_scheduler_grid->Referal->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->paymentType->Visible) { // paymentType ?>
		<td data-name="paymentType">
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_paymentType" class="form-group appointment_scheduler_paymentType">
<input type="text" data-table="appointment_scheduler" data-field="x_paymentType" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_paymentType" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_paymentType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_scheduler_grid->paymentType->getPlaceHolder()) ?>" value="<?php echo $appointment_scheduler_grid->paymentType->EditValue ?>"<?php echo $appointment_scheduler_grid->paymentType->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_paymentType" class="form-group appointment_scheduler_paymentType">
<span<?php echo $appointment_scheduler_grid->paymentType->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_scheduler_grid->paymentType->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_paymentType" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_paymentType" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_paymentType" value="<?php echo HtmlEncode($appointment_scheduler_grid->paymentType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_paymentType" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_paymentType" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_paymentType" value="<?php echo HtmlEncode($appointment_scheduler_grid->paymentType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
		<td data-name="WhereDidYouHear">
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_WhereDidYouHear" class="form-group appointment_scheduler_WhereDidYouHear">
<div id="tp_x<?php echo $appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="appointment_scheduler" data-field="x_WhereDidYouHear" data-value-separator="<?php echo $appointment_scheduler_grid->WhereDidYouHear->displayValueSeparatorAttribute() ?>" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear[]" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear[]" value="{value}"<?php echo $appointment_scheduler_grid->WhereDidYouHear->editAttributes() ?>></div>
<div id="dsl_x<?php echo $appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $appointment_scheduler_grid->WhereDidYouHear->checkBoxListHtml(FALSE, "x{$appointment_scheduler_grid->RowIndex}_WhereDidYouHear[]") ?>
</div></div>
<?php echo $appointment_scheduler_grid->WhereDidYouHear->Lookup->getParamTag($appointment_scheduler_grid, "p_x" . $appointment_scheduler_grid->RowIndex . "_WhereDidYouHear") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_WhereDidYouHear" class="form-group appointment_scheduler_WhereDidYouHear">
<span<?php echo $appointment_scheduler_grid->WhereDidYouHear->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_scheduler_grid->WhereDidYouHear->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_WhereDidYouHear" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear" value="<?php echo HtmlEncode($appointment_scheduler_grid->WhereDidYouHear->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_WhereDidYouHear" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear[]" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear[]" value="<?php echo HtmlEncode($appointment_scheduler_grid->WhereDidYouHear->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_HospID" class="form-group appointment_scheduler_HospID">
<span<?php echo $appointment_scheduler_grid->HospID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_scheduler_grid->HospID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_HospID" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_HospID" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($appointment_scheduler_grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_HospID" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_HospID" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($appointment_scheduler_grid->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->createdBy->Visible) { // createdBy ?>
		<td data-name="createdBy">
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_createdBy" class="form-group appointment_scheduler_createdBy">
<span<?php echo $appointment_scheduler_grid->createdBy->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_scheduler_grid->createdBy->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_createdBy" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_createdBy" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_createdBy" value="<?php echo HtmlEncode($appointment_scheduler_grid->createdBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_createdBy" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_createdBy" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_createdBy" value="<?php echo HtmlEncode($appointment_scheduler_grid->createdBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->createdDateTime->Visible) { // createdDateTime ?>
		<td data-name="createdDateTime">
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_createdDateTime" class="form-group appointment_scheduler_createdDateTime">
<span<?php echo $appointment_scheduler_grid->createdDateTime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_scheduler_grid->createdDateTime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_createdDateTime" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_createdDateTime" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_createdDateTime" value="<?php echo HtmlEncode($appointment_scheduler_grid->createdDateTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_createdDateTime" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_createdDateTime" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_createdDateTime" value="<?php echo HtmlEncode($appointment_scheduler_grid->createdDateTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_grid->PatientTypee->Visible) { // PatientTypee ?>
		<td data-name="PatientTypee">
<?php if (!$appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_PatientTypee" class="form-group appointment_scheduler_PatientTypee">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="appointment_scheduler" data-field="x_PatientTypee" data-value-separator="<?php echo $appointment_scheduler_grid->PatientTypee->displayValueSeparatorAttribute() ?>" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientTypee" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientTypee"<?php echo $appointment_scheduler_grid->PatientTypee->editAttributes() ?>>
			<?php echo $appointment_scheduler_grid->PatientTypee->selectOptionListHtml("x{$appointment_scheduler_grid->RowIndex}_PatientTypee") ?>
		</select>
</div>
<?php echo $appointment_scheduler_grid->PatientTypee->Lookup->getParamTag($appointment_scheduler_grid, "p_x" . $appointment_scheduler_grid->RowIndex . "_PatientTypee") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_PatientTypee" class="form-group appointment_scheduler_PatientTypee">
<span<?php echo $appointment_scheduler_grid->PatientTypee->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($appointment_scheduler_grid->PatientTypee->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_PatientTypee" name="x<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientTypee" id="x<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientTypee" value="<?php echo HtmlEncode($appointment_scheduler_grid->PatientTypee->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_PatientTypee" name="o<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientTypee" id="o<?php echo $appointment_scheduler_grid->RowIndex ?>_PatientTypee" value="<?php echo HtmlEncode($appointment_scheduler_grid->PatientTypee->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$appointment_scheduler_grid->ListOptions->render("body", "right", $appointment_scheduler_grid->RowIndex);
?>
<script>
loadjs.ready(["fappointment_schedulergrid", "load"], function() {
	fappointment_schedulergrid.updateLists(<?php echo $appointment_scheduler_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($appointment_scheduler->CurrentMode == "add" || $appointment_scheduler->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $appointment_scheduler_grid->FormKeyCountName ?>" id="<?php echo $appointment_scheduler_grid->FormKeyCountName ?>" value="<?php echo $appointment_scheduler_grid->KeyCount ?>">
<?php echo $appointment_scheduler_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($appointment_scheduler->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $appointment_scheduler_grid->FormKeyCountName ?>" id="<?php echo $appointment_scheduler_grid->FormKeyCountName ?>" value="<?php echo $appointment_scheduler_grid->KeyCount ?>">
<?php echo $appointment_scheduler_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($appointment_scheduler->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fappointment_schedulergrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($appointment_scheduler_grid->Recordset)
	$appointment_scheduler_grid->Recordset->Close();
?>
<?php if ($appointment_scheduler_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $appointment_scheduler_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($appointment_scheduler_grid->TotalRecords == 0 && !$appointment_scheduler->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $appointment_scheduler_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$appointment_scheduler_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$appointment_scheduler->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_appointment_scheduler",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php
$appointment_scheduler_grid->terminate();
?>